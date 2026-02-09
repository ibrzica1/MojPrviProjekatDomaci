@extends("layout")
@section("pageTitle")
    All Products
@endsection
@section("content")
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Descriprion</th>
      <th scope="col">Amount</th>
      <th scope="col">Price</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allProducts as $product)
        <tr>
            <th>{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->amount}}</td>
            <td>{{$product->price}}</td>
            <td>
                <a href="/admin/delete-product/{{$product->id}}" class="btn btn-danger">Delete</a>
                <a class="btn btn-primary">Edit</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
    
@endsection

