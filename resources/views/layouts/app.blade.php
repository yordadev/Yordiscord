<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Yordiscord | Free Discord Server Listing</title>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" value="https://yordiscord.com" />
    <meta name="twitter:title" content="Discord Server Listings | Yordiscord.com" />
    <meta name="twitter:description" content="Yordiscord allows you to advertise your discord server for free. You can find servers with tags that you are interested in and recommend them for others to see." />
    <meta name="twitter:image" content="{{ asset('assets/img/logo.png') }}">


    <meta name="keywords" content="public discord servers, public discord server listings, discord listings, discord, discord bots, discord servers, discord server, discord emojis, discord nitro, discord login, discord music bot, discord twitter, what is discord, discord api, best discord servers, discord support, discord online, discordapp, discord reddit, yordiscord, yordadev, tags">
    <meta name="description"
        content="Yordiscord allows you to advertise your discord server for free. You can find servers with tags that you are interested in and recommend them for others to see.">
    <meta name="author" content="https://yorda.dev">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Yordiscord Listings">
    <meta property="og:site_name" content="https://yordiscord.com">
    <meta property="og:description"
        content="Yordiscord allows you to advertise your discord server for free. You can find servers with tags that you are interested in and recommend them for others to see.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yordiscord.com">
    <meta property="og:image" content="{{ asset('assets/img/logo.png') }}">


    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">









    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/widgets/modules-widgets.css') }}" rel="stylesheet" type="text/css" />

    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/elements/infobox.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements/alert.css') }}">
    <link href="{{ asset('assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/apps/notes.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components/timeline/custom-timeline.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>

            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="{{ route('landing') }}"><img alt="logo"
                        src="{{ asset('assets/img/logo.png') }}"> <span
                        class="navbar-brand-name">Yordiscord</span></a>
            </div>
            <ul class="navbar-item flex-row ml-auto">
                <li class="nav-item align-self-center search-animated">
                    <form class="form-inline search-full form-inline search" role="search" method="POST"
                        action="{{ route('search') }}">
                        @csrf
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto"
                                placeholder="Search..." id="q" name="q">
                        </div>
                    </form>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-search toggle-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </li>

            </ul>
            @auth
            <ul class="navbar-item flex-row nav-dropdowns ml-auto">
                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <img src="https://cdn.discordapp.com/avatars/{{ Auth::user()->discord_id }}/{{ Auth::user()->avatar }}"
                                class="img-fluid" alt="admin-profile">
                            <div class="media-body align-self-center">
                                <h6><span>Hi,</span> {{ Auth::user()->username }}</h6>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp"
                        aria-labelledby="user-profile-dropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="{{ route('home') }}" disabled=""><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> My Profile</a>
                            </div>

                            <div class="dropdown-item">
                                <a class="" href="{{ route('logout') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Sign Out</a>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
            @else

            <ul class="navbar-item flex-row  nav-dropdowns ml-auto">
                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a href="{{ route('discord.login')}}" class="nav-link user" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media">

                            <div class="media-body align-self-center">
                                <button class="btn btn-outline-primary">Login with Discord</button>
                            </div>
                        </div>

                    </a>


                </li>
            </ul>
            @endauth

        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <div class="topbar-nav header navbar" role="banner">
            <nav id="topbar">
                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="{{ route('landing') }}">
                            <img src="{{ asset('assets/img/logo.png') }}"
                                class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="{{ url('/')}}" class="nav-link"> Yordiscord </a>
                    </li>
                </ul>


                <ul class="list-unstyled menu-categories" id="topAccordion">

                    @auth
                    <li class="nav-item dropdown user-profile-dropdown mb-3 text-center order-lg-0 order-1 d-md-none">
                        <a href="{{ route('home')}}" class="nav-link user" aria-haspopup="true" aria-expanded="false">
                            <div class="media">

                                <div class="media-body align-self-center">
                                    <button class="btn btn-outline-primary">Go to Profile</button>
                                </div>
                            </div>

                        </a>


                    </li>
                    @else
                    <li class="nav-item dropdown user-profile-dropdown mb-3 text-center order-lg-0 order-1 d-md-none">
                        <a href="{{ route('discord.login')}}" class="nav-link user" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media">

                                <div class="media-body align-self-center">
                                    <button class="btn btn-outline-primary">Login with Discord</button>
                                </div>
                            </div>

                        </a>


                    </li>


                    @endif



                    @if(Request::url() !== 'http://yorbot.local/profile')

                    <div class="tab-title d-md-none">
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-12">
                                <ul class="nav nav-pills d-block" id="pills-tab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link list-actions active" id="all-tags"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                </path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                </path>
                                            </svg> All Servers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link list-actions text-primary " id="tag-featured"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-star">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg> Featured Servers</a>
                                    </li>
                                </ul>

                                <hr>

                                <p class="group-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                                        <path
                                            d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                        </path>
                                        <line x1="7" y1="7" x2="7" y2="7"></line>
                                    </svg> Tags</p>

                                <ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
                                    @foreach($data['tags'] as $tag)
                                    <li class="nav-item">
                                        @if($tag->count > 0)
                                        <a class="nav-link list-actions g-dot-primary" id="tag-{{ $tag->tag }}">
                                            {{ $tag->tag }} </a>
                                        @else
                                        <a class="nav-link list-actions g-dot-danger" id="tag-{{ $tag->tag }}">
                                            {{ $tag->tag }} </a>
                                        @endif
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                    </div>
                    @endif


                </ul>
            </nav>
        </div>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">


                <!-- CONTENT AREA -->
                @yield('content')
                <!-- CONTENT AREA -->

            </div>
            <div class="footer-wrapper justify-content-center">
                <div class="footer-section f-section-1 mr-4">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://yorda.dev">Yorda</a>, All
                        rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <a href="https://yorda.dev">
                        <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                </path>
                            </svg> by Yorda<a></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/js/elements/tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/apps/notes.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>