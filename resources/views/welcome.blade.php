@extends("layout")
@section("pageTitle")
    Main page
@endsection
@section("content")
    @foreach($newestProducts as $newestProduct)
        <p>name: {{$newestProduct->name}}</p> <br>
        <p>description: {{$newestProduct->description}}</p> <br>
        <p>amount: {{$newestProduct->amount}}</p> <br>
        <p>price: {{$newestProduct->price}}</p> <br>
    @endforeach
@endsection