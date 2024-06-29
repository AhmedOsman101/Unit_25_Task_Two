<x-app-layout>
    <div class="py-12 dark:text-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ( count($requests) > 0 )
            <div class="py-8">
                <h1 class="text-3xl font-bold pb-3">Requests ({{count($requests)}})</h1>
                @livewire('requests-table', ['requests' => $requests])
            </div>
            @else
            <div class="py-8">
                <x-no-requests />
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
