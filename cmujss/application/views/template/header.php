<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Red_Theme">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Journal</title>
  <link rel="stylesheet" href="./assets/libs/prism-okaidia.min.css">
  <!-- Favicon icon-->
  <link
  rel="shortcut icon"
  type="image/png"
  href="./assets/images/aw.png"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@0.1.2/css/themify-icons.css" />

  <!-- Core Css -->
  <link rel="stylesheet" href="./assets/css/styles.css" />

  <title></title>
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="./assets/libs/owl.carousel.min.css" />
  <link rel="stylesheet" href="./assets/libs/aos.css" />
</head>

<style>
  * {
    background-color: white;
  }

  .topheader {
    background-color: #B3F3F8;
  }
  .container {
    background-color: #B3F3F8;
  }
  .navbar {
    background-color: #B3F3F8;
  }
  .collapse {
    background-color: #B3F3F8;
  }
  .scroll-link {
    color: black !important;
    background-color: #B3F3F8;
  }
  a {
    color: black !important;
  }
  .navbar-nav {
    background-color: #B3F3F8;
  }
  .navbar-brand {
    background-color: #B3F3F8;
  }
  img {
    background-color: #B3F3F8;
  }
  p {
    color: black !important;
  }
  .hero-section {
    background: url('./assets/images/background/about.jpg') no-repeat center center/cover;
    color: black !important;
    padding: 60px 0;
  }
  .hero-content {
    background-color: rgba(255, 255, 255, 0.8); /* Adjust the transparency as needed */
    padding: 20px;
    border-radius: 10px;
  }
</style>
<body class="overflow-x-hidden">
  <!-- Preloader -->
  <div class="preloader">
    <img src="./assets/images/aw.png" alt="loader" class="lds-ripple img-fluid" />
  </div>

  <!--Main-wrapper-->
  <div class="landingpage">
    <div class="main-wrapper">
      <header class="topheader py-3" id="top">
        <div class="container">
          <nav class="navbar navbar-expand-md navbar-light ps-0">
            <!-- Logo will be here -->
            <a class="navbar-brand" href="<?php echo base_url("")?>">
              <img src="./assets/images/text.png" alt="logo" />
            </a>

            <!--Toggle button-->
            <button class="navbar-toggler navbar-toggler-right border-0 p-0 fs-8" type="button"
            data-bs-toggle="offcanvas" href="#right-sidebar">
            <iconify-icon icon="solar:hamburger-menu-line-duotone"></iconify-icon>
          </button>

          <!-- This is the navigation menu -->
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto stylish-nav">
              <li class="nav-item">
                <a style="color: black !important" class="nav-link scroll-link" href="home">Home</a>
              </li>
              <li class="nav-item">
                <a style="color: black !important" class="nav-link scroll-link" href="#about">About</a>
              </li>
               <li class="nav-item">
                <a style="color: black !important" class="nav-link scroll-link" href="home">Latest</a>
              </li>
              <li class="nav-item">
                <a style="color: black !important" class="nav-link scroll-link" href="archive">Archives</a>
              </li>
              <li class="nav-item ms-3 mt-2 mt-md-0">
                <a style="color: white !important; background-color: black !important; border-color: black;" class="btn btn-primary" href="login">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <!-- start banner -->
    <section class="hero-section position-relative overflow-hidden mb-0 mb-lg-5" id="about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-6">
            <div class="hero-content my-5 my-xl-0">
              <h3 class="fw-bolder mb-7 fs-13" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" style="color: black !important">
                About Journal
              </h3>
              <p style="color: black !important;" data-aos="fade-up" data-aos-delay="600"
              data-aos-duration="1000">Curabitur nec magna mauris. Praesent sagittis, eros at fringilla gravida, massa turpis bibendum orci, et tincidunt orci purus in lectus. Aliquam elementum, quam eu scelerisque placerat, velit odio molestie tellus, vel consectetur orci dui vel tellus.
            </p>
            <div class="d-sm-flex align-items-center gap-3" data-aos="fade-up" data-aos-delay="800"
            data-aos-duration="1000">
                    <a style="color: black !important; background-color: #B3F3F8; border-color: black" class="btn btn-outline-primary d-block scroll-link px-7 py-6" href="login">Get Started</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end banner -->

        <!-- apps start -->
        
        <!-- apps end -->

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
