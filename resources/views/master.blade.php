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
    </head>
    <body>
        <div class="navbar-container">
            <h1 class="topright_logo">Dartscloud.</h1>
            <div class="navbar">
                <ul class="nav-ul">
                    <li class="nav-li">Home</li>
                    <li class="nav-li">Play</li>
                    <li class="nav-li">Player Info</li>
                    <li class="nav-li">PDC Ranking</li>
                </ul>
            </div>
        
            

        </div>
        <img src= "{{ URL::to('/res/darts_bg.jpg') }}" alt="kut foto" class="bg-foto">
        
        @yield('contents')
        
    </body>
</html>