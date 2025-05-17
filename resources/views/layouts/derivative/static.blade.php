<x-main-layout>
    @section('sidebar')
        <x-globals.sidebar :showOnlyMobile="true" />
    @endsection
    @section('navbar')
        <x-globals.navbar :showHeaderLogo="true" />
    @endsection
    {{ $slot }}
</x-main-layout>
