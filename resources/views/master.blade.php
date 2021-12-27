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
                    
                </ul>
            </div>
        
            

        </div>
        <img src= "{{ URL::to('/res/darts_bg.jpg') }}" alt="kut foto" class="bg-foto">
        
        @yield('contents')
        
    </body>
</html>