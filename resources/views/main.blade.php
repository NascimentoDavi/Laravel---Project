@extends('layouts.app')

@section('title', 'Supports Page')

@section('content')

    <h1>Welcome {{ $user->name }} </h1>

    <div class="py-2">
        <a href="{{ route('support.create') }}" class="btn btn-primary">Ask Something</a>
    </div>

    <x-carousel  />

    <x-cards-post :supports="$support"/>

@endsection