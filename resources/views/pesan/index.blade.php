<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Pesan</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-chat.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-chat-list.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern bordered-layout content-left-sidebar navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="bordered-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul> 
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span><span class="user-status">Kader</span></div><span class="avatar"><img class="round" src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="{{ route('logout-kader') }}"><i class="mr-50" data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                 <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                            <svg viewbox="0 0 39 55" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20">
                               
                                
                     
                            </svg></span>
                            <img src="../img/icon_posdayandu.png"  
                                width= "150px" height="35px" 
                                 >
                   <!--   <h2 class="brand-text">Posdayandu</h2>  -->
                    </a></li>
      
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('dashboard-kader') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a> 
                </li>

                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">APLIKASI </span><i data-feather="more-horizontal"></i>
                </li>
                
                <li class=" active"><a class="d-flex align-items-center" href="app-chat.html"><i data-feather="message-square"></i><span class="menu-title text-truncate" data-i18n="Chat">Pesan</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="Shop">Toko</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="app-invoice-list.html"><i data-feather="circle"></i><span class="menu-item" data-i18n="List">Produk</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="app-invoice-preview.html"><i data-feather="circle"></i><span class="menu-item" data-i18n="Preview">Penjualan</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="app-invoice-edit.html"><i data-feather="circle"></i><span class="menu-item" data-i18n="Edit">Atur Toko</span></a>
                        </li>  
                    </ul>
                </li>


                
                <li class=" navigation-header"><span data-i18n="User Interface">ADMINISTRASI</span><i data-feather="more-horizontal"></i>
                </li>
                <li class="nav-item"><a class="d-flex align-items-center" href="{{ route('kader-daftar_pengguna') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Daftar">Daftar Pengguna</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('kader-agenda') }}"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="Agenda">Agenda</span></a>
                </li>
                <li class="nav-item"><a class="d-flex align-items-center" href="{{ route('kader-entri') }}"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Entri Data">Entri Data</span></a>
                </li>
               
                
                
                
                <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">AKUN</span><i data-feather="more-horizontal"></i>
                </li>
               
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('kader-profil') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Profil">Profil</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('kader-setting') }}"><i data-feather="package"></i><span class="menu-title text-truncate" data-i18n="Form Wizard">Pengaturan Akun</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="check-circle"></i><span class="menu-title text-truncate" data-i18n="Form Validation">Bantuan</span></a>
                </li>
            </ul>
        </div>

    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content chat-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <!-- Admin user profile area -->
                    <div class="chat-profile-sidebar">
                        <header class="chat-profile-header">
                            <span class="close-icon">
                                <i data-feather="x"></i>
                            </span>
                            <!-- User Information -->
                            <div class="header-profile-sidebar">
                                <div class="avatar box-shadow-1 avatar-xl avatar-border">
                                    <img src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="user_avatar" />
                                    <span class="avatar-status-online avatar-status-xl"></span>
                                </div>
                                <h4 class="chat-user-name">John Doe</h4>
                                <span class="user-post">Admin</span>
                            </div>
                            <!--/ User Information -->
                        </header>
                        <!-- User Details start -->
                        <div class="profile-sidebar-area">
                            <h6 class="section-label mb-1">About</h6>
                            <div class="about-user">
                                <textarea data-length="120" class="form-control char-textarea" id="textarea-counter" rows="5" placeholder="About User">
Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                                <small class="counter-value float-right"><span class="char-count">108</span> / 120 </small>
                            </div>
                            <!-- To set user status -->
                            <h6 class="section-label mb-1 mt-3">Status</h6>
                            <ul class="list-unstyled user-status">
                                <li class="pb-1">
                                    <div class="custom-control custom-control-success custom-radio">
                                        <input type="radio" id="activeStatusRadio" name="userStatus" class="custom-control-input" value="online" checked />
                                        <label class="custom-control-label ml-25" for="activeStatusRadio">Active</label>
                                    </div>
                                </li>
                                <li class="pb-1">
                                    <div class="custom-control custom-control-danger custom-radio">
                                        <input type="radio" id="dndStatusRadio" name="userStatus" class="custom-control-input" value="busy" />
                                        <label class="custom-control-label ml-25" for="dndStatusRadio">Do Not Disturb</label>
                                    </div>
                                </li>
                                <li class="pb-1">
                                    <div class="custom-control custom-control-warning custom-radio">
                                        <input type="radio" id="awayStatusRadio" name="userStatus" class="custom-control-input" value="away" />
                                        <label class="custom-control-label ml-25" for="awayStatusRadio">Away</label>
                                    </div>
                                </li>
                                <li class="pb-1">
                                    <div class="custom-control custom-control-secondary custom-radio">
                                        <input type="radio" id="offlineStatusRadio" name="userStatus" class="custom-control-input" value="offline" />
                                        <label class="custom-control-label ml-25" for="offlineStatusRadio">Offline</label>
                                    </div>
                                </li>
                            </ul>
                            <!--/ To set user status -->

                            <!-- User settings -->
                            <h6 class="section-label mb-1 mt-2">Settings</h6>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center mb-1">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="check-square" class="mr-75 font-medium-3"></i>
                                        <span class="align-middle">Two-step Verification</span>
                                    </div>
                                    <div class="custom-control custom-switch mr-0">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked />
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-1">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="bell" class="mr-75 font-medium-3"></i>
                                        <span class="align-middle">Notification</span>
                                    </div>
                                    <div class="custom-control custom-switch mr-0">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2" />
                                        <label class="custom-control-label" for="customSwitch2"></label>
                                    </div>
                                </li>
                                <li class="mb-1 d-flex align-items-center cursor-pointer">
                                    <i data-feather="user" class="mr-75 font-medium-3"></i>
                                    <span class="align-middle">Invite Friends</span>
                                </li>
                                <li class="d-flex align-items-center cursor-pointer">
                                    <i data-feather="trash" class="mr-75 font-medium-3"></i>
                                    <span class="align-middle">Delete Account</span>
                                </li>
                            </ul>
                            <!--/ User settings -->

                            <!-- Logout Button -->
                            <div class="mt-3">
                                <button class="btn btn-primary">
                                    <span>Logout</span>
                                </button>
                            </div>
                            <!--/ Logout Button -->
                        </div>
                        <!-- User Details end -->
                    </div>
                    <!--/ Admin user profile area -->

                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i data-feather="x"></i>
                        </span>
                        <!-- Sidebar header start -->
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center w-100">
                                <div class="sidebar-profile-toggle">
                                    <div class="avatar avatar-border">
                                        <img src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="user_avatar" height="42" width="42" />
                                        <span class="avatar-status-online"></span>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge ml-1 w-100">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
                                    </div>
                                    <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat" aria-label="Search..." aria-describedby="chat-search" />
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar header end -->

                        <!-- Sidebar Users start -->
                        <div id="users-list" class="chat-user-list-wrapper list-group">
                            <h4 class="chat-list-title">Chats</h4>
                            <ul class="chat-users-list chat-list media-list">
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-3.jpg" height="42" width="42" alt="Generic placeholder image" />
                                        <span class="avatar-status-offline"></span>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">Elizabeth Elliott</h5>
                                        <p class="card-text text-truncate">
                                            Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing
                                        </p>
                                    </div>
                                    <div class="chat-meta">
                                        <small class="float-right mb-25 chat-time">4:14 PM</small>
                                        <span class="badge badge-danger badge-pill float-right">3</span>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image" />
                                        <span class="avatar-status-busy"></span>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">Kristopher Candy</h5>
                                        <p class="card-text text-truncate">
                                            Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing
                                        </p>
                                    </div>
                                    <div class="chat-meta">
                                        <small class="float-right mb-25 chat-time">9:09 AM</small>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-8.jpg" height="42" width="42" alt="Generic placeholder image" />
                                        <span class="avatar-status-away"></span>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">Sarah Woods</h5>
                                        <p class="card-text text-truncate">
                                            Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing.
                                        </p>
                                    </div>
                                    <div class="chat-meta">
                                        <small class="float-right mb-25 chat-time">5:48 PM</small>
                                    </div>
                                </li>
                                <li class="no-results">
                                    <h6 class="mb-0">No Chats Found</h6>
                                </li>
                            </ul>
                            <h4 class="chat-list-title">Contacts</h4>
                            <ul class="chat-users-list contact-list media-list">
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Jenny Perich</h5>
                                        <p class="card-text text-truncate">
                                            Tart dragée carrot cake chocolate bar. Chocolate cake jelly beans caramels tootsie roll candy canes.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-5.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Sarah Montgomery</h5>
                                        <p class="card-text text-truncate">
                                            Tootsie roll sesame snaps biscuit icing jelly-o biscuit chupa chups powder.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-9.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Heather Howell</h5>
                                        <p class="card-text text-truncate">
                                            Tart cookie dragée sesame snaps halvah. Fruitcake sugar plum gummies cheesecake toffee.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Kelly Reyes</h5>
                                        <p class="card-text text-truncate">
                                            Wafer toffee tart jelly cake croissant chocolate bar cupcake donut. Fruitcake gingerbread tiramisu sweet
                                            jelly-o.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-15.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Kristopher Candy</h5>
                                        <p class="card-text text-truncate">
                                            Marzipan bonbon chocolate bar biscuit lemon drops muffin jelly-o sweet jujubes.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-14.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Vincent Nelson</h5>
                                        <p class="card-text text-truncate">
                                            Toffee gummi bears sugar plum gummi bears chocolate bar donut. Pudding cookie lemon drops icing
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-17.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Jimmy Parker</h5>
                                        <p class="card-text text-truncate">
                                            Powder halvah jelly beans topping caramels muffin dragée lollipop oat cake.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-3.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Elizabeth Elliott</h5>
                                        <p class="card-text text-truncate">
                                            Candy canes ice cream jelly beans carrot cake chocolate bar pastry candy jelly-o.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <span class="avatar"><img src="app-assets/images/portrait/small/avatar-s-13.jpg" height="42" width="42" alt="Generic placeholder image" />
                                    </span>
                                    <div class="chat-info">
                                        <h5 class="mb-0">Nelson D'souza</h5>
                                        <p class="card-text text-truncate">
                                            Macaroon candy canes apple pie soufflé lemon drops chocolate cake chocolate sweet roll.
                                        </p>
                                    </div>
                                </li>
                                <li class="no-results">
                                    <h6 class="mb-0">No Contacts Found</h6>
                                </li>
                            </ul>
                        </div>
                        <!-- Sidebar Users end -->
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <!-- Main chat area -->
                        <section class="chat-app-window">
                            <!-- To load Conversation -->
                            <div class="start-chat-area">
                                <div class="mb-1 start-chat-icon">
                                    <i data-feather="message-square"></i>
                                </div>
                                <h4 class="sidebar-toggle start-chat-text">Start Conversation</h4>
                            </div>
                            <!--/ To load Conversation -->

                            <!-- Active Chat -->
                            <div class="active-chat d-none">
                                <!-- Chat Header -->
                                <div class="chat-navbar">
                                    <header class="chat-header">
                                        <div class="d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1">
                                                <i data-feather="menu" class="font-medium-5"></i>
                                            </div>
                                            <div class="avatar avatar-border user-profile-toggle m-0 mr-1">
                                                <img src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36" />
                                                <span class="avatar-status-busy"></span>
                                            </div>
                                            <h6 class="mb-0">Kristopher Candy</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i data-feather="phone-call" class="cursor-pointer d-sm-block d-none font-medium-2 mr-1"></i>
                                            <i data-feather="video" class="cursor-pointer d-sm-block d-none font-medium-2 mr-1"></i>
                                            <i data-feather="search" class="cursor-pointer d-sm-block d-none font-medium-2"></i>
                                            <div class="dropdown">
                                                <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" id="chat-header-actions" class="font-medium-2"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="chat-header-actions">
                                                    <a class="dropdown-item" href="javascript:void(0);">View Contact</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Mute Notifications</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Block Contact</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Clear Chat</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Report</a>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                </div>
                                <!--/ Chat Header -->

                                <!-- User Chat messages -->
                                <div class="user-chats">
                                    <div class="chats">
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36" />
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>How can we help? We're here for you! 😄</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36" />
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Hey John, I am looking for the best admin template.</p>
                                                    <p>Could you please help me to find it out? 🤔</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>It should be Bootstrap 4 compatible.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Yesterday</div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36" />
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Absolutely!</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>Vuexy admin is the responsive bootstrap 4 admin template.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36" />
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Looks clean and fresh UI. 😃</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>It's perfect for my next project.</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>How can I purchase it?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36" />
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Thanks, from ThemeForest.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36" />
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>I will purchase it for sure. 👍</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>Thanks.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                    <img src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36" />
                                                </span>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Great, Feel free to get in touch on</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>https://pixinvent.ticksy.com/</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- User Chat messages -->

                                <!-- Submit Chat form -->
                                <form class="chat-app-form" action="javascript:void(0);" onsubmit="enterChat();">
                                    <div class="input-group input-group-merge mr-1 form-send-message">
                                        <div class="input-group-prepend">
                                            <span class="speech-to-text input-group-text"><i data-feather="mic" class="cursor-pointer"></i></span>
                                        </div>
                                        <input type="text" class="form-control message" placeholder="Type your message or use speech to text" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <label for="attach-doc" class="attachment-icon mb-0">
                                                    <i data-feather="image" class="cursor-pointer lighten-2 text-secondary"></i>
                                                    <input type="file" id="attach-doc" hidden /> </label></span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary send" onclick="enterChat();">
                                        <i data-feather="send" class="d-lg-none"></i>
                                        <span class="d-none d-lg-block">Send</span>
                                    </button>
                                </form>
                                <!--/ Submit Chat form -->
                            </div>
                            <!--/ Active Chat -->
                        </section>
                        <!--/ Main chat area -->

                        <!-- User Chat profile right area -->
                        <div class="user-profile-sidebar">
                            <header class="user-profile-header">
                                <span class="close-icon">
                                    <i data-feather="x"></i>
                                </span>
                                <!-- User Profile image with name -->
                                <div class="header-profile-sidebar">
                                    <div class="avatar box-shadow-1 avatar-border avatar-xl">
                                        <img src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="user_avatar" height="70" width="70" />
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name">Kristopher Candy</h4>
                                    <span class="user-post">UI/UX Designer 👩🏻‍💻</span>
                                </div>
                                <!--/ User Profile image with name -->
                            </header>
                            <div class="user-profile-sidebar-area">
                                <!-- About User -->
                                <h6 class="section-label mb-1">About</h6>
                                <p>Toffee caramels jelly-o tart gummi bears cake I love ice cream lollipop.</p>
                                <!-- About User -->
                                <!-- User's personal information -->
                                <div class="personal-info">
                                    <h6 class="section-label mb-1 mt-3">Personal Information</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-1">
                                            <i data-feather="mail" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">kristycandy@email.com</span>
                                        </li>
                                        <li class="mb-1">
                                            <i data-feather="phone-call" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">+1(123) 456 - 7890</span>
                                        </li>
                                        <li>
                                            <i data-feather="clock" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Mon - Fri 10AM - 8PM</span>
                                        </li>
                                    </ul>
                                </div>
                                <!--/ User's personal information -->

                                <!-- User's Links -->
                                <div class="more-options">
                                    <h6 class="section-label mb-1 mt-3">Options</h6>
                                    <ul class="list-unstyled">
                                        <li class="cursor-pointer mb-1">
                                            <i data-feather="tag" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Add Tag</span>
                                        </li>
                                        <li class="cursor-pointer mb-1">
                                            <i data-feather="star" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Important Contact</span>
                                        </li>
                                        <li class="cursor-pointer mb-1">
                                            <i data-feather="image" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Shared Media</span>
                                        </li>
                                        <li class="cursor-pointer mb-1">
                                            <i data-feather="trash" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Delete Contact</span>
                                        </li>
                                        <li class="cursor-pointer">
                                            <i data-feather="slash" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Block Contact</span>
                                        </li>
                                    </ul>
                                </div>
                                <!--/ User's Links -->
                            </div>
                        </div>
                        <!--/ User Chat profile right area -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/app-chat.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>