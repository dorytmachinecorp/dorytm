<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Provides featured flag management for models with an `is_featured` column.
 *
 * Adds query scopes for filtering featured/non-featured records and
 * helper methods for checking and toggling the featured state.
 *
 * @mixin Model
 *
 * @property bool $is_featured
 */
trait HasFeatured
{
    /**
     * Scope the query to only include featured records.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope the query to only include non-featured records.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeNotFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', false);
    }

    /**
     * Determine if the model is currently featured.
     */
    public function isFeatured(): bool
    {
        return (bool) $this->is_featured;
    }

    /**
     * Toggle the featured state and persist the change.
     */
    public function toggleFeatured(): void
    {
        $this->is_featured = ! $this->is_featured;
        $this->save();
    }
}
