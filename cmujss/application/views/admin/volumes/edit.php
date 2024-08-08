
<div class="body-wrapper">
	<div class="container-fluid">
		<div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
			<div class="d-sm-flex d-block justify-content-between align-items-center">
				<h5 class="mb-0 fw-semibold text-uppercase">Edit Volume</h5>
				<nav aria-label="breadcrumb" class="d-flex align-items-center">
					<ol class="breadcrumb d-flex align-items-center">
						<li class="breadcrumb-item">
							<a class="text-decoration-none" href="home">Home</a>
						</li>
						<li class="breadcrumb-item text-primary" aria-current="page">
							Edit Volume
						</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row">
				<div class="col-lg-12 col-xlg-12 col-md-12">
					<div class="card">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade active show" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
								<div class="card-body">
                                <form action="<?= base_url('volumes/update/' . $volumes['volumeid']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-material">
										<div class="mb-3">
											<label class="col-md-12">Volume Name</label>
											<div class="col-md-12">
												<input type="text" value="<?= $volumes['vol_name']; ?>" name="vol_name" class="form-control form-control-line">
											</div>
										</div>
										<div class="mb-3">
											<label class="col-md-12">Description</label>
											<div class="col-md-12">
												<textarea name="description" id="description"><?= $volumes['description']?></textarea>
												<script>
													CKEDITOR.replace('description');
												</script>
											</div>											
										</div>
										<div class="mb-3">
											<input class="form-check-input" name="status" type="checkbox" value="1" id="flexCheckDefault" <?php if ($volumes['status']) echo 'checked'; ?>>
											<label class="form-check-label" for="flexCheckDefault">
												Published
											</label>
										</div>
										<div class="col-sm-12">
											<button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
												Update Volume
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
