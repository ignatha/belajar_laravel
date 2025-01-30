@extends('master.app')
@section('content')
<div class="p-16">

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Product</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            @forelse ($users as $user)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{ ($user->product) ? $user->product->name : '' }}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">Kosong</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection
