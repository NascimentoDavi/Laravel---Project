@extends('layouts.app')

@section('title', 'Info regarding ' . $support->id ?? 'Default Title')

@section('content')

    <h1>Details about the questions {{ $support->id }}</h1>

    <ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>
    </ul>

    <x-delete :action="route('support.destroy', $support->id)"></x-delete> <!-- Passa a rota para o componente -->
    
@endsection