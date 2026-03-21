@extends("layout")
@section("pageTitle")
    Cart
@endsection
@section("content")
    @foreach($products as $product)
        
        <p>Name: {{$product['product']['name']}} Amount: {{$product['amount']}}
            Price: {{$product['product']['price']}} Total: {{$product['total']}}
        </p>

    @endforeach

    <a href="" class="btn btn-primary">
        Order
    </a>
@endsection