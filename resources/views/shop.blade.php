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
        <a href="{{route('product.page',['product' => $product->id])}}" 
        class="btn btn-primary">
            See Product
        </a>
    @endforeach
@endsection