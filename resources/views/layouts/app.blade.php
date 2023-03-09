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
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(254, 251, 233, 1)0%, rgba(225, 238, 221, 1) 79%); 
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: #F0A04B !important ; ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @can('viewAny', App\Models\Client::class)
                <a class="navbar-brand" href="{{ route('clients.index') }}" style="color: #183A1D !important; ">
                    Clients
                </a>
                @endcan

                @can('viewAny', App\Models\commandeVente::class)
                <a class="navbar-brand" href="{{ route('commandeVentes.index') }}" style="color: #183A1D !important; ">
                    Commandes
                </a>
                @endcan

                @can('viewAny', App\Models\TypeProduit::class)
                <a class="navbar-brand" href="{{ route('typeProduits.index') }}" style="color: #183A1D !important; ">
                    Types Produit
                </a>
                @endcan

                @can('viewAny', App\Models\Produit::class)
                <a class="navbar-brand" href="{{ route('produit.index') }} " style="color: #183A1D !important; ">
                    Produit
                </a>
                @endcan

                @can('viewAny', App\Models\Fournisseur::class)
                <a class="navbar-brand" href="{{ route('fournisseur.index') }} " style="color: #183A1D !important; ">
                    Fournisseur
                </a>
                @endcan
                @can('viewAny', App\Models\CommandeAchat::class)
                <a class="navbar-brand" href="{{ route('commandeAchat.index') }} " style="color: #183A1D !important; ">
                    Commande Achat
                </a>
                @endcan

                {{-- @can('viewAny', App\Models\user::class) --}}
            
                    <a class="navbar-brand" href="{{ route('users.index') }} " style="color: #183A1D !important; ">
                       User
                    </a>
             
                {{-- @endcan --}}


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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6"></script>
    <!-- Lastly add this package -->
    <script src="https://cdn.jsdelivr.net/npm/vue-toast-notification"></script>
    <link href="https://cdn.jsdelivr.net/npm/vue-toast-notification/dist/theme-sugar.css" rel="stylesheet">
    <!-- Init the plugin -->
    <script>
        Vue.use(VueToast);
    </script>

    <script>
        <?php if(session()->has('message')) {?>
        var sucessMessage = "<?= Session::get('message') ?>"
        Vue.$toast.success(sucessMessage, {
            // override the global option
            position: 'top-right'
        })
        <?php } ?>
    </script>
</body>
</html>
