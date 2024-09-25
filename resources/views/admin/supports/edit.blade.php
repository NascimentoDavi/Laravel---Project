@extends('layouts.app')

@section('title', 'Edit ' . $support->id ?? 'Default Title')

@section('content')

    <h1>Edit Question {{ $support->id }}</h1>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

    <form action="{{ route('support.update', $support->id) }}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form', [
            'support' => $support
        ])
    </form>
    
@endsection