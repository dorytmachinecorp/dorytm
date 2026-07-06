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

$sections = [
    'home-marquee' => '{{-- 3. Trusted By Industries (Social Proof) --}}',
    'home-heritage' => '{{-- 4. About DO-RYT (The Heritage) --}}',
    'home-categories' => '{{-- 5. Product Categories --}}',
    'home-flagship' => '{{-- 6. Featured Machines (Flagship Reveal) --}}',
    'home-process' => '{{-- 7. Manufacturing Process (The Craft) --}}',
    'home-industries' => '{{-- 8. Industries Served (Grid) --}}',
    'home-compliance-stats' => '{{-- 9. Statistics (The Scale) & 10. Certifications --}}',
    'home-gallery' => '{{-- 11. Factory Gallery (Blueprint Grid Console) --}}',
    'home-testimonials' => '{{-- 12. Customer Testimonials --}}',
];

foreach ($sections as $name => $startComment) {
    $sectionContent = extractSection($content, $startComment);
    if ($sectionContent) {
        // We will pass $data to the component, so we should allow dynamic overrides
        // Let's add @props(['data' => []])
        $bladeContent = "@props(['data' => []])\n\n".trim($sectionContent)."\n";

        // Add dynamic fetching for models if needed
        if ($name === 'home-categories') {
            $bladeContent = "@php\n    \$categories = \App\Models\Category::all();\n@endphp\n".$bladeContent;
        } elseif ($name === 'home-flagship') {
            $bladeContent = "@php\n    \$featuredProducts = \App\Models\Product::where('is_featured', true)->get();\n@endphp\n".$bladeContent;
        } elseif ($name === 'home-industries') {
            $bladeContent = "@php\n    \$industries = \App\Models\Industry::all();\n@endphp\n".$bladeContent;
        } elseif ($name === 'home-testimonials') {
            $bladeContent = "@php\n    \$testimonials = \App\Models\Testimonial::where('is_active', true)->get();\n@endphp\n".$bladeContent;
        }

        file_put_contents("$blocksDir/$name.blade.php", $bladeContent);
        echo "Created $name.blade.php\n";
    }
}

echo "Done.\n";
