@extends('layouts.app')

@section('content')
<div class="container">
    
    <form method="post" name="registerform" enctype="multipart/form-data" action="{{url('product/update/'.$product->id)}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <label>Name</label>
                <input type="text" name="pname" placeholder="Product Name" class="form-control" value="{{$product->name}}" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>SKU</label>
                <input type="number" name="psku" placeholder="Product SKU" class="form-control" required="" value="{{$product->sku}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Price</label>
                <input type="text" name="price" placeholder="Product Price" class="form-control" required="" value="{{$product->price}}">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Image</label>
                <input type="file" name="image"  class="form-control" >
                <br/>
                <img src="{{url('images/'.$product->image)}}" width="50" height="50">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Approved" {{$product->status == 'Approved' ? "selected":""}}>Approved</option>
                    <option value="Rejected"  {{$product->status == 'Rejected' ? "selected":""}}>Rejected</option>
                </select>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
               <button type="submit" class="btn btn-primary">Update</button> 
            </div>
        </div>
    </form>
</div>
@endsection
