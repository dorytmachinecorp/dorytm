<x-layouts.app :title="'Industrial Machinery & Food Processing Equipment' . ' | ' . config('cms.seo.title_suffix')">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden border-b border-steel-900"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/fac_production_1783126256969.png') }}" alt="DO-RYT Production" class="w-full h-full object-cover opacity-10 mix-blend-overlay">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-3xl">
                <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ MACHINERY CATALOG ]</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white leading-tight mb-6 uppercase tracking-tight">
                    Complete Range of <br/><span class="text-primary-500">Industrial Systems</span>
                </h1>
                <p class="text-lg text-steel-400 leading-relaxed max-w-2xl text-balance">
                    Engineered for precision and scale. Explore our complete range of dryers, dehydrators, process equipment, cold chain solutions, and ancillary machinery.
                </p>
            </div>
        </x-ui.container>
    </section>

    {{-- MAIN PRODUCTS GRID --}}
    <section class="py-24 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container>
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6" data-reveal="fade-up">
                <div>
                    <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-2">[ DIRECTORY ]</span>
                    <h2 class="text-2xl md:text-3xl font-display font-extrabold uppercase text-steel-950 tracking-tight leading-none">All Machinery</h2>
                    <div class="w-12 h-px bg-primary-500 mt-4"></div>
                </div>
                
                {{-- Category Filter --}}
                <div class="flex flex-wrap gap-2 font-mono text-xs uppercase tracking-wider">
                    <a href="{{ route('products.index') }}" class="px-4 py-2 border border-steel-950 bg-steel-950 text-white hover:bg-primary-600 hover:border-primary-500 transition-colors">All</a>
                    @foreach($categories as $cat)
                        <a href="{{ route('categories.show', $cat->slug) }}" class="px-4 py-2 border border-steel-200 bg-steel-50 text-steel-700 hover:bg-steel-100 hover:text-steel-950 transition-colors">{{ $cat->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" data-reveal="stagger">
                @forelse($products as $product)
                    <x-cards.product :product="$product" />
                @empty
                    <div class="col-span-full py-12 text-center text-steel-500 font-mono text-sm uppercase tracking-wider">
                        [ NO_SYSTEMS_FOUND ]
                    </div>
                @endforelse
            </div>

            <div class="mt-16 font-mono text-xs">
                {{ $products->links() }}
            </div>
        </x-ui.container>
    </section>

    {{-- WHY CHOOSE US --}}
    <section class="py-24 bg-steel-50 border-t border-steel-200">
        <x-ui.container>
            <div class="text-center max-w-3xl mx-auto mb-16" data-reveal="fade-up">
                <span class="font-mono text-[10px] text-primary-600 uppercase tracking-widest block mb-4">[ CAPABILITIES ]</span>
                <h2 class="text-3xl md:text-4xl font-display font-extrabold uppercase text-steel-950 tracking-tight">Why Choose DO-RYT?</h2>
                <div class="w-12 h-px bg-primary-500 mx-auto mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-reveal="stagger">
                <x-cards.feature title="SS304/316L Construction" description="All contact parts are manufactured using premium stainless steel, ensuring complete compliance with global food safety and cGMP standards." number="01" />
                <x-cards.feature title="Energy Efficient" description="Advanced thermal recovery systems and variable frequency drives (VFD) reduce energy consumption by up to 30% compared to traditional models." number="02" />
                <x-cards.feature title="Turnkey Solutions" description="From factory layout design to installation, commissioning, and operator training, we provide complete end-to-end engineering support." number="03" />
            </div>
        </x-ui.container>
    </section>

</x-layouts.app>