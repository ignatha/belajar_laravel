@extends('master.app')
@section('content')
<div class="p-16">
<form action="{{route('category.update')}}" method="POST" class="w-full gap-4 flex flex-col" >
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="name" placeholder="name" value="{{$category->name}}" />
            </label>
            @error('name')
                <span style="font-size: 10px;color:red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full">
            <input type="submit" class="btn btn-accent">
        </div>
    </form>
</div>
@endsection
