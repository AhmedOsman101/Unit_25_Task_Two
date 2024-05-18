<div class="flex flex-col">
    {{-- Cards container --}}
    {{-- <div class="w-90 flex flex-wrap justify-center"> --}}
        <div
            class="grid grid-cols-1 place-items-center gap-8 auto-rows-fr lg:max-w-full lg:gap-3 xl:gap-6 lg:grid-cols-3">
            {{-- Show all Categorys --}}
            @foreach ($categories as $category)
            @livewire('card', ['item' => $category, 'type'=> 'categories'], key($category->id))
            @endforeach
        </div>
    </div>
