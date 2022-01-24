<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Home</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    </head>
    <body class="antialiased">
        
    <div class="sidebar-container home">
  <div class="sidebar-logo">
    LARAVEL ZOO
  </div>
  <ul class="sidebar-navigation">
    <li class="header">Navigation</li>
    <li>
      <a href="#">
        <i class="fa fa-home" aria-hidden="true"></i> Homepage
      </a>
    </li>
    <li>
      <a href="{{ route(('dashboard.index'))}}">
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
      </a>
    </li>
    <li class="header"> My Lists</li>
    <li>
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i> Animals
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-cog" aria-hidden="true"></i> Families
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-info-circle" aria-hidden="true"></i> Continents
      </a>
    </li>
    </ul>
    </div>

        <section class="background">
            <h1 class="titlehome"> YOUR NEW ZOO HAS FINALLY OPENED ! </h1>
            <a href="{{ route(('dashboard.index')) }}" class="booknow" type="radio"> SEE OUR ANIMALS </a>
        </section>
    </body>
</html>
