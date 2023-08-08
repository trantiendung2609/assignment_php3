<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ URL::asset('resources/css/font-face.css') }}" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('layout/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('layout/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('layout/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('layout/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('layout/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('layout/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ URL::asset('layout/css/aos.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('layout/css/style.css') }}">
    {{--  --}}
    <link href="{{ URL::asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">
    <!-- Main CSS-->
    <link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form role="search" style="display: flex;" action="{{ route('search_item') }}"
                                class="site-block-top-search" method="GET">
                                {{-- @csrf --}}
                                <input type="text" name="search" class="form-control border-0" placeholder="Search">

                                <button type="submit"> <span class="icon icon-search2"></span></button>
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="/" class="js-logo-clone">Shoppers</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">

                            @if (!Auth::user())
                                <a href="/login"><span class="icon icon-person"></span>Sign in</a>
                                <a href="register">Register</a>
                                <a href="/login" class="site-cart">
                                    <span class="icon icon-shopping_cart">Giỏ hàng</span>
                                    {{-- <span class="count">2</span> --}}
                                </a>
                            @else
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">

                                        <div class="content"
                                            style="
                                        margin-left: 0px;
                                    ">
                                            <a class="js-acc-btn  " href="#">{{ Auth::user()->name }} </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">

                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item" style="text-align: left;">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item" style="text-align: left;">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item" style="text-align: left;">
                                                    <a href="cart" class="site-cart">
                                                        <span class="icon icon-shopping_cart"></span>
                                                        {{-- <span class="count">2</span> --}}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer"
                                                style="text-align: left; display: flex;align-items: center;">
                                                <i class="zmdi zmdi-power" style="margin-left: 26px"></i>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                                        this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li class=" active">
                            <a href="/">Home</a>
                        </li>
                        <li class="">
                            <a href="/about">About</a>
                        </li>
                        <li><a href="/shop">Shop</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>
