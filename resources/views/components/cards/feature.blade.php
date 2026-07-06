@props([
    'title',
    'description',
    'icon' => null,
    'number' => null
])

<div class="flex flex-col bg-steel-50 p-8 rounded-none h-full border border-steel-200 hover:bg-white hover:shadow-xl hover:border-primary-500 transition-all duration-300 relative group">
    {{-- Decorative technical index --}}
    @if($number)
        <div class="absolute top-4 right-4 font-mono text-[10px] text-steel-400 uppercase tracking-widest">[ CODE_{{ $number }} ]</div>
    @endif
    
    <div class="w-12 h-12 bg-white border border-steel-200 rounded-none flex items-center justify-center text-primary-600 mb-6 shrink-0 group-hover:border-primary-500 group-hover:bg-primary-50/50 transition-all">
        @if($icon)
            <x-dynamic-component :component="$icon" class="w-5 h-5 text-steel-800 group-hover:text-primary-600 transition-colors" />
        @else
            <svg aria-hidden="true" class="w-5 h-5 text-steel-800 group-hover:text-primary-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        @endif
    </div>
    
    <h3 class="text-lg font-display font-extrabold text-steel-900 mb-3 uppercase tracking-tight">
        {{ $title }}
    </h3>
    
    <p class="text-steel-600 leading-relaxed text-sm">
        {{ $description }}
    </p>
</div>