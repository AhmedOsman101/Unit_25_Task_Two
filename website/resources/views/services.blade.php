@extends('layouts.default')

@section('content')

@if (Auth::guard('web')->check())
<livewire:layout.navigation />
@else

<livewire:welcome.navigation />
<div class="w-full h-24"></div>
@endif

@if (count($services) > 0)
@livewire('services', ['services' => $services])
@else
<div class="py-12 dark:text-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 px-0">
            <x-no-services />
        </div>
    </div>
</div>
@endif
@endsection
