<div class="delete">
    <form action="{{ $action }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

</div>