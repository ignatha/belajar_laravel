@extends('master.app')
@section('content')
<h1>selamat datang {{ 'data' }}</h1>
@php

    $test = "ini isi variable";

@endphp

{{ $test }}

@for ($i=0;$i<10;$i++)
    {{ $i }}
@endfor

@php
    $array = ['satu','dua','tiga'];
    $rank = 10;
@endphp

@foreach ( $array as $number )
    {{ $number }}
@endforeach

@if ($rank = 10)
    {{ 'benar' }}

    <a href="#" >link</a>
@else
    {{ 'salah' }}
@endif

@endsection
