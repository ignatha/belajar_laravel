@extends('master.app')
@section('content')
<div class="p-16">
<form action="{{route('product.store')}}" method="POST" class="w-full gap-4 flex flex-col" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="name" placeholder="name" />
            </label>
            @error('name')
                <span class="text-red-300 text-xs font-light">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="price" placeholder="price" />
            </label>
            @error('price')
                <span class="text-red-300 text-xs font-light">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
            <input type="text" class="grow" name="stock" placeholder="stock" />
            </label>
            @error('stock')
                <span class="text-red-300 text-xs font-light">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
            <input type="file" class="grow" name="tumbnail" />
            </label>
            @error('tumbnail')
                <span class="text-red-300 text-xs font-light">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full">
            <input type="submit" class="btn btn-accent">
        </div>
    </form>
</div>
@endsection
