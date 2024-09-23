@extends('layouts.app')

@section('title', 'Supports Page')

@section('content')

    <h1>Support List</h1>

    <a href="{{ route('support.create') }}">Ask Something</a>

    <table>
        <thead>
            <th>Subject</th>
            <th>Status</th>
            <th>Description</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($supports as $support)
                <tr>
                    <td>{{ $support->subject }}</td>
                    <td>{{ $support->status }}</td>
                    <td>{{ $support->body }}</td>
                    <td>
                        <a href="{{ route('support.show', $support->id) }}">Ir</a>
                        <a href="{{ route('support.edit', $support->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection