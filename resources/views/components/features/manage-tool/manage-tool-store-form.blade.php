@props(['tools' => null])

<x-shared.buttons.modal-button modalName="add-tool-modal" class="w-full flex items-center justify-center gap-1.5">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M12 5l0 14" />
        <path d="M5 12l14 0" />
    </svg>
    Tambah Alat Baru
</x-shared.buttons.modal-button>

<x-utilities.modal name="add-tool-modal" maxWidth="lg">
    <form action="{{ route('manage.tools.store') }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col gap-4 overflow-hidden rounded-sm bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
        @csrf
        <div
            class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 px-4 pb-3 pt-2 dark:border-neutral-700 dark:bg-neutral-950/20">
            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                Tambah Alat Baru
            </h3>
        </div>
        <div class="px-4 py-6 space-y-4">
            <div>
                <label for="product_number"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Nomor Produk
                </label>
                <input type="text" id="product_number" name="product_number" value="{{ old('product_number') }}"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                @error('product_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Nama Alat
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                        Harga (Rp)
                    </label>
                    <input type="number" id="price" name="price" min="0" 
                        value="{{ old('price') }}"
                        class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                        required>
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="total_quantity"
                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                        Jumlah Stok
                    </label>
                    <input type="number" id="total_quantity" name="total_quantity" min="0"
                        value="{{ old('total_quantity') }}"
                        class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                        required>
                    @error('total_quantity')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Status
                </label>
                <select id="status" name="status"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                    <option value="">Pilih Status</option>
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Tidak Tersedia
                    </option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Deskripsi
                </label>
                <textarea id="description" name="description" rows="3" placeholder="Masukkan deskripsi alat"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative flex w-full max-w-sm flex-col gap-1">
                <label for="image" class="w-fit pl-0.5 text-sm text-neutral-600 dark:text-neutral-300">
                    Gambar Alat
                </label>
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif"
                    class="w-full cursor-pointer overflow-clip rounded-sm border border-neutral-300 bg-neutral-50/50 text-sm text-neutral-600 file:mr-4 file:border-none file:bg-neutral-200 file:px-4 file:py-2 file:font-medium file:text-neutral-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:text-neutral-300 dark:file:bg-neutral-700 dark:file:text-white dark:focus-visible:outline-white">
                <p class="mt-1 text-xs text-neutral-500">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div
            class="flex space-x-2 justify-end border-t border-neutral-300 bg-neutral-50/60 px-4 pb-2 pt-3 dark:border-neutral-700 dark:bg-neutral-950/20">
            <x-shared.buttons.secondary-button class="w-full lg:w-auto"
                x-on:click="$dispatch('close')">Batalkan</x-shared.buttons.secondary-button>
            <button type="submit"
                class="rounded-sm whitespace-nowrap bg-black border-2 border-black px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white w-full lg:w-auto">
                Tambah Alat
            </button>
        </div>
    </form>
</x-utilities.modal>
