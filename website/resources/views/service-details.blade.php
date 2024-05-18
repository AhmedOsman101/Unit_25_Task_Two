@extends('layouts.default')

@section('content')
<div class="w-90 min-h-screen flex flex-wrap justify-center pt-20">
    @livewire('service', ['service' => $service])
</div>

@endsection
