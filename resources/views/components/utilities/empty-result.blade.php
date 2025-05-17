@props(['emptyText'])

<div class="col-span-1 md:col-span-2 lg:col-span-3">
    <div class="col-span-1 md:col-span-2 lg:col-span-3">
        <div class="flex items-center justify-center h-96">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                    stroke="currentColor" class="w-12 h-12 mx-auto mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v18H3V3z" />
                </svg>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">Tidak ada {{ $emptyText }} yang
                    ditemukan.</p>
            </div>
        </div>
    </div>
</div>
