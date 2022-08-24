<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>FAQ</title>
</head>
<body>
    <header>
        <h1>FAQ</h1>
        <div>

            @auth
                <form class="infobar" action="{{route("restart")}}" method="POST">
                    @csrf
                    <button class="btn-link" type="submit">Start from the beggining</button>
                </form>
                <p class="username">Name: {{auth()->user()->username}}</p>
                <form class="infobar" action="{{route("logout")}}" method="POST">
                    @csrf
                    <button class="btn-link" type="submit">Logout</button>
                </form>
            @endauth
            @guest
                <a id="login" class="infobar" href="/login">Login</a>
                <a id="register" class="infobar" href="{{route('register')}}">Register</a>
            @endguest

        </div>  
    </header>
    <main>
        @yield('content')
    </main>  
</body>
</html>