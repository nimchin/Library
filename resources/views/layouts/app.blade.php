<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="min-height: 100%; overflow-x: hidden">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">

    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('/img/icons/main_icon.png')}}" style="height: 40px; width: 40px" alt="">
                    {{'Library'}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="search">
                            <form action="{{route('search')}}">
                                <input class="search_input" type="text" name="searched_text" placeholder="Search...">
                                <input class="search_button" type="submit">
                            </form>
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(auth()->user()->id == App\Role::ARCHIVE_ADMIN_ROLE_ID)
                                        <a class="dropdown-item" href="{{ route('cart') }}">
                                            {{ __('app.Cart') }}
                                        </a>
                                    @endif
                                    @if(auth()->user()->id == App\Role::ARCHIVE_ADMIN_ROLE_ID || (auth()->user()->id == App\Role::HALL_ADMIN_ROLE_ID))
                                        <a class="dropdown-item" href="{{ route('admin_menu') }}">
                                            {{ __('app.admin_menu') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('app.Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="background: url({{asset('img/background.jpg')}}) repeat-y">
            @yield('content')
        </main>
    </div>
@yield('scripts')
</body>
<footer>
    <div class="footer_img">
        <img src="{{asset('img/footer_line.png')}}" height="80" width="80%" alt="">
    </div>
    <div class="contacts">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8990.304378634853!2d30.42908997321109!3d50.439231977841644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cc19611bed05%3A0x193f71dcd11c83ae!2z0YPQuy4g0JPQsNGA0LzQsNGC0L3QsNGPLCA1MSwg0JrQuNC10LIsIDAyMDAw!5e0!3m2!1sru!2sua!4v1572820624214!5m2!1sru!2sua" width="700" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    <div class="contacts_info">
        {{'Contacts'}}
        <div class="contact_number">
            {{'+38(066)107-42-53'}}
        </div>
    </div>
    </div>
    <div class="footer">
        &copy; 2019 Copyrighted by Max Nimchin
    </div>
</footer>
</html>
