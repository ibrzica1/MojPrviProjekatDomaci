@extends("layout")
@section("pageTitle")
    Cart
@endsection
@section("content")
    @foreach($products as $product)
        
        <p>{{$product['product']['name']}} - {{$product['amount']}}</p>

    @endforeach
@endsection