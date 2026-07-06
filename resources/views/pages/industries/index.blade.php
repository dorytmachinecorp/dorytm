<x-layouts.app :title="'Industries Served | ' . config('cms.seo.title_suffix')">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden border-b border-steel-900"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-3xl text-left">
                <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ TARGET INDUSTRIES ]</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white mb-6 uppercase tracking-tight leading-tight">
                    Food Processing Solutions That Drive Growth
                </h1>
                <p class="text-lg text-steel-400 leading-relaxed max-w-3xl">
                    We design and manufacture high-performance food processing machinery that helps businesses improve productivity, product quality, and profitability. From concept to commissioning, we deliver reliable engineering solutions tailored to your production requirements.
                </p>
            </div>
        </x-ui.container>
    </section>

    {{-- OUR PROMISE --}}
    <section class="py-20 bg-white border-b border-steel-200 relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px); background-size: 100% 40px;">
        <x-ui.container>
            <div class="text-center mb-16 animate-fade-up" data-reveal="fade-up">
                <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-2">[ OUR PROMISE ]</span>
                <h2 class="text-3xl font-display font-extrabold uppercase text-steel-950">Methodology & Rigor</h2>
                <div class="w-12 h-px bg-primary-500 mx-auto mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8" data-reveal="stagger">
                <div class="text-left p-6 border border-steel-200 bg-steel-50/50 rounded-none relative">
                    <div class="w-10 h-10 border border-steel-300 bg-white flex items-center justify-center mb-6 text-primary-600 shrink-0">
                        <x-heroicon-o-cog-6-tooth class="w-5 h-5 text-steel-800" />
                    </div>
                    <h3 class="text-base font-display font-bold uppercase tracking-tight text-steel-950 mb-2">Engineered Performance</h3>
                    <p class="text-xs text-steel-600 leading-relaxed">Built with precision components and advanced automation for maximum throughput.</p>
                </div>
                
                <div class="text-left p-6 border border-steel-200 bg-steel-50/50 rounded-none relative">
                    <div class="w-10 h-10 border border-steel-300 bg-white flex items-center justify-center mb-6 text-primary-600 shrink-0">
                        <x-heroicon-o-shield-check class="w-5 h-5 text-steel-800" />
                    </div>
                    <h3 class="text-base font-display font-bold uppercase tracking-tight text-steel-950 mb-2">Built for Reliability</h3>
                    <p class="text-xs text-steel-600 leading-relaxed">Rugged SS-304/316L construction with rigorous FAT testing on every unit.</p>
                </div>

                <div class="text-left p-6 border border-steel-200 bg-steel-50/50 rounded-none relative">
                    <div class="w-10 h-10 border border-steel-300 bg-white flex items-center justify-center mb-6 text-primary-600 shrink-0">
                        <x-heroicon-o-wrench-screwdriver class="w-5 h-5 text-steel-800" />
                    </div>
                    <h3 class="text-base font-display font-bold uppercase tracking-tight text-steel-950 mb-2">Designed Around Process</h3>
                    <p class="text-xs text-steel-600 leading-relaxed">Custom configurations tailored to your specific product and capacity needs.</p>
                </div>

                <div class="text-left p-6 border border-steel-200 bg-steel-50/50 rounded-none relative">
                    <div class="w-10 h-10 border border-steel-300 bg-white flex items-center justify-center mb-6 text-primary-600 shrink-0">
                        <x-heroicon-o-briefcase class="w-5 h-5 text-steel-800" />
                    </div>
                    <h3 class="text-base font-display font-bold uppercase tracking-tight text-steel-950 mb-2">Project Support</h3>
                    <p class="text-xs text-steel-600 leading-relaxed">From factory layout and installation to commissioning and operator training.</p>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- MAIN INDUSTRIES GRID --}}
    <section class="py-24 bg-steel-50">
        <x-ui.container>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-reveal="stagger">
                @forelse($industries as $industry)
                    <div class="bg-white border border-steel-200 rounded-none overflow-hidden group flex flex-col h-full p-2">
                        <div class="aspect-video overflow-hidden bg-steel-100 border border-steel-150">
                            @if($industry->hasMedia('images'))
                                <img src="{{ $industry->getFirstMediaUrl('images') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 mix-blend-luminosity group-hover:mix-blend-normal" alt="{{ $industry->name }}">
                            @else
                                <div class="w-full h-full bg-steel-200 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-steel-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-8 flex flex-col grow">
                            <span class="font-mono text-[9px] text-steel-400 uppercase tracking-widest block mb-2">[ SECTOR: IND_{{ strtoupper(substr($industry->slug, 0, 3)) }} ]</span>
                            <h2 class="text-2xl font-display font-extrabold text-steel-950 uppercase tracking-tight mb-4">{{ $industry->name }}</h2>
                            <p class="text-steel-650 text-sm leading-relaxed mb-8 grow">{{ Str::limit($industry->short_description, 140) }}</p>
                            
                            <a href="{{ route('industries.show', $industry->slug) }}" class="inline-flex items-center font-mono text-xs uppercase tracking-widest text-primary-600 hover:text-primary-500 font-bold transition-colors">
                                View Solutions
                                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-steel-500 font-mono text-sm uppercase tracking-wider bg-white border border-steel-200">
                        [ NO_INDUSTRIES_CONFIGURED ]
                    </div>
                @endforelse
            </div>
        </x-ui.container>
    </section>
</x-layouts.app>