<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-5" style="text-align:center">
            <h3>Sign Up</h3>
             @include('common.errors')
            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}

                <div class="form-group">
                    
                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    
                    <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                </div class="form-group">

                <div class="form-group">
                    
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

            
        </div>
        <div id="line-div" class="col-md-1" style="text-align:center" >
            <div style="border-right:1px solid #ccc;height:120px"></div>
            <span><h4 style="margin-left:50px">OR</h4></span>
            <div style="border-right:1px solid #ccc;height:120px"></div>
        </div>

        <div class="col-md-6" style="text-align:center; margin-top:60px">
            <h4>
                Easily Sign up with Facebook or Google  <br>
                Take full advantage of your Recruiment network <br>
            </h4>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <a href="/auth/facebook" class="btn btn-lg btn-primary btn-blok btn-sm">Login With Facebook</a>
                </div>
                <div class="col-md-4">
                    <a href="/auth/google" class="btn btn-lg btn-info btn-blok btn-sm">Login With Google</a>
                </div>
                <div class="col-md-4">
                    <a href="/auth/twitter" class="btn btn-lg btn-info btn-blok btn-sm">Login With Twitter</a>
                </div>
            </div>
        </div>
    </div>

@stop





