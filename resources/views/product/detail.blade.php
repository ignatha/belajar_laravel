@extends('master.app')
@section('content')
<div class="p-16">

    <div class="w-full">
            <a href="/user/add" class="btn btn-accent">Add</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>{{$product->price}}</td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td>{{$product->stock}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
