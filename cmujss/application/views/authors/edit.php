<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">Edit Author</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="home">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Edit Author
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Left Column - Profile Picture -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
						<form action="<?= base_url('authors/update_profile/' . $author['auid']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-material">
                            <center class="mt-4">
                                <img src="<?php echo base_url("assets/images/users/noimages.jpg ");?>" id="profilePic" class="rounded-circle" width="260">
                            </center>
                            <br>
                            <div class="text-center">
                                <input id="profilePicInput" class="center form-control" type="file" name="images" accept="image/*">
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
									<div class="mb-3">
                                        <label class="col-md-12" for="authorName">Author Name</label>
                                        <div class="col-md-12">
                                            <input id="authorName" type="text" value="<?= $author['author_name']; ?>" name="author_name" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?= $author['email']; ?>" name="email" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-12">Contact Number</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $author['contact_num']; ?>" name="contact_num" class="form-control form-control-line">
                                        </div>
                                    </div>

									<div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                            Update Author
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
