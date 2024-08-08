<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">User Profile</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="<?php echo site_url('home'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            User Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Left Column - Profile Picture -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body text-center">
                        <center class="mt-3">
                            <img src="<?php echo site_url(); ?>assets/images/users/<?php echo $user['profile_pic']; ?>" class='rounded-circle' width='250' >
                        </center>
                        <h4 class="card-title mt-2" style="font-size: 18px;"><?php echo $user['complete_name']; ?></h4>
                        <h6 class="card-subtitle" style="font-size: 18px;">
                          <?php if ($user['status'] == 0): ?>
                            <span class="badge rounded-pill bg-primary-subtle text-primary fw-semibold fs-2">
                              Inactive
                            </span>
                          <?php else: ?>
                            <span class="badge rounded-pill bg-success-subtle text-success fw-semibold fs-2">
                              Active
                            </span>
                          <?php endif; ?>
                        </h6>
                    </div>
                </div>
            </div>

            <!-- Right Column - User Details -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <small class="text-muted" style="font-size: 18px;">Email Address</small>
                            <h6 style="font-size: 20px;"><?php echo $user['email']; ?></h6>
                        </div>
                        <div class="mb-4">
                            <small class="text-muted" style="font-size: 18px;">Date Created</small>
                            <h6 style="font-size: 20px;"><?php echo $user['date_created']; ?></h6>
                        </div>

                        <div>
                            <small class="text-muted" style="font-size: 18px;">Social Profile</small>
                            <div class="card-body button-group d-flex align-items-stretch p-2">
                                <a href="" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center" style="font-size: 18px;">
                                    <iconify-icon icon="logos:facebook" width="24" height="24"></iconify-icon>
                                </a>
                                <a href="" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center" style="font-size: 18px;">
                                    <iconify-icon icon="devicon:twitter" width="20" height="20"></iconify-icon>
                                </a>
                                <a href="" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center" style="font-size: 18px;">
                                    <iconify-icon icon="skill-icons:instagram" width="24" height="24"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>
