@extends('layouts.start')


@section('linkspace')
    <a id="registerLink" class="selector1" href="{{route("register")}}">Register</a>
@endsection

@section('content')
    <div class="introduction">
        <h2>Login</h2>
        <form action="{{'login'}}" method="post">
            @csrf
            <div class="input-container">
                <label for="email" class="input-label">Your email</label>
                <input id="email" type="email" name="email" class="input-field" placeholder="Email" value="{{old('email')}}" required>
                @error("email")
                    <p class="error-p">{{$message}}</p>
                @enderror
            </div>

            <div class="input-container">
                <label for="password" class="input-label">Your password</label>
                <input id="password" type="password" name="password" class="input-field" placeholder="Password" value="" required>
                @error("password")
                    <p class="error-p">{{$message}}</p>
                @enderror
            </div>
            @if (session('status'))
                <div class="input-container">
                    <p style="color:rgb(242, 110, 110); text-align:center">{{session('status')}}</p>
                </div>    
            @endif
            <div class="remember-container">
                <input type="checkbox" name="remember" class="remember" name="remember">
                <label for="remember" class="input-label">Remember me</label>
            </div>


            <div>
                <button class="btn btn-submit" type="submit">Login</button>
            </div>

            <div class="input-container">
                <a id="forgotPasswordLink" href="{{route('password.request')}}">Forgot password?</a>
            </div>
           

        </form>
    </div>
 
@endsection