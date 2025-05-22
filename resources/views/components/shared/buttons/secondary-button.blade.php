<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'rounded-sm whitespace-nowrap bg-black border-2 border-black px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white']) }}>
    {{ $slot }}
</button>
