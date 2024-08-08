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

  <title>Registration</title>
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
            <form action="registration" method="post">
              <div class="mb-3">
                <label for="exampleInputText" class="form-label">Name</label>
                <input type="text" name="complete_name" class="form-control" id="exampleInputText" style="background-color: white !important;" aria-describedby="textHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" style="background-color: white !important;" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" style="background-color: white !important;">
              </div>
              <a href="login" class="btn btn-primary w-100 py-8 mb-4 rounded-2" style="background-color: #B3F3F8 !important; color: black !important; border-color: black !important;">Sign Up</a>
              <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                <a class="text-primary fw-medium ms-2" style="color: black !important;"href="login">Sign In</a>
              </div>
            </form>
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
