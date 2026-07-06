<x-layouts.app title="Sitemap | DO-RYT Machine Corp">
    <x-ui.container class="py-12 md:py-24">
        <header class="mb-12">
            <h1 class="text-4xl md:text-5xl font-mono uppercase tracking-tight text-slate-900 dark:text-white mb-6">
                [ SITE MAP ]
            </h1>
            <p class="text-slate-600 dark:text-steel-400 max-w-2xl text-lg">
                Complete overview of our website pages, products, and categories.
            </p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white dark:bg-steel-800 p-8 rounded-lg shadow-sm border border-slate-200 dark:border-steel-700">
                <h2 class="text-xl font-mono uppercase text-slate-900 dark:text-white mb-6 border-b border-slate-200 dark:border-steel-700 pb-2">Main Pages</h2>
                <ul class="space-y-3">
                    @foreach($urls->where('type', 'main') as $url)
                        <li>
                            <a href="{{ $url['loc'] }}" class="text-primary-600 dark:text-primary-400 hover:underline">
                                {{ $url['label'] ?? 'Link' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="bg-white dark:bg-steel-800 p-8 rounded-lg shadow-sm border border-slate-200 dark:border-steel-700">
                <h2 class="text-xl font-mono uppercase text-slate-900 dark:text-white mb-6 border-b border-slate-200 dark:border-steel-700 pb-2">Categories & Industries</h2>
                <ul class="space-y-3">
                    @foreach($urls->whereIn('type', ['category', 'industry']) as $url)
                        <li>
                            <a href="{{ $url['loc'] }}" class="text-primary-600 dark:text-primary-400 hover:underline">
                                {{ $url['label'] ?? 'Link' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-white dark:bg-steel-800 p-8 rounded-lg shadow-sm border border-slate-200 dark:border-steel-700">
                <h2 class="text-xl font-mono uppercase text-slate-900 dark:text-white mb-6 border-b border-slate-200 dark:border-steel-700 pb-2">Products</h2>
                <ul class="space-y-3">
                    @foreach($urls->where('type', 'product') as $url)
                        <li>
                            <a href="{{ $url['loc'] }}" class="text-primary-600 dark:text-primary-400 hover:underline text-sm">
                                {{ $url['label'] ?? 'Link' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-white dark:bg-steel-800 p-8 rounded-lg shadow-sm border border-slate-200 dark:border-steel-700">
                <h2 class="text-xl font-mono uppercase text-slate-900 dark:text-white mb-6 border-b border-slate-200 dark:border-steel-700 pb-2">Blog Posts</h2>
                <ul class="space-y-3">
                    @foreach($urls->where('type', 'blog') as $url)
                        <li>
                            <a href="{{ $url['loc'] }}" class="text-primary-600 dark:text-primary-400 hover:underline text-sm">
                                {{ $url['label'] ?? 'Link' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </x-ui.container>
</x-layouts.app>
