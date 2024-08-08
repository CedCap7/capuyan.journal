<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">Edit Article</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="<?php echo site_url('home'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Edit Article
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('articles/update/' . $article['articleid']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-material">
                            <center class="mt-4">
                                <img src="<?php echo base_url("assets/images/articles/brokeCover.png"); ?>" id="articleImage" width="260">
                            </center>
                            <br>
                            <div class="text-center">
                                <input id="articleImageInput" class="center form-control" type="file" name="article_image" accept="image/*">
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                    <div class="mb-3">
                                        <label class="col-md-12">Title</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $article['title']?>" name="title" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-12">Keywords</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $article['keywords']?>" name="keywords" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-12">Abstract</label>
                                        <div class="col-md-12">
                                            <textarea name="abstract" id="abstract"><?= $article['abstract']?></textarea>
                                            <script>
                                                CKEDITOR.replace('abstract');
                                            </script>
                                        </div>
                                    </div>
                                    <div class="mb-3">
											<label class="col-md-12">DOI</label>
											<div class="col-md-12">
												<input type="text" value="<?= $article['doi']?>"  name="doi" class="form-control form-control-line">
											</div>
										</div>
										<div class="mb-3">
											<label class="col-md-12">Volume ID</label>
											<div class="col-md-12">
												<input type="text" value="<?= $article['volumeid']?>" name="volumeid" class="form-control form-control-line">
											</div>
										</div>
                                    <div class="mb-3">
                                        <label class="col-md-12">File (PDF)</label>
                                        <div class="col-md-12">
                                            <input type="file" name="filename" class="form-control form-control-line" accept=".pdf">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-100 py-2 mb-4 rounded-2">
                                            Update Article
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
