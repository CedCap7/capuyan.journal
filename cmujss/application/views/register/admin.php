<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Red_Theme">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="./assets/images/aw.png" />
    <!-- Core Css -->
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .authentication-login {
            padding: 20px;
            width: 100%;
            max-width: 500px; /* Set maximum width for the login container */
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="./assets/images/aw.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-3">
                <div class="container-fluid">
                    <div class="row login-container">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                            <div class="authentication-login bg-body p-4">
                                <h2 class="text-center mb-4">Welcome Admin</h2>
                                <!-- Login form -->
                                <?php echo form_open('admin/login'); ?>
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                                    </div>
                                    <?php if (isset($error_message)) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $error_message; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Login</button>
                                    </div>
                                </form>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->
    <!-- <script src="./assets/js/app.dark.init.js"></script>
    <script src="./assets/libs/js/jquery.min.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/js/app.init.js"></script>
    <script src="./assets/css/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/js/simplebar.min.js"></script>
    <script src="./assets/libs/js/iconify-icon.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/theme.js"></script>
    <script src="./assets/js/feather.min.js"></script> -->

    <script src="./assets/libs/js/jquery.min.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/js/app.dark.init.js"></script>
    <script src="./assets/libs/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/js/simplebar.min.js"></script>
    <script src="./assets/libs/iconify-icon.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/theme.js"></script>
    <script src="./assets/js/feather.min.js"></script>
</body>

</html>
