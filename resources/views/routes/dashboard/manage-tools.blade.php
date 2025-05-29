@if (session('success'))
    <x-utilities.toast variant="success" title="Berhasil" :message="session('success')" />
@endif
@if (session('danger'))
    <x-utilities.toast variant="danger" title="Kesalahan" :message="session('danger')" />
@endif
@if ($errors->any())
    <x-utilities.toast variant="danger" title="Kesalahan" :message="$errors->all() ? implode(', ', $errors->all()) : ''" />
@endif
<x-dashboard-layout>
    <div class="space-y-6">
        <div class="w-full lg:max-w-xs">
            <x-shared.inputs.search-input route="catalogs" :keyword="$keyword" />
        </div>
        <div class="w-full lg:max-w-xs">
            <x-features.manage-tool.manage-tool-store-form>
                Tambah Alat Baru
            </x-features.manage-tool.manage-tool-store-form>
        </div>
        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @if ($tools && $tools->count())
                @foreach ($tools as $tool)
                    <x-features.catalog.catalog-card :tool="$tool" />
                @endforeach
            @else
                <x-utilities.empty-result emptyText="alat" />
            @endif
        </div>
        @if ($tools && $tools->count())
            {{ $tools->links() }}
        @endif
    </div>
</x-dashboard-layout>
