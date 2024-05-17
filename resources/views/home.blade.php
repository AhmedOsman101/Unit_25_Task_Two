@extends('layouts.default')

@section('content')
<div
    class="w-full relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 ">
    @if (Route::has('login'))
    <livewire:welcome.navigation />
    @endif

    <x-hero class="w-full" />
</div>
@endsection
