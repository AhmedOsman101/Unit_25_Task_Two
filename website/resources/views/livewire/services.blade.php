<div class="flex flex-col">

    {{-- Cards container --}}
    <div
        class="grid grid-cols-1 place-items-center gap-8 auto-rows-fr lg:max-w-full lg:gap-3 xl:gap-6 lg:grid-cols-3 px-8 pt-4 pb-8">
        {{-- Show all Services --}}
        @foreach ($services as $service)
        @livewire('card', ['item' => $service, 'type' => 'service'], key($service->id))
        @endforeach
    </div>
</div>
