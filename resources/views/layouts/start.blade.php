<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/start.css')}}">

    <title>FAQ</title>
</head>
<body>
    <header>
        <h1>FAQ</h1>
        <div class="infoblock">
            <a id="leaderboardLink" href="{{route('leaderboard')}}">Leaderboard</a>
            @yield('linkspace')
        </div>
    </header>
    <main>
        @yield('content')
    </main>  
</body>
</html>