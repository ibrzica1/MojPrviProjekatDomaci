@extends("layout")
@section("pageTitle")
    Add Product
@endsection
@section("content")
    
<form action="/add_product" method="POST" class="col-10 col-md-8 col-lg-6 p-4 mb-3">
    @if($errors->any())
        <p>Error: {{$errors->first()}}</p>
    @endif
    @csrf
    <h3>Add New Product</h3>
  <div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">Product Description</label>
    <input type="text" class="form-control" name="description">
  </div>
  <div class="mb-3">
    <label class="form-label">Product Amount</label>
    <input type="number" name="amount" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Product Price</label>
    <input type="number" step=0.01 name="price" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Product Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection