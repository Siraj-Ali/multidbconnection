@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-3 text-right">
          <a href="{{route('create.product')}}" class="btn btn-block btn-success right">New Product</a>
</div>
          <div class="col-12">
          @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">Database One Products</h3>

                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Availability</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($sqlProducts as $product)
                      <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->availability}}</td>
                        <td>{{$product->created_at}}</td>
                        <td><a href="{{route('edit.product', ['product'=>$product->id, 'one'])}}" class="btn btn-block btn-success right">Edit</a>
                        <td><a href="{{route('destroye.product', ['product'=>$product->id, 'one'])}}" class="btn btn-block btn-danger right">Delete</a>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">Second Database Products</h3>

                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Availability</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($sql2Products as $product)
                      <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->availability}}</td>
                        <td>{{$product->created_at}}</td>
                        <td><td><a href="{{route('edit.product', ['product'=>$product->id, 'two'])}}" class="btn btn-block btn-success right">Edit</a>
                        <td><a href="{{route('destroye.product', ['product'=>$product->id, 'two'])}}" class="btn btn-block btn-danger right">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

        
</div>
<script>
  function editProduct(data) {
    console.log(data);
  }
</script>
@endsection
