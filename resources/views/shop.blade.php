@extends("layout")
@section("pageTitle")
    Shop
@endsection
@section("content")
    @foreach($products as $product)
        @if($product === 'iPhone 14' || $product === 'iPhone 13 pro')
            <p>{{$product}} - SUPER SNIZENJE</p>
        @else
            <p>{{$product}}</p>
        @endif
    @endforeach
@endsection