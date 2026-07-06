<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BlogPostObserver
{
    public function creating(BlogPost $blogPost): void
    {
        if (empty($blogPost->slug) && ! empty($blogPost->title)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    public function created(BlogPost $blogPost): void
    {
        $this->clearCaches();
    }

    public function updated(BlogPost $blogPost): void
    {
        $this->clearCaches();
    }

    public function deleted(BlogPost $blogPost): void
    {
        $this->clearCaches();
    }

    protected function clearCaches(): void
    {
        Cache::forget('recent_posts');
        Cache::forget('blog_posts_count');
    }
}
