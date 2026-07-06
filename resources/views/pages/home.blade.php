<x-layouts.app title="DO-RYT Machine Corp | Precision Engineering. Global Scale.">
    
    <section class="relative bg-steel-950 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden border-b border-steel-900"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <!-- Hero Background -->
        <div class="absolute inset-0 z-0">
            <!-- Gradient Overlay for legibility -->
            <div class="absolute inset-0 bg-linear-to-r from-steel-950 via-steel-950/80 to-transparent z-10"></div>
            <img fetchpriority="high" src="{{ asset('img/hero_bg_1783126095772.png') }}" alt="Premium Industrial Manufacturing Environment" class="js-hero-bg w-full h-full object-cover opacity-30 scale-105 transform origin-center animate-slow-pan">
        </div>
        
        <x-ui.container class="relative z-20">
            <div class="max-w-4xl" data-reveal="fade-up">
                {{-- Technical status beacon --}}
                <div class="inline-flex items-center space-x-2 bg-steel-900 border border-steel-800 px-3 py-1.5 mb-8">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                    </span>
                    <span class="font-mono text-[10px] text-steel-400 tracking-widest uppercase">System Status: Active // Thermal Core Online</span>
                </div>

                <h1 class="text-5xl md:text-7xl lg:text-8xl font-display font-extrabold text-white tracking-tight mb-8 leading-[0.95] uppercase">
                    Precision <br/>
                    <span class="text-primary-400">Engineering.</span><br/>
                    Global Scale.
                </h1>
                
                <p class="text-lg md:text-xl text-steel-400 mb-12 max-w-2xl leading-relaxed">
                    DO-RYT Machine Corp architects world-class industrial dryers, dehydrators, food processing lines, and cold chain systems for the pharmaceutical, food, and industrial sectors.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <x-ui.button href="{{ route('products.index') }}" variant="primary" size="lg">Explore Our Systems</x-ui.button>
                    <x-ui.button href="{{ route('about.index') }}#manufacturing" variant="outline" size="lg" class="border-steel-800 text-white hover:bg-steel-900">View Capabilities</x-ui.button>
                </div>

                {{-- Decs --}}
                <div class="mt-16 flex items-center gap-6 font-mono text-[9px] text-steel-600 uppercase tracking-widest border-t border-steel-900 pt-6">
                    <span>[ MODEL: DO-RYT // SERIES_05 ]</span>
                    <span>[ SCALE: MULTI-TON CAPACITY ]</span>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- 3. Trusted By Industries (Social Proof) --}}
    <section class="py-12 border-y border-steel-200 bg-white overflow-hidden">
        <x-ui.container>
            <p class="text-center font-mono text-[10px] text-steel-400 uppercase tracking-widest mb-8">[ ENGINEERED FOR THE WORLD'S MOST DEMANDING FACTORY FLOORS ]</p>
            
            <!-- Infinite Scroll Marquee Simulation -->
            <div class="relative w-full flex overflow-x-hidden">
                <div class="flex animate-marquee whitespace-nowrap gap-12 md:gap-24 opacity-40 grayscale hover:grayscale-0 transition-all duration-500 items-center justify-center min-w-full font-mono text-sm tracking-widest text-steel-750 font-bold uppercase">
                    <span>// SIEMENS</span>
                    <span>// BAYER GLOBAL</span>
                    <span>// NESTLÉ</span>
                    <span>// DANONE NUTRITION</span>
                    <span>// UNILEVER</span>
                    <span>// PFIZER PHARMA</span>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- 4. About DO-RYT (The Heritage) --}}
    <section class="py-24 md:py-32 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container>
            <div class="flex flex-col lg:flex-row gap-16 items-center" data-reveal="stagger">
                <div class="w-full lg:w-1/2 text-steel-900">
                    <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">[ TWO DECADES OF INNOVATION ]</span>
                    <h2 class="text-4xl md:text-5xl font-display font-extrabold tracking-tight text-steel-950 uppercase mb-8 leading-tight">
                        We don't just build machines.<br/>We architect production ecosystems.
                    </h2>
                    <p class="text-base text-steel-600 leading-relaxed mb-10">
                        For over 25 years, DO-RYT has redefined the boundaries of industrial processing. By integrating metallurgical mastery with advanced PLC automation, our machinery guarantees uninterrupted production, exacting compliance, and absolute thermal precision.
                    </p>
                    <x-ui.button href="{{ route('about.index') }}" variant="outline" icon="heroicon-o-arrow-right" iconPosition="right">Discover Our Heritage</x-ui.button>
                </div>
                
                <div class="w-full lg:w-1/2 relative">
                    <div class="aspect-4/3 bg-steel-100 p-2 border border-steel-250 rounded-none shadow-2xl relative">
                        {{-- Corner Indicators --}}
                        <div class="absolute -top-1 -left-1 w-3 h-3 border-t border-l border-primary-500"></div>
                        <div class="absolute -top-1 -right-1 w-3 h-3 border-t border-r border-primary-500"></div>
                        <div class="absolute -bottom-1 -left-1 w-3 h-3 border-b border-l border-primary-500"></div>
                        <div class="absolute -bottom-1 -right-1 w-3 h-3 border-b border-r border-primary-500"></div>

                        <img loading="lazy" src="{{ asset('img/about_heritage_1783126108660.png') }}" alt="Engineers discussing schematics" class="w-full h-full object-cover rounded-none mix-blend-luminosity hover:mix-blend-normal transition-all duration-700">
                        
                        <div class="absolute -bottom-6 -left-6 bg-steel-950 p-6 rounded-none shadow-xl border border-steel-800 text-white hidden md:block">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 border border-primary-500 bg-primary-950/50 flex items-center justify-center text-primary-400">
                                    <x-heroicon-o-check-badge class="w-6 h-6" />
                                </div>
                                <div>
                                    <p class="font-mono font-bold text-lg leading-none">100%</p>
                                    <p class="text-[9px] font-mono text-steel-400 uppercase tracking-wider mt-1">In-House Design</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- 5. Product Categories --}}
    <section class="py-24 md:py-32 bg-steel-50 border-t border-steel-200"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px); background-size: 100% 40px;">
        <x-ui.container>
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6" data-reveal="fade-up">
                <div class="max-w-2xl text-steel-900">
                    <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">[ CORE SYSTEMS ]</span>
                    <h2 class="text-3xl md:text-4xl font-display font-extrabold uppercase text-steel-950 tracking-tight leading-tight">
                        Systems engineered for absolute operational dominance.
                    </h2>
                </div>
                <x-ui.button href="{{ route('products.index') }}" variant="ghost" class="shrink-0 group font-mono text-xs uppercase tracking-widest">
                    View Full Catalog 
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </x-ui.button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal="stagger">
                @foreach($categories as $category)
                    <x-cards.category :category="$category" />
                @endforeach
            </div>
        </x-ui.container>
    </section>

    {{-- 6. Featured Machines (Flagship Reveal) --}}
    <section class="py-24 md:py-32 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container>
            @if($featuredProducts->isNotEmpty())
            @php $flagship = $featuredProducts->first(); @endphp
            <div class="bg-steel-950 rounded-none overflow-hidden border border-steel-900 shadow-2xl flex flex-col lg:flex-row relative" data-reveal="fade-up">
                {{-- Accents --}}
                <div class="absolute top-0 left-0 w-3.5 h-3.5 border-t border-l border-primary-500"></div>
                <div class="absolute top-0 right-0 w-3.5 h-3.5 border-t border-r border-primary-500"></div>
                <div class="absolute bottom-0 left-0 w-3.5 h-3.5 border-b border-l border-primary-500"></div>
                <div class="absolute bottom-0 right-0 w-3.5 h-3.5 border-b border-r border-primary-500"></div>

                <div class="w-full lg:w-1/2 p-10 lg:p-16 flex flex-col justify-center">
                    <span class="text-primary-500 font-mono text-xs uppercase tracking-widest mb-4 block">[ FLAGSHIP MODEL ]</span>
                    <h3 class="text-3xl lg:text-4xl font-display font-extrabold text-white mb-6 uppercase tracking-tight">{{ $flagship->name }}</h3>
                    <p class="text-steel-400 text-base leading-relaxed mb-10 font-sans">
                        {{ Str::limit($flagship->description, 200) }}
                    </p>
                    
                    @if($flagship->technical_specifications)
                    <div class="grid grid-cols-2 gap-6 mb-10 border-t border-steel-900 pt-8 font-mono text-xs uppercase tracking-wider text-steel-400">
                        @foreach(array_slice($flagship->technical_specifications, 0, 4) as $key => $value)
                        <div>
                            <span class="block text-steel-600 text-[10px] mb-1.5">// {{ str_replace('_', ' ', $key) }}</span>
                            <span class="text-white font-semibold">{{ is_array($value) ? implode(', ', $value) : (string)$value }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    
                    <div>
                        <x-ui.button variant="primary" href="{{ route('products.show', $flagship) }}">View Specifications</x-ui.button>
                    </div>
                </div>
                
                <div class="w-full lg:w-1/2 bg-steel-900 relative min-h-[400px] border-l border-steel-900">
                    <div class="absolute inset-0 bg-linear-to-r from-steel-950 to-transparent z-10 lg:w-32 hidden lg:block"></div>
                    @if($flagship->hasMedia('images'))
                        <img loading="lazy" src="{{ $flagship->getFirstMediaUrl('images') }}" alt="{{ $flagship->name }}" class="w-full h-full object-cover opacity-40 mix-blend-luminosity hover:mix-blend-normal transition-all duration-750">
                    @endif
                </div>
            </div>
            @endif
        </x-ui.container>
    </section>

    {{-- 7. Manufacturing Process (The Craft) --}}
    <section class="py-24 bg-steel-950 text-white border-y border-steel-900 overflow-hidden relative"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 32px 32px;">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary-600/5 rounded-full blur-[120px] z-0"></div>
        
        <x-ui.container class="relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20" data-reveal="fade-up">
                <span class="font-mono text-[10px] text-primary-500 uppercase tracking-widest block mb-4">[ OPERATIONAL PIPELINE ]</span>
                <h2 class="text-3xl md:text-5xl font-display font-extrabold uppercase tracking-tight text-white mb-6">
                    Quality control from raw steel to commissioning.
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative" data-reveal="stagger">
                <div class="hidden md:block absolute top-10 left-12 right-12 h-px bg-steel-800"></div>
                
                <!-- Step 1 -->
                <div class="relative pt-12 md:pt-16">
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 md:left-4 w-12 h-12 bg-steel-900 border border-primary-500/40 rounded-none flex items-center justify-center font-mono font-bold text-lg text-primary-400 shadow-[0_0_15px_rgba(20,184,166,0.1)]">01</div>
                    <div class="text-center md:text-left">
                        <h4 class="text-lg font-display font-bold uppercase tracking-tight text-white mb-3">Precision Fabrication</h4>
                        <p class="text-steel-400 text-xs leading-relaxed">Laser cutting & automated sanitary welding of 316L/304 stainless steel raw materials.</p>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="relative pt-12 md:pt-16">
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 md:left-4 w-12 h-12 bg-steel-900 border border-primary-500/40 rounded-none flex items-center justify-center font-mono font-bold text-lg text-primary-400 shadow-[0_0_15px_rgba(20,184,166,0.1)]">02</div>
                    <div class="text-center md:text-left">
                        <h4 class="text-lg font-display font-bold uppercase tracking-tight text-white mb-3">Integration</h4>
                        <p class="text-steel-400 text-xs leading-relaxed">Advanced PLC & HMI wiring, pneumatic systems, and premium sensor installation.</p>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="relative pt-12 md:pt-16">
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 md:left-4 w-12 h-12 bg-steel-900 border border-primary-500/40 rounded-none flex items-center justify-center font-mono font-bold text-lg text-primary-400 shadow-[0_0_15px_rgba(20,184,166,0.1)]">03</div>
                    <div class="text-center md:text-left">
                        <h4 class="text-lg font-display font-bold uppercase tracking-tight text-white mb-3">Rigorous FAT</h4>
                        <p class="text-steel-400 text-xs leading-relaxed">Factory Acceptance Testing under full load capacity to ensure exacting performance.</p>
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="relative pt-12 md:pt-16">
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 md:left-4 w-12 h-12 bg-primary-600 border border-primary-500 rounded-none flex items-center justify-center font-mono font-bold text-lg text-white shadow-[0_0_15px_rgba(20,184,166,0.25)]">04</div>
                    <div class="text-center md:text-left">
                        <h4 class="text-lg font-display font-bold uppercase tracking-tight text-white mb-3">Commissioning</h4>
                        <p class="text-primary-100 text-xs leading-relaxed">On-site installation, operator training, and final validation for handover.</p>
                    </div>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- 8. Industries Served (Grid) --}}
    <section class="py-24 md:py-32 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container>
            <div class="text-steel-900 mb-16" data-reveal="fade-up">
                <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">[ TARGET FIELDS ]</span>
                <h2 class="text-3xl md:text-4xl font-display font-extrabold uppercase text-steel-950 tracking-tight leading-tight">
                    Food processing solutions built around your process.
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal="stagger">
                @foreach($industries as $industry)
                    <a href="{{ route('industries.show', $industry->slug) }}" class="group block relative h-80 rounded-none overflow-hidden bg-steel-900 border border-steel-800">
                        <div class="absolute inset-0 bg-linear-to-t from-steel-950/90 to-steel-900/10 z-10 transition-opacity duration-300"></div>
                        @if($industry->hasMedia('images'))
                            <img loading="lazy" src="{{ $industry->getFirstMediaUrl('images') }}" alt="{{ $industry->name }}" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105 opacity-55 mix-blend-luminosity group-hover:mix-blend-normal">
                        @endif
                        <div class="absolute inset-x-0 bottom-0 p-6 z-20 transform transition-transform duration-300">
                            <span class="font-mono text-[9px] text-primary-400 block mb-1 uppercase tracking-widest">[ IND_{{ strtoupper(substr($industry->slug, 0, 3)) }} ]</span>
                            <h4 class="text-xl font-display font-bold text-white mb-2 uppercase tracking-wide">{{ $industry->name }}</h4>
                            <div class="w-8 h-px bg-primary-500 mb-3 transition-all duration-300 group-hover:w-16"></div>
                            <p class="text-xs text-steel-300 opacity-0 group-hover:opacity-100 transition-all duration-350 delay-100 h-0 group-hover:h-auto overflow-hidden leading-relaxed">{{ Str::limit($industry->description, 70) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </x-ui.container>
    </section>

    {{-- 9. Statistics (The Scale) & 10. Certifications --}}
    <section class="bg-steel-50 py-24 border-y border-steel-200">
        <x-ui.container>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center" data-reveal="fade-up">
                
                <div>
                    <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">[ COMPLIANCE INDEX ]</span>
                    <h3 class="text-3xl font-display font-extrabold uppercase text-steel-950 mb-6 tracking-tight">Engineered to global compliance standards.</h3>
                    <p class="text-steel-600 mb-10 leading-relaxed text-base">
                        Every DO-RYT system is designed, fabricated, and documented to seamlessly integrate into your validated environments without friction.
                    </p>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 font-mono text-xs uppercase tracking-wider text-center">
                        <div class="aspect-square bg-white border border-steel-200 rounded-none shadow-sm flex flex-col items-center justify-center p-4">
                            <span class="font-display font-bold text-steel-900 text-lg mb-1">ISO</span>
                            <span class="text-[9px] text-steel-500">9001:2015</span>
                        </div>
                        <div class="aspect-square bg-white border border-steel-200 rounded-none shadow-sm flex flex-col items-center justify-center p-4">
                            <span class="font-display font-bold text-steel-900 text-2xl mb-1">CE</span>
                            <span class="text-[9px] text-steel-500">Compliant</span>
                        </div>
                        <div class="aspect-square bg-white border border-steel-200 rounded-none shadow-sm flex flex-col items-center justify-center p-4">
                            <span class="font-display font-bold text-steel-900 text-lg mb-1">cGMP</span>
                            <span class="text-[9px] text-steel-500">Ready</span>
                        </div>
                        <div class="aspect-square bg-white border border-steel-200 rounded-none shadow-sm flex flex-col items-center justify-center p-4">
                            <span class="font-display font-bold text-steel-900 text-lg mb-1">FDA</span>
                            <span class="text-[9px] text-steel-500">Materials</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6" data-reveal="stagger">
                    <x-cards.statistic number="25" label="Years Heritage" suffix="+" />
                    <x-cards.statistic number="1.2" label="Installations" suffix="K" />
                    <x-cards.statistic number="45" label="Countries Served" />
                    <x-cards.statistic number="24" label="Global Support" suffix="/7" />
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- 11. Factory Gallery (Blueprint Grid Console) --}}
    <section class="py-24 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container>
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6" data-reveal="fade-up">
                <div>
                    <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">[ SYSTEM CONSOLE ]</span>
                    <h2 class="text-3xl font-display font-extrabold uppercase tracking-tight text-steel-950 mb-0">
                        State-of-the-art facilities driving global innovation.
                    </h2>
                </div>
            </div>

            <!-- Blueprint Grid Console -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 auto-rows-[250px]" data-reveal="stagger">
                <div class="md:col-span-2 md:row-span-2 rounded-none border border-steel-250 p-2 bg-white relative group">
                    {{-- Blue-print style borders & labels --}}
                    <div class="absolute top-4 left-4 z-10 font-mono text-[9px] bg-steel-950/80 border border-steel-800 text-white px-2 py-0.5 uppercase tracking-widest">[ SEC_01 // COR_HQ ]</div>
                    <div class="absolute top-2 left-2 w-2 h-2 border-t border-l border-primary-500"></div>
                    <div class="absolute top-2 right-2 w-2 h-2 border-t border-r border-primary-500"></div>
                    <div class="absolute bottom-2 left-2 w-2 h-2 border-b border-l border-primary-500"></div>
                    <div class="absolute bottom-2 right-2 w-2 h-2 border-b border-r border-primary-500"></div>
                    
                    <div class="w-full h-full overflow-hidden bg-steel-900">
                        <img loading="lazy" src="{{ asset('img/fac_hq_1783126228186.png') }}" alt="Factory Exterior" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-60 mix-blend-luminosity group-hover:mix-blend-normal">
                    </div>
                </div>
                
                <div class="rounded-none border border-steel-250 p-2 bg-white relative group">
                    <div class="absolute top-4 left-4 z-10 font-mono text-[9px] bg-steel-950/80 border border-steel-800 text-white px-2 py-0.5 uppercase tracking-widest">[ SEC_02 // ENG_LAB ]</div>
                    <div class="absolute top-2 left-2 w-2 h-2 border-t border-l border-primary-500"></div>
                    <div class="absolute top-2 right-2 w-2 h-2 border-t border-r border-primary-500"></div>
                    <div class="absolute bottom-2 left-2 w-2 h-2 border-b border-l border-primary-500"></div>
                    <div class="absolute bottom-2 right-2 w-2 h-2 border-b border-r border-primary-500"></div>

                    <div class="w-full h-full overflow-hidden bg-steel-900">
                        <img loading="lazy" src="{{ asset('img/fac_engineering_1783126246830.png') }}" alt="Engineering" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-60 mix-blend-luminosity group-hover:mix-blend-normal">
                    </div>
                </div>
                
                <div class="rounded-none border border-steel-250 p-2 bg-white relative group">
                    <div class="absolute top-4 left-4 z-10 font-mono text-[9px] bg-steel-950/80 border border-steel-800 text-white px-2 py-0.5 uppercase tracking-widest">[ SEC_03 // PROD_FLR ]</div>
                    <div class="absolute top-2 left-2 w-2 h-2 border-t border-l border-primary-500"></div>
                    <div class="absolute top-2 right-2 w-2 h-2 border-t border-r border-primary-500"></div>
                    <div class="absolute bottom-2 left-2 w-2 h-2 border-b border-l border-primary-500"></div>
                    <div class="absolute bottom-2 right-2 w-2 h-2 border-b border-r border-primary-500"></div>

                    <div class="w-full h-full overflow-hidden bg-steel-900">
                        <img loading="lazy" src="{{ asset('img/fac_production_1783126256969.png') }}" alt="Production" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-60 mix-blend-luminosity group-hover:mix-blend-normal">
                    </div>
                </div>
                
                <div class="md:col-span-2 rounded-none border border-steel-250 p-2 bg-white relative group">
                    <div class="absolute top-4 left-4 z-10 font-mono text-[9px] bg-steel-950/80 border border-steel-800 text-white px-2 py-0.5 uppercase tracking-widest">[ SEC_04 // TST_BAY ]</div>
                    <div class="absolute top-2 left-2 w-2 h-2 border-t border-l border-primary-500"></div>
                    <div class="absolute top-2 right-2 w-2 h-2 border-t border-r border-primary-500"></div>
                    <div class="absolute bottom-2 left-2 w-2 h-2 border-b border-l border-primary-500"></div>
                    <div class="absolute bottom-2 right-2 w-2 h-2 border-b border-r border-primary-500"></div>

                    <div class="w-full h-full overflow-hidden bg-steel-900">
                        <img loading="lazy" src="{{ asset('img/fac_testing_1783126267057.png') }}" alt="Testing" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-60 mix-blend-luminosity group-hover:mix-blend-normal">
                    </div>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- 12. Customer Testimonials --}}
    <section class="py-24 bg-steel-950 text-white relative overflow-hidden"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-900/5 blur-3xl rounded-full pointer-events-none"></div>
        
        <x-ui.container class="relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 items-center" data-reveal="fade-up">
                <div class="lg:col-span-2">
                    <span class="font-mono text-[10px] text-primary-500 uppercase tracking-widest block mb-4">[ TESTIMONIAL LOGS ]</span>
                    <h3 class="text-3xl md:text-4xl font-display font-extrabold uppercase mb-6 text-white tracking-tight leading-tight">
                        Trusted by Chief Engineers worldwide.
                    </h3>
                    <p class="text-steel-400 mb-8 text-sm leading-relaxed">Hear from the plant managers and operations directors who rely on our machinery every day.</p>
                </div>
                
                <div class="lg:col-span-3 relative" data-reveal="stagger">
                    @foreach($testimonials as $testimonial)
                    <div class="bg-steel-900 border border-steel-800 rounded-none p-8 md:p-12 shadow-2xl relative {{ $loop->first ? '' : 'hidden' }}">
                        <div class="absolute top-0 left-0 w-3 h-3 border-t border-l border-primary-500"></div>
                        <div class="absolute top-0 right-0 w-3 h-3 border-t border-r border-primary-500"></div>
                        
                        <div class="absolute top-8 right-8 font-mono text-[9px] text-steel-500 uppercase tracking-widest">[ RECORD_ID: {{ $testimonial->id }} ]</div>
                        
                        <blockquote class="relative z-10">
                            <p class="text-lg md:text-xl text-steel-200 leading-relaxed font-sans mb-8">
                                "{{ $testimonial->content }}"
                            </p>
                            <div class="flex items-center gap-4">
                                @if($testimonial->hasMedia('avatars'))
                                <img loading="lazy" src="{{ $testimonial->getFirstMediaUrl('avatars') }}" alt="{{ $testimonial->client_name }}" class="w-14 h-14 rounded-none object-cover border border-primary-500 p-0.5 bg-steel-950">
                                @endif
                                <div>
                                    <div class="font-display font-bold text-white text-base uppercase tracking-wider">{{ $testimonial->client_name }}</div>
                                    <div class="font-mono text-xs text-steel-400 uppercase mt-0.5">{{ $testimonial->client_title }}, {{ $testimonial->client_company }}</div>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                    @endforeach
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- 13 & 14. CTA --}}
    <section class="relative py-32 overflow-hidden bg-steel-950"
             style="background-image: linear-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 100% 40px;">
        <div class="absolute inset-0 z-0">
            <img loading="lazy" src="{{ asset('img/cta_bg_1783126286425.png') }}" alt="Premium Machinery Detail" class="w-full h-full object-cover opacity-10 blur-sm scale-110">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/90 to-transparent"></div>
        </div>

        <x-ui.container class="relative z-10 text-left" data-reveal="fade-up">
            <div class="max-w-3xl">
                <span class="font-mono text-[10px] text-primary-500 uppercase tracking-widest block mb-4">[ TRANSMISSION READY ]</span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white mb-6 uppercase tracking-tight">Ready to upgrade your capacity?</h2>
                <p class="text-lg text-steel-400 mb-12 leading-relaxed text-balance">
                    Connect directly with our lead engineers to discuss your facility's unique processing requirements and custom specifications.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-start">
                    <x-ui.button href="{{ route('contact.index') }}" variant="primary" size="lg">Request Consultation</x-ui.button>
                    <x-ui.button href="{{ route('downloads.index') }}" variant="outline" size="lg" class="border-steel-800 text-white hover:bg-steel-900">Download Brochure</x-ui.button>
                </div>
            </div>
        </x-ui.container>
    </section>

</x-layouts.app>