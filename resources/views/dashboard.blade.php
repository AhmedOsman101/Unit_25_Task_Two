<x-app-layout>
    <div class="py-12 dark:text-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 px-0">
                @if (count($requests) > 0)
                @livewire('requests-table', ['requests' => $requests])
                @else
                <x-no-services />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
