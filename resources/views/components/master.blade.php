<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mental Health System') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
{{--    <script src="http://unpkg.com/turbolinks"></script>--}}


<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">
    <section class="px-8 py-4 mb-6">
        <nav class="navbar navbar-expand-md navbar-light bg-blue-10 shadow-sm border">

            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(auth()->check())
                            <li class="nav-item {{ Request::is('home') ? 'active font-weight-bold' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>

                            <li class="nav-item dropdown {{ Request::is('self-assessments*') || Request::is('surveys*') ? 'active font-weight-bold' : '' }}">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Self-Assessment
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('self-assessments') }}">
                                        Begin Self-Assessment
                                    </a>
                                    <a class="dropdown-item" href="{{ route('show-self-assessments') }}">
                                        View My Assessments
                                    </a>
                                </div>


                            </li>
                            @can('change-questions')
                                <li class="nav-item dropdown {{ Request::is('question-categories*') ? 'active font-weight-bold' : '' }}">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Questions
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('create-question-category') }}">
                                            Create New Category
                                        </a>
                                        <a class="dropdown-item" href="{{ route('view-question-categories') }}">
                                            View Question Categories
                                        </a>
                                    </div>
                                </li>
                            @endcan


                            @can('change-availability')
                                <li class="{{ Request::is('availability') ? 'active font-weight-bold' : '' }} nav-item ">
                                    <a class="nav-link" href="{{ route('availability') }}">Availability</a>
                                </li>
                            @endcan


                            <li class="nav-item dropdown {{ Request::is('appointments*') ? 'active font-weight-bold' : '' }}">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Appointments
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('book-appointment') }}">
                                        Book Appointment
                                    </a>
                                    <a class="dropdown-item" href="{{ route('my-appointments') }}">
                                        My Calendar
                                    </a>
                                </div>


                            </li>


                        @endif
                    </ul>
                </div>
                <header class="navbar-brand justify-content-center navbar-collapse">
                    {{ config('app.name', 'Mental Health System') }}
                </header>

                <div class="navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="mr-5 nav-item font-weight-bolder  {{ Request::is('help') ? 'active font-weight-bold' : '' }}">
                                <a class="nav-link text-danger" href="{{ route('help') }}">Get Help Now</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </section>


    {{ $slot }}

    <script></script>

</div>
</body>
</html>
