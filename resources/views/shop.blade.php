@extends("layout")
@section("pageTitle")
    Shop
@endsection
@section("content")
    @foreach($allProducts as $product)
        <p>name: {{$product->name}}</p> <br>
        <p>description: {{$product->description}}</p> <br>
        <p>amount: {{$product->amount}}</p> <br>
        <p>price: {{$product->price}}</p> <br>
    @endforeach
@endsection