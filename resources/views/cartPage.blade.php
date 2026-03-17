@extends("layout")
@section("pageTitle")
    Cart
@endsection
@section("content")
    @foreach($products as $product)
    
        <p>{{$product['product_id']}} - {{$product['amount']}}</p>

    @endforeach
@endsection