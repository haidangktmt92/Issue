@extends('layouts.app')
@section('content')

<div class="container">
    <h1> Xin Chao: {{ Auth::user()->name }}</h1>

</div>

@stop