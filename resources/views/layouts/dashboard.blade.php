<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Payroll</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <script src="{{ asset('js/loader.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalerts2.css') }}">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>
<body class="layout-boxed">
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <div class="header-container container-xxl">
        <header class="header navbar navbar-expand-sm expand-header">
            <a href="javascript:void(0);" class="nav-link theme-toggle p-0 d-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
            </a>
            <a href="javascript:void(0);" class="sidebarCollapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>
            @auth
                <ul class="navbar-item flex-row ms-lg-auto ms-0">
                    <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-container">
                                <div class="avatar avatar-sm avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ asset('img/user.png') }}" class="rounded-circle">
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="user-profile-section">
                                <div class="media mx-auto">
                                    <img src="{{ asset('img/user.png') }}" class="img-fluid me-2" alt="avatar">
                                    <div class="media-body">
                                        <h5>{{ Auth::user()->name }}</h5>
                                        <p>Admin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{ route('logout') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            @endauth
        </header>
    </div>
    <div class="main-container " id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-text">
                            <a href="/" class="nav-link">LOGO</a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>
                @auth
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu @if ($menuActive == 'user') active @endif">
                            <a href="{{ route('user') }}"
                                aria-expanded="{{ $menuActive == 'user' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span>Add User</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu @if ($menuActive == 'absen') active @endif">
                            <a href="{{ route('absen') }}"
                                aria-expanded="{{ $menuActive == 'absen' ? 'true' : 'false' }}"
                                class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span>Absensi</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                @endauth
            </nav>
        </div>
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/vendors.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('before-body-end')
</body>
</html>
