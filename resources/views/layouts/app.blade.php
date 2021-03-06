<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MusicShare</title>
    <!-- Fonts -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="/css/all.css" rel="stylesheet">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                   MusicShare ♪
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::check())
                        <li><a href="{{ url('/mypage') }}"><i class="fa fa-btn fa-home"></i>MyPage</a></li>
                        <li><a href="{{ url('/mypage/likes') }}"><i class="fa fa-btn fa-star"></i>Likes</a></li>
                        <li><a href="{{ url('/favorites') }}"><i class="fa fa-heart" aria-hidden="true"></i> Favorites</a></li>
                        <li><a href="{{ url('/my-playlists') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> My Lists</a></li>
                        <li><a href="{{ url('/my-songs') }}"><i class="fa fa-music" aria-hidden="true"></i> My Songs</a></li>
		            @endif
                    <li><a href="{{ url('/playlists') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> Playlists</a></li>
                    <li><a href="{{ url('/users') }}"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/mypage') }}"><i class="fa fa-btn fa-home"></i>MyPage</a></li>
                                <li><a href="{{ url('/mypage/likes') }}"><i class="fa fa-btn fa-star"></i>Likes</a></li>
                                <li><a href="{{ url('/favorites') }}"><i class="fa fa-heart" aria-hidden="true"></i> Favorites</a></li>
                                <li><a href="{{ url('/my-playlists') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> My Lists</a></li>
                                <li><a href="{{ url('/my-songs') }}"><i class="fa fa-music" aria-hidden="true"></i> My Songs</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <script src="/js/all.js"></script>
</body>
</html>
