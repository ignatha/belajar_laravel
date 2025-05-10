@extends('master.app')
@section('content')
<div class="p-16">

    <div class="w-full">
            <a href="{{route('category.add')}}" class="btn btn-accent">Add</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            @forelse ($categories as $category)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>
                    <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-secondary">Edit</a>
                    <form action="{{route('category.delete',['id'=>$category->id])}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" value="Delete" class="btn btn-accent">
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Kosong</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
