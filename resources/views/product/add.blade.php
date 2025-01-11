@extends('master.app')
@section('content')
<div class="p-16">
<form action="{{route('product.store')}}" method="POST" class="w-full gap-4 flex flex-col" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="name" placeholder="name" />
            </label>
        </div>
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="price" placeholder="price" />
            </label>
        </div>
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
            <input type="text" class="grow" name="stock" placeholder="stock" />
            </label>
        </div>
        <div class="w-full">
            <input type="submit" class="btn btn-accent">
        </div>
    </form>
</div>
@endsection
