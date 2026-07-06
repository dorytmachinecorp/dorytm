@props(['category'])

<a href="{{ route('categories.show', $category->slug) }}" class="group relative block w-full aspect-4/5 rounded-none overflow-hidden bg-steel-900 isolate border border-steel-800">
    @if($category->hasMedia('images'))
        <img loading="lazy" src="{{ $category->getFirstMediaUrl('images') }}" 
             alt="{{ $category->name }}" 
             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 mix-blend-luminosity group-hover:mix-blend-normal z-[-1]">
    @else
        <div class="absolute inset-0 w-full h-full bg-steel-800 z-[-1]"></div>
    @endif
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-900/20 to-transparent transition-opacity duration-300 group-hover:opacity-85 z-0"></div>
    
    <!-- Content -->
    <div class="absolute inset-0 flex flex-col justify-between p-8 z-10">
        {{-- Code designation --}}
        <div class="self-end">
            <span class="bg-steel-950/80 border border-steel-850 px-2 py-1 font-mono text-[9px] text-primary-400 uppercase tracking-widest">[ CAT_{{ strtoupper(substr($category->slug ?? 'SYS', 0, 3)) }} ]</span>
        </div>
        
        <div>
            <h3 class="text-2xl font-display font-extrabold text-white mb-3 uppercase tracking-tight group-hover:text-primary-400 transition-colors">
                {{ $category->name }}
            </h3>
            <div class="overflow-hidden h-0 group-hover:h-auto transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0">
                <span class="inline-flex items-center text-primary-400 font-mono text-xs uppercase tracking-widest gap-2">
                    Explore Range <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </span>
            </div>
        </div>
    </div>
</a>