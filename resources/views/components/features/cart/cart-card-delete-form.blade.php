@props(['id'])

<x-shared.buttons.danger-modal-button modalName="delete-tools-{{ $id }}" type="button"
    class="flex items-center gap-1.5">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M4 7l16 0" />
        <path d="M10 11l0 6" />
        <path d="M14 11l0 6" />
        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
    </svg>
    Hapus
</x-shared.buttons.danger-modal-button>

<x-utilities.modal name="delete-tools-{{ $id }}" maxWidth="sm">
    <form action="{{ route('cart.items.destroy', $id) }}" method="POST"
        class="flex flex-col gap-4 overflow-hidden rounded-sm bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
        @csrf
        @method('DELETE')
        <div
            class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 px-4 pb-3 pt-2 dark:border-neutral-700 dark:bg-neutral-950/20">
            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                Apakah Anda yakin ingin menghapus item ini dari keranjang?
            </h3>
        </div>
        <div class="px-4 py-2">
            <p class="text-sm text-red-600 dark:text-red-400">
                <strong>Peringatan:</strong> Item akan dihapus dari keranjang Anda secara permanen.
            </p>
        </div>
        <div class="flex space-x-2 justify-end px-4 pb-2 dark:border-neutral-700 dark:bg-neutral-950/20">
            <x-shared.buttons.secondary-button class="w-full lg:w-auto"
                x-on:click="$dispatch('close')">Batalkan</x-shared.buttons.secondary-button>
            <x-shared.buttons.danger-button type="submit" class="w-full lg:w-auto">
                Hapus
            </x-shared.buttons.danger-button>
        </div>
    </form>
</x-utilities.modal>
