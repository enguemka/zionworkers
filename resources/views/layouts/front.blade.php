<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('metas')
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/zw-favicon.png') }}">
    <script src="https://kit.fontawesome.com/63e09fca88.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>
<div class="container-fluid p-0" id="app" style="background-color: #fff;">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #fff;">
        <a class="navbar-brand" href="{{route('welcome')}}">
            <img src="{{ asset('zw-brand-logo.svg') }}" width="60" height="37" class="d-inline-block align-top" alt="">
            <span class="zw-brand-name">Zion</span><span class="zw-brand-name zw-brand-lower">Workers</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('series') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('series')}}">Series</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('artwork')}}">Artwork</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <search-btn></search-btn>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Get Started!') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('my.account.index') }}"><i class="far fa-user-circle"></i> My Account</a>
                            <subs-btn></subs-btn>
                            <watch-btn></watch-btn>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    @yield('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto">
            <a class="nav-link nav-link-sm disabled" href="#" tabindex="-1" aria-disabled="true">2020 All Rights Reserved</a>
            <a class="nav-link nav-link-sm" href="{{route('privacy')}}" aria-disabled="true">Privacy</a>
            <a class="nav-link nav-link-sm" href="{{route('terms')}}" aria-disabled="true">Terms</a>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link nav-link-sm" href="https://www.instagram.com/zionworkers/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-sm" href="https://www.facebook.com/zionworkers" target="_blank"><i class="fab fa-facebook-square"></i> Facebook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-sm" href="https://twitter.com/zionworkers" target="_blank"><i class="fab fa-twitter-square"></i> Twitter</a>
            </li>
        </ul>
    </nav>
    <search></search>
    @auth
    <subscriptions></subscriptions>
    <watch-list></watch-list>
    @endauth
    <notification></notification>
</div>

<script>
    @auth
        window.User = {!! json_encode(Auth::user(), true) !!};
    @else
        window.User = {};
    @endauth
</script>
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
