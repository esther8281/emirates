@extends('layouts.app')

@section('content')
<div class="container">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <form method="post" name="registerform" enctype="multipart/form-data" action="{{url('product/save')}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <label>Name</label>
                <input type="text" name="pname" placeholder="Product Name" class="form-control" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>SKU</label>
                <input type="number" name="psku" placeholder="Product SKU" class="form-control" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Price</label>
                <input type="text" name="price" placeholder="Product Price" class="form-control" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Image</label>
                <input type="file" name="image"  class="form-control" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
               <button type="submit" class="btn btn-primary">Submit</button> 
            </div>
        </div>
    </form>
</div>
@endsection
