<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">
        <div
            class="p-6 max-w-2xl rounded-md border border-neutral-300 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900">
            @include('routes.profile.partials.update-profile-information-form')
        </div>
        <div
            class="p-6 max-w-2xl rounded-md border border-neutral-300 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900">
            @include('routes.profile.partials.update-password-form')
        </div>

        <div
            class="p-6 max-w-2xl rounded-md border border-neutral-300 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900">
            @include('routes.profile.partials.delete-user-form')
        </div>
    </div>
</x-dashboard-layout>
