<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use App\Enums\MediaCollection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Provides polymorphic media relationships with collection-based accessors.
 *
 * Links the model to `App\Models\Media` via a morphMany relationship and
 * offers helpers to retrieve media by collection name.
 *
 * @mixin Model
 */
trait HasMedia
{
    /**
     * Get all media associated with this model.
     *
     * @return MorphMany<Media, $this>
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Get media filtered by a specific collection name.
     *
     * @return MorphMany<Media, $this>
     */
    public function getMediaByCollection(string $collection): MorphMany
    {
        return $this->media()->where('collection', $collection);
    }

    /**
     * Get the primary image from the 'images' collection.
     */
    public function getPrimaryImage(): ?Media
    {
        return $this->media()
            ->where('collection', MediaCollection::Images->value)
            ->first();
    }

    /**
     * Get all media in the 'gallery' collection ordered by sort_order.
     *
     * @return Collection<int, Media>
     */
    public function getGallery(): Collection
    {
        return $this->media()
            ->where('collection', MediaCollection::Gallery->value)
            ->orderBy('sort_order')
            ->get();
    }
}
