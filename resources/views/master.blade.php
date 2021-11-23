<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BMI Calculator @yield('subtitle')</title>
        <script type="text/javascript" src="functies.js"></script>
        <link rel="stylesheet" href="/css/home.css">
    </head>
    <body>
        <h1>BMI Calculator</h1>
        <h2>@yield('subtitle')</h2>
        @yield('contents')
        <div id="status" style="background-color: #ddd"></div>
        <hr/>
        <p><em>Een kennismaking met Laravel</em> en <code>Javascript</code></p>
    </body>
</html>