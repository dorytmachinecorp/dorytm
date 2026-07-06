@props([
    'variant' => 'default',
    'class' => ''
])

@php
    $variants = [
        'default' => 'bg-steel-100 text-steel-800',
        'primary' => 'bg-primary-100 text-primary-800',
        'success' => 'bg-green-100 text-green-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
    ];
    
    $colorClass = $variants[$variant] ?? $variants['default'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {$colorClass} {$class}"]) }}>
    {{ $slot }}
</span>