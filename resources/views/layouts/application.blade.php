<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>XGames</title>
    @yield('maincss')
    <link rel="stylesheet" href="../css/fh.css" type="text/css">
    <link rel="stylesheet" href="../css/fonts.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<div id="wrapper">
    <header>
        <nav style="width: auto; margin: 0px; padding: 0px">
            <ul class="top-menu">
                <li><a href="/"><img src="../images/logo.png" alt="X-Games logo" width="180" height="50"> </a></li>
                <li><a href="{{route('myhome')}}">ГЛАВНАЯ</a></li>
                <li><a href="{{route('catalog')}}">КАТАЛОГ</a></li>
                <li><a href="{{route('support')}}">ПОМОЩЬ</a></li>
                <li><a href="{{route('contacts')}}">КОНТАКТЫ</a></li>
                @auth
                    @if(Auth::user()->IdRole === 1 || Auth::user()->IdRole === 2)
                        <li><a href="{{route('user')}}">ПОЛЬЗОВАТЕЛИ</a></li>
                    @endif
                @endauth
                <li>
                    @auth
                        <a href="{{route('get-logout')}}"><i class="bi bi-box-arrow-left"></i></a>
                    @endauth
                    @guest
                        <a href="{{route('login')}}"><i class="bi bi-box-arrow-in-right"></i></a>
                        <a href="{{route('register')}}"><i class="bi bi-person-circle"></i></a>
                    @endguest
                </li>
            </ul>
        </nav>
    </header>

    <div>
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
            @if(session()->has('warning'))
                <p class="alert alert-warning">{{session()->get('warning')}}</p>
            @endif
    </div>
    @yield('information')

</div>
<footer>
    <div id="footer">
        <div id="sitemap">
            <h3>КАРТА САЙТА</h3>
            <div>
                <a href="{{route('myhome')}}">ГЛАВНАЯ</a>
                <a href="{{route('catalog')}}">КАТАЛОГ</a>
            </div>
            <div>
                <a href="{{route('support')}}">ПОМОЩЬ</a>
                <a href="{{route('contacts')}}">КОНТАКТЫ</a>
            </div>
        </div>
        <div id="social">
            <h3>СОЦИАЛЬНЫЕ СЕТИ</h3>
            <a href="/" class="social-icon twitter"></a>
            <a href="/" class="social-icon facebook"></a>
            <a href="/" class="social-icon google-plus"></a>
            <a href="/" class="social-icon-small vimeo"></a>
            <a href="/" class="social-icon-small youtube"></a>
            <a href="/" class="social-icon-small flickr"></a>
            <a href="/" class="social-icon-small instagram"></a>
            <a href="/" class="social-icon-small rss"></a>
        </div>
        <div id="footer-logo">
            <a href="/"><img src="../images/footer-logo2.png" alt="X-Games logo" width="160" height="40"></a>
            <p>Copyright © 2021 XGames.</p>
        </div>
    </div>
</footer>
</body>
</html>
