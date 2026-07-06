<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function creating(Category $category): void
    {
        if (empty($category->slug) && ! empty($category->name)) {
            $category->slug = Str::slug($category->name);
        }
    }

    public function created(Category $category): void
    {
        $this->clearCaches();
    }

    public function updated(Category $category): void
    {
        $this->clearCaches();
    }

    public function deleted(Category $category): void
    {
        $this->clearCaches();
    }

    protected function clearCaches(): void
    {
        Cache::forget('categories_list');
        Cache::forget('categories_count');
    }
}
