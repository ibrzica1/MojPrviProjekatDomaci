@extends("layout")
@section("pageTitle")
    Edit Product
@endsection
@section("content")
    <form action="{{route('product.change',['product' => $product->id])}}" 
    method="post" class="col-10 col-md-8 col-lg-6 p-4 mb-3">
        @if($errors->any())
            <p>Error: {{$errors->first()}}</p>
        @endif
        @csrf
        @method('PATCH')
        <h3>Edit Product</h3>
        <label for="">Name</label>
        <input type="text" name="name" class="form-control mb-3" 
        value="{{$product->name}}">
        <label for="">Description</label>
        <input type="text" name="description" class="form-control mb-3" 
        value="{{$product->description}}">
        <label for="">Amount</label>
        <input type="number" name="amount" class="form-control mb-3" 
        value="{{$product->amount}}">
        <label for="">Price</label>
        <input type="number" name="price" class="form-control mb-3" 
        value="{{$product->price}}">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control mb-3">
        
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
@endsection