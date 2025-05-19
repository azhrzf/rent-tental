<x-guest-layout>
    <div class="space-y-4">
        <div>
            <h2 class="text-balance text-xl lg:text-2xl font-bold" aria-describedby="tripDescription">Daftar</h2>
            <p id="tripDescription" class="text-pretty text-sm mb-2">
                Daftar untuk melakukan penyewaan tenda.
            </p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-shared.inputs.input-label for="name" :value="__('Nama')" />
                <x-shared.inputs.text-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="old('name')" required autofocus autocomplete="name" />
                <x-shared.inputs.input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-shared.inputs.input-label for="email" :value="__('Email')" />
                <x-shared.inputs.text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autocomplete="username" />
                <x-shared.inputs.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-shared.inputs.input-label for="address" :value="__('Alamat')" />
                <x-shared.inputs.textarea-input id="address" class="block mt-1 w-full" type="text" name="address"
                    :value="old('address')" required autofocus autocomplete="address" />
                <x-shared.inputs.input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-shared.inputs.input-label for="phone_number" :value="__('No Telp')" />
                <x-shared.inputs.text-input id="phone_number" class="block mt-1 w-full" type="tel"
                    name="phone_number" required autocomplete="phone_number" pattern="[0-9]+" inputmode="numeric"
                    maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                <x-shared.inputs.input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-shared.inputs.input-label for="password" :value="__('Password')" />
                <x-shared.inputs.text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    required autocomplete="new-password" />
                <x-shared.inputs.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-shared.inputs.input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                <x-shared.inputs.text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-shared.inputs.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    Atau masuk di sini
                </a>
                <x-shared.buttons.primary-button class="ms-4 rounded-sm">
                    Register
                </x-shared.buttons.primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
