<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DARTSCLOUD.</title>
        <!-- <script type="text/javascript" src="functies.js"></script>
        <link rel="stylesheet" href="/css/home.css"> -->
        @stack('styles')
        @stack('scripts')
        <link rel="stylesheet" href="/css/master.css">  

        <script src="/js/master.js" defer></script>

        <link rel="icon" href="https://img.icons8.com/color/50/000000/goal--v1.png">

        <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>

        <!-- stylesheet for dropdownmenue -->
        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

        <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    </head>
    <body>
        <div class="navbar-container">
            <h1 class="topright_logo">Dartscloud.</h1>
            <div class="navbar">
                <ul class="nav-ul">

                    <li class="nav-li">
                        <a class="nav-a" href="{{ route('home') }}">home</a>
                    </li>
                    <li class="nav-li">
                        <a class="nav-a" href="{{ route('play') }}">play</a>
                    </li>
                    <li class="nav-li">
                        <a class="nav-a" href="{{ route('home') }}">Player Info</a>
                    </li>
                    <li class="nav-li">
                        <a class="nav-a" href="{{ route('pdcRanking') }}">PDC Ranking</a>    
                    </li>

                    <li class="nav-li dropdown">
                        <div class="name_container">
                            @if (Auth::user()->foto_url == "")
                                <img src= "https://img.icons8.com/color/50/000000/goal--v1.png" alt="" />
                            @else 
                                <img src= "{{ Auth::user()->foto_url }}" alt="" />
                            @endif
                            <a class="logout-a" href="#">{{ Auth::user()->name }}</a>
                        </div>
                        
                        <div class="dropdown-content">
                            <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                LOGOUT
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <!-- <a href="#" class="w3-bar-item w3-button">Link 2</a>
                            <a href="#" class="w3-bar-item w3-button">Link 3</a> -->
                        </div>
                    </li>

                    
                    
                    <!-- <li class="nav-li">

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="nav-a" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> -->
                    
                </ul>
            </div>
        
            

        </div>
        <img src= "{{ URL::to('/res/darts_bg.jpg') }}" alt="kut foto" class="bg-foto">
        
        @yield('contents')
        
    </body>
</html>