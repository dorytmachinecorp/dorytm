<?php

$homeBladePath = __DIR__.'/../resources/views/pages/home.blade.php';
$blocksDir = __DIR__.'/../resources/views/components/blocks';

$content = file_get_contents($homeBladePath);

function extractSection($content, $startComment, $endComment = null)
{
    $startPos = strpos($content, $startComment);
    if ($startPos === false) {
        return null;
    }

    if ($endComment) {
        $endPos = strpos($content, $endComment, $startPos);
        if ($endPos === false) {
            return null;
        }

        return substr($content, $startPos, $endPos - $startPos);
    } else {
        // Extract from start to the next {{--
        $endPos = strpos($content, '{{--', $startPos + strlen($startComment));
        if ($endPos === false) {
            $endPos = strpos($content, '</x-layouts.app>', $startPos);
        }
        if ($endPos === false) {
            return null;
        }

        return substr($content, $startPos, $endPos - $startPos);
    }
}

// Hero section starts at `@if(isset($heroSlides)` and ends before `{{-- 3. Trusted By Industries (Social Proof) --}}`
$heroContent = extractSection($content, '@if(isset($heroSlides)', '{{-- 3. Trusted By Industries (Social Proof) --}}');

if ($heroContent) {
    $bladeContent = "@props(['data' => []])\n\n@php\n    \$heroSlides = \App\Models\HeroSlide::where('is_active', true)->orderBy('order_column')->get();\n@endphp\n\n".trim($heroContent)."\n";
    file_put_contents("$blocksDir/home-hero.blade.php", $bladeContent);
    echo "Created home-hero.blade.php\n";
}

echo "Done.\n";
