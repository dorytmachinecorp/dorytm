<x-filament-panels::page>
    @php
        $groups = collect($urls)->groupBy('type');
        $typeLabels = [
            'main' => 'Main Pages',
            'product' => 'Products',
            'category' => 'Categories',
            'industry' => 'Industries',
            'blog' => 'Blog Posts',
        ];
    @endphp

    <div class="space-y-8">
        @foreach($typeLabels as $type => $title)
            @if($groups->has($type))
                <x-filament::section>
                    <x-slot name="heading">
                        <div class="flex items-center gap-3">
                            <x-filament::badge size="md" :color="match($type) { 'main' => 'primary', 'product' => 'success', 'category' => 'warning', 'industry' => 'info', 'blog' => 'danger', default => 'gray' }">
                                {{ count($groups->get($type)) }}
                            </x-filament::badge>
                            <span>{{ $title }}</span>
                        </div>
                    </x-slot>

                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left divide-y divide-gray-200 dark:divide-white/5" style="width: 100% !important; display: table !important; table-layout: fixed !important;">
                            <thead>
                                <tr class="bg-gray-50/50 dark:bg-white/5">
                                    <th class="text-sm font-semibold text-gray-950 dark:text-white" style="padding: 16px 24px !important; width: 30% !important;">Label</th>
                                    <th class="text-sm font-semibold text-gray-950 dark:text-white" style="padding: 16px 24px !important; width: 45% !important;">URL Path</th>
                                    <th class="text-sm font-semibold text-gray-950 dark:text-white" style="padding: 16px 24px !important; width: 15% !important;">Last Modified</th>
                                    <th class="text-sm font-semibold text-gray-950 dark:text-white" style="padding: 16px 24px !important; width: 10% !important;">Priority</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-white/5 bg-white dark:bg-gray-900">
                                @foreach($groups->get($type) as $url)
                                    <tr class="transition duration-75 hover:bg-gray-50 dark:hover:bg-white/5">
                                        <td style="padding: 16px 24px !important; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            <span class="text-sm text-gray-950 dark:text-white font-medium">{{ $url['label'] ?? 'N/A' }}</span>
                                        </td>
                                        <td style="padding: 16px 24px !important; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            <a href="{{ $url['loc'] }}" target="_blank" class="text-sm text-primary-600 dark:text-primary-400 hover:underline font-mono">
                                                {{ str_replace(url('/'), '', $url['loc']) ?: '/' }}
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap" style="padding: 16px 24px !important; width: 15% !important;">
                                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($url['lastmod'])->format('M d, Y') }}</span>
                                        </td>
                                        <td class="whitespace-nowrap" style="padding: 16px 24px !important; width: 10% !important;">
                                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $url['priority'] }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-filament::section>
            @endif
        @endforeach
    </div>
</x-filament-panels::page>
