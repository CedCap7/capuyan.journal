<div class="body-wrapper">
	<div class="container-fluid">
		<div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
			<div class="d-sm-flex d-block justify-content-between align-items-center">
				<h5 class="mb-0 fw-semibold text-uppercase">Author Management</h5>
				<nav aria-label="breadcrumb" class="d-flex align-items-center">
					<ol class="breadcrumb d-flex align-items-center">
						<li class="breadcrumb-item">
							<a class="text-decoration-none" href="home">Home
							</a>
						</li>
						<li class="breadcrumb-item text-primary" aria-current="page">
							Authors
						</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row">

			<div class="widget-content searchable-container list">
                <div class="card card-body">
                    <div class="row">
                        <!-- <div class="col-md-4 col-xl-3">
                            <form class="position-relative">
                                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Author..." onkeyup="searchAuthors()" />
                                
                            </form>
                        </div> -->
                        <div class="col-md-8 col-xl-12 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
							<button class="btn bg-secondary-subtle text-secondary px-3 align-items-end"  onclick="location.href='<?= base_url('authors/add'); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Author">
                                <!-- <iconify-icon icon="mdi:user-multiple-add-outline" width="24" height="24"></iconify-icon> -->
                            Add Author</button>
                        </div>
                    </div>
                </div>
            </div>
			<!-- column -->
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive mb-4">
							<table class="table table-striped user-table" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Profile</th>
										<th class="text-center">ID</th>
										<th>Author Name</th>
										<th>Email Address</th>
										<th>Contact Number</th>
										<th style='text-align: center;'>Status</th>
										<!-- <th>Date Published</th> -->
										<th style="text-align:center;">Action</th>
									</tr>
								</thead>
								<tbody id="search-results">
									<?php foreach ($authors as $author): ?>
										<tr>
											<td style='text-align: center; vertical-align:middle;'>
												<img src="<?php echo site_url(); ?>assets/images/users/<?php echo $author['images']; ?>" class='rounded-circle ' width='40' height='40'>
											</td>
											<td style='text-align: center; vertical-align:middle;'><?php echo $author['auid']; ?></td>
											<td style='vertical-align:middle;'><a href="<?= base_url('authors/view_details/'. $author['auid']); ?>"><?php echo $author['title']; ?> <?php echo $author['author_name']; ?></a></td>
											<td style='vertical-align:middle;'><?php echo $author['email']; ?></td>
											<td><?php echo $author['contact_num']; ?></td>
											<td style='text-align: center; vertical-align:middle;'>
												<?php if ($author['status'] == 0): ?>
													<span class="badge rounded-pill bg-primary-subtle text-primary fw-semibold fs-2">
														Inactive
													</span>
												<?php else: ?>
													<span class="badge rounded-pill bg-success-subtle text-success fw-semibold fs-2">
														Active
													</span>
												<?php endif; ?>
											</td>
											<!-- <td><?php echo $author['created_at']; ?></td> -->
											<td style='text-align: center; vertical-align:middle;'>
												<a href="<?= base_url('authors/view_details/'. $author['auid']); ?>">
													<iconify-icon icon="solar:eye-linear" class="iconify-md"></iconify-icon>
												</a>
												<a href="<?= base_url('authors/update_profile/' .$author['auid']); ?>">
													<iconify-icon icon="tabler:edit" class="iconify-md"></iconify-icon>
												</a>
												<a href="<?= base_url('authors/delete/' .$author['auid']); ?>" class="btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-bs-tooltip="tooltip" data-bs-placement="top" title="Delete Author">
                                                    <iconify-icon icon="solar:trash-bin-trash-outline" class="iconify-md"></iconify-icon>
                                                </a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<?php if (empty($authors)): ?>
                                <p class="text-center">No authors found matching your search criteria.</p>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>











<!--     
		<div class="row">
			<?php foreach ($authors as $author): ?>
			<div class="col-lg-4 col-md-6">
				<div class="card text-center">
					<div class="card-body">
						<?php if (!empty($author->images)): ?>
						<img src="<?= base_url($author->images) ?>" class="rounded-1 img-fluid" width="90">
						<?php else: ?>

						<img src="<?= base_url('./assets/images/users/noimages.jpg') ?>" class="rounded-1 img-fluid" width="90">
						<?php endif; ?>
						<div class="mt-n2">
							<span class="badge text-bg-primary"><?php echo $author['email']; ?></span>
							<h3 class="card-title mt-3"><?php echo $author['author_name']; ?></h3>
							<h6 class="card-subtitle"><?php echo $author['contact_num']; ?></h6>
						</div>
						<div class="row mt-3 justify-content-center">
							<div class="col-6">
								<div class="py-2 px-3 text-bg-light rounded-pill d-flex align-items-center">
									<span class="text-warning"><i class="ti ti-star fs-8"></i></span>
									<div class="ms-2 text-start">
										<h6 class="fw-normal text-muted mb-0">Reviews</h6>
										<h4 class="mb-0 fs-5">368</h4>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="py-2 px-3 text-bg-light rounded-pill d-flex align-items-center">
									<span class="text-primary"><i class="ti ti-brand-google-photos fs-8"></i></span>
									<div class="ms-2 text-start">
										<h6 class="fw-normal text-muted mb-0">Articles</h6>
										<h4 class="mb-0 fs-5">10</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		 -->