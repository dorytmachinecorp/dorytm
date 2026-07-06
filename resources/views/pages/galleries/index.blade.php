<x-layouts.app :title="'Media Gallery | ' . config('cms.seo.title_suffix')">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 border-b border-steel-900 overflow-hidden"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-3xl text-left">
                <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ VISUAL TOUR ]</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white mb-6 uppercase tracking-tight">Media Gallery</h1>
                <p class="text-lg text-steel-400 max-w-2xl text-balance">Explore our manufacturing facilities, completed projects, and machinery installations worldwide.</p>
            </div>
        </x-ui.container>
    </section>

    {{-- MEDIA GRID --}}
    <section class="py-24 bg-steel-50 relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px); background-size: 100% 40px;">
        <x-ui.container>
            
            <div class="flex flex-wrap justify-start gap-3 mb-16 font-mono text-xs uppercase tracking-wider" data-reveal="fade-up">
                <button class="px-5 py-2 border border-steel-950 bg-steel-950 text-white hover:bg-primary-600 hover:border-primary-500 transition-colors">All</button>
                <button class="px-5 py-2 border border-steel-200 bg-white text-steel-700 hover:bg-steel-100 hover:text-steel-950 transition-colors">Factory</button>
                <button class="px-5 py-2 border border-steel-200 bg-white text-steel-700 hover:bg-steel-100 hover:text-steel-950 transition-colors">Machines</button>
                <button class="px-5 py-2 border border-steel-200 bg-white text-steel-700 hover:bg-steel-100 hover:text-steel-950 transition-colors">Installations</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-reveal="stagger">
                @php
                    $images = [
                        'fac_production_1783126256969.png',
                        'fac_engineering_1783126246830.png',
                        'fac_hq_1783126228186.png',
                        'fac_testing_1783126267057.png',
                        'flagship_machine_1783126168912.png',
                        'about_heritage_1783126108660.png',
                    ];
                @endphp
                @foreach($images as $img)
                <div class="group relative aspect-4/3 bg-steel-900 border border-steel-200 p-2 rounded-none cursor-pointer">
                    <div class="absolute top-4 left-4 z-10 font-mono text-[9px] bg-steel-950/85 text-white px-2 py-0.5 border border-steel-800 uppercase tracking-widest">[ IMG_{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} ]</div>
                    
                    {{-- Accents --}}
                    <div class="absolute top-4 right-4 w-2 h-2 border-t border-r border-primary-500 opacity-50 group-hover:opacity-100"></div>
                    <div class="absolute bottom-4 left-4 w-2 h-2 border-b border-l border-primary-500 opacity-50 group-hover:opacity-100"></div>

                    <div class="w-full h-full overflow-hidden">
                        <img src="{{ asset('img/' . $img) }}" alt="Gallery Image" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 mix-blend-luminosity group-hover:mix-blend-normal">
                    </div>
                    
                    <div class="absolute inset-2 bg-steel-950/75 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <x-heroicon-o-magnifying-glass class="w-10 h-10 text-white" />
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-20 text-center" data-reveal="fade-up">
                <button class="inline-flex items-center justify-center font-mono font-medium transition-all duration-300 border border-steel-200 bg-white hover:bg-steel-50 text-steel-900 hover:border-steel-400 py-3.5 px-8 text-xs uppercase tracking-widest rounded-none">Load More</button>
            </div>
        </x-ui.container>
    </section>
</x-layouts.app>