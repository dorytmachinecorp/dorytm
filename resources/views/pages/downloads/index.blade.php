<x-layouts.app :title="'Downloads | ' . config('cms.seo.title_suffix')">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 border-b border-steel-900 overflow-hidden"
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent"></div>
        </div>
        <x-ui.container class="relative z-10" data-reveal="fade-up">
            <div class="max-w-3xl text-left">
                <span class="font-mono text-[10px] text-primary-400 uppercase tracking-widest block mb-4">[ RESOURCE CENTER ]</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-extrabold text-white mb-6 uppercase tracking-tight">Downloads</h1>
                <p class="text-lg text-steel-400 max-w-2xl text-balance">Access our complete library of machine brochures, technical datasheets, and company profiles.</p>
            </div>
        </x-ui.container>
    </section>

    {{-- DOWNLOADS LIST --}}
    <section class="py-24 bg-white relative"
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        <x-ui.container class="max-w-5xl">
            <div class="bg-steel-50 border border-steel-250 rounded-none overflow-hidden shadow-2xl p-2" data-reveal="fade-up">
                <div class="overflow-x-auto border border-steel-200 bg-white">
                    <table class="w-full text-left border-collapse font-mono text-xs uppercase tracking-wider">
                        <thead>
                            <tr class="bg-steel-100 border-b border-steel-200 text-steel-900 font-bold">
                                <th class="py-4 px-6 whitespace-nowrap">// Document Title</th>
                                <th class="py-4 px-6 whitespace-nowrap hidden md:table-cell">[ Category ]</th>
                                <th class="py-4 px-6 whitespace-nowrap hidden sm:table-cell">[ Format ]</th>
                                <th class="py-4 px-6 whitespace-nowrap hidden sm:table-cell">[ Size ]</th>
                                <th class="py-4 px-6 whitespace-nowrap text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($downloads as $file)
                            <tr class="border-b border-steel-100 last:border-0 hover:bg-steel-50/50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center text-steel-900 font-bold">
                                        <x-heroicon-o-document class="w-5 h-5 text-steel-550 mr-3 hidden sm:block" />
                                        <span>{{ $file->title }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-steel-600 hidden md:table-cell text-[10px]">{{ $file->category }}</td>
                                <td class="py-4 px-6 text-steel-600 hidden sm:table-cell text-[10px]">{{ $file->type }}</td>
                                <td class="py-4 px-6 text-steel-500 text-[10px] hidden sm:table-cell">{{ $file->size }}</td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('downloads.download', $file->id) }}" class="inline-flex items-center text-primary-650 hover:text-primary-500 font-bold transition-colors gap-1">
                                        <x-heroicon-o-arrow-down-tray class="w-4 h-4" />
                                        <span>Download</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </x-ui.container>
    </section>
</x-layouts.app>