<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="dark" data-color-theme="Red_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Favicon icon-->
    <link
    rel="shortcut icon"
    type="image/png"
    href="<?php echo base_url("./assets/images/aw.png")?>"/>

    <!-- Core Css -->
    <link rel="stylesheet" href="<?php echo base_url("./assets/css/styles.css")?>"/>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <!-- <script src="<?= base_url("./assets/ckeditor/ckeditor.js")?>"></script> -->

    <title>Journal</title>
</head>

<style>
  .sidebar-nav {
    background-color: white;
  }
  .topbar {    
    background-color: #B3F3F8;
  }
  .hide-menu {
    color: black;
  }
  .active {
    color: white !important;
    background-color: #B3F3F8 !important;
  }
</style>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="<?php echo base_url("assets/images/aw.png")?>" alt="loader" class="lds-ripple img-fluid" />
    </div>
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar card rounded-0 border-0">
                <div class="with-vertical"><!-- ---------------------------------- -->
                    <!-- Start Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                    <nav class="navbar navbar-expand-lg px-lg-0 px-3 py-0">
                        <div class="d-none d-lg-block"><div class="brand-logo d-flex align-items-center justify-content-between">
                            <a href="../cmujss/home.php" class="text-nowrap logo-img d-flex align-items-center gap-6">
                                <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img
                                    src="<?php echo base_url("./assets/images/text.png")?>"
                                    alt="homepage"
                                    class="dark-logo"
                                    />
                                    <!-- Light Logo text -->
                                    <img
                                    src="<?php echo base_url("./assets/images/text2.png")?>"
                                    class="light-logo"
                                    alt="homepage"
                                    />
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="d-block d-lg-none"><div class="brand-logo d-flex align-items-center justify-content-between">
                        <a href="../dark/index.html" class="text-nowrap logo-img d-flex align-items-center gap-6">
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <img
                                src="<?php echo base_url("./assets/images/aw2.png")?>"
                                alt="homepage"
                                class="dark-logo"
                                />
                                <!-- Light Logo icon -->
                                <img
                                src="<?php echo base_url("./assets/images/aw2.png")?>"
                                alt="homepage"
                                class="light-logo"
                                />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img
                                src="<?php echo base_url("./assets/images/text.png")?>"
                                alt="homepage"
                                class="dark-logo"
                                />
                                <!-- Light Logo text -->
                                <img
                                src="<?php echo base_url("./assets/images/text2.png")?>"
                                class="light-logo"
                                alt="homepage"
                                />
                            </span>
                        </a>
                    </div>


                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center justify-content-between">
                        
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link nav-icon-hover moon dark-layout" href="javascript:void(0)">
                                    <iconify-icon icon="solar:moon-line-duotone" class="moon"></iconify-icon>
                                </a>
                                <a class="nav-link nav-icon-hover sun light-layout" href="javascript:void(0)">
                                    <iconify-icon icon="solar:sun-2-line-duotone" class="sun"></iconify-icon>
                                </a>
                            </li>

                            <li class="nav-item d-none d-lg-block search-box">
                                <a class="nav-link nav-icon-hover d-none d-md-flex waves-effect waves-dark" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <iconify-icon icon="solar:magnifer-linear"></iconify-icon>
                                </a>
                            </li>

                            <!-- ------------------------------- -->
                            <!-- start profile Dropdown -->
                            <!-- ------------------------------- -->
                            <li class="nav-item hover-dd dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" aria-expanded="false">
                                    <img src="<?php echo base_url("./assets/images/users/noimages.png")?>" alt="user"
                                    class="profile-pic rounded round-30" />
                                </a>
                                <div class="dropdown-menu pt-0 content-dd overflow-hidden pt-0 dropdown-menu-end user-dd"
                                aria-labelledby="drop2">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class=" py-3 border-bottom">
                                        <div class="d-flex align-items-center px-3">
                                            <img src="<?php echo base_url("./assets/images/users/noimages.png")?>" class="rounded" width="50" height="50" alt="" />
                                            <div class="ms-3">
                                                <h5 class="mb-0 fs-4">C Capuyan</h5>
                                                <p class="mb-0 d-flex align-items-center text-muted">

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-body pb-3">
                                        <div class="px-3 pt-3">
                                            <div class="h6 mb-0 dropdown-item py-8 px-3 rounded-2 link">
                                                <a href="#"
                                                class=" d-flex  align-items-center ">
                                                My Profile
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="px-3">
                                        <div class="py-8 px-3 d-flex justify-content-between dropdown-item align-items-center h6 mb-0  rounded-2 link">
                                            <a href="#" class="">
                                                Mode
                                            </a>
                                            <div>
                                                <a class="moon dark-layout" href="javascript:void(0)">
                                                    <iconify-icon icon="solar:moon-line-duotone" class="moon"></iconify-icon>
                                                </a>
                                                <a class="sun light-layout" href="javascript:void(0)">
                                                    <iconify-icon icon="solar:sun-2-line-duotone" class="sun"></iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="py-8 px-3 d-flex justify-content-between dropdown-item align-items-center h6 mb-0  rounded-2 link">
                                            <a href="#"
                                            class=" d-flex  align-items-center  ">
                                            Account Settings
                                        </a>
                                        <div>
                                            <a class="log out-layout" href="">
                                                <iconify-icon icon="flowbite:user-settings-outline" ></iconify-icon>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="py-8 px-3 d-flex justify-content-between dropdown-item align-items-center h6 mb-0  rounded-2 link">
                                        <a href="<?php echo base_url("home")?>"
                                            class=" d-flex  align-items-center ">
                                            Sign Out
                                        </a>
                                        <div>
                                            <a class="log out-layout" href="home">
                                                <iconify-icon icon="solar:logout-outline" class="logout"></iconify-icon>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>
<!--  Header End -->


<!-- Modal for Confirmation Dialog -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        Are you sure you want to delete this article?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a id="confirmDeleteButton" href="#" class="btn btn-danger">Delete</a>
    </div>
</div>
</div>
</div>


<!-- Modal for Confirmation Dialog -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        Are you sure you want to delete this user?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a id="confirmDeleteButton" href="#" class="btn btn-danger">Delete</a>
    </div>
</div>
</div>
</div>