<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>

    
    <!-- tynyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/f6db652956.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark  shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Blog
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a href="{{ route('public.categories') }}" class="text-white">Categories</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('img/users/'.Auth::user()->img) }}" alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle mr-2" style="width: 50px; height: 50px;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ ( Auth::user()->usertype == 1 ) ? route('admin.index') : route('user.index') }}">Admin Section</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main>

            @if( Auth::check() && Auth::user()->usertype === 1 && Request::is('admin/*') )

                <div class="container py-5">

                    <div class="row justify-content-between">
                    
                        <div class="col-2">
                        
                            <ul class="list-group">
                                <a href="{{ route('admins.index') }}" class="list-group-item list-group-item-action text-primary" ><i class="fas fa-user"></i>&nbsp; User</a>
                                <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action text-primary" ><i class="fas fa-bars"></i></i>&nbsp; Categories</a>
                                <a href="{{ route('admin.articles.index') }}" class="list-group-item list-group-item-action text-primary" > <i class="fas fa-newspaper"></i>&nbsp;  Articles</a>
                                <a href="{{ route('admin.comments.index') }}" class="list-group-item list-group-item-action text-primary" ><i class="fas fa-comments"></i>&nbsp; Comments</a>
                            </ul>
                        
                        </div>

                        <div class="col-9">

                            @include('messages')

                            @yield('content')

                        </div>

                    </div>

                </div>

            @elseif( Auth::check() && Auth::user()->usertype === 0  &&  Request::is('user/*') ) 

                <div class="container py-5">

                    <div class="row justify-content-between">
                        
                        <div class="col-2">
                        
                            <ul class="list-group">
                                <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action text-primary" ><i class="fas fa-user"></i>&nbsp; User</a>
                                <a href="{{ route('user.articles.index') }}" class="list-group-item list-group-item-action text-primary" ><i class="fas fa-newspaper"></i>&nbsp; Articles</a>
                                <a href="{{ route('user.comments.index') }}" class="list-group-item list-group-item-action text-primary" ><i class="fas fa-comments"></i>&nbsp; Comments</a>
                            </ul>
                        
                        </div>

                        <div class="col-9">

                            @include('messages')

                            @yield('content')

                        </div>

                    </div>

                </div>

            @else
                
                <div class="">
                
                    @include('messages')

                    @yield('content')
                
                </div>
                
            @endif

        </main>


        @yield('footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    @yield('script')

    @yield('ajax')
</body>
</html>
