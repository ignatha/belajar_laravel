@extends('master.app')
@section('content')
<div class="p-16">
<form action="{{route('admin.store')}}" method="POST" class="w-full gap-4 flex flex-col" >
    {{ csrf_field() }}
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="username" placeholder="Username" />
            </label>
            @error('username')
                <span class="text-red-300">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
                <input type="password" class="grow" name="password" placeholder="Password" />
            </label>
            @error('password')
                <span class="text-red-300">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full">
            <input type="submit" value="Save" class="btn btn-accent">
        </div>
    </form>
</div>
@endsection
