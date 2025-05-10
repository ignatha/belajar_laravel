@extends('master.app')
@section('content')
<div class="p-16">
<form action="{{route('category.store')}}" method="POST" class="w-full gap-4 flex flex-col" >
    {{ csrf_field() }}
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="name" placeholder="name" />
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
