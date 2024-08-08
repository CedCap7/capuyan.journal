<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">Add Article</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="home">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Add Article
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form id="#successModal" method="POST" action="<?php echo site_url('articles/add'); ?>" enctype="multipart/form-data" class="form-horizontal form-material">
                                    <div class="mb-3">
                                        <label class="col-md-12">Author/s</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter author names" name="author" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-12">Title</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter article title" name="title" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-12">Keywords</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter keywords" name="keywords" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-12">Abstract</label>
                                        <div class="col-md-12">
                                            <textarea name="abstract" id="abstract"></textarea>
                                            <script>
                                                CKEDITOR.replace('abstract');
                                            </script>
                                        </div>                                            
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-12">DOI</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter DOI" name="doi" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="mb-3 custom-select">
                                        <label class="col-md-12">Volume</label>
                                        <div class="select-wrapper">
                                            <select name="volumeid" class="form-control">
                                                <option value="" disabled selected>Select Volume</option>
                                                <?php foreach ($volumes as $volume): ?>
                                                    <option value="<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>                                            
                                            <?php echo form_error('volumeid', '<div class="error">', '</div>'); ?>
                                            <span class="arrow"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-md-12">File (PDF)</label>
                                        <div class="col-md-12">
                                            <input type="file" name="filename" class="form-control form-control-line" accept=".pdf">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-check-input" name="published" type="checkbox" value="1" id="flexCheckDefault" <?php echo set_checkbox('published', '1'); ?>>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Published
                                        </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                            Add Article
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
