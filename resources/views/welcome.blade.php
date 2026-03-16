@extends("layout")
@section("pageTitle")
    Main page
@endsection
@section("content")
    @foreach($newestProducts as $newestProduct)
        <p>name: {{$newestProduct->name}}</p> <br>
    @endforeach

    <form method="POST" action="{{route('contact.add')}}" style="display: flex; 
    flex-direction: column; width: 40%; gap: 10px; padding-left: 10px;">
    @if($errors->any())
        <p>Error: {{$errors->first()}}</p>
    @endif
    @csrf
        <input type="email" name="email" placeholder="Enter your email">
        <input type="text" name="subject" placeholder="Enter the subject">
        <textarea name="description" placeholder="Enter your message"></textarea>
        <button type="submit">Submit</button>
    </form>
@endsection