<x-layouts.app :title="'Certificates & Compliance | ' . config('cms.seo.title_suffix')">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 border-b border-steel-900 overflow-hidden"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-3xl text-left">
                <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ QUALITY ASSURANCE ]</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white mb-6 uppercase tracking-tight">Certificates</h1>
                <p class="text-lg text-steel-400 max-w-2xl text-balance">DO-RYT Machine Corp adheres to the strictest global manufacturing and quality standards.</p>
            </div>
        </x-ui.container>
    </section>

    {{-- CERTIFICATES GRID --}}
    <section class="py-24 bg-steel-50 relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px); background-size: 100% 40px;">
        <x-ui.container>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8" data-reveal="stagger">
                @php
                    $certs = [
                        ['title' => 'ISO 9001:2015', 'desc' => 'Quality Management System standards across design, fabrication, and testing processes.', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                        ['title' => 'CE Marking', 'desc' => 'European Conformity standards met for all electrical panels and pneumatic control units.', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                        ['title' => 'cGMP Compliant', 'desc' => 'Current Good Manufacturing Practice designs for pharmaceutical and food process equipment.', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                        ['title' => 'FDA Approved Materials', 'desc' => 'Food-grade premium 316L/304 stainless steel and non-reactive polymers for all product contact parts.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ];
                @endphp
                
                @foreach($certs as $cert)
                <div class="bg-white p-8 border border-steel-200 text-center hover:border-primary-500 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between">
                    {{-- Decorative corners --}}
                    <div class="absolute top-0 left-0 w-2.5 h-2.5 border-t border-l border-primary-500 opacity-50 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute bottom-0 right-0 w-2.5 h-2.5 border-b border-r border-primary-500 opacity-50 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div>
                        <div class="w-16 h-16 border border-steel-200 bg-steel-50/50 flex items-center justify-center mx-auto mb-6 shrink-0 group-hover:border-primary-500 transition-colors">
                            <svg class="w-8 h-8 text-steel-800 group-hover:text-primary-650 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $cert['icon'] }}"></path></svg>
                        </div>
                        <span class="font-mono text-[9px] text-steel-400 uppercase tracking-widest block mb-2">[ CERT_SPEC_{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} ]</span>
                        <h3 class="text-lg font-display font-extrabold text-steel-950 uppercase tracking-tight mb-4 leading-tight">{{ $cert['title'] }}</h3>
                        <p class="text-steel-600 text-xs leading-relaxed">{{ $cert['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </x-ui.container>
    </section>
</x-layouts.app>