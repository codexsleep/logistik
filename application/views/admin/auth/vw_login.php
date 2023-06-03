<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | SIMLOG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/icon.svg">

    <!-- Loading button css -->
    <link href="<?= base_url() ?>assets/libs/ladda/ladda.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="<?= base_url() ?>assets/js/head.js"></script>

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div id="message"></div>
                    <div class="card bg-pattern" style="margin-top:10%; box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);">
                        <div class="card-body p-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <div class="text-center w-75 m-auto mb-3">
                                <div class="auth-logo">
                                    <a href="<?= base_url() ?>" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="<?= base_url() ?>assets/images/logo.svg" alt="" height="40">
                                        </span>
                                    </a>
                                    <a href="<?= base_url() ?>" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="<?= base_url() ?>assets/images/logo.svg" alt="" height="22">
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <form id="sign-in" method="POST">

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email-input" name="email" placeholder="Masukkan alamat email anda" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control pe-5" name="password" placeholder="Masukkan password anda" id="password-input" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="auth-remember-check" checked>
                                        <label class="form-check-label" for="checkbox-signin">Ingat Saya</label>
                                    </div>
                                </div>

                                <div class="text-center d-grid">
                                    <button class="btn btn-primary ladda-button" id="signin-btn" type="submit" dir="ltr" data-style="slide-left"> Masuk </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        <script>
            document.write(new Date().getFullYear())
        </script> &copy; Pegadaian - Logistik | Creaft with ❤️ <a href="" class="text-black-50">TTF From Politeknik Caltex Riau</a>
    </footer>

    <!-- JQuery js -->
    <script src="<?= base_url() ?>assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquerypage.js"></script>F
    <script type="text/javascript">
        var site_url = "<?= base_url(); ?>";
        signin();
    </script>

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
    <!-- Loading buttons js -->
    <script src="<?= base_url() ?>assets/libs/ladda/spin.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/ladda/ladda.min.js"></script>

    <!-- Buttons init js-->
    <script src="<?= base_url() ?>assets/js/pages/loading-btn.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>

</body>

</html>