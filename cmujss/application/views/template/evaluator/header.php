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

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="<?php echo base_url("assets/images/aw.png")?>" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div><!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <!-- Sidebar scroll-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <!-----------Profile------------------>
                        
                        <li class="sidebar-item sidebar-profile pt-2">
                            <a class="sidebar-link has-arrow opacity-100 gap-2" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                    <img src="<?php echo base_url("./assets/images/users/noimages.png")?>" class="rounded" width="30" alt="user">
                                </span>
                                <span class="hide-menu fw-medium">RM DIAZ </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="javascript:void(0)" class="sidebar-link sublink">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <iconify-icon icon="solar:stop-circle-line-duotone"></iconify-icon>
                                        </div>
                                        <span class="hide-menu">My Profile</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                  <a href="<?php echo base_url("home")?>" class="sidebar-link sublink">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                      <iconify-icon icon="solar:stop-circle-line-duotone"></iconify-icon>
                                  </div>
                                  <span class="hide-menu">Logout</span>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- ---------------------------------- -->
                  <!-- Home -->
                  <!-- ---------------------------------- -->

                  <li class="nav-small-cap">
                    <iconify-icon
                    icon="solar:menu-dots-bold"
                    class="nav-small-cap-icon fs-4"
                    ></iconify-icon>
                    <span class="hide-menu">MENU</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo base_url("submissions")?>">
                        <iconify-icon icon="ph:books-thin" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Articles</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo base_url("volumes")?>">
                        <iconify-icon icon="material-symbols-light:menu-book-outline" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Volume</span>
                    </a>
                </li>

                <!-- End Sidebar scroll-->
            </div>
        </aside>
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar card rounded-0 border-0">
                <div class="with-vertical"><!-- ---------------------------------- -->
                    <!-- Start Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                    <nav class="navbar navbar-expand-lg px-lg-0 px-3 py-0">
                        <div class="d-none d-lg-block"><div class="brand-logo d-flex align-items-center justify-content-between">
                            <a href="../dark/index.html" class="text-nowrap logo-img d-flex align-items-center gap-6">
                                <b class="logo-icon">
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                    <!-- Dark Logo icon -->
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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                <iconify-icon icon="solar:list-broken"></iconify-icon>
                            </a>
                        </li>
                    </ul>

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
                                                <h5 class="mb-0 fs-4">RM DIAZ</h5>
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
