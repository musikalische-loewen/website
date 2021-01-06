<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the post "saving" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function saving(Post $post)
    {
        if ($post->isDirty('thumbnailSrc')) {
            Storage::put('public/'.$post->path_thumbnail, url_get_contents($post->thumbnailSrc));
        }
        if ($post->isDirty('displaySrc')) {
            Storage::put('public/'.$post->path_display, url_get_contents($post->displaySrc));
        }
    }
}
