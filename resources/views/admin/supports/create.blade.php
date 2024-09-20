<h1>New Question</h1>

{{-- $errors injected automalatically inside all the views --}}
@if ($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('support.store') }}" method="POST">
    @csrf()

    {{--

    {{ old('subject') }}
    Se existe algum valor ja preenchido no campo, ele persiste.

    --}}

    <input type="text" placeholder="Subject" name="subject" value="{{ old('subject') }}">
    <textarea name="body" cols="30" rows="5" placeholder="Description">{{ old('body') }}</textarea>
    <button type="submit">Submit</button>
</form>