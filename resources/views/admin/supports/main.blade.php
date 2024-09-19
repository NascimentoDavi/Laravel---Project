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
                <td>{{ $support-subject }}</td>
                <td>{{ $support-status }}</td>
                <td>{{ $support-body }}</td>
                <td>
                    >
                </td>
            </tr>
        @endforeach
    </tbody>
</table>