@extends('layouts.app')

@section('title', 'Supports Page')

@section('content')

    <h1>Welcome {{ $user->name }} </h1>

    <x-carousel  />

    <x-cards-post :supports="$support"/>

@endsection