@extends('layouts.start')

@section('linkspace')
    <a href="{{route("login")}}">Login</a>
    <a style="margin-left: 20px" href="{{route("register")}}">Register</a>
@endsection

@section('content')
    <div class="introduction">
        <h2>Update password</h2>
        <form action="/reset-password" method="post">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <div class="input-container">
                <label for="email" class="input-label">Your email</label>
                <input  id="email" type="email" name="email" class="input-field" placeholder="Email"  required>
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
                <button class="btn btn-submit" type="submit">Update my password</button>
            </div>

        </form>
    </div>
 
@endsection