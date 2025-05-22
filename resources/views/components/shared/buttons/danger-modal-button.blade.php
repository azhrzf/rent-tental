@props(['modalName'])

<button x-on:click.prevent="$dispatch('open-modal', '{{ $modalName }}')"
    {{ $attributes->merge(['type' => 'button', 'class' => 'whitespace-nowrap bg-red-500 px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:outline-offset-0 focus-visible:outline-red-500 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-red-500 dark:border-red-500 dark:text-white dark:focus-visible:outline-red-500 rounded-sm']) }}>
    {{ $slot }}
</button>
