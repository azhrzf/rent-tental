@props(['modalName'])

<button x-on:click.prevent="$dispatch('open-modal', '{{ $modalName }}')"
    {{ $attributes->merge(['type' => 'button', 'class' => 'whitespace-nowrap bg-black px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white rounded-sm']) }}>
    {{ $slot }}
</button>
