 @if (session('success'))
     <x-utilities.toast variant="success" title="Berhasil" :message="session('success')" />
 @endif
 <x-dashboard-layout>
     <div class="space-y-6">
         <div class="w-full lg:max-w-xs">
             <x-shared.inputs.search-input route="catalogs" keyword="{{ $keyword }}" />
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
