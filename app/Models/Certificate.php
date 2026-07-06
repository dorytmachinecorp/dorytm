<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasSortOrder;
use App\Models\Concerns\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Certificate extends Model implements HasMedia
{
    use HasSortOrder, HasStatus, InteractsWithMedia, LogsActivity, SoftDeletes;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded();
    }
}
