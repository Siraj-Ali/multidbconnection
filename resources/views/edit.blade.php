@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <form method="post" action="{{route('update.product')}}" enctype= multipart/form-data>
               @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Title</label>

                            <div class="col-md-10">
                                <input id="name"  type="text" class="form-control" name="name"
                                required autocomplete="name" autofocus value="{{$products->title}}"
                                >
                                <input id="id"  type="hidden" name="id"
                                 value="{{$products->id}}"
                                >
                                <input id="id"  type="hidden" name="db"
                                 value="{{$con}}"
                                >
                                <has-error  field="name"></has-error>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Price</label>

                            <div class="col-md-10">
                                <input id="price"  type="text" class="form-control" value="{{$products->price}}" name="price" value="" required autocomplete="email" 
                                >
                                <has-error  field="price"></has-error>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="quantity" class="col-md-2 col-form-label text-md-right">Quantity</label>

                            <div class="col-md-10">
                                <input id="quantity"  type="number" class="form-control" value="{{$products->quantity}}" name="quantity" value="" required autocomplete="email" 
                                >
                                <has-error  field="price"></has-error>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Availability</label>

                            <div class="col-md-10">
                                <input id="availability"  type="text" class="form-control " value="{{$products->availability}}" name="availability" autocomplete="new-password" 
                                >
                                <has-error field="availability"></has-error>

                            </div>
                        </div>
                        
                        <div class="form-group text-right row col-4" style="padding-left: 192px;">
                          
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <button type="submit" class="btn btn-primary block">
                            Update
                            
                          </button>
                          <a href="{{route('home')}}" class="btn btn-dark block">
                            Back
                            
                          </a>
                          </div>
               </form>
          </div>
        </div>

       
</div>
@endsection
