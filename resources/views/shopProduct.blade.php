@extends("layout")
@section("pageTitle")
    Shop Product
@endsection
@section("content")
    @if(session('error'))
        <p>Error: {{session('error')}}</p>
    @endif
    <p>name: {{$product->name}}</p> <br>
    <p>description: {{$product->description}}</p> <br>
    <p>amount: {{$product->amount}}</p> <br>
    <p>price: {{$product->price}}</p> <br>
    <form action="{{route('cart.add')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="number" name="amount" placeholder="Enter amount">
        <button type="submit">Add to cart</button>
    </form>
@endsection