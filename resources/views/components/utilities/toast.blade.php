@props([
    'variant' => 'info',
    'title' => null,
    'message' => null,
    'displayDuration' => 8000,
])

<div x-data="{
    isVisible: false,
    displayDuration: {{ $displayDuration }},
    showToast() {
        this.isVisible = true;
        setTimeout(() => { this.isVisible = false }, this.displayDuration);
    }
}" x-init="showToast()" x-show="isVisible"
    x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="translate-y-8 opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition duration-300 ease-in"
    x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="-translate-x-24 opacity-0 md:translate-x-24"
    class="fixed bottom-8 right-8 z-50 pointer-events-auto max-w-xs w-full" style="display: none;">
    <div @class([
        'flex items-center gap-2.5 rounded-sm p-4 shadow-lg border bg-white text-neutral-600 dark:bg-neutral-950 dark:text-neutral-300',
        'border-sky-500' => $variant === 'info',
        'border-green-500' => $variant === 'success',
        'border-red-500' => $variant === 'danger',
        'border-amber-500' => $variant === 'warning',
    ]) role="alert">
        {{-- Icon --}}
        <div @class([
            'rounded-full p-0.5',
            'text-sky-500' => $variant === 'info',
            'text-green-500' => $variant === 'success',
            'text-red-500' => $variant === 'danger',
            'text-amber-500' => $variant === 'warning',
        ]) aria-hidden="true">
            @if ($variant === 'info')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z"
                        clip-rule="evenodd" />
                </svg>
            @elseif($variant === 'success')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                        clip-rule="evenodd" />
                </svg>
            @elseif($variant === 'danger')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                        clip-rule="evenodd" />
                </svg>
            @elseif($variant === 'warning')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                        clip-rule="evenodd" />
                </svg>
            @endif
        </div>

        {{-- Title & Message --}}
        <div class="flex flex-col gap-2">
            @if ($title)
                <h3 @class([
                    'text-sm font-semibold',
                    'text-sky-500' => $variant === 'info',
                    'text-green-500' => $variant === 'success',
                    'text-red-500' => $variant === 'danger',
                    'text-amber-500' => $variant === 'warning',
                ])>
                    {{ $title }}
                </h3>
            @endif
            @if ($message)
                <p class="text-pretty text-sm">{{ $message }}</p>
            @endif
        </div>
    </div>
</div>
