@props([
    'variant' => 'primary', // primary, secondary, outline, ghost
    'size' => 'md', // sm, md, lg
    'href' => null,
    'icon' => null,
    'iconPosition' => 'left'
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-mono font-medium transition-all duration-300 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none rounded-none uppercase tracking-wider hover:scale-[1.01] active:scale-95';
    
    $variants = [
        'primary' => 'bg-primary-600 border border-primary-500 text-white hover:bg-primary-500 hover:shadow-[0_0_20px_rgba(20,184,166,0.25)]',
        'secondary' => 'bg-steel-800 border border-steel-700 text-white hover:bg-steel-700 hover:border-steel-600',
        'outline' => 'border border-steel-200 bg-transparent hover:bg-steel-50 text-steel-900 hover:border-steel-400',
        'ghost' => 'bg-transparent hover:bg-steel-100 text-steel-700 hover:text-steel-900',
    ];
    
    $sizes = [
        'sm' => 'h-9 px-4 text-xs',
        'md' => 'h-11 px-6 text-sm',
        'lg' => 'h-14 px-8 text-base',
    ];
    
    $classes = "{$baseClasses} {$variants[$variant]} {$sizes[$size]}";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon && $iconPosition === 'left')
            <x-dynamic-component :component="$icon" class="w-4 h-4 mr-2" />
        @endif
        
        {{ $slot }}
        
        @if($icon && $iconPosition === 'right')
            <x-dynamic-component :component="$icon" class="w-4 h-4 ml-2" />
        @endif
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon && $iconPosition === 'left')
            <x-dynamic-component :component="$icon" class="w-4 h-4 mr-2" />
        @endif
        
        {{ $slot }}
        
        @if($icon && $iconPosition === 'right')
            <x-dynamic-component :component="$icon" class="w-4 h-4 ml-2" />
        @endif
    </button>
@endif