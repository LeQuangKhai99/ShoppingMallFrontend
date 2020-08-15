@extends('layouts.master')
@section('title')
    <title>Đăng nhập</title>
@endsection
@section('css')
    <link href="{{asset('/home/home.css')}}>">
@endsection

@section('js')
    <script src="{{asset('/home/home.js')}}"></script>
@endsection
@php
    $base_url = config('app.base_url');
@endphp
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="{{route('login.login')}}" method="post">
                            @csrf
                            <input name="email" type="email" placeholder="Email Address" />
                            <input type="password" name="pass" placeholder="Password" />
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="{{route('login.register')}}" method="post">
                            @csrf
                            <input value="{{old('name')}}" name="name" type="text" placeholder="Name"/>
                            <input value="{{old('email')}}" name="email" type="email" placeholder="Email Address"/>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input name="pass" type="password" placeholder="Password"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    @endsection
