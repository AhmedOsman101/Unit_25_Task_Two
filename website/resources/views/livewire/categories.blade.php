<section class="grid grid-cols-1 gap-6 p-4 sm:grid-cols-2 md:grid-cols-3">
    @foreach ($categories as $category)
    @livewire('card', ['item' => $category, 'type'=> 'categories'], key($category->id))
    @endforeach
</section>
