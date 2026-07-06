<?php

declare(strict_types=1);

namespace App\Models\Concerns;

trait HasSortOrder
{
    public static function bootHasSortOrder()
    {
        static::creating(function ($model) {
            if (empty($model->sort_order)) {
                $model->sort_order = static::max('sort_order') + 1;
            }
        });
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
