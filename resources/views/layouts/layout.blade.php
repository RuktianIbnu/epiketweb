<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#009688">

    <title>E-Piket</title>

    <!-- Favicon-->
    <link rel="icon" sizes="192x192" href="{{url('/imilogo.png')}}" type="image/x-icon">

    <!-- START CSS ASSET -->
    <!-- Google Fonts -->
    <link href="{{url('css/font.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/icon.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">


    <!-- Waves Effect Css -->
    <link href="{{url('assets/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url('assets/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
    
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/plugins/datatables/datatables.min.css')}}"/>
 
     <!-- Datepicker -->
    <link href="{{url('assets/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" />
    
    <!-- Daterangepicker -->
    <link href="{{url('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

    <!-- fileinput -->
    <link href="{{url('assets/plugins/fileinput/css/fileinput.min.css')}}" rel="stylesheet" />
    
    <!-- sweetalert -->
    <link href="{{url('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />

    <!-- Perfect scrollbar -->
    <link href="{{url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />

    <!-- END CSS ASSET -->


    <!-- START JS ASSET -->

    <!-- Jquery Core Js -->
    <script src="{{url('assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
    </script>
    <!-- END JS ASSET -->

</head>

<style type="text/css">
.modal-open  .container, .modal-open .sidebar, .modal-open .navbar {
    -webkit-filter: blur(2px);
	-moz-filter: blur(2px);
	filter: blur(2px);
}

pre {
    white-space: pre-wrap;       /* Since CSS 2.1 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */
}

.bottom-right {
    right: -1;
    bottom: 0;
    position: absolute;
}

</style>

<body class="theme-deep-purple">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-pink">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Silahkan Tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a class="bars"></a>
                <a class="navbar-brand">
                    <div class="navbar-brand-name">
                        <img src="{{url('assets\images\logoimi.png')}}" width="80" height="40" alt="User" style="margin: -15px 10px;" />
                        <label>E-Piket</label>
                    </div>
                </a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <!-- @if(Auth::user()->photo != null)
                        <img src="{{url(Auth::user()->photo)}}" width="48" height="48" alt="User" />
                    @else
                        <img src="{{url('assets\template\img\user.png')}}" width="48" height="48" alt="User" />
                    @endif -->
                </div>
                <br/>
                <br/>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->nama}} - {{Auth::user()->nip}}</div>
                    <div class="email"> 
                        @if (Auth::user()->level_pengguna == 1)
                            <span class="badge bg-orange">SUPERADMIN</span>
                        @elseif (Auth::user()->level_pengguna == 2)
                            <span class="badge bg-cyan">DIREKTUR</span>
                        @elseif (Auth::user()->level_pengguna == 3)
                            <span class="badge bg-teal">KASUBDIT</span>
                        @elseif (Auth::user()->level_pengguna == 4)
                            <span class="badge bg-pink">KASI</span>
                        @elseif (Auth::user()->level_pengguna == 5)
                            <span class="badge bg-pink">PETUGAS</span>
                        @endif
                    </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a  href="{{ route('account', ['id' => Auth::id()]) }}"><i class="material-icons">face</i>Ubah Profil</a></li>
                            <li><a onclick="$('#modal_ubah_sandi').modal('show')"><i class="material-icons">lock</i>Ubah Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">NAVIGASI UTAMA</li>
                    <li class="active">
                        <a href="{{url('/')}}">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    @if (Auth::user()->aktif == 1)

                    @can('Aksi master')
                    <li>
                        <a class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Register User</span>
                        </a>
                        <ul class="ml-menu">
                            @if(Gate::check('Aksi master'))
                            <li>
                                <a href="{{url('registeruser/registeruser')}}">
                                    <span>Register User</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endcan

                    @can('Aksi master')
                    <li>
                        <a class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Master</span>
                        </a>
                        <ul class="ml-menu">
                            @if(Gate::check('Aksi master'))
                            <li>
                                <a href="{{url('masterdata/petugas')}}">
                                    <span>Master Data Pegawai</span>
                                </a>
                                <a href="{{url('masterdata/subdit')}}">
                                    <span>Master Subdirektorat</span>
                                </a>
                                <a href="{{url('masterdata/seksi')}}">
                                    <span>Master Seksi</span>
                                </a>
                                <a href="{{url('masterdata/kegiatan')}}">
                                    <span>Master Jenis Kegiatan</span>
                                </a>
                                <a href="{{url('masterdata/ruang')}}">
                                    <span>Master Ruang Pusdakim</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endcan

                    @can('Semua proses pendataan')
                    <li>
                        <a class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Transaksi</span>
                        </a>
                        <ul class="ml-menu">
                            @if(Gate::check('Semua proses pendataan'))
                            <li>
                                <a href="{{url('transaksi/pendataan')}}">
                                    <span>Pendataan Tamu / Vendor</span>
                                </a>
                                <!-- <a href="{{url('transaksi/PendataanDrcBali')}}">
                                    <span>Pendataan Piket DRC Bali</span>
                                </a> -->
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endcan
                    
                    @can('Mencetak seluruh Laporan')
                    <li>
                        <a class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            @if(Gate::check('Mencetak seluruh Laporan'))
                            <li>
                                <a href="{{url('laporan/laporan')}}">
                                    <span>History Data Tamu</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endcan

                    @endif

                    <li>
                        <a href="{{url('logout')}}">
                            <i class="material-icons">power_settings_new</i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; {{date('Y')}} <a>KEMENKUMHAM-DITJEN IMIGRASI</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
              @yield('content')
        </div>
    </section>
    @extends('layouts.modal-ubah-password')
</body>

<!-- Select Plugin Js -->
<script src="{{url('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{url('assets/plugins/node-waves/waves.js')}}"></script>

<!-- Custom Js -->
<script src="{{url('assets/js/admin.js')}}"></script>
<script src="{{url('assets/js/function.js')}}"></script>

<!-- Datatables -->
<script type="text/javascript" src="{{url('assets/plugins/datatables/datatables.min.js')}}"></script>

<!-- Datepicker -->
<script src="{{url('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{url('assets/plugins/datepicker/locales/bootstrap-datepicker.id.js')}}"></script>

<!-- Daterangepicker -->
<script src="{{url('assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{url('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- fileinput -->
<script src="{{url('assets/plugins/fileinput/js/plugins/piexif.min.js')}}"></script>
<script src="{{url('assets/plugins/fileinput/js/fileinput.min.js')}}"></script>
<script src="{{url('assets/plugins/fileinput/js/locales/id.js')}}"></script>

<!-- sweetalert -->
<script src="{{url('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>

<!-- float thead -->
<script src="{{url('assets/plugins/floathead/jquery.floatThead.min.js')}}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{url('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

<!-- chart.js chart -->  
<script src="{{url('/assets/plugins/chartjs/Chart.min.js')}}"></script> 

<!-- JQuery Loading Overlay -->
<script src="{{url('/assets/plugins/jquery-loading-overlay/src/loadingoverlay.min.js')}}"></script>

<!-- Perfect scrollbar -->
<script src="{{url('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{url('assets/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Jquery simple money format Plugin Js -->
<script src="{{url('assets/plugins/money-format/simple.money.format.js')}}"></script>
<script src="{{url('assets/plugins/money-format/accounting.min.js')}}"></script>

@if (session('permission-denied'))

<script type="text/javascript">
    showNotification('bg-pink', "{{session('permission-denied')}}", 'bottom', 'left')
</script>

@endif

<script type="text/javascript">
    moment.locale('id')

    $('.money').simpleMoneyFormat()
    
    accounting.settings = {
        currency: {
            symbol : "Rp.",   // default currency symbol is '$'
            format: "%s%v", // controls output: %s = symbol, %v = value/number (can be object: see below)
            decimal : ".",  // decimal point separator
            thousand: ",",  // thousands separator
            precision : 2   // decimal places
        },
        number: {
            precision : 0,  // default precision on numbers is 0
            thousand: ",",
            decimal : "."
        }
    }

    @php
        $file_name_loader = ['loading-a.gif', 'loading-b.gif', 'loading-c.gif', 'loading-d.gif'];
        $file_loader = $file_name_loader[mt_rand(0, count($file_name_loader) - 1)];
    @endphp

    var copyright = '<div class="bottom-right"><label>Animation all made by</label>&nbsp;<label><a href="http://galshir.com">Gal Shir.</a></label></div>'

    $.LoadingOverlaySetup({
        image           : '{{url("assets/images/loaders/$file_loader")}}',
        custom          : copyright,
        maxSize         : '300px',
        minSize         : '200px',
        resizeInterval  : 0,
        size            : '50%'
    })

    $(document).ajaxStart(function(){
        $.LoadingOverlay("show")
    })

    $(document).ajaxStop(function(){
        $.LoadingOverlay("hide")
    })
</script>

@stack('script-footer')

</html>