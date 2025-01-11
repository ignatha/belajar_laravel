@extends('master.app')
@section('content')
<div class="p-16">
<form action="{{route('product.update',['id'=>$product->id])}}" method="POST" class="w-full gap-4 flex flex-col" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="name" placeholder="name" value="{{$product->name}}" />
            </label>
        </div>
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" value="{{$product->price}}" name="price" placeholder="price" />
            </label>
        </div>
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
            <input type="text" class="grow" name="stock" value="{{$product->stock}}" placeholder="stock" />
            </label>
        </div>
        <div class="w-full">
            <input type="submit" class="btn btn-accent">
        </div>
    </form>
</div>
@endsection
