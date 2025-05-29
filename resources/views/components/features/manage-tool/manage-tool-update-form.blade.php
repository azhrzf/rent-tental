@props(['tool'])

<x-shared.buttons.modal-button modalName="update-tool-modal-{{ $tool->id }}"
    class="w-full flex items-center justify-center gap-1.5">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
        <path d="M16 5l3 3" />
    </svg>
    Edit Alat
</x-shared.buttons.modal-button>

<x-utilities.modal name="update-tool-modal-{{ $tool->id }}" maxWidth="lg">
    <form action="{{ route('manage.tools.update', $tool->id) }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col gap-4 overflow-hidden rounded-sm bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
        @csrf
        @method('PATCH')
        <div
            class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 px-4 pb-3 pt-2 dark:border-neutral-700 dark:bg-neutral-950/20">
            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                Edit Alat: {{ $tool->name }}
            </h3>
        </div>
        <div class="px-4 py-6 space-y-4">
            <div>
                <label for="product_number_{{ $tool->id }}"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Nomor Produk
                </label>
                <input type="text" id="product_number_{{ $tool->id }}" name="product_number"
                    value="{{ old('product_number', $tool->product_number) }}"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                @error('product_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="name_{{ $tool->id }}"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Nama Alat
                </label>
                <input type="text" id="name_{{ $tool->id }}" name="name"
                    value="{{ old('name', $tool->name) }}"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="price_{{ $tool->id }}"
                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                        Harga (Rp)
                    </label>
                    <input type="number" id="price_{{ $tool->id }}" name="price" min="0" step="0.01"
                        value="{{ old('price', $tool->price) }}"
                        class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                        required>
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="total_quantity_{{ $tool->id }}"
                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                        Jumlah Total
                    </label>
                    <input type="number" id="total_quantity_{{ $tool->id }}" name="total_quantity"
                        min="{{ $tool->total_quantity - $tool->availableQuantity }}"
                        value="{{ old('total_quantity', $tool->total_quantity) }}"
                        class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                        required>
                    @error('total_quantity')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="status_{{ $tool->id }}"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Status
                </label>
                <select id="status_{{ $tool->id }}" name="status"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                    <option value="">Pilih Status</option>
                    <option value="available" {{ old('status', $tool->status) == 'available' ? 'selected' : '' }}>
                        Tersedia</option>
                    <option value="unavailable" {{ old('status', $tool->status) == 'unavailable' ? 'selected' : '' }}>
                        Tidak Tersedia</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description_{{ $tool->id }}"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Deskripsi
                </label>
                <textarea id="description_{{ $tool->id }}" name="description" rows="3" placeholder="Masukkan deskripsi alat"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>{{ old('description', $tool->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            @if ($tool->image)
                <div>
                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                        Gambar Saat Ini
                    </label>
                    <div class="w-32 h-32 overflow-hidden rounded-sm border border-neutral-300 dark:border-neutral-700">
                        <img src="/images/tools/{{ $tool->image }}" alt="{{ $tool->name }}"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            @endif
            <div>
                <label for="image_{{ $tool->id }}"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    {{ $tool->image ? 'Ganti Gambar' : 'Upload Gambar' }}
                </label>
                <input type="file" id="image_{{ $tool->id }}" name="image"
                    accept="image/jpeg,image/png,image/jpg,image/gif"
                    class="w-full cursor-pointer overflow-clip rounded-sm border border-neutral-300 bg-neutral-50/50 text-sm text-neutral-600 file:mr-4 file:border-none file:bg-neutral-200 file:px-4 file:py-2 file:font-medium file:text-neutral-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:text-neutral-300 dark:file:bg-neutral-700 dark:file:text-white dark:focus-visible:outline-white"">
                <p class="mt-1 text-xs text-neutral-500">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                    {{ $tool->image ? 'Kosongkan jika tidak ingin mengganti.' : '' }}</p>
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
                Perbarui Alat
            </button>
        </div>
    </form>
</x-utilities.modal>
