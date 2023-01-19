<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('userViews/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('userViews/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('userViews/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('userViews/images/fevicon.png')}}" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('userViews/css/jquery.mCustomScrollbar.min.css')}}">

    <link rel="stylesheet" href="{{asset('userViews/css/jquery.mCustomScrollbar.min.css')}}">

    <!-- Scripts -->

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('items.indexes')}}">catalog</a>
                    </li>
                    @can('create',App\Models\Item::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('items.create')}}">create item</a>
                        </li>
                    @endcan
                    @isset($categories)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $cat)
                                    <li><a class="dropdown-item"
                                           href="{{route('items.category',$cat->id)}}">{{$cat->{"name_".app()->getLocale()} }}</a>
                                    </li>
                                @endforeach
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                       href="{{route('items.indexes')}}">{{__("myTexts.index")}}</a></li>

                            </ul>
                        </li>
                    @endisset
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('items.cart')}}">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.message.index')}}">{{__('myTexts.message')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{config('app.langs')[app()->getLocale()]}}
                        </a>

                        <ul class="dropdown-menu">
                            {{--                                @foreach(config('app.langs') as $ln => $lang)--}}
                            {{--                                    <a href="{{route('switch.lang', $ln)}}" class="dropdown-item">--}}
                            {{--                                        <img src="{{ asset('vendor/blade-flags/country-ru.svg') }}" class="mr-2" alt="flag" width="5%" >--}}
                            {{--                                        {{$lang}}--}}
                            {{--                                    </a>--}}
                            {{--                                @endforeach--}}
                            <a class="dropdown-item" href="{{route('switch.lang', ['kz'])}}"><img
                                    src="{{ asset('vendor/blade-flags/country-kz.svg') }}" class="mr-2" alt="flag"
                                    width="5%">{{config('app.langs')['kz']}}</a>
                            <a class="dropdown-item" href="{{route('switch.lang', ['ru'])}}"><img
                                    src="{{ asset('vendor/blade-flags/country-ru.svg') }}" class="mr-2" alt="flag"
                                    width="5%">{{config('app.langs')['ru']}}</a>
                            <a class="dropdown-item" href="{{route('switch.lang', ['en'])}}"><img
                                    src="{{ asset('vendor/blade-flags/country-gb.svg') }}" class="mr-2" alt="flag"
                                    width="5%">{{config('app.langs')['en']}}</a>
                            {{--
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" href="{{route('items.indexes')}}">index</a></li>

                                                        </ul>
                            {{--                        </li>--}}
                        </ul>
                    </li>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login.form'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login.form') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register.form'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register.form') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @isset($mess)
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->

                                    <span class="badge badge-danger badge-counter">@if($mess != null) {{count($mess)}}@else  @endif</span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>

                                        @foreach($mess as $mes)
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="dropdown-list-image mr-3">
                                                    <img class="rounded-circle" src="{{asset($mes->user->avatar)}}"
                                                         alt="...">
                                                    <div class="status-indicator bg-success"></div>
                                                </div>
                                                <div class="font-weight-bold" >
                                                    <div  style="display: flex">
                                                        <div  class="text-truncate">
                                                            {{$mes->user->name}}: {{$mes->message}}
                                                            <form action="{{route('user.delete.message',$mes)}}" method="post" style="display: flex">

                                                                @csrf
                                                                @method('DELETE')
                                                                <button style="width: 12%"  type="submit"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQg1IO_-pku4M8rgrRdWC4CFAyK_jH_QLcOGA&usqp=CAU" alt=""></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="small text-gray-500">{{$mes->created_at}}</div>
                                                </div>
                                            </a>

                                        @endforeach


                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                </div>
                                @endisset
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                       href="{{route('user.profile',Auth::user())}}">profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                    </ul>
                    </ul>
            </div>
        </div>
    </nav>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <main class="py-4">
        @yield('content')
    </main>
</div>
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Form -->
        <section class="">
            <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>Sign up for our newsletter</strong>
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div class="form-outline form-white mb-4">
                            <input type="email" id="form5Example29" class="form-control"/>
                            <label class="form-label" for="form5Example29">Email address</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-light mb-4">
                            Subscribe
                        </button>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer-->

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Bootstrap core JS-->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>
