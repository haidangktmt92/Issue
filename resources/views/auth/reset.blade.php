@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-md-5" style="text-align:center">
        <form method="POST" action="/password/reset">
            {{ csrf_field()}}
             @include('common.errors')


             <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="New Password" />
            </div>
             <div class="form-group">        
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">
                    Reset Password
                </button>
            </div>  
        </form>
    </div> 
</div>

@stop