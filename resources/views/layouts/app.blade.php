<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
</head>
<body>
   <div id="app">
       <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color:#0092b3; color:#fefefe;">
           <div class="container">
               <a class="navbar-brand" style="color:#fefefe; font-size:1.4em" href="{{ url('/') }}" >
                   {{ config('app.name', 'Laravel') }}
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                   <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <!-- Left Side Of Navbar -->
                   <ul class="navbar-nav mr-auto">

                   </ul>

                   <!-- Right Side Of Navbar -->
                   <ul class="navbar-nav ml-auto" >
                       <!-- Authentication Links -->
                    {{-- 管理者 --}}
                    @if( Request::is('*/admin') )
                       {{-- 未登録 --}}
                        @guest
                           <li class="nav-item">
                               <a class="nav-link" style="color:#fefefe;"  href="{{ route('admin-login') }}">{{ __('企業ログイン') }}</a>
                           </li>
                           @if (Route::has('register'))
                               <li class="nav-item">
                                   <a class="nav-link" style="color:#fefefe;"  href="{{ route('admin-register') }}">{{ __('企業登録') }}</a>
                               </li>
                           @endif
                            <div class="btn-group">
                                <button type="button" style="color:#fefefe;" class="btn btn-danger">{{ __('一般会員はこちら') }}</button>
                                <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('/login') }}">
                                       ログイン
                                   </a></li>
                                   <li><a class="dropdown-item" href="{{ url('/register') }}">
                                    会員登録
                                </a></li>
                                </ul>
                            </div>
                       
                       @endguest
                    @elseif(Request::is('*/admin/*') ) 
                            <div class="btn-group">
                                    <button type="button" style="color:#fefefe;" class="btn btn-danger">{{ Auth::user()->name }}</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    
                                        <ul class="dropdown-menu">
                                            
                                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('ログアウト') }}
                                                        </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    </li>
                                                    <li><a class="dropdown-item" href="{{ url('/home/mycart') }}">
                                                    商品一覧を見る
                                                </a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item" href="{{ route('myStore') }}">
                                                    企業ページへ
                                                </a></li>
                               </div>
                    @else
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:#fefefe;"  href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color:#fefefe;"  href="{{ route('register') }}">{{ __('会員登録') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                </li>
                                <div class="btn-group">
                                    <button type="button" style="color:#fefefe;" class="btn btn-danger">{{ __('企業様はこちら') }}</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ url('/login/admin') }}">
                                        ログイン
                                    </a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ url('/register/admin') }}">
                                        企業登録
                                    </a></li>
                                    </ul>
                                </div>
                        @else
                            <div class="btn-group">
                                    <button type="button" style="color:#fefefe;" class="btn btn-danger">{{ Auth::user()->name }}</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    
                                        <ul class="dropdown-menu">
                                            @if( Request::is('/admin/*') )
                                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('ログアウト') }}
                                                        </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    </li>
                                                    <li><a class="dropdown-item" href="{{ url('/home/mycart') }}">
                                                    商品一覧を見る
                                                </a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item" href="{{ route('myStore') }}">
                                                    企業ページへ
                                                </a></li>
                                            @else
                                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('ログアウト') }}
                                                        </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    </li>
                                                    <li><a class="dropdown-item" href="{{ url('/home/mycart') }}">
                                                    カートを見る
                                                </a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item" href="{{ url('/mypage') }}">
                                                    Mypageへ
                                                </a></li>
                                                    
                                                </ul>
                                            @endif
                                </div>
                            
                        @endguest
                    @endif
                    

                   </ul>
               </div>
           </div>
       </nav>

       <main class="py-4">
           @yield('content')
       </main>
       <footer class="footer_design">
        @if( Request::is('*/admin') )
            @guest
                <p class="nav-item" style="display:inline;">
                    <a class="nav-link" href="{{ route('admin-login') }}" style="color:#fefefe; display:inline;">{{ __('企業ログイン') }}</a>

                @if (Route::has('register'))

                        <a class="nav-link" href="{{ route('admin-register') }}" style="color:#fefefe; display:inline;">{{ __('企業登録') }}</a>
                    </p>
                @endif
            @else
            <p class="nav-item" style="display:inline;">
                <a class="nav-link" href="{{ route('admin-login') }}" style="color:#fefefe; display:inline;">{{ __('企業ログイン') }}</a>
                
            
            @endguest
        @else
            @guest
            <p class="nav-item" style="display:inline;">
                <a class="nav-link" href="{{ route('login') }}" style="color:#fefefe; display:inline;">{{ __('ログイン') }}</a>

                @if (Route::has('register'))

                    <a class="nav-link" href="{{ route('register') }}" style="color:#fefefe; display:inline;">{{ __('会員登録') }}</a>
                    </p>
                @endif
    
            @endguest  

        @endif
       <br>
       <div style="margin-top:24px;">
       なんでも売ります<br>
       <p style="font-size:2.4em">Larashop</p><br>
       </div>

       <p style="font-size:0.7em;">@copyright @mukae9</p>

   </footer>
   </div>
</body>
</html>
