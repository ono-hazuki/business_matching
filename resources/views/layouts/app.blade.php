<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/change.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ビジネスマッチング
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 mt-3">
                        <li><a href=/demands/create class="nav-link px-3 link-secondary text-secondary">案件を作成</a></li>
                        <li><a href=/my_demands class="nav-link px-3 link-secondary text-secondary">作成した案件を確認</a></li>
                        <li><a href=/candidacy_demands class="nav-link px-3 link-secondary text-secondary">立候補した案件を確認</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto mt-3">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="/">
                                        ホーム
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main role="main" class="container">
            <div id="contentBody" class="my-3 p-3 bg-white rounded shadow-sm"  style="position: relative; top: 4rem;">
                <div class="d-flex align-items-center p-3 my-3 rounded shadow-sm" style="color: white; background-color: orange;">
                    <h1>@yield('title')</h1>
                </div>
                @if(session('store_message'))
                    <div class="alert alert-success" role="alert">
                        <span>{{ session('store_message') }}</span>
                    </div>
                @elseif(session('warning_message'))
                    <div class="alert alert-danger" role="alert">
                        <span>{{ session('warning_message') }}</span>
                    </div>
                @elseif(session('update_message'))
                    <div class="alert alert-success" role="alert">
                        <span>{{ session('update_message') }}</span>
                    </div>
                @elseif(session('destroy_message'))
                    <div class="alert alert-dark" role="alert">
                        <span>{{ session('destroy_message') }}</span>
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
