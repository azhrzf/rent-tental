@props(['route', 'availableQuantity'])

<form action="{{ route($route) }}" method="POST"
    class="flex items-center justify-between rounded-sm w-full border border-neutral-300 bg-neutral-50 px-3 py-2.5 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 gap-2">
    <button type="button"
        class="px-2 py-1 rounded-sm bg-neutral-200 hover:bg-neutral-300 dark:bg-neutral-800 dark:hover:bg-neutral-700 text-neutral-700 dark:text-neutral-200"
        onclick="this.nextElementSibling.stepDown()">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M5 10h10" />
        </svg>
    </button>
    <input type="number" min="1" value="1" max="{{ $availableQuantity }}"
        class="w-12 text-center rounded-sm border border-neutral-300 bg-white px-1 py-0.5 text-xs font-medium text-neutral-700 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white" />
    <button type="button"
        class="px-2 py-1 rounded-sm bg-neutral-200 hover:bg-neutral-300 dark:bg-neutral-800 dark:hover:bg-neutral-700 text-neutral-700 dark:text-neutral-200"
        onclick="this.previousElementSibling.stepUp()">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M10 5v10M5 10h10" />
        </svg>
    </button>
</form>
