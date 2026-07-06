<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasSeo;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BlogPost extends Model implements HasMedia
{
    use HasFactory, HasSeo, HasSlug, HasStatus, InteractsWithMedia, LogsActivity, SoftDeletes;

    protected $guarded = [];

    protected $casts = ['published_at' => 'datetime'];

    public function slugSource(): string
    {
        return 'title';
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded();
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
