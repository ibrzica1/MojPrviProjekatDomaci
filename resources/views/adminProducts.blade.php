@extends("layout")
@section("pageTitle")
    Admin Products
@endsection
@section("content")
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Amount</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
  @foreach($allProducts as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->amount}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->image}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection