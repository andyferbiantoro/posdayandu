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
    <title>Detail Imunisasi</title>

      




    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css">
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-invoice-list.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern bordered-layout  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="" data-layout="bordered-layout">

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
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span><span class="user-status">Kader</span></div>
                        @foreach($foto as $profil)
                        <span class="avatar"><img class="round" src="{{asset('uploads/fotoprofil/'.$profil->image)}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                        @endforeach
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
                
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('kader-pesan') }}"><i data-feather="message-square"></i><span class="menu-title text-truncate" data-i18n="Chat">Pesan</span></a>
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
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('kader-daftar_pengguna') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Daftar">Daftar Pengguna</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('kader-agenda') }}"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="Agenda">Agenda</span></a>
                </li>
                <li class="nav-item" style="background-color: #a21000; border-radius: 5px; margin-left: 15px; margin-right: 15px"><a class="d-flex align-items-center" href="{{ route('kader-entri') }}"><i data-feather="file-text" style="color: white"></i><span class="menu-title text-truncate" data-i18n="Entri Data" style="color: white">Entri Data</span></a>
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
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <!-- begin tabel -->
                    <div class="row" id="table-striped">
                    <div class="col-12">
                        <div class="card">
                             <div class="card-header">
                               <h1>Detail Imunisasi</h1>
                            </div>
                            <div class="card-body">
                            
                             <a href="{{ route('kader-entri') }}"><button class="btn btn-danger">Kembali</button></a><br><br>
                              @foreach($detail as $imunisasi)
                                <h2 class="card-title">{{$imunisasi->nama_anak}}</h2>
                                @endforeach
                            <div class="table-responsive"><br>
                              
                                <table class="table table-striped">
                                
                                    <thead>
                                        <tr>    	
                                        	<th class="text-center">No.</th>
                                        	 <th class="text-center">Tanggal</th>
                                            <th class="text-center">Nama Anak</th> 
                                            <th class="text-center">Umur</th>
                                            <th class="text-center">Nama Vaksin</th>                                            
                                            <th class="text-center">Keterangan</th> 
                                            <th class="text-center">Jeniss</th> 
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                       @foreach($detail as $imunisasi)
                                      
                                        <tr>
                                        	<td class="text-center">{{$no++}}</td>
                                        	<td class="text-center">{{$imunisasi->tanggal}}</td>
                                           	<td class="text-center">{{$imunisasi->nama_anak}}</td>
                                           	<td class="text-center">{{$imunisasi->umurs->umur}} Bulan</td>
                                           	<td class="text-center">{{$imunisasi->nama_vaksin}}</td>       	
                                           	<td class="text-center">{{$imunisasi->keterangan}}</td>
                                           	<td class="text-center">{{$imunisasi->jenis}}</td>
                                           


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                <!-- Dashboard Analytics end -->

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
    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="app-assets/js/scripts/pages/app-invoice-list.js"></script>
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