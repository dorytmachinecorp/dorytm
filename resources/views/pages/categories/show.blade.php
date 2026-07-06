<x-layouts.app :title="$category->name" :seo="$category->seo">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden border-b border-steel-900"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            @if($category->hasMedia('images'))
                <img src="{{ $category->getFirstMediaUrl('images') }}" alt="{{ $category->name }}" class="w-full h-full object-cover opacity-10 mix-blend-overlay animate-slow-pan">
            @else
                <img src="{{ asset('img/hero_bg_1783126095772.png') }}" alt="DO-RYT Category" class="w-full h-full object-cover opacity-10 mix-blend-overlay">
            @endif
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-3xl">
                <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ PRODUCT CATEGORY ]</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white leading-tight mb-6 uppercase tracking-tight">
                    {{ $category->name }}
                </h1>
                @if($category->description)
                <p class="text-lg text-steel-400 leading-relaxed max-w-2xl text-balance">
                    {{ $category->description }}
                </p>
                @endif
            </div>
        </x-ui.container>
    </section>

    {{-- MAIN CONTENT --}}
    <section class="py-24 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container>
            <div class="flex flex-col lg:flex-row gap-12" data-reveal="stagger">
                
                {{-- SIDEBAR --}}
                <div class="w-full lg:w-1/4">
                    <div class="sticky top-28 space-y-8">
                        <div>
                            <h3 class="font-mono text-xs uppercase tracking-widest text-steel-900 mb-6 pb-2 border-b border-steel-200">[ CATEGORIES ]</h3>
                            <ul class="space-y-1 font-mono text-xs uppercase tracking-wider">
                                @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('categories.show', $cat->slug) }}" 
                                       @class([
                                           'flex items-center justify-between px-4 py-3 transition-colors border',
                                           'bg-primary-950 border-primary-500 text-white font-bold' => $cat->id === $category->id,
                                           'border-steel-200 bg-steel-50 text-steel-600 hover:bg-steel-100 hover:text-steel-950 hover:border-steel-300' => $cat->id !== $category->id
                                       ])>
                                        <span>{{ $cat->name }}</span>
                                        @if($cat->id === $category->id)
                                            <span class="w-1.5 h-1.5 bg-primary-500 rounded-full animate-pulse"></span>
                                        @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="bg-steel-950 text-white p-8 border border-steel-800 rounded-none shadow-xl relative">
                            {{-- Decorative corners --}}
                            <div class="absolute top-0 left-0 w-2.5 h-2.5 border-t border-l border-primary-500"></div>
                            <div class="absolute bottom-0 right-0 w-2.5 h-2.5 border-b border-r border-primary-500"></div>

                            <span class="font-mono text-[9px] text-primary-400 uppercase tracking-widest block mb-2">[ ENGINEERING_GROUP ]</span>
                            <h4 class="text-lg font-display font-extrabold uppercase mb-3">Custom Machinery?</h4>
                            <p class="text-steel-400 text-xs leading-relaxed mb-6 font-sans">Our engineering team can design equipment to your exact specifications and thermal profiles.</p>
                            
                            <x-ui.button href="{{ route('contact.index') }}" variant="primary" size="sm" class="w-full justify-center">
                                Connect with Engineer
                            </x-ui.button>
                        </div>
                    </div>
                </div>

                {{-- PRODUCTS GRID --}}
                <div class="w-full lg:w-3/4">
                    <div class="mb-8">
                        <span class="font-mono text-[10px] text-primary-650 uppercase tracking-widest block mb-2">[ DIRECTORY ]</span>
                        <h2 class="text-2xl md:text-3xl font-display font-extrabold uppercase text-steel-950 tracking-tight leading-none">Available Equipment</h2>
                        <div class="w-12 h-px bg-primary-500 mt-4"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($category->products as $product)
                            <x-cards.product :product="$product" />
                        @empty
                            <div class="col-span-full py-12 text-center text-steel-500 font-mono text-sm uppercase tracking-wider border border-dashed border-steel-300 bg-steel-50">
                                [ NO_SYSTEMS_FOUND_IN_CATEGORY ]
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </x-ui.container>
    </section>
</x-layouts.app>