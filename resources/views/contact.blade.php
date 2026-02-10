@extends("layout")
@section("pageTitle")
    Contact
@endsection
@section("content")
    <form action="{{route('addContact')}}" method="post" class="col-10 col-md-8 col-lg-6 p-4 mb-3">
        @if($errors->any())
            <p>Error: {{$errors->first()}}</p>
        @endif
        @csrf
        <h3>Contact Form</h3>
        <input type="email" name="email" class="form-control mb-3" 
        id="FormControlInput1" placeholder="Your email">
        <input type="text" name="title" class="form-control mb-3" 
        id="FormControlInput2" placeholder="Title">
        <textarea class="form-control mb-3" name="message" id="FormTextarea1" 
        rows="3" placeholder="Message"></textarea>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
@endsection