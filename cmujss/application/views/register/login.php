<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Red_Theme">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="./assets/images/aw.png" />

  <!-- Core Css -->
  <link rel="stylesheet" href="./assets/css/styles.css" />

  <title>Login</title>
  <style>
    #main-wrapper {
      background-color: white !important;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }

    .auth-container {
      display: grid;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 50%;
    }

    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
    }

    .authentication-login {
      background-color: white !important;
      align-content: center;
      margin: 0px !important;
      padding: 0px !important;
    }

    .auth-max-width {
      width: 100%;
      max-width: 400px;
    }
    body {
      background-color: white !important;
    }
  </style>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="./assets/images/aw.png" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <a href="home" class="text-nowrap logo-img">
        <!-- Logo text -->
        <span class="logo-text">
          <!-- Light Logo text -->
          <img src="./assets/images/text.png" class="light-logo ps-2" alt="homepage" />
        </span>
      </a>
  <div id="main-wrapper">
    <div class="auth-container">
      <div class="form-container">
        <div class="authentication-login min-vh-100 row justify-content-center align-items-center p-4">
          <div class="auth-max-width">
            <h2 class="mb-3 fs-7 fw-bolder" style="color: black !important;">Welcome to CMU Journal</h2>
            <!-- <p class=" mb-4">Your Admin Dashboard</p> -->
            <?php echo form_open('users'); ?>
            <form action="" method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color: black !important">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" style="background-color: white !important;" aria-describedby="emailHelp" name="email" required>
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label" style="color: black !important">Password</label>
                <input type="password" class="form-control" style="background-color: white !important;" id="exampleInputPassword1" name="password" required>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                  <input class="form-check-input primary" style="background-color: #B3F3F8 !important; color: black !important; border-color: black !important" type="checkbox" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label text-dark" style="color: black !important" for="flexCheckChecked">
                    Remember this Device
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2" style="background-color: #B3F3F8 !important; color: black !important; border-color: black !important">Sign In</button>
              <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium" style="color: black !important">New here?</p>
                    <a class="text-primary fw-medium ms-2" style="color: black !important" href="registration">Create an
                      account</a>
                  </div>
            </form>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->

  <script src="./assets/js/app.dark.init.js"></script>
  <script src="./assets/libs/js/jquery.min.js"></script>
  <script src="./assets/js/app.min.js"></script>
  <script src="./assets/js/app.dark.init.js"></script>
  <!-- <script src="./assets/js/app.init.js"></script> -->
  <script src="./assets/css/bootstrap.bundle.min.js"></script>
  <script src="./assets/libs/js/simplebar.min.js"></script>
  <script src="./assets/libs/js/iconify-icon.min.js"></script>
  <script src="./assets/js/sidebarmenu.js"></script>
  <script src="./assets/js/theme.js"></script>
  <script src="./assets/js/feather.min.js"></script>
</body>

</html>
