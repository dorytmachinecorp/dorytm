<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->{$model->slugSource()});
            }
        });
    }

    public function slugSource(): string
    {
        return 'name';
    }
}
