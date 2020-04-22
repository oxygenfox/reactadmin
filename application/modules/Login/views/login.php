<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=PATH_ASSETS?>img/favicon.png}">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=PATH_ASSETS?>img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=PATH_ASSETS?>img/favicon.png">
    <!-- Primary Meta Tags -->
    <title>Your Name | Halaman login</title>
    <meta name="title" content="">
    <meta name="description" content="">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="<?=PATH_ASSETS?>img/favicon.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="website">
    <meta property="twitter:url" content="">
    <meta property="twitter:title" content="">
    <meta property="twitter:description" content="">
    <meta property="twitter:image" content="<?=PATH_ASSETS?>img/favicon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=PATH_ASSETS?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=PATH_ASSETS?>plugins/ionicons/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=PATH_ASSETS?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=PATH_ASSETS?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="register-logo">
            <a href="#">Your Name</a>
        </div>
        <!-- /.login-logo -->

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?=base_url('login')?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    
                </form>

                <br/>
                <p class="mb-0">
                    <a href="<?=base_url('register')?>" class="text-center">Register</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?=PATH_ASSETS?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=PATH_ASSETS?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=PATH_ASSETS?>dist/js/adminlte.min.js"></script>

</body>
</html>
