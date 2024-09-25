@extends('layouts.app')

@section('title', 'Create a Support')

@section('content')

    <h1>New Question</h1>

    <x-alert/>

    <form action="{{ route('support.store') }}" method="POST">
        @include('admin.supports.partials.form')
    </form>

@endsection