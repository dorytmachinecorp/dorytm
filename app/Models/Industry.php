<?php

declare(strict_types=1);

namespace App\Models;

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

class Industry extends Model implements HasMedia
{
    use HasSeo, HasSlug, HasSortOrder, HasStatus, InteractsWithMedia, LogsActivity, SoftDeletes;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
