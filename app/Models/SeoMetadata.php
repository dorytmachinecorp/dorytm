<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMetadata extends Model
{
    protected $table = 'seo_metadata';

    protected $guarded = [];

    public function seoable()
    {
        return $this->morphTo();
    }
}
