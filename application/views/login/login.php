<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Register | Notika - Notika Admin Template</title>
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
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/font-awesome.min.css')?>">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/owl.carousel.css')?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/owl.theme.css')?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/owl.transitions.css')?>">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/animate.css')?>">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/normalize.css')?>">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/scrollbar/jquery.mCustomScrollbar.min.css')?>">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/wave/waves.min.css')?>">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('asset/css/notika-custom-icon.css')?>">
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
    <script src="<?= base_url('asset/js//vendor/modernizr-2.8.3.min.js')?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <div class="nk-form">
                <form method="POST" action="<?= base_url('login/proses')?>">
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                        <div class="nk-int-st">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                     <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <select class="form-control" name="jenis">
                                <option value="anggota">Anggota</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    </div>                    
                   <!--  <div class="fm-checkbox">
                        <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label>
                    </div> -->
                    <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
                </form>
            </div>

           <!--  <div class="nk-navigation nk-lg-ic">
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div> -->
        </div>

        
    </div>
    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <script src="<?= base_url('asset/js//vendor/jquery-1.12.4.min.js')?>"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= base_url('asset/js//bootstrap.min.js')?>"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= base_url('asset/js//wow.min.js')?>"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= base_url('asset/js//jquery-price-slider.js')?>"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= base_url('asset/js//owl.carousel.min.js')?>"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url('asset/js//jquery.scrollUp.min.js')?>"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= base_url('asset/js//meanmenu/jquery.meanmenu.js')?>"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?= base_url('asset/js//counterup/jquery.counterup.min.js')?>"></script>
    <script src="<?= base_url('asset/js//counterup/waypoints.min.js')?>"></script>
    <script src="<?= base_url('asset/js//counterup/counterup-active.js')?>"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url('asset/js//scrollbar/jquery.mCustomScrollbar.concat.min.js')?>"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?= base_url('asset/js//sparkline/jquery.sparkline.min.js')?>"></script>
    <script src="<?= base_url('asset/js//sparkline/sparkline-active.js')?>"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?= base_url('asset/js//flot/jquery.flot.js')?>"></script>
    <script src="<?= base_url('asset/js//flot/jquery.flot.resize.js')?>"></script>
    <script src="<?= base_url('asset/js//flot/flot-active.js')?>"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?= base_url('asset/js//knob/jquery.knob.js')?>"></script>
    <script src="<?= base_url('asset/js//knob/jquery.appear.js')?>"></script>
    <script src="<?= base_url('asset/js//knob/knob-active.js')?>"></script>
    <!--  Chat JS
		============================================ -->
    <script src="<?= base_url('asset/js//chat/jquery.chat.js')?>"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?= base_url('asset/js//wave/waves.min.js')?>"></script>
    <script src="<?= base_url('asset/js//wave/wave-active.js')?>"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?= base_url('asset/js//icheck/icheck.min.js')?>"></script>
    <script src="<?= base_url('asset/js//icheck/icheck-active.js')?>"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?= base_url('asset/js//todo/jquery.todo.js')?>"></script>
    <!-- Login JS
		============================================ -->
    <script src="<?= base_url('asset/js//login/login-action.js')?>"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= base_url('asset/js//plugins.js')?>"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url('asset/js//main.js')?>"></script>
</body>

</html>