<x-layouts.app :title="'About Us | ' . config('cms.seo.title_suffix')">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden border-b border-steel-900"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/about_heritage_1783126108660.png') }}" alt="DO-RYT Heritage" class="w-full h-full object-cover opacity-10 mix-blend-overlay">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-3xl">
                <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ CORPORATE PROFILE ]</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white leading-tight mb-6 uppercase tracking-tight">
                    Engineering Excellence <br/><span class="text-primary-500">Since 1995</span>
                </h1>
                <p class="text-lg text-steel-400 leading-relaxed max-w-2xl text-balance">
                    DO-RYT Machine Corp is a globally recognized manufacturer of industrial dryers, food processing lines, cold chain systems, and ancillary equipment, delivering turnkey engineering solutions.
                </p>
            </div>
        </x-ui.container>
    </section>

    {{-- COMPANY STORY --}}
    <section class="py-24 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container>
            <div class="flex flex-col lg:flex-row items-stretch gap-16" data-reveal="stagger">
                <div class="w-full lg:w-1/2 p-2 bg-steel-150 border border-steel-200 rounded-none shadow-xl relative flex items-center justify-center">
                    <div class="absolute top-0 left-0 w-3 h-3 border-t border-l border-primary-500"></div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 border-b border-r border-primary-500"></div>
                    <img src="{{ asset('img/fac_hq_1783126228186.png') }}" alt="DO-RYT Headquarters" class="w-full h-full object-cover rounded-none mix-blend-luminosity hover:mix-blend-normal transition-all duration-700">
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-between">
                    <div>
                        <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">[ THE LEGACY ]</span>
                        <h2 class="text-3xl md:text-4xl font-display font-extrabold text-steel-950 uppercase tracking-tight leading-tight mb-6">Our Legacy of Innovation</h2>
                        <div class="w-12 h-px bg-primary-500 mb-8"></div>
                        <div class="prose prose-md text-steel-600 leading-relaxed space-y-4">
                            <p>For nearly three decades, DO-RYT Machine Corp has been at the forefront of industrial equipment manufacturing in India. We specialize in designing and engineering high-capacity machinery that meets stringent global standards.</p>
                            <p>Our comprehensive portfolio ranges from pilot-scale laboratory units to fully automated continuous production lines. We believe in uncompromised quality, utilizing premium 316L stainless steel and components from industry-leading partners like Siemens, Danfoss, and Schneider Electric.</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6 mt-10 border-t border-steel-200 pt-8 font-mono text-xs uppercase tracking-wider text-steel-500">
                        <div>
                            <div class="text-3xl font-display font-extrabold text-steel-950 leading-none mb-2">500<span class="text-primary-500">+</span></div>
                            <div class="text-[9px] text-steel-400">[ GLOBAL INSTALLATIONS ]</div>
                        </div>
                        <div>
                            <div class="text-3xl font-display font-extrabold text-steel-950 leading-none mb-2">35<span class="text-primary-500">+</span></div>
                            <div class="text-[9px] text-steel-400">[ COUNTRIES SERVED ]</div>
                        </div>
                        <div>
                            <div class="text-3xl font-display font-extrabold text-steel-950 leading-none mb-2">ISO 9001</div>
                            <div class="text-[9px] text-steel-400">[ CERTIFIED FACILITY ]</div>
                        </div>
                        <div>
                            <div class="text-3xl font-display font-extrabold text-steel-950 leading-none mb-2">24/7</div>
                            <div class="text-[9px] text-steel-400">[ GLOBAL SUPPORT ]</div>
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- MANUFACTURING EXCELLENCE --}}
    <section class="py-24 bg-steel-50 border-t border-steel-200">
        <x-ui.container>
            <div class="text-center max-w-3xl mx-auto mb-16" data-reveal="fade-up">
                <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">[ FACILITIES ]</span>
                <h2 class="text-3xl md:text-4xl font-display font-extrabold text-steel-950 uppercase tracking-tight mb-4">State-of-the-Art Complex</h2>
                <p class="text-sm text-steel-600 leading-relaxed text-balance">Our 100,000 sq.ft. manufacturing complex integrates advanced CNC machining, robotic welding, and automated assembly.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-reveal="stagger">
                <div class="bg-white border border-steel-200 rounded-none overflow-hidden group p-2">
                    <div class="aspect-4/3 overflow-hidden bg-steel-100 border border-steel-150">
                        <img src="{{ asset('img/fac_production_1783126256969.png') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 mix-blend-luminosity group-hover:mix-blend-normal" alt="Production Floor">
                    </div>
                    <div class="p-6">
                        <span class="font-mono text-[9px] text-steel-400 uppercase tracking-widest block mb-1.5">[ UNIT_01 ]</span>
                        <h3 class="text-lg font-display font-bold text-steel-950 uppercase tracking-tight mb-2">Precision Machining</h3>
                        <p class="text-steel-650 text-xs leading-relaxed">Utilizing 5-axis CNC centers for millimeter-perfect component manufacturing.</p>
                    </div>
                </div>
                <div class="bg-white border border-steel-200 rounded-none overflow-hidden group p-2">
                    <div class="aspect-4/3 overflow-hidden bg-steel-100 border border-steel-150">
                        <img src="{{ asset('img/fac_engineering_1783126246830.png') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 mix-blend-luminosity group-hover:mix-blend-normal" alt="Engineering Team">
                    </div>
                    <div class="p-6">
                        <span class="font-mono text-[9px] text-steel-400 uppercase tracking-widest block mb-1.5">[ UNIT_02 ]</span>
                        <h3 class="text-lg font-display font-bold text-steel-950 uppercase tracking-tight mb-2">R&D Center</h3>
                        <p class="text-steel-650 text-xs leading-relaxed">Dedicated laboratory for developing custom freeze-drying recipes and thermal profiles.</p>
                    </div>
                </div>
                <div class="bg-white border border-steel-200 rounded-none overflow-hidden group p-2">
                    <div class="aspect-4/3 overflow-hidden bg-steel-100 border border-steel-150">
                        <img src="{{ asset('img/fac_testing_1783126267057.png') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 mix-blend-luminosity group-hover:mix-blend-normal" alt="Quality Testing">
                    </div>
                    <div class="p-6">
                        <span class="font-mono text-[9px] text-steel-400 uppercase tracking-widest block mb-1.5">[ UNIT_03 ]</span>
                        <h3 class="text-lg font-display font-bold text-steel-950 uppercase tracking-tight mb-2">Quality Assurance</h3>
                        <p class="text-steel-650 text-xs leading-relaxed">Stringent FAT (Factory Acceptance Testing) including vacuum leak and pressure vessel diagnostics.</p>
                    </div>
                </div>
            </div>
        </x-ui.container>
    </section>
</x-layouts.app>