@extends("layout")
@section("pageTitle")
    Cart
@endsection
@section("content")
    @foreach($products as $key => $value)
    
        <p>{{$key}}</p>
        <p>{{$value}}</p>
        
    @endforeach
@endsection