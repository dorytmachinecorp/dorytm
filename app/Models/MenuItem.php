<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasSortOrder;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasSortOrder;

    protected $guarded = [];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('sort_order');
    }
}
