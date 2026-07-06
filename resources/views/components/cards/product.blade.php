@props(['product'])

<a href="{{ route('products.show', $product->slug) }}" class="group flex flex-col h-full bg-white rounded-none border border-steel-200 overflow-hidden shadow-sm hover:shadow-xl hover:border-primary-500 transition-all duration-500 hover:-translate-y-1">
    <!-- Image Area -->
    <div class="relative w-full aspect-4/3 bg-steel-50 overflow-hidden border-b border-steel-100">
        @if($product->hasMedia('images'))
            <img loading="lazy" src="{{ $product->getFirstMediaUrl('images', 'thumb') }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 mix-blend-luminosity group-hover:mix-blend-normal">
        @else
            <div class="w-full h-full flex items-center justify-center text-steel-300">
                <svg aria-hidden="true" class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        @endif
        
        <!-- Category Badge overlay -->
        @if($product->category)
            <div class="absolute top-4 left-4 z-10">
                <span class="bg-steel-950/90 backdrop-blur-sm border border-steel-800 text-white font-mono text-[10px] uppercase tracking-widest px-2.5 py-1 rounded-none shadow-sm flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-primary-500 rounded-full"></span>
                    {{ $product->category->name }}
                </span>
            </div>
        @endif
    </div>
    
    <!-- Content Area -->
    <div class="p-6 flex flex-col grow">
        <span class="font-mono text-[10px] text-steel-400 uppercase tracking-widest mb-2">[ SPEC_MODEL: D-{{ strtoupper(substr($product->slug ?? 'SYS', 0, 3)) }} ]</span>
        <h3 class="text-xl font-display font-extrabold text-steel-900 group-hover:text-primary-600 transition-colors mb-3 uppercase tracking-tight">
            {{ $product->name }}
        </h3>
        
        <p class="text-steel-600 text-sm leading-relaxed mb-6 line-clamp-2">
            {{ $product->short_description ?? 'High-performance industrial machinery designed for precision and durability.' }}
        </p>
        
        <div class="mt-auto pt-4 border-t border-steel-100 flex items-center justify-between">
            <span class="text-xs font-mono uppercase tracking-widest text-steel-900 flex items-center gap-1 group-hover:text-primary-600 transition-colors">
                View Specifications
                <svg aria-hidden="true" class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </span>
        </div>
    </div>
</a>