<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">Article Details</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="<?php echo site_url('home'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="<?php echo site_url('articles'); ?>">Articles</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Article Details
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body  p-10">
                        <h2><strong><?php echo $article['title']; ?></strong></h2> <hr>
                    
                        <p class="card-text">
                            <strong>Author/s:</strong> <?php echo $article['author']; ?>
                        <br>
                            <strong>DOI:</strong> <a href="<?php echo $article['doi']; ?>" style="color: blue !important"><?php echo $article['doi']; ?></a>
                        <br>
                        <strong>Keywords: </strong> <?php echo $article['keywords']; ?><br>
                            <strong>Volume: </strong><a href=""><?php echo $volume['vol_name']; ?></a>
                        </p>
                        <p>
                        <strong>Abstract</strong><?php echo $article['abstract']; ?>
                        </p>
                        
                    </div>

                    <div class="card-body button-group d-flex align-items-stretch p-10">
                        
                        <div class="ms-auto">
                            <a href="<?= base_url('./assets/articles/' . $article['filename']); ?>" target="_blank" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center flex-column flex-sm-row">
                                <iconify-icon icon="bi:file-earmark-pdf" width="24" height="24"></iconify-icon>
                                &nbsp; PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
