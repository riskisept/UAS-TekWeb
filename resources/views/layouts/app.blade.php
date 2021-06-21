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

    <link rel="icon" type="image/x-icon" href={{ asset('assets/img/favicon.ico') }}/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    


     @livewireStyles
</head>
<body>
     <!-- Navigation-->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5 d-flex">
            <a class="navbar-brand" href="{{ url('/cart') }}"><img class="img-fluid" style="width: 150px;" src="{{ asset('assets/img/giaris1.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/products') }}">Product</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/transaction') }}">Transaction</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/producttransaction') }}">Product Transaction</a></li>
            </ul>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    
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
                                {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <livewire:auth.logout />
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
        <!-- Header-->

        <!-- Section-->
    <main class="py-4">
        @yield('content')
        <div class="container-fluid">
             {{isset($slot) ? $slot : null}}
        </div>           
    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>


    @livewireScripts   
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
    @stack('script-custom')
</body>
</html>