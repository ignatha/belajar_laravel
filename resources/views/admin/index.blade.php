@extends('master.app')
@section('content')
<div class="p-16">

    <div class="w-full">
            <a href="{{route('admin.add')}}" class="btn btn-accent">Add</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            @forelse ($userAdmin as $user)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$user->username}}</td>
                <td>
                    {{-- <a href="{{route('product.detail',['id'=>$product->id])}}" class="btn btn-primary">Detail</a>
                    <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-secondary">Edit</a>
                    <form action="{{route('product.delete',['id'=>$product->id])}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" value="Delete" class="btn btn-accent">
                    </form> --}}
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Kosong</td>
                </tr>
            @endforelse
             {{-- @foreach ($products as $product)
                <tr>
                    <td>{{$loop->index}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->tumbnail}}</td>
                    <td></td>
                </tr>
             @endforeach --}}

            </tbody>
        </table>
    </div>
</div>
@endsection
