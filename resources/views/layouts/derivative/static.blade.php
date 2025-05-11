<x-main-layout> 
    @section('sidebar')
        <x-globals.sidebar />
    @endsection
    <x-globals.navbar :showHeaderLogo="true"/>
    {{ $slot }}
</x-main-layout>
