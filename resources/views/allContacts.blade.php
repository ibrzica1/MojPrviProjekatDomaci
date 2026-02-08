
@extends("layout")
@section("pageTitle")
    All Contacts
@endsection
@section("content")
    @foreach($contacts as $contact)
        <p>email: {{$contact->email}}</p> <br>
        <p>title: {{$contact->title}}</p> <br>
        <p>message: {{$contact->message}}</p> <br>
    @endforeach
@endsection