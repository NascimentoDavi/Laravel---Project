@extends('layouts.app')

@section('title', 'Supports Page')

@section('content')

    <h1>Support List</h1>

    <a href="{{ route('support.create') }}" class="btn btn-primary">Ask Something</a>

    <div class="container my-4">

        <div class="table-responsive">

            <table class="table 
            table-secondary 
            table-striped 
            table-hover 
            table-borderless 
            table-sm 
            caption-top">

                <thead class="table-dark">
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Look</th>
                    <th>Edit</th>
                </thead>

                <tbody class="table-group-divider">

                    @foreach ($supports->items() as $support)

                        <tr>
                            <td>{{ $support->subject }}</td>
                            <td>{{ getStatusSupport($support->status) }}</td>
                            <td>{{ ($support->body) }}</td>
                            <td>
                                <a href="{{ route('support.show', $support->id) }}" class="text-decoration-none">Ir</a>
                            </td>
                            <td>
                                <a href="{{ route('support.edit', $support->id) }}" class="text-decoration-none">Edit</a>
                            </td>
                        </tr>
                        
                    @endforeach
                    
                </tbody>
                
                
                <caption class="bg-light text-dark text-center border border-secondary">
                    Support List
                </caption>
                
            </table>
        </div>
    </div>
    
    <x-pagination :paginator="$supports" />

@endsection