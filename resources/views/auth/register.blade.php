@extends('layouts.start')

@section('linkspace')
    <a href="{{route("login")}}">Login</a>
@endsection

@section('content')
    <div class="introduction">
        <h2>Register</h2>
        <form action="{{'register'}}" method="post">
            @csrf
            <div class="input-container">
                <label for="username" class="input-label">Your username</label>
                <input id="username" type="text" name="username" class="input-field" placeholder="Username" value="{{old('username')}}" required>
                @error("username")
                    <p class="error-p">{{$message}}</p>
                @enderror
            </div>


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

            <div class="input-container">
                <label for="password_confirmation" class="input-label">Repeat password</label>
                <input id="password_confirmation" type="password" class="input-field" name="password_confirmation" placeholder="Repeat your password" value="" required>
            </div>

            <div>
                <button class="btn btn-submit" name="register" type="submit">Register</button>
            </div>

        </form>
    </div>
 
@endsection