<h1>New Question</h1>

{{-- $errors injected automalatically inside all the views --}}
@if ($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('support.store') }}" method="POST">
    @csrf()

    <input type="text" placeholder="Subject" name="subject">
    <textarea name="body" cols="30" rows="5" placeholder="Description"></textarea>
    <button type="submit">Submit</button>
</form>