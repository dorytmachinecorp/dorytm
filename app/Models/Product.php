<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasFeatured;
use App\Models\Concerns\HasSeo;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\HasSortOrder;
use App\Models\Concerns\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFeatured, HasSeo, HasSlug, HasSortOrder, HasStatus, InteractsWithMedia, LogsActivity, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'applications' => 'array',
        'features' => 'array',
        'technical_specifications' => 'array',
        'variants' => 'array',
        'is_featured' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function industries()
    {
        return $this->belongsToMany(Industry::class);
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'related_products', 'product_id', 'related_id');
    }
}
