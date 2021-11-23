@extends('master')
@section('subtitle', 'Home')
@section('contents')
     <!-- Navbar Section -->
     <nav class="navbar">
        <div class="navbar__container">
            <a href="#home" id="navbar__logo">COLOR</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="#home" class="navbar__links" id="home-page">Home</a>
                </li>
                <li class="navbar__item">
                    <a href="#about" class="navbar__links" id="about-page">About</a>
                </li>
                <li class="navbar__item">
                    <a href="#services" class="navbar__links" id="services-page">Services</a>
                </li>
                <li class="navbar__btn">
                    <a href="#sing-up" class="button" id="singup">Sing Up</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" id="home">
        <div class="hero__container">
            <h1 class="hero__heading">Choose your <span>colors</span></h1>
            <p class="hero__description">Unlimted Possibilities</p>
            <button class="main__btn"><a href="#">Explore</a></button>
        </div>
    </div>

    <!-- About Section -->
    <div class="main" id="about">
        <div class="main__container">
            <div class="main__img-container">
                <div class="main__image--card">ICON</div>
            </div>
            <div class="main__content">
                <h1>What do we do?</h1>
                <h2>We help businesses scale</h2>
                <p>Schedule a call to learn more about our services</p>
                <button class="main__btn"><a href="#">Schedule Call</a></button>
            </div>
        </div>
    </div>
    <script src="/js/home.js"></script>
@stop