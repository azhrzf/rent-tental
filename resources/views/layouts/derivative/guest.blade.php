<x-main-layout>
    @section('sidebar')
        <x-globals.sidebar />
    @endsection
    <x-globals.navbar :showHeaderLogo="true" />
    <div class="flex flex-col sm:justify-center items-center py-24">
        <section
            class="w-full sm:max-w-md p-6 group flex rounded-sm max-w-sm flex-col overflow-hidden border border-neutral-300 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900">
            {{ $slot }}
        </section>
    </div>
</x-main-layout>
