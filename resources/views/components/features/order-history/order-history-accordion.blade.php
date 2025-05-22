@props(['id'])

<div x-data="{ isExpanded: false }"
    class="overflow-hidden rounded-sm border border-neutral-300 bg-neutral-50/40 dark:border-neutral-700 dark:bg-neutral-900/50">
    <button id="{{ "$id-accordion-control" }}" type="button"
        class="flex w-full items-center justify-between gap-2 bg-neutral-50 p-4 text-left underline-offset-2 hover:bg-neutral-50/75 focus-visible:bg-neutral-50/75 focus-visible:underline focus-visible:outline-hidden dark:bg-neutral-900 dark:hover:bg-neutral-900/75 dark:focus-visible:bg-neutral-900/75"
        aria-controls="{{ "$id-accordion" }}" x-on:click="isExpanded = ! isExpanded"
        x-bind:class="isExpanded ? 'text-onSurfaceStrong dark:text-onSurfaceDarkStrong font-bold' :
            'text-onSurface dark:text-onSurfaceDark font-medium'"
        x-bind:aria-expanded="isExpanded ? 'true' : 'false'">
        {{ $title }}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor"
            class="size-5 shrink-0 transition" aria-hidden="true" x-bind:class="isExpanded ? 'rotate-180' : ''">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>
    <div x-cloak x-show="isExpanded" id="{{ "$id-accordion" }}" role="region"
        aria-labelledby="{{ "$id-accordion-control" }}" x-collapse>
        {{ $slot }}
    </div>
</div>
