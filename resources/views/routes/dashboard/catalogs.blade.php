<x-dashboard-layout>
    <div class="space-y-6">
        <x-shared.inputs.search-input route="tools.search" />
        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($tools as $tool)
                <x-features.catalog-card name="{{ $tool->name }}" image="{{ $tool->image }}" price="{{ $tool->price }}"
                    availableQuantity="{{ $tool->total_quantity }}" description="{{ $tool->description }}" />
            @endforeach
            @if ($tools->isEmpty())
                <x-utilities.empty-result emptyText="alat" />
            @endif
        </div>
        {{ $tools->links() }}

    </div>
</x-dashboard-layout>
