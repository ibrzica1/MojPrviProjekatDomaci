@extends("layout")
@section("pageTitle")
    Edit Contact
@endsection
@section("content")
    <form action="{{route('changeContact',['contactId' => $contact->id])}}" 
    method="post" class="col-10 col-md-8 col-lg-6 p-4 mb-3">
        @if($errors->any())
            <p>Error: {{$errors->first()}}</p>
        @endif
        @csrf
        @method('PATCH')
        <h3>Edit Contact</h3>
        <label for="">Email</label>
        <input type="email" name="email" class="form-control mb-3" 
        value="{{$contact->email}}">
        <label for="">Title</label>
        <input type="text" name="title" class="form-control mb-3" 
        value="{{$contact->title}}">
        <label for="">Message</label>
        <input type="text" name="message" class="form-control mb-3" 
        value="{{$contact->message}}">
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
@endsection