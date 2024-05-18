@extends('layouts.default')

@section('content')

@auth
<livewire:layout.navigation />
@endauth
<livewire:edit-request :request="$request" :description="$description" />
@endsection
