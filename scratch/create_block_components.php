<?php

$components = [
    'hero.blade.php' => <<<'EOT'
@props(['data'])

<section class="relative bg-steel-950 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden border-b border-steel-900"
         style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
    <!-- Hero Background -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-linear-to-r from-steel-950 via-steel-950/80 to-transparent z-10"></div>
        @if(!empty($data['background_image']))
            <img fetchpriority="high" src="{{ asset('storage/'.$data['background_image']) }}" class="js-hero-bg w-full h-full object-cover opacity-30 scale-105 transform origin-center animate-slow-pan">
        @else
            <img fetchpriority="high" src="{{ asset('img/hero_bg_1783126095772.png') }}" class="js-hero-bg w-full h-full object-cover opacity-30 scale-105 transform origin-center animate-slow-pan">
        @endif
    </div>
    
    <x-ui.container class="relative z-20">
        <div class="max-w-4xl" data-reveal="fade-up">
            @if(!empty($data['badge']))
            <div class="inline-flex items-center space-x-2 bg-steel-900 border border-steel-800 px-3 py-1.5 mb-8">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                </span>
                <span class="font-mono text-[10px] text-steel-400 tracking-widest uppercase">{{ $data['badge'] }}</span>
            </div>
            @endif

            <h1 class="text-5xl md:text-7xl lg:text-8xl font-display font-extrabold text-white tracking-tight mb-8 leading-[0.95] uppercase">
                {!! nl2br(e($data['headline'] ?? '')) !!}
            </h1>
            
            @if(!empty($data['description']))
            <p class="text-lg md:text-xl text-steel-400 mb-12 max-w-2xl leading-relaxed">
                {{ $data['description'] }}
            </p>
            @endif
            
            @if(!empty($data['buttons']) && count($data['buttons']) > 0)
            <div class="flex flex-col sm:flex-row gap-4">
                @foreach($data['buttons'] as $btn)
                    <x-ui.button href="{{ $btn['url'] ?? '#' }}" variant="{{ $btn['variant'] === 'outline' ? 'outline-white' : 'primary' }}" size="lg">{{ $btn['label'] ?? '' }}</x-ui.button>
                @endforeach
            </div>
            @endif
        </div>
    </x-ui.container>
</section>
EOT,

    'content.blade.php' => <<<'EOT'
@props(['data'])
<section class="py-24 bg-white">
    <x-ui.container>
        <div class="prose prose-lg prose-steel max-w-4xl mx-auto">
            {!! $data['body'] ?? '' !!}
        </div>
    </x-ui.container>
</section>
EOT,

    'features.blade.php' => <<<'EOT'
@props(['data'])
<section class="py-24 bg-steel-50 border-t border-steel-200">
    <x-ui.container>
        <div class="mb-16 max-w-3xl">
            @if(!empty($data['badge']))
                <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">{{ $data['badge'] }}</span>
            @endif
            <h2 class="text-3xl md:text-4xl font-display font-extrabold text-steel-950 uppercase tracking-tight mb-6">
                {{ $data['title'] ?? '' }}
            </h2>
            @if(!empty($data['description']))
                <p class="text-steel-600 text-lg leading-relaxed">{{ $data['description'] }}</p>
            @endif
        </div>
        
        @if(!empty($data['items']))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($data['items'] as $item)
            <div class="bg-white p-8 border border-steel-200 hover:border-primary-500 transition-colors duration-300 shadow-sm relative group">
                <div class="w-12 h-12 bg-steel-100 flex items-center justify-center text-primary-600 mb-6 group-hover:bg-primary-50 group-hover:scale-110 transition-all duration-300">
                    @if(!empty($item['icon']))
                        @svg($item['icon'], 'w-6 h-6')
                    @else
                        <x-heroicon-o-cube class="w-6 h-6" />
                    @endif
                </div>
                <h3 class="text-xl font-bold text-steel-900 mb-3">{{ $item['title'] ?? '' }}</h3>
                <p class="text-steel-600 leading-relaxed text-sm">{{ $item['description'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </x-ui.container>
</section>
EOT,

    'stats.blade.php' => <<<'EOT'
@props(['data'])
<section class="py-24 bg-steel-950 text-white border-y border-steel-900" style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
    <x-ui.container>
        @if(!empty($data['title']))
        <div class="mb-16 text-center max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-display font-extrabold uppercase tracking-tight mb-6">{{ $data['title'] }}</h2>
            @if(!empty($data['description']))
            <p class="text-steel-400 text-lg">{{ $data['description'] }}</p>
            @endif
        </div>
        @endif

        @if(!empty($data['items']))
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12 divide-x divide-steel-800">
            @foreach($data['items'] as $item)
            <div class="text-center px-4">
                <div class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-primary-400 mb-2">{{ $item['value'] ?? '' }}</div>
                <div class="font-mono text-[10px] text-steel-400 uppercase tracking-widest">{{ $item['label'] ?? '' }}</div>
            </div>
            @endforeach
        </div>
        @endif
    </x-ui.container>
</section>
EOT,

    'cta.blade.php' => <<<'EOT'
@props(['data'])
<section class="py-24 bg-primary-600 relative overflow-hidden">
    <!-- Subtle Grid Overlay -->
    <div class="absolute inset-0 mix-blend-overlay opacity-20" style="background-image: linear-gradient(var(--color-primary-900) 1px, transparent 1px), linear-gradient(90deg, var(--color-primary-900) 1px, transparent 1px); background-size: 40px 40px;"></div>
    
    <x-ui.container class="relative z-10 text-left">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-12">
            <div class="max-w-3xl text-left">
                @if(!empty($data['badge']))
                    <span class="font-mono text-[10px] text-primary-950 font-bold uppercase tracking-widest block mb-4">{{ $data['badge'] }}</span>
                @endif
                <h2 class="text-4xl md:text-5xl font-display font-extrabold text-white uppercase tracking-tight mb-6 leading-tight">
                    {!! nl2br(e($data['title'] ?? '')) !!}
                </h2>
                @if(!empty($data['description']))
                <p class="text-primary-100 text-lg md:text-xl leading-relaxed">
                    {{ $data['description'] }}
                </p>
                @endif
            </div>
            
            @if(!empty($data['buttons']))
            <div class="sm:max-w-xs lg:w-72 shrink-0">
                <div class="flex flex-col gap-4">
                    @foreach($data['buttons'] as $btn)
                        <x-ui.button href="{{ $btn['url'] ?? '#' }}" variant="{{ $btn['variant'] === 'outline' ? 'outline-white' : 'primary' }}" size="lg" class="{{ $btn['variant'] === 'primary' ? '!bg-steel-950 !text-white hover:!bg-steel-900' : '' }} w-full justify-center">{{ $btn['label'] ?? '' }}</x-ui.button>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </x-ui.container>
</section>
EOT,

    'gallery.blade.php' => <<<'EOT'
@props(['data'])
<section class="py-24 bg-steel-50">
    <x-ui.container>
        @if(!empty($data['title']))
            <h2 class="text-3xl font-display font-bold uppercase mb-12">{{ $data['title'] }}</h2>
        @endif
        
        @if(!empty($data['images']))
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($data['images'] as $img)
                <div class="aspect-square bg-white border border-steel-200 p-2 relative group overflow-hidden">
                    <img src="{{ asset('storage/'.$img['image']) }}" alt="{{ $img['caption'] ?? '' }}" class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500">
                    @if(!empty($img['caption']))
                        <div class="absolute bottom-2 left-2 right-2 bg-steel-950/90 text-white text-xs p-2 font-mono uppercase tracking-wider opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            {{ $img['caption'] }}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        @endif
    </x-ui.container>
</section>
EOT,

    'downloads.blade.php' => <<<'EOT'
@props(['data'])
<section class="py-24 bg-white border-y border-steel-200">
    <x-ui.container>
        <div class="mb-12">
            <h2 class="text-3xl font-display font-extrabold uppercase text-steel-950">{{ $data['title'] ?? 'Downloads' }}</h2>
            @if(!empty($data['description']))
                <p class="text-steel-600 mt-4 max-w-2xl">{{ $data['description'] }}</p>
            @endif
        </div>
        
        @if(!empty($data['download_ids']))
            @php
                $downloads = \App\Models\Download::whereIn('id', $data['download_ids'])->get();
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($downloads as $download)
                <div class="flex items-center justify-between p-6 bg-steel-50 border border-steel-200 hover:border-primary-400 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white flex items-center justify-center text-primary-600 shadow-xs border border-steel-100">
                            <x-heroicon-o-document-arrow-down class="w-6 h-6" />
                        </div>
                        <div>
                            <h4 class="font-bold text-steel-900 group-hover:text-primary-600 transition-colors">{{ $download->title }}</h4>
                            <div class="flex items-center gap-3 mt-1 font-mono text-[10px] text-steel-500 uppercase">
                                <span>{{ $download->file_type }}</span>
                                <span>&bull;</span>
                                <span>{{ $download->file_size }}</span>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('downloads.download', $download->id) }}" class="text-steel-400 hover:text-primary-600 transition-colors">
                        <x-heroicon-o-arrow-down-tray class="w-5 h-5" />
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </x-ui.container>
</section>
EOT,

    'entity-list.blade.php' => <<<'EOT'
@props(['data'])
<section class="py-24 bg-white border-t border-steel-200">
    <x-ui.container>
        <div class="mb-16">
            @if(!empty($data['badge']))
                <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">{{ $data['badge'] }}</span>
            @endif
            @if(!empty($data['title']))
                <h2 class="text-3xl md:text-4xl font-display font-extrabold uppercase text-steel-950 tracking-tight">{{ $data['title'] }}</h2>
            @endif
            @if(!empty($data['description']))
                <p class="text-steel-600 mt-4 max-w-2xl">{{ $data['description'] }}</p>
            @endif
        </div>
        
        @if(!empty($data['entity_type']))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $limit = $data['limit'] ?? 4;
                    if($data['entity_type'] === 'products') {
                        $items = \App\Models\Product::where('status', 'published')->latest()->take($limit)->get();
                        foreach($items as $product) {
                            echo '<x-cards.product :product="$product" />';
                        }
                    } elseif($data['entity_type'] === 'industries') {
                        $items = \App\Models\Industry::where('status', 'published')->latest()->take($limit)->get();
                        foreach($items as $industry) {
                            // Assuming we have a card component, or render simple card
                            echo '<div class="border p-4"><h3 class="font-bold">'.$industry->name.'</h3></div>';
                        }
                    } elseif($data['entity_type'] === 'categories') {
                        $items = \App\Models\Category::where('status', 'published')->latest()->take($limit)->get();
                        foreach($items as $category) {
                            echo '<x-cards.category :category="$category" />';
                        }
                    }
                @endphp
            </div>
        @endif
    </x-ui.container>
</section>
EOT,
];

foreach ($components as $filename => $content) {
    file_put_contents("resources/views/components/blocks/{$filename}", $content);
}
echo "Components created.\n";
