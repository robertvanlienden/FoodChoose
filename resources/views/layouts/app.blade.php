<!doctype html>
<html lang="nl">
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    @if(config('app.env') === 'production')
        <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-WBDFDR7');</script>
            <!-- End Google Tag Manager -->
    @endif
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?tracking=1&thirdparty=1&always=1&refreshPage=1&showNoConsent=1&showPolicyLink=1&privacyPage=https%3A%2F%2Ffoodchoose.nl%2Fterms-and-conditions"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        @if(SeoManager::metaData('title_dynamic'))
            <title>FoodChoose {{ '- ' . SeoManager::metaData('title_dynamic') }}</title>
        @else
            <title>FoodChoose {{ SeoManager::metaData('title') != '' ? '- ' . SeoManager::metaData('title') : '' }}</title>
        @endif

    <meta name="description" content="{{ SeoManager::metaData('description') }}" />
    <meta name="keywords" content="{{ SeoManager::metaData('keywords') }}" />
    {{--  All the meta tags from vendor/lionix-team/seo-manager  --}}
    @meta('title')
    @meta('og:title')
    @meta('og:description')
    @meta('og:site_name')
    @meta('og:locale')
    @meta('og:image:url')
    @meta('og:type')
    @meta('og:url')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Styles --}}
    @if(config('laravelusers.enableBootstrapCssCdn'))
        <link rel="stylesheet" type="text/css" href="{{ config('laravelusers.bootstrapCssCdn') }}">
    @endif
    @if(config('laravelusers.enableAppCss'))
        <link rel="stylesheet" type="text/css" href="{{ asset(config('laravelusers.appCssPublicFile')) }}">
    @endif

    @yield('template_linked_css')

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBDFDR7"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-lg" id="navbar">
            <div class="container">
                @guest
                    <a class="navbar-brand m-2" href="{{ url('/') }}">
                        <img
                            class="logo-img"
                            src="{{ asset('img/theme/logo-full.svg') }}"
                             alt="{{ config('app.name', 'Laravel') }}"
                             title="{{ config('app.name', 'Laravel') }}"
                             height="125px;">
                    </a>
                    <div class="d-md-none m-2">
                        <a href="{{ route('register') }}" class="btn btn-dark btn-header btn-lg p-3 m-2">Registreer direct</a>
                    </div>
                @endguest
                @auth
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img
                                class="logo-img"
                                src="{{ asset('img/theme/logo-full.svg') }}"
                                 alt="{{ config('app.name', 'Laravel') }}"
                                 title="{{ config('app.name', 'Laravel') }}"
                                 height="125px;">
                        </a>
                @endauth
                <button class="navbar-toggler hamburger hamburger--collapse m-2"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}"
                        >
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a id="navbar-item" class="nav-link" href="{{ route('changelog') }}">
                                Over
                            </a>
                        </li>
                    </ul>
                    @role('admin')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Admin tools <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users') }}">
                                    Users
                                </a>
                                <a class="dropdown-item" href="{{ route('laravelroles::roles.index') }}">
                                    Roles
                                </a>
                                <a class="dropdown-item" href="{{ url('/seo-manager') }}">
                                    SEO
                                </a>
                            </div>
                        </li>
                    </ul>
                    @endrole
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
                                    Recepten <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('meals') }}">
                                        Alle recepten
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mealcategories') }}">
                                        Bekijk categorieën
                                    </a>

                                    <a class="dropdown-item" href="{{ route('add-meal') }}">
                                        Recept toevoegen
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Ingredienten <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('ingredients') }}">
                                        Alle ingredienten
                                    </a>
                                    <a class="dropdown-item" href="{{ route('add-ingredient') }}">
                                        Ingredient toevoegen
                                    </a>
                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Tools <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('randommeal') }}">
                                        Random meal
                                    </a>
                                    <a class="dropdown-item" href="{{ route('weekplanner') }}">
                                        Weekplanner
                                    </a>
                                    <a class="dropdown-item" href="{{ route('saved-weekmenu') }}">
                                        Opgeslagen weekmenu's
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name ?? 'Profiel' }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth()->user()->username)
                                        <a class="dropdown-item" href="{{ url('/profile/' . Auth()->user()->username) }}">
                                           Bekijk profiel
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ url('/profile/' . Auth()->user()->id . '/edit') }}">
                                            Gegevens aanpassen
                                        </a>
                                    @endif
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

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-white shadow-sm"
style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mt-3">
                        &copy; 2020 - FoodChoose - Robert van Lienden
                    </div>
                    @level(2)
                    <div class="col-md-4 offset-md-4 mt-3">
                        Vragen? Opmerkingen? <a href="mailto:foodchoose@robertvanlienden.nl">foodchoose@robertvanlienden.nl</a>
                    </div>
                    @endlevel
                </div>
            </div>

        </footer>
    </div>

</body>
</html>
