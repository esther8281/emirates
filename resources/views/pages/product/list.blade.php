@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Product Lists</h3>
    <table border="1">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Sku</th>
            <th>Price</th>
            <th>Image</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </thead>
        <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->sku}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{url('images/'.$product->image)}}" width="50" height="50"></td>
                    <td>{{$product->status}}</td>
                    <td><a href="{{url('product/edit/'.$product->id)}}">Edit</a></td>
                    <td><a href="{{url('product/delete/'.$product->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
