<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Instagram\Api;
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
        $api = new Api($cache_pool);
        $api->login(config('services.instagram.username'), config('services.instagram.password'));
        $profile = $api->getProfile(config('services.instagram.profile'));
        $medias = collect($profile->getMedias())->take(5);

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
                $post->{$attribute} = $media->{'get'.ucfirst($attribute)}();
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
