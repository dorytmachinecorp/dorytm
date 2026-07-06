<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product): void
    {
        if (empty($product->slug) && ! empty($product->name)) {
            $product->slug = Str::slug($product->name);
        }
    }

    public function created(Product $product): void
    {
        $this->clearCaches();
    }

    public function updated(Product $product): void
    {
        $this->clearCaches();
    }

    public function deleted(Product $product): void
    {
        $this->clearCaches();
    }

    protected function clearCaches(): void
    {
        Cache::forget('featured_products');
        Cache::forget('products_count');
    }
}
