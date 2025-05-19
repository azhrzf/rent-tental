<x-guest-layout>
    <x-utilities.auth-session-status class="mb-4" :status="session('status')" />
    <div class="space-y-4">
        <div>
            <h2 class="text-balance text-xl lg:text-2xl font-bold" aria-describedby="tripDescription">Login</h2>
            <p id="tripDescription" class="text-pretty text-sm mb-2">
                Masuk untuk melakukan penyewaan tenda.
            </p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-shared.inputs.input-label for="email" :value="__('Email')" />
                <x-shared.inputs.text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
                <x-shared.inputs.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-shared.inputs.input-label for="password" :value="__('Password')" />
                <x-shared.inputs.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
                <x-shared.inputs.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                  <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('register') }}">
                    Atau daftar di sini
                </a>
                <x-shared.buttons.primary-button class="ms-4">
                    Login
                </x-shared.buttons.primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
