@extends("layout")
@section("pageTitle")
    Main page
@endsection
@section("content")
    <p>{{$pozdrav}}</p> <br>
    <p>Trenutno vrijeme je {{$trenutnoVrijeme}}</p> <br>
    <p>Trenutni sat je {{$trenutniSat}}</p>
@endsection