@extends('master')
@push('styles')
    <link rel="stylesheet" href="/css/master.css">    
@endpush
@section('contents')
<div class="home-container">
    <div class="left-container">
        <h1 class="welcome-h1">Welcome to dartscloud.</h1>
        <p class="welcome-p">Play darts with your friends and keep up to date with the official pdc rankings.</p>
        <div class="twitter-container">
            <h1 class="twitter-h1">LIVE TWITTER FEED</h1>
            <a class="twitter-timeline" data-lang="nl" data-height="400" data-theme="dark" href="https://twitter.com/OfficialPDC?ref_src=twsrc%5Etfw">Tweets by OfficialPDC</a> 
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        
    </div>
    <div class="right-contianer">
        <img src="{{ URL::to('/res/darts_photo.jpg') }}" alt="" class="home-photo">
    </div>
    </div>
    @stop