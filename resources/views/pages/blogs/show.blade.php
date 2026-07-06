<x-layouts.app :title="$post->title" :seo="$post->seo">
    
    {{-- HERO --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden border-b border-steel-900"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/' . $post->image) }}" class="w-full h-full object-cover opacity-10 mix-blend-overlay animate-slow-pan">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-4xl mx-auto text-center">
                <div class="flex items-center justify-center text-[10px] font-mono uppercase tracking-widest mb-6">
                    <span class="border border-primary-500 bg-primary-950/50 text-primary-400 px-3 py-1 font-bold">{{ $post->category }}</span>
                    <span class="mx-3 text-steel-700">|</span>
                    <span class="text-steel-400">{{ $post->date }}</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white leading-tight mb-6 uppercase tracking-tight">
                    {{ $post->title }}
                </h1>
            </div>
        </x-ui.container>
    </section>

    {{-- CONTENT --}}
    <section class="py-24 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container class="max-w-4xl">
            <div class="prose prose-steel mx-auto leading-relaxed text-steel-650" data-reveal="fade-up">
                {!! $post->content !!}
                
                <h3 class="text-xl font-display font-extrabold text-steel-950 uppercase tracking-tight mt-12 mb-4">Engineering for the Future</h3>
                <p>By implementing these systems, DO-RYT ensures that our clients remain competitive in an increasingly demanding global market. We invite you to contact our technical team to discuss how these innovations can be integrated into your specific production line.</p>
            </div>

            <div class="mt-16 pt-8 border-t border-steel-200 flex flex-col sm:flex-row justify-between items-center gap-6" data-reveal="fade-up">
                <a href="{{ route('blogs.index') }}" class="inline-flex items-center text-steel-650 hover:text-primary-600 transition-colors font-mono text-xs uppercase tracking-widest font-bold">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                    Back to Articles
                </a>
                
                <div class="flex gap-4">
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="w-10 h-10 border border-steel-200 bg-steel-50 hover:bg-steel-950 hover:text-white hover:border-steel-950 flex items-center justify-center text-steel-500 transition-colors" 
                       aria-label="Share on X">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="w-10 h-10 border border-steel-200 bg-steel-50 hover:bg-[#0077b5] hover:text-white hover:border-[#0077b5] flex items-center justify-center text-steel-500 transition-colors" 
                       aria-label="Share on LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </x-ui.container>
    </section>
</x-layouts.app>