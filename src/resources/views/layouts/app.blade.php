<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>英単語アプリ</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md" style="background-color: #696969; color: #66CDAA;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <span style="color: #FFFFFF;">eitango</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><span style="color: #696969;">{{ __('ログイン') }}</span></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('会員登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span style="color: #FFFFFF;">{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    <!-- logout -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span style="color: #696969;">{{ __('ログアウト') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                     <!-- マイページ -->
                                    @if (Auth::user()->role === 1)
                                        <a class="dropdown-item" href="{{ route('admin-mypage-titles') }}">
                                        <span style="color: #696969;"> {{ __('マイページ') }}</span>
                                        </a>
                                    @elseif (Auth::user()->role === 2)
                                        <a class="dropdown-item" href="{{ route('user-mypage') }}">
                                        <span style="color: #696969;">{{ __('マイページ') }}</span>
                                        </a>
                                    @elseif (Auth::user()->role === 3)
                                        <a class="dropdown-item" href="{{ route('paid-user-mypage') }}">
                                        <span style="color: #696969;">{{ __('マイページ') }}</span>
                                        </a>
                                    @endif
                                    <!-- toppage -->
                                    <a class="dropdown-item" href="{{'/'}}">
                                    <span style="color: #696969;">{{ __('トップページ') }}</span>
                                    </a>
                                </div>
                                
                                
                                
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
            @yield('content')
        
    </div>
</body>
</html>
