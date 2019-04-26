<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard One | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css')?>">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/font-awesome.min.css')?>">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/owl.carousel.css')?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/owl.theme.css')?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/owl.transitions.css')?>">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/meanmenu/meanmenu.min.css')?>">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/animate.css')?>">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/normalize.css')?>">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/scrollbar/jquery.mCustomScrollbar.min.css')?>">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/jvectormap/jquery-jvectormap-2.0.3.css')?>">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/notika-custom-icon.css')?>">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/wave/waves.min.css')?>">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/main.css')?>">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/style.css')?>">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/responsive.css')?>">
    <!-- modernizr JS
		============================================ -->
    <script src="<?= base_url('asset/js/vendor/modernizr-2.8.3.min.js')?>')?>"></script>
</head>

<body style>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    
   
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <?php if($this->session->has_userdata('kd_petugas')) { ?>
                        <li class="<?=($activePage == 'home') ? 'active' : ''?>"><a href="<?= base_url('AdminPetugas/index')?>"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li class="<?=($activePage == 'buku') ? 'active' : ''?>"><a href="<?= base_url('Buku/index')?>"><i class="notika-icon notika-app"></i> Data Buku</a>
                        <li class="<?=($activePage == 'anggota') ? 'active' : ''?>"><a href="<?= base_url('Anggota/index')?>"><i class="notika-icon notika-app"></i> Data Anggota</a>
                        <li class="<?=($activePage == 'peminjaman') ? 'active' : ''?>"><a href="<?= base_url('Peminjaman/index')?>"><i class="notika-icon notika-app"></i> Data Peminjaman</a>
                        </li>
                        <?php } elseif($this->session->has_userdata('kd_anggota')) { ?>
                        <li class="<?=($activePage == 'peminjamanBuku') ? 'active' : ''?>"><a href="<?= base_url('PeminjamanBuku/index')?>"><i class="notika-icon notika-app"></i>Peminjaman</a>
                        <?php } ?>
                        <li><a href="<?= base_url('Login/Logout')?>"><i class="notika-icon notika-app"></i> Logout</a>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <main style="min-height: calc(100vh - 222px);">