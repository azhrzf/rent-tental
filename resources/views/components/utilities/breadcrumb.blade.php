@props(['items' => []])

<nav class="text-sm font-medium text-neutral-600 dark:text-neutral-300" aria-label="breadcrumb">
    <ol class="flex flex-wrap items-center gap-2">
        @foreach ($items as $item)
            <li class="flex items-center gap-2">
                @if (!($item['active'] ?? false))
                    <a href="{{ $item['link'] ?? '#' }}"
                        class="hover:text-neutral-900 dark:hover:text-white">{{ $item['name'] }}</a>
                    <span aria-hidden="true">/</span>
                @else
                    <span class="text-neutral-900 font-bold dark:text-white"
                        aria-current="page">{{ $item['name'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
