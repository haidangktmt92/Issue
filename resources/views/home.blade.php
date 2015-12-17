@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Welcome
            </div>
            <div class="panel-body">
                Please <a href="/auth/login">login</a> or <a href="/auth/register">register</a>
            </div>
        </div>    
    </div>
</div>
@stop