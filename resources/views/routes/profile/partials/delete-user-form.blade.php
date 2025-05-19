<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Hapus Akun
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Akun Anda akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh semua data yang ingin Anda simpan.
        </p>
    </header>

    <x-shared.buttons.danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Hapus Akun') }}</x-shared.buttons.danger-button>

    <x-utilities.modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Apakah Anda yakin ingin menghapus akun Anda?
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Setelah menghapus akun Anda, semua data yang terkait dengan akun Anda akan dihapus secara permanen dan tidak dapat dipulihkan.
            </p>

            <div class="mt-6">
                <x-shared.inputs.input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-shared.inputs.text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-shared.inputs.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-shared.buttons.secondary-button x-on:click="$dispatch('close')">
                    Batal
                </x-shared.buttons.secondary-button>

                <x-shared.buttons.danger-button class="ms-3">
                    Hapus Akun
                </x-shared.buttons.danger-button>
            </div>
        </form>
    </x-utilities.modal>
</section>
