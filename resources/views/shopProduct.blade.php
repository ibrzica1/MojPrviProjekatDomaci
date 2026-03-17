@extends("layout")
@section("pageTitle")
    Shop Product
@endsection
@section("content")
    <p>name: {{$product->name}}</p> <br>
    <p>description: {{$product->description}}</p> <br>
    <p>amount: {{$product->amount}}</p> <br>
    <p>price: {{$product->price}}</p> <br>
@endsection