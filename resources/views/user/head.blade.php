<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>ONLINE SHOP</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="/assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{url('/')}}"><h2>Online <em>Shop</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="toggler navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Главная
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{route('showcategories')}}">Категории</a>
              </li>

              <li class="nav-item">
                 @if (Route::has('login'))
                            
                                @auth

                                <li class="nav-item">
                <a class="nav-link" href="{{route('showcart')}}">
                Корзина</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('orders')}}">
                Заказы</a>
              </li>

                                       <x-app-layout>
                                          
                                        </x-app-layout> 
                                @else
                                  <li>
                                    <a class="nav-link"
                                        href="{{ route('login') }}">
                                        Войти
                                    </a>
                                  </li>
                                    @if (Route::has('register'))
                                      <li>
                                        <a class="nav-link"
                                            href="{{ route('register') }}">
                                            Регистрация
                                        </a>
                                    </li>
                                    @endif
                                @endauth
                            
                        @endif
                    </li>



            </ul>
          </div>
        </div>
      </nav>

@if(session()->has('message'))

              <div class="alert alert-success">

                {{session()->get('message')}}

                <button type="button" class ="close" data-bs-dismiss="alert">x</button>

            </div>

            @endif


    </header>


        <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
          <div class="text-content">
            <h4></h4>
            <h2></h2>
          </div>
        </div>
    <!-- Banner Ends Here -->
