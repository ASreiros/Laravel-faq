@extends('layouts.start')

@section('linkspace')
    <a href="{{route("login")}}">Login</a>
    <a style="margin-left: 20px" href="{{route("register")}}">Register</a>
@endsection

@section('content')
    <div class="introduction">
        <h2>Forgot your password?</h2>
        <form action="{{route('password.email')}}" method="post">
            @csrf

            <div class="input-container">
                <label for="email" class="input-label">Your email</label>
                <input  id="email" type="email" name="email" class="input-field" placeholder="Email"  required>
                @error("email")
                    <p class="error-p">{{$message}}</p>
                @enderror
            </div>
            
                
            <div>
                <button class="btn btn-submit" type="submit">Reset my password</button>
            </div>

        </form>
    </div>
 
@endsection