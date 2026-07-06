<?php

declare(strict_types=1);

namespace App\Enums;

enum MediaCollection: string
{
    case Images = 'images';
    case Gallery = 'gallery';
    case Brochure = 'brochure';
    case Datasheet = 'datasheet';
    case Video = 'video';
    case Hero = 'hero';
    case Document = 'document';

    public function label(): string
    {
        return match ($this) {
            self::Images => 'Images',
            self::Gallery => 'Gallery',
            self::Brochure => 'Brochure',
            self::Datasheet => 'Datasheet',
            self::Video => 'Video',
            self::Hero => 'Hero',
            self::Document => 'Document',
        };
    }
}
