<h1>Edit Question {{ $support->id }}</h1>

<form action="{{ route('support.update', $support->id) }}" method="POST">
    {{-- <input type="text" value="{{ csrf_token() }}" name="_token">  <!-- OBS: Do not forget name tag! Validate that the request is actually valid --> --}}
    @csrf() <!-- diretiva que cria token automaticamente --> 
    @method('PUT') <!-- hidden information: -->
    <input type="text" placeholder="Subject" name="subject" value="{{ $support->subject }}">

    
    <textarea name="body" cols="30" rows="5" placeholder="Description" name="body">{{ $support->body }}</textarea>
    
    <button type="submit">Submit</button>
</form>