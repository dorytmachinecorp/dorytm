<x-layouts.app :title="'News & Insights | ' . config('cms.seo.title_suffix')">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 border-b border-steel-900 overflow-hidden"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-3xl text-left">
                <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ COMPANY UPDATES ]</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white mb-6 uppercase tracking-tight">News & Insights</h1>
                <p class="text-lg text-steel-400 max-w-2xl text-balance">Read the latest technical articles, company announcements, and engineering breakthroughs from DO-RYT.</p>
            </div>
        </x-ui.container>
    </section>

    {{-- ARTICLES GRID --}}
    <section class="py-24 bg-steel-50 relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px); background-size: 100% 40px;">
        <x-ui.container>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-reveal="stagger">
                @foreach($posts as $post)
                <article class="bg-white border border-steel-200 overflow-hidden flex flex-col group p-2 hover:shadow-xl hover:border-primary-500 transition-all duration-300">
                    <a href="{{ route('blogs.show', $post->slug) }}" class="block aspect-video overflow-hidden bg-steel-100 border border-steel-150 relative">
                        <div class="absolute top-2 left-2 z-10 font-mono text-[9px] bg-steel-950/85 text-white px-2 py-0.5 border border-steel-800 uppercase tracking-widest">[ POST_{{ $loop->iteration }} ]</div>
                        <img src="{{ asset('img/' . $post->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 mix-blend-luminosity group-hover:mix-blend-normal" alt="{{ $post->title }}">
                    </a>
                    
                    <div class="p-8 flex flex-col grow">
                        <div class="flex items-center text-[10px] font-mono uppercase tracking-widest mb-4 text-steel-400">
                            <span class="text-primary-600 font-bold">// {{ $post->category }}</span>
                            <span class="mx-3 text-steel-200">|</span>
                            <span>{{ $post->date }}</span>
                        </div>
                        
                        <h2 class="text-xl font-display font-extrabold text-steel-950 group-hover:text-primary-600 transition-colors uppercase tracking-tight mb-4 leading-tight">
                            <a href="{{ route('blogs.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        
                        <p class="text-steel-650 text-sm leading-relaxed mb-8 grow">{{ $post->excerpt }}</p>
                        
                        <a href="{{ route('blogs.show', $post->slug) }}" class="inline-flex items-center text-steel-950 font-mono text-xs uppercase tracking-widest font-bold hover:text-primary-650 transition-all duration-300 hover:tracking-[0.12em]">
                            Read Article
                            <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </x-ui.container>
    </section>
</x-layouts.app>