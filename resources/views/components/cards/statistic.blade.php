@props([
    'number',
    'label',
    'suffix' => ''
])

<div class="text-center p-8 bg-steel-950 border border-steel-800 rounded-none relative overflow-hidden group">
    <!-- Decorative border corner accents -->
    <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-primary-500 opacity-50 group-hover:opacity-100 transition-opacity"></div>
    <div class="absolute top-0 right-0 w-2 h-2 border-t border-r border-primary-500 opacity-50 group-hover:opacity-100 transition-opacity"></div>
    <div class="absolute bottom-0 left-0 w-2 h-2 border-b border-l border-primary-500 opacity-50 group-hover:opacity-100 transition-opacity"></div>
    <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-primary-500 opacity-50 group-hover:opacity-100 transition-opacity"></div>

    <div class="absolute inset-0 bg-primary-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-xl scale-125"></div>
    
    <div class="relative z-10">
        <div class="text-5xl md:text-6xl font-display font-extrabold text-white mb-3 tracking-tight">
            {{ $number }}<span class="text-primary-500">{{ $suffix }}</span>
        </div>
        <div class="text-steel-500 font-mono tracking-widest uppercase text-[10px]">
            [ {{ $label }} ]
        </div>
    </div>
</div>