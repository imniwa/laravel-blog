<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <h1>MENU</h1>
            </li>
            <li><a href="{{ route('post') }}">Post</a></li>
            <li><a href="{{ route('account') }}">Akun</a></li>
            @if(Auth::check())
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif
        </ul>
    </nav>
    <div>
        @yield('body')
    </div>
</body>

</html>
