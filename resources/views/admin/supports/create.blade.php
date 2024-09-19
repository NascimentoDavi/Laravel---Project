<h1>New Question</h1>

<form action="{{ route('support.store') }}" method="POST">

    <input type="text" placeholder="Subject" name="subject">

    {{-- <input type="text" value="{{ csrf_token() }}" name="_token">  <!-- OBS: Do not forget name tag! Validate that the request is actually valid --> --}}
    @csrf() <!-- diretiva que cria token automaticamente --> 
    
    <textarea name="body" cols="30" rows="5" placeholder="Description"></textarea>
    
    <button type="submit">Submit</button>
</form>