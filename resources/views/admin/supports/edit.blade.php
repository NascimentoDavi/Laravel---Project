@extends('layouts.app')

@section('title', 'Edit ' . $support->id ?? 'Default Title')

@section('content')

    <h1>Edit Question {{ $support->id }}</h1>

    <x-alert/>

    <form action="{{ route('support.update', $support->id) }}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form', [
            'support' => $support
        ])
    </form>
    
@endsection