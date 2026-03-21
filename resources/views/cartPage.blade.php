@extends("layout")
@section("pageTitle")
    Cart
@endsection
@section("content")
    @if(session('error'))
        <p>Error: {{session('error')}}</p>
    @endif
    
    @foreach($products as $product)
        
        <p>Name: {{$product['product']['name']}} Amount: {{$product['amount']}}
            Price: {{$product['product']['price']}} Total: {{$product['total']}}
        </p>

    @endforeach

    <form action="{{route('order.add')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Order</button>
    </form>
@endsection