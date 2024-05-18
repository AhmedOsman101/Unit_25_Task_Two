@extends('layouts.default')

@section('content')
@auth
<livewire:layout.navigation />
@endauth
@if (count($categories) > 0)
@livewire('categories', ['categories' => $categories])
@else
<div class="py-12 dark:text-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 px-0">
            <x-no-categories />
        </div>
    </div>
</div>
@endif
@endsection
