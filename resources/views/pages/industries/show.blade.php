<x-layouts.app :title="$industry->name . ' Industry Solutions'" :seo="$industry->seo">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden border-b border-steel-900"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            @if($industry->hasMedia('images'))
                <img src="{{ $industry->getFirstMediaUrl('images') }}" alt="{{ $industry->name }}" class="w-full h-full object-cover opacity-10 mix-blend-overlay animate-slow-pan">
            @else
                <img src="{{ asset('img/hero_bg_1783126095772.png') }}" class="w-full h-full object-cover opacity-10 mix-blend-overlay">
            @endif
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10 text-center" data-reveal="fade-up">
            <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ INDUSTRY SOLUTION ]</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white mb-6 uppercase tracking-tight">{{ $industry->name }}</h1>
            <p class="text-lg text-steel-450 max-w-2xl mx-auto leading-relaxed">{{ $industry->short_description }}</p>
        </x-ui.container>
    </section>

    {{-- DETAIL CONTENT --}}
    <section class="py-24 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container>
            <div class="max-w-4xl mx-auto prose prose-steel leading-relaxed mb-20 text-steel-650" data-reveal="fade-up">
                {!! $industry->full_description !!}
            </div>

            <div class="mb-12 text-center" data-reveal="fade-up">
                <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-2">[ RECOMMENDED SYSTEMS ]</span>
                <h2 class="text-2xl md:text-3xl font-display font-extrabold uppercase text-steel-950 tracking-tight">Recommended Machinery for {{ $industry->name }}</h2>
                <div class="w-12 h-px bg-primary-500 mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20" data-reveal="stagger">
                <div class="bg-steel-950 text-white p-8 border border-steel-800 rounded-none text-center col-span-full relative">
                    <div class="absolute top-0 left-0 w-3 h-3 border-t border-l border-primary-500"></div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 border-b border-r border-primary-500"></div>
                    <p class="text-steel-400 font-mono text-xs uppercase tracking-wider mb-6">[ View our complete catalogue to find the perfect machinery for your {{ strtolower($industry->name) }} process ]</p>
                    <x-ui.button href="{{ route('products.index') }}" variant="primary" size="md">Browse Products</x-ui.button>
                </div>
            </div>

            @if($otherIndustries->count() > 0)
            <div class="border-t border-steel-200 pt-16" data-reveal="fade-up">
                <h3 class="font-mono text-xs uppercase tracking-widest text-steel-900 mb-8">[ OTHER INDUSTRIES WE SERVE ]</h3>
                <div class="flex flex-wrap gap-4 font-mono text-xs uppercase tracking-wider">
                    @foreach($otherIndustries as $other)
                        <a href="{{ route('industries.show', $other->slug) }}" class="px-6 py-3 border border-steel-200 bg-steel-50 text-steel-750 font-bold hover:bg-steel-950 hover:text-white hover:border-steel-950 transition-colors">{{ $other->name }}</a>
                    @endforeach
                </div>
            </div>
            @endif
        </x-ui.container>
    </section>
</x-layouts.app>