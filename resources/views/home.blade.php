@extends('master.app')
@section('content')
<div class="p-16">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div>
        Ini Halaman Home
    </div>
</div>
@endsection
