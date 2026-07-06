<header x-data="{ mobileMenuOpen: false, scrolled: false }" 
        @scroll.window="scrolled = (window.scrollY > 20)"
        :class="{ 'bg-steel-950/95 backdrop-blur-md border-b border-steel-800 py-4': scrolled || mobileMenuOpen, 'bg-transparent py-6 border-b border-transparent': !scrolled && !mobileMenuOpen }"
        :data-mobile-open="mobileMenuOpen.toString()"
        class="fixed top-0 left-0 right-0 w-full z-50 transition-all duration-300 ease-in-out">
    
    <x-ui.container>
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="shrink-0 flex items-center gap-3 group">
                @if(setting('general.site_logo'))
                    <img src="{{ Storage::disk('public')->url(setting('general.site_logo')) }}" alt="{{ setting('general.site_name', 'DO-RYT') }}" class="h-10 w-auto object-contain">
                @else
                    <div class="w-10 h-10 border border-primary-500 bg-primary-950/50 flex items-center justify-center text-primary-400 font-mono font-bold text-lg transition-all duration-500 group-hover:bg-primary-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(20,184,166,0.3)]">
                        {{ substr(setting('general.site_name', 'DO-RYT'), 0, 1) }}
                    </div>
                    <div class="flex flex-col">
                        <span class="font-display font-extrabold text-xl tracking-widest text-white transition-colors duration-500">{{ setting('general.site_name', 'DO-RYT') }}</span>
                        <span class="font-mono text-[9px] text-steel-500 uppercase tracking-widest leading-none mt-0.5">[ PRECISION_ENG ]</span>
                    </div>
                @endif
            </a>

            <!-- Desktop Navigation -->
            <nav aria-label="Main navigation" class="hidden lg:flex items-center gap-8">
                <a href="{{ route('products.index') }}" class="text-steel-400 hover:text-primary-400 font-mono uppercase text-xs tracking-widest transition-all duration-300 hover:tracking-[0.15em] py-2 relative group">
                    Products
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('industries.index') }}" class="text-steel-400 hover:text-primary-400 font-mono uppercase text-xs tracking-widest transition-all duration-300 hover:tracking-[0.15em] py-2 relative group">
                    Industries
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('about.index') }}" class="text-steel-400 hover:text-primary-400 font-mono uppercase text-xs tracking-widest transition-all duration-300 hover:tracking-[0.15em] py-2 relative group">
                    About
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('blogs.index') }}" class="text-steel-400 hover:text-primary-400 font-mono uppercase text-xs tracking-widest transition-all duration-300 hover:tracking-[0.15em] py-2 relative group">
                    Insights
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </nav>

            <!-- Desktop CTA -->
            <div class="hidden lg:flex items-center gap-6">
                <a href="tel:{{ setting('contact.phone', '+1234567890') }}" class="font-mono text-xs text-steel-400 hover:text-white transition-colors tracking-wider flex items-center gap-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                    </span>
                    {{ setting('contact.phone', '+1 (234) 567-890') }}
                </a>
                <x-ui.button href="{{ route('contact.index') }}" variant="primary" size="sm">Request Consultation</x-ui.button>
            </div>

            <!-- Mobile menu button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Toggle mobile menu" :aria-expanded="mobileMenuOpen.toString()" aria-controls="mobile-menu-panel" class="lg:hidden p-2 text-white border border-steel-800 bg-steel-900/50 hover:bg-steel-800 transition-colors">
                <svg aria-hidden="true" x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg aria-hidden="true" x-show="mobileMenuOpen" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </x-ui.container>

    <!-- Mobile Menu Panel -->
    <div id="mobile-menu-panel"
         x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         x-cloak
         class="lg:hidden absolute top-full left-0 w-full bg-steel-950 shadow-xl border-t border-steel-900">
        <div class="px-6 py-8 space-y-6">
            <a href="{{ route('products.index') }}" class="block px-4 py-2 font-mono text-xs uppercase tracking-widest text-steel-400 hover:text-white hover:bg-steel-900 transition-colors">Products</a>
            <a href="{{ route('industries.index') }}" class="block px-4 py-2 font-mono text-xs uppercase tracking-widest text-steel-400 hover:text-white hover:bg-steel-900 transition-colors">Industries</a>
            <a href="{{ route('about.index') }}" class="block px-4 py-2 font-mono text-xs uppercase tracking-widest text-steel-400 hover:text-white hover:bg-steel-900 transition-colors">About</a>
            <a href="{{ route('blogs.index') }}" class="block px-4 py-2 font-mono text-xs uppercase tracking-widest text-steel-400 hover:text-white hover:bg-steel-900 transition-colors">Insights</a>
            <div class="pt-6 border-t border-steel-900">
                <x-ui.button href="{{ route('contact.index') }}" variant="primary" class="w-full justify-center">Request Quote</x-ui.button>
            </div>
        </div>
    </div>
</header>