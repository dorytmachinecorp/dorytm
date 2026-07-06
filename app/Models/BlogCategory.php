<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\HasSortOrder;
use App\Models\Concerns\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class BlogCategory extends Model
{
    use HasSlug, HasSortOrder, HasStatus, LogsActivity, SoftDeletes;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded();
    }

    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }
}
