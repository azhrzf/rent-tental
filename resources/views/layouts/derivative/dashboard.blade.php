<x-main-layout>
    @section('sidebar')
        <x-globals.sidebar />
    @endsection
    @section('navbar')
        <x-globals.navbar :showHeaderLogo="false" />
    @endsection
    <div class="px-4 lg:px-0 py-10 max-w-6xl mx-auto">
        {{ $slot }}
    </div>
</x-main-layout>
