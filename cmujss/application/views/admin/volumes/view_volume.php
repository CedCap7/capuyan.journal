<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">volume Details</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="<?php echo site_url('home'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="<?php echo site_url('volumes'); ?>">Volume</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Volume Details
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body  p-10">
                        <h2><?php echo $volume['vol_name']; ?></h2> <hr>
                        <p><h6>Abstract </h6> <?php echo $volume['description']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
