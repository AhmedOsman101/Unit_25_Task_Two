<div class="flex flex-col">

    {{-- Cards container --}}
    <div class="w-90 flex flex-wrap justify-center">
        {{-- Show all Services --}}
        @foreach ($services as $service)
        @livewire('card', ['service' => $service], key($service->id))
        @endforeach
    </div>
</div>
