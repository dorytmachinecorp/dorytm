<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $finalTitle = $title ?? setting('general.site_name', 'DO-RYT Machine Corp');
        if (isset($seo) && $seo?->title) {
            $finalTitle = $seo->title;
        }
        $finalTitle .= ' ' . setting('seo.meta_title_suffix', '| Premium Industrial Machinery');

        $finalDescription = $description ?? setting('seo.meta_description', 'DO-RYT Machine Corp specializes in high-quality industrial processing machinery, dryers, and complete manufacturing lines.');
        if (isset($seo) && $seo?->description) {
            $finalDescription = $seo->description;
        }

        $finalKeywords = setting('seo.meta_keywords');
        if (isset($seo) && $seo?->keywords) {
            $finalKeywords = $seo->keywords;
        }
    @endphp

    <title>{{ $finalTitle }}</title>
    <meta name="description" content="{{ $finalDescription }}">
    @if ($finalKeywords)
        <meta name="keywords" content="{{ $finalKeywords }}">
    @endif
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    @if (setting('general.favicon'))
        <link rel="icon" type="image/png" href="{{ Storage::disk('public')->url(setting('general.favicon')) }}">
    @endif

    @php
        $finalOgImage = $ogImage ?? null;
        if (isset($seo) && $seo?->og_image) {
            $finalOgImage = Storage::disk('public')->url($seo->og_image);
        }
        if (!$finalOgImage) {
            $finalOgImage = setting('seo.og_image') ? Storage::disk('public')->url(setting('seo.og_image')) : asset('img/hero_bg_1783126095772.png');
        }
    @endphp

    <!-- Open Graph -->
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $finalTitle }}">
    <meta property="og:description" content="{{ $finalDescription }}">
    <meta property="og:image" content="{{ $finalOgImage }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $finalTitle }}">
    <meta property="twitter:description" content="{{ $finalDescription }}">
    <meta property="twitter:image" content="{{ $finalOgImage }}">

    <!-- Schema.org -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "DO-RYT Machine Corp",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('img/logo.png') }}",
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "+91-98765-43210",
        "contactType": "customer service"
      }
    }
    </script>

    @stack('schema')

    <!-- Performance Hints -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Preload Fonts -->
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        as="style" crossorigin>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap">
    </noscript>

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            @if(setting('general.bg_main'))
                --bg-main: {{ setting('general.bg_main') }};
            @endif
            @if(setting('general.bg_alt'))
                --bg-alt: {{ setting('general.bg_alt') }};
            @endif
            @if(setting('general.text_main'))
                --text-main: {{ setting('general.text_main') }};
            @endif
            @if(setting('general.text_muted'))
                --text-muted: {{ setting('general.text_muted') }};
            @endif
            
            @if(setting('general.primary_color'))
                /* Dynamically map the selected color to the primary palette */
                --color-primary-400: color-mix(in srgb, {{ setting('general.primary_color') }}, white 15%);
                --color-primary-500: {{ setting('general.primary_color') }};
                --color-primary-600: color-mix(in srgb, {{ setting('general.primary_color') }}, black 15%);
                --color-primary-700: color-mix(in srgb, {{ setting('general.primary_color') }}, black 30%);
            @endif
        }
    </style>

    @stack('styles')
    @stack('analytics')
</head>

<body class="bg-white text-steel-900 antialiased min-h-screen flex flex-col font-sans">
    <div class="js-loader fixed inset-0 z-[100] bg-steel-900 flex flex-col items-center justify-center">
        <div class="js-loader-logo flex items-center mb-8">
            @if (setting('general.site_logo'))
                <img src="{{ Storage::disk('public')->url(setting('general.site_logo')) }}"
                    alt="{{ setting('general.site_name', 'DO-RYT') }}" class="h-10 w-auto object-contain mr-3">
            @else
                <div
                    class="w-10 h-10 border border-primary-500 bg-primary-950/50 flex items-center justify-center text-primary-400 font-mono font-bold text-lg mr-3">
                    {{ substr(setting('general.site_name', 'DO-RYT'), 0, 1) }}
                </div>
            @endif

        </div>
        <div class="w-48 h-1 bg-steel-800 rounded-full overflow-hidden">
            <div class="js-loader-progress w-full h-full bg-primary-500 scale-x-0"></div>
        </div>
    </div>

    <x-partials.header />

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <x-partials.footer />

    @stack('scripts')

    <button x-data="{ visible: false }" x-init="window.addEventListener('scroll', () => { visible = window.scrollY > 300 }, { passive: true })" x-show="visible"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4"
        @click="window.lenis ? window.lenis.scrollTo(0, { immediate: false, duration: 1.5 }) : window.scrollTo({ top: 0, behavior: 'smooth' })"
        aria-label="Back to top"
        class="fixed bottom-6 right-6 z-50 w-12 h-12 bg-primary-600 hover:bg-primary-500 text-white shadow-lg flex items-center justify-center transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-500 focus-visible:ring-offset-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </button>
</body>

</html>
