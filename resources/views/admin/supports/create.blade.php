@extends('layouts.app')

@section('title', 'Create a Support')

@section('content')

    <h1>New Question</h1>

    {{-- $errors injected automalatically inside all the views --}}
    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

    <form action="{{ route('support.store') }}" method="POST">
        @include('admin.supports.partials.form')
    </form>

@endsection