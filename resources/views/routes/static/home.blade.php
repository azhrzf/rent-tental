<x-static-layout>
    <div class="relative bg-gradient-to-r from-gray-900 to-gray-800 dark:from-black dark:to-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="/assets/images/photo-1504280390367-361c6d9f38f4.avif"
                alt="Camping tents under starry night" class="w-full h-full object-cover opacity-40">
        </div>
        <div class="relative z-10 px-4 lg:px-0 py-16 lg:py-36 max-w-6xl mx-auto">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    Sewa Tenda Berkualitas untuk Petualangan Anda
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl">
                    Dapatkan pengalaman camping terbaik dengan tenda berkualitas tinggi. Kami menyediakan berbagai jenis
                    tenda untuk kebutuhan outdoor Anda.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('catalogs') }}"
                        class="px-6 py-3 border border-white bg-black/40 hover:bg-black/80 text-white font-medium rounded-sm transition duration-300">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="features" class="px-4 lg:px-0 py-16">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Mengapa Memilih Kami?</h2>
                <p class="text-gray-600 dark:text-gray-300 mt-4">Kualitas terbaik dengan harga terjangkau</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="p-6 border border-gray-200 dark:border-gray-700 rounded-sm shadow-sm bg-white dark:bg-neutral-900">
                    <div
                        class="w-12 h-12 flex items-center justify-center bg-neutral-100 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-200 rounded-sm mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Kualitas Premium</h3>
                    <p class="text-gray-600 dark:text-gray-300">Seluruh tenda kami terbuat dari bahan berkualitas tinggi
                        yang tahan lama dan anti air.</p>
                </div>
                <div
                    class="p-6 border border-gray-200 dark:border-gray-700 rounded-sm shadow-sm bg-white dark:bg-neutral-900">
                    <div
                        class="w-12 h-12 flex items-center justify-center bg-neutral-100 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-200 rounded-sm mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Pemesanan Mudah</h3>
                    <p class="text-gray-600 dark:text-gray-300">Proses pemesanan cepat dan mudah dengan opsi pengiriman
                        ke lokasi camping Anda.</p>
                </div>
                <div
                    class="p-6 border border-gray-200 dark:border-gray-700 rounded-sm shadow-sm bg-white dark:bg-neutral-900">
                    <div
                        class="w-12 h-12 flex items-center justify-center bg-neutral-100 dark:bg-neutral-800 text-neutral-800 dark:text-neutral-200 rounded-sm mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Harga Terjangkau</h3>
                    <p class="text-gray-600 dark:text-gray-300">Berbagai pilihan tenda dengan harga yang sesuai dengan
                        budget petualangan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</x-static-layout>
