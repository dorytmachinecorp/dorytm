@props([
    'title',
    'subtitle' => null,
    'kicker' => null,
    'alignment' => 'left', // left, center
    'class' => ''
])

@php
    $alignClass = $alignment === 'center' ? 'text-center mx-auto' : 'text-left';
@endphp

<div {{ $attributes->merge(['class' => "mb-12 md:mb-16 max-w-3xl {$alignClass} {$class}"]) }}>
    @if($kicker)
        <span class="block text-primary-600 font-semibold tracking-wider uppercase text-sm mb-3">
            {{ $kicker }}
        </span>
    @endif
    
    <h2 class="text-3xl md:text-4xl lg:text-5xl font-display font-bold text-steel-900 mb-6 tracking-tight">
        {{ $title }}
    </h2>
    
    @if($subtitle)
        <p class="text-lg text-steel-600 leading-relaxed text-balance">
            {{ $subtitle }}
        </p>
    @endif
</div>