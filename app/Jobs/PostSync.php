<?php

namespace App\Jobs;

use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Instagram\Api;
use Instagram\Auth\Checkpoint\ImapClient;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class PostSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Execute the job.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Instagram\Exception\InstagramAuthException
     * @throws \Instagram\Exception\InstagramException
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function handle()
    {
        // Retrieve media from Instagram
        $cache_pool = new FilesystemAdapter('instagram', 0, storage_path('cache'));
        $imap_client = new ImapClient(
            config('services.instagram.mail.host').':993',
            config('services.instagram.mail.username'),
            config('services.instagram.mail.password')
        );
        $client = new Client(['force_ip_resolve' => 'v4']);
        $api = new Api($cache_pool, $client);
        $api->login(
            config('services.instagram.username'),
            config('services.instagram.password'),
            $imap_client
        );
        $profile = $api->getProfile(config('services.instagram.profile'));
        $profile = $api->getMoreMedias($profile); // TODO: This seems to be required. Not sure why...
        $medias = collect($profile->getMedias())->filter(function ($value) {
            return $value->isVideo() == false;
        })->take(5);

        if ($medias->count()<1) {
            return;
        }

        // Insert or update posts
        $attributes = [
            'shortcode',
            'typeName',
            'thumbnailSrc',
            'displaySrc',
            'link',
            'caption',
            'accessibilityCaption',
            'date'
        ];
        $medias->each(function ($media) use ($attributes) {
            $post = Post::withTrashed()->firstOrNew(['id' => $media->getId()]);

            foreach ($attributes as $attribute) {
                $post->{$attribute} = $media->{'get'.ucfirst($attribute)}() ?? '';
            }
            $post->deleted_at = null;
            $post->save();
        });

        // Delete posts
        Post::whereNotIn('id', $medias->map(function ($media) {
            return $media->getId();
        })->toArray())->delete();
    }
}
