<?php

$pagesDir = __DIR__.'/../resources/views/pages';
$blocksDir = __DIR__.'/../resources/views/components/blocks';

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

function processPage($pageName, $sectionsToExtract)
{
    global $pagesDir, $blocksDir;
    $content = file_get_contents("$pagesDir/$pageName/index.blade.php");

    foreach ($sectionsToExtract as $blockName => $startComment) {
        $sectionContent = extractSection($content, $startComment);
        if ($sectionContent) {
            $bladeContent = "@props(['data' => []])\n\n";

            // Add dynamic fetching
            if ($blockName === 'directory-blogs') {
                $bladeContent .= "@php\n    \$blogs = \App\Models\Blog::latest()->paginate(12);\n@endphp\n";
            } elseif ($blockName === 'directory-certificates') {
                $bladeContent .= "@php\n    \$certificates = \App\Models\Certificate::orderBy('order_column')->get();\n@endphp\n";
            } elseif ($blockName === 'directory-downloads') {
                $bladeContent .= "@php\n    \$downloads = \App\Models\Download::orderBy('order_column')->get();\n@endphp\n";
            } elseif ($blockName === 'directory-galleries') {
                $bladeContent .= "@php\n    \$galleries = \App\Models\Gallery::orderBy('order_column')->get();\n@endphp\n";
            } elseif ($blockName === 'directory-industries') {
                $bladeContent .= "@php\n    \$industries = \App\Models\Industry::all();\n@endphp\n";
            } elseif ($blockName === 'directory-products') {
                $bladeContent .= "@php\n    \$products = \App\Models\Product::paginate(12);\n    \$categories = \App\Models\Category::all();\n@endphp\n";
            }

            $bladeContent .= trim($sectionContent)."\n";
            file_put_contents("$blocksDir/$blockName.blade.php", $bladeContent);
            echo "Created $blockName.blade.php\n";
        }
    }
}

// Process inner pages
processPage('about', [
    'about-story-original' => '{{-- COMPANY STORY --}}',
    'about-facilities-original' => '{{-- MANUFACTURING EXCELLENCE --}}',
]);
processPage('blogs', ['directory-blogs' => '{{-- ARTICLES GRID --}}']);
processPage('certificates', ['directory-certificates' => '{{-- CERTIFICATES GRID --}}']);
processPage('downloads', ['directory-downloads' => '{{-- DOWNLOADS LIST --}}']);
processPage('galleries', ['directory-galleries' => '{{-- MEDIA GRID --}}']);
processPage('industries', [
    'industries-promise' => '{{-- OUR PROMISE --}}',
    'directory-industries' => '{{-- MAIN INDUSTRIES GRID --}}',
]);
processPage('products', [
    'directory-products' => '{{-- MAIN PRODUCTS GRID --}}',
    'products-why-choose' => '{{-- WHY CHOOSE US --}}',
]);
processPage('contact', ['contact-section' => '{{-- MAIN SECTION --}}']);

echo "Done extracting inner pages.\n";
