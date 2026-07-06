<x-layouts.app :title="$product->name" :seo="$product->seo">
    {{-- BREADCRUMB --}}
    <div class="bg-steel-950 pt-32 lg:pt-36 pb-6 border-b border-steel-900">
        <x-ui.container>
            <nav class="flex text-xs font-mono uppercase tracking-widest text-steel-400" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="hover:text-primary-400 transition-colors">[ HOME ]</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="mx-2 text-steel-700">/</span>
                            <a href="{{ route('products.index') }}" class="hover:text-primary-400 transition-colors">[ PRODUCTS ]</a>
                        </div>
                    </li>
                    @if($product->category)
                    <li>
                        <div class="flex items-center">
                            <span class="mx-2 text-steel-700">/</span>
                            <a href="{{ route('categories.show', $product->category->slug) }}" class="hover:text-primary-400 transition-colors">[ {{ $product->category->name }} ]</a>
                        </div>
                    </li>
                    @endif
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="mx-2 text-steel-700">/</span>
                            <span class="text-primary-500">[ {{ $product->name }} ]</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </x-ui.container>
    </div>

    {{-- PRODUCT HERO --}}
    <section class="py-16 md:py-24 bg-white relative"
             style="background-image: radial-gradient(var(--color-steel-100) 1px, transparent 1px); background-size: 20px 20px;">
        <x-ui.container>
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20" data-reveal="fade-up">
                
                {{-- PRODUCT IMAGES --}}
                <div class="w-full lg:w-1/2">
                    <div class="bg-steel-50 border border-steel-200 aspect-4/3 flex items-center justify-center p-4 relative overflow-hidden group">
                        {{-- Accents --}}
                        <div class="absolute top-2 left-2 w-2 h-2 border-t border-l border-primary-500"></div>
                        <div class="absolute top-2 right-2 w-2 h-2 border-t border-r border-primary-500"></div>
                        <div class="absolute bottom-2 left-2 w-2 h-2 border-b border-l border-primary-500"></div>
                        <div class="absolute bottom-2 right-2 w-2 h-2 border-b border-r border-primary-500"></div>

                        @if($product->hasMedia('images'))
                            <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $product->name }}" class="w-full h-full object-contain object-center absolute inset-0 p-8 hover:scale-105 transition-transform duration-700 mix-blend-luminosity group-hover:mix-blend-normal">
                        @else
                            <div class="w-full h-full bg-steel-200 flex items-center justify-center text-steel-400 absolute inset-0">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>
                    
                    {{-- Thumbnails --}}
                    @if($product->getMedia('images')->count() > 1)
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        @foreach($product->getMedia('images')->skip(1)->take(4) as $media)
                        <div class="bg-steel-50 border border-steel-200 aspect-square cursor-pointer hover:border-primary-500 transition-colors p-1">
                            <img src="{{ $media->getUrl() }}" class="w-full h-full object-contain mix-blend-luminosity hover:mix-blend-normal" alt="Thumbnail">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- PRODUCT INFO --}}
                <div class="w-full lg:w-1/2 flex flex-col justify-between">
                    <div>
                        @if($product->category)
                            <span class="text-primary-600 font-mono text-xs uppercase tracking-widest block mb-3">[ {{ $product->category->name }} ]</span>
                        @endif
                        <h1 class="text-3xl md:text-5xl font-display font-extrabold text-steel-950 uppercase tracking-tight mb-6 leading-tight">{{ $product->name }}</h1>
                        
                        <span class="font-mono text-xs text-steel-400 uppercase tracking-widest block mb-4">// MODEL: DRY-{{ strtoupper(substr($product->slug, 0, 4)) }}</span>
                        
                        <p class="text-lg text-steel-600 leading-relaxed mb-8">{{ $product->short_description }}</p>
                        
                        @if($product->applications && is_array($product->applications) && count($product->applications) > 0)
                        <div class="border-l-2 border-primary-500 bg-steel-50 p-6 mb-8">
                            <h4 class="font-mono text-xs uppercase tracking-widest text-steel-500 mb-2">[ TARGET_APPLICATIONS ]</h4>
                            <p class="text-steel-800 text-sm font-semibold leading-relaxed">{{ implode(', ', $product->applications) }}</p>
                        </div>
                        @endif
                    </div>

                    <div>
                        <div class="flex flex-col sm:flex-row gap-4 mb-8">
                            <x-ui.button href="#inquiry-form" variant="primary" size="lg">
                                Request Quote
                            </x-ui.button>
                            @if($product->brochure_path)
                            <x-ui.button href="{{ Storage::url($product->brochure_path) }}" download variant="secondary" size="lg" icon="heroicon-o-arrow-down-tray">
                                Download Brochure
                            </x-ui.button>
                            @endif
                        </div>
                        
                        <div class="flex items-center text-xs font-mono uppercase tracking-wider text-steel-500">
                            <span class="w-2 h-2 rounded-full bg-teal-500 animate-ping mr-2.5"></span>
                            ISO 9001:2015 & CE Certified Manufacturing
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- PRODUCT DETAILS TABS / CONTENT --}}
    <section class="py-20 bg-steel-50 border-t border-steel-200">
        <x-ui.container>
            <div class="flex flex-col lg:flex-row gap-12" data-reveal="stagger">
                
                {{-- Left Details Column --}}
                <div class="w-full lg:w-2/3">
                    <div class="bg-white border border-steel-200 p-8 md:p-12 mb-12">
                        <div class="flex justify-between items-center mb-8 border-b border-steel-200 pb-6">
                            <h2 class="text-xl font-display font-extrabold uppercase text-steel-950 tracking-tight">
                                01 / Product Overview
                            </h2>
                            <span class="font-mono text-xs text-steel-400">[ SPEC_LOG ]</span>
                        </div>
                        
                        <div class="prose prose-steel max-w-none text-steel-650 leading-relaxed text-sm">
                            {!! nl2br(e($product->full_description)) !!}
                        </div>
                    </div>

                    @if($product->features && is_array($product->features) && count($product->features) > 0)
                    <div class="bg-white border border-steel-200 p-8 md:p-12 mb-12">
                        <div class="flex justify-between items-center mb-8 border-b border-steel-200 pb-6">
                            <h3 class="text-xl font-display font-extrabold uppercase text-steel-950 tracking-tight">
                                02 / Key Features
                            </h3>
                            <span class="font-mono text-xs text-steel-400">[ CAP_INDEX ]</span>
                        </div>
                        
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($product->features as $feature)
                            <li class="flex items-start">
                                <span class="text-primary-500 font-mono mr-3 text-xs mt-0.5">[+]</span>
                                <span class="text-steel-750 text-sm font-semibold leading-relaxed">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($product->technical_specifications && is_array($product->technical_specifications) && count($product->technical_specifications) > 0)
                    <div class="bg-white border border-steel-200 p-8 md:p-12 mb-12">
                        <div class="flex justify-between items-center mb-8 border-b border-steel-200 pb-6">
                            <h3 class="text-xl font-display font-extrabold uppercase text-steel-950 tracking-tight">
                                03 / Technical Specifications
                            </h3>
                            <span class="font-mono text-xs text-steel-400">[ DATA_TABLE ]</span>
                        </div>
                        
                        <div class="overflow-x-auto border border-steel-200">
                            <table class="w-full text-left border-collapse font-mono text-xs">
                                <tbody>
                                    @foreach($product->technical_specifications as $key => $val)
                                    <tr class="border-b border-steel-200 last:border-0 hover:bg-steel-50">
                                        <th class="py-4 px-6 font-bold text-steel-900 w-1/3 bg-steel-50 border-r border-steel-200">// {{ str_replace('_', ' ', $key) }}</th>
                                        <td class="py-4 px-6 text-steel-600 font-semibold">{{ $val }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                    @if($product->variants && is_array($product->variants) && count($product->variants) > 0)
                    @php
                        $allSpecKeys = collect($product->variants)
                            ->flatMap(fn($variant) => array_keys($variant['specifications'] ?? []))
                            ->unique()
                            ->values()
                            ->toArray();
                    @endphp
                    <div class="bg-white border border-steel-200 p-8 md:p-12">
                        <div class="flex justify-between items-center mb-8 border-b border-steel-200 pb-6">
                            <h3 class="text-xl font-display font-extrabold uppercase text-steel-950 tracking-tight">
                                04 / Variant Comparison Matrix
                            </h3>
                            <span class="font-mono text-xs text-steel-400">[ COMPARISON_MATRIX ]</span>
                        </div>
                        
                        <div class="overflow-x-auto border border-steel-200">
                            <table class="w-full text-left border-collapse font-mono text-xs">
                                <thead>
                                    <tr class="bg-steel-50 border-b border-steel-200">
                                        <th class="py-4 px-6 font-bold text-steel-900 w-1/3 border-r border-steel-200">// Parameter</th>
                                        @foreach($product->variants as $variant)
                                            <th class="py-4 px-6 font-bold text-steel-900 border-r border-steel-200 last:border-r-0">{{ $variant['name'] ?? 'Model' }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allSpecKeys as $key)
                                    <tr class="border-b border-steel-200 last:border-0 hover:bg-steel-50">
                                        <th class="py-4 px-6 font-bold text-steel-900 w-1/3 bg-steel-50/50 border-r border-steel-200">// {{ str_replace('_', ' ', $key) }}</th>
                                        @foreach($product->variants as $variant)
                                        <td class="py-4 px-6 text-steel-600 font-semibold border-r border-steel-200 last:border-r-0">
                                            {{ $variant['specifications'][$key] ?? '-' }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Right Form Column --}}
                <div class="w-full lg:w-1/3">
                    <div class="bg-steel-950 text-white p-8 border border-steel-800 rounded-none sticky top-28 shadow-2xl">
                        {{-- Decorative Corner Lines --}}
                        <div class="absolute top-0 left-0 w-3 h-3 border-t border-l border-primary-500"></div>
                        <div class="absolute top-0 right-0 w-3 h-3 border-t border-r border-primary-500"></div>
                        
                        <h3 class="text-lg font-display font-extrabold text-white uppercase tracking-wider mb-2">Request Quote</h3>
                        <p class="text-steel-400 font-mono text-[10px] uppercase tracking-wider mb-6">// Speak with our engineering group</p>
                        
                        @if(session('success'))
                            <div class="mb-6 p-4 bg-primary-950/50 border-l-2 border-primary-500 text-primary-200 font-mono text-xs flex items-start space-x-2">
                                <x-heroicon-o-check-circle class="w-4 h-4 text-primary-400 shrink-0 mt-0.5" />
                                <div>
                                    <p class="font-bold uppercase tracking-wider">Transmission Success</p>
                                    <p class="text-[10px] mt-1 text-steel-300">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-6 p-4 bg-red-950/50 border-l-2 border-red-500 text-red-200 font-mono text-xs flex items-start space-x-2">
                                <x-heroicon-o-exclamation-triangle class="w-4 h-4 text-red-400 shrink-0 mt-0.5" />
                                <div>
                                    <p class="font-bold uppercase tracking-wider">Transmission Error</p>
                                    <p class="text-[10px] mt-1 text-steel-300">{{ session('error') }}</p>
                                </div>
                            </div>
                        @endif

                        <form id="inquiry-form" action="{{ route('contact.post') }}" method="POST" class="space-y-4">
                            @csrf
                            
                            {{-- Honeypot website field --}}
                            <div class="hidden" style="display:none;">
                                <input type="text" name="website" id="website" value="" autocomplete="off" tabindex="-1">
                            </div>

                            {{-- Name field --}}
                            <div>
                                <label for="name" class="block text-[10px] font-mono uppercase text-steel-400 mb-1">Name *</label>
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       value="{{ old('name') }}"
                                       required
                                       placeholder="e.g., John Doe" 
                                       @class([
                                           'w-full bg-steel-900/50 border py-2.5 px-3.5 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-xs rounded-none',
                                           'border-red-500' => $errors->has('name'),
                                           'border-steel-800' => !$errors->has('name')
                                       ])>
                                @error('name')
                                    <span class="text-[10px] font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Company field --}}
                            <div>
                                <label for="company" class="block text-[10px] font-mono uppercase text-steel-400 mb-1">Company</label>
                                <input type="text" 
                                       name="company" 
                                       id="company" 
                                       value="{{ old('company') }}"
                                       placeholder="e.g., ACME Corp" 
                                       @class([
                                           'w-full bg-steel-900/50 border py-2.5 px-3.5 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-xs rounded-none',
                                           'border-red-500' => $errors->has('company'),
                                           'border-steel-800' => !$errors->has('company')
                                       ])>
                                @error('company')
                                    <span class="text-[10px] font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Email field --}}
                            <div>
                                <label for="email" class="block text-[10px] font-mono uppercase text-steel-400 mb-1">Email *</label>
                                <input type="email" 
                                       name="email" 
                                       id="email" 
                                       value="{{ old('email') }}"
                                       required
                                       placeholder="e.g., john@company.com" 
                                       @class([
                                           'w-full bg-steel-900/50 border py-2.5 px-3.5 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-xs rounded-none',
                                           'border-red-500' => $errors->has('email'),
                                           'border-steel-800' => !$errors->has('email')
                                       ])>
                                @error('email')
                                    <span class="text-[10px] font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Message field --}}
                            <div>
                                <label for="message" class="block text-[10px] font-mono uppercase text-steel-400 mb-1">Requirement Details *</label>
                                <textarea name="message" 
                                          id="message" 
                                          rows="4" 
                                          required
                                          placeholder="e.g., Capacity requirements..." 
                                          @class([
                                              'w-full bg-steel-900/50 border py-2.5 px-3.5 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-xs rounded-none resize-none',
                                              'border-red-500' => $errors->has('message'),
                                              'border-steel-800' => !$errors->has('message')
                                          ])>{{ old('message', 'Inquiry regarding ' . $product->name . '.') }}</textarea>
                                @error('message')
                                    <span class="text-[10px] font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <x-ui.button type="submit" variant="primary" size="md" class="w-full flex justify-center">
                                Submit Inquiry
                            </x-ui.button>
                        </form>
                    </div>
                </div>
            </div>
        </x-ui.container>
    </section>

</x-layouts.app>