@extends('layouts.default')

@section('content')
@auth
<livewire:layout.navigation />
@endauth
@livewire('services', ['services' => $services])
@endsection
