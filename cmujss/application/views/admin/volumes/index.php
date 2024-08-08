<div class="body-wrapper">
	<div class="container-fluid">
		<div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
			<div class="d-sm-flex d-block justify-content-between align-items-center">
				<h5 class="mb-0 fw-semibold text-uppercase">Volume Management</h5>
				<nav aria-label="breadcrumb" class="d-flex align-items-center">
					<ol class="breadcrumb d-flex align-items-center">
						<li class="breadcrumb-item">
							<a class="text-decoration-none" href="home">Home
							</a>
						</li>
						<li class="breadcrumb-item text-primary" aria-current="page">
							Volumes
						</li>
					</ol>
				</nav>
			</div>
		</div>  

		<div class="row">

			<div class="widget-content searchable-container list">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-4 col-xl-3">
                            <form class="position-relative">
                                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Volume..." onkeyup="searchVolumes()" />
                                
                            </form>
                        </div>
                        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
							<button class="btn bg-secondary-subtle text-secondary px-3 align-items-end" onclick="location.href='<?= base_url('volumes/add'); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Volume">
								<!-- <iconify-icon icon="mdi:books-add"></iconify-icon>  -->
							Add Volume</button>
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
										<!-- <th class="text-center">#</th> -->
										<th class="col-2">Volume Name</th>
										<!-- <th>Email Address</th> -->
										<th>Desription</th>
										<th style='text-align: center; '>Status</th>
										<!-- <th>Date Published</th> -->
										<th style='text-align: center; '>Action</th>
									</tr>
								</thead>
								<tbody id="search-results"></tbody>
									<?php foreach ($volumes as $volume): ?>
										<tr>

											<td style='vertical-align:middle;'><?php echo $volume['vol_name']; ?></td>
											<td style='vertical-align:middle; width: 50%; text-align:justify;'>
												<?php
                                                    $abstract = $volume['description'];
                                                    $max_length = 150; // Max length for the abstract
                                                    if (strlen($abstract) > $max_length) {
                                                        $abstract = substr($abstract, 0, $max_length) . '...';
                                                    }
                                                    echo $abstract;
                                                    ?></td>
											<td style='vertical-align:middle; text-align: center;'>
												<?php if ($volume['status'] == 0): ?>
													<span class="badge rounded-pill bg-primary-subtle text-warning fw-semibold fs-2">
														Unpublished
													</span>
												<?php elseif ($volume['status'] == 1): ?>
													<span class="badge rounded-pill bg-success-subtle text-success fw-semibold fs-2">
														Published
													</span>
												<?php else: ?>
													<span class="badge rounded-pill bg-primary-subtle text-warning fw-semibold fs-2">
														Archived
													</span>
												<?php endif; ?>
											</td>
											<!-- <td><?php echo $volume['date_at']; ?></td> -->
											<td style='text-align: center; vertical-align:middle;'>
												<!-- <a href=""><iconify-icon icon="solar:eye-linear" class="iconify-md"></iconify-icon></a> -->
												<a href="<?= base_url('volumes/view_volume/' . $volume['volumeid']); ?>"><iconify-icon icon="solar:eye-linear" class="iconify-md"></iconify-icon></a>
												<a href="<?= base_url('volumes/update/' .$volume['volumeid']); ?>"><iconify-icon icon="tabler:edit" class="iconify-md"></iconify-icon></a>
												<a href="<?= base_url('volumes/delete/' .$volume['volumeid']); ?>"><iconify-icon icon="solar:trash-bin-trash-outline" class="iconify-md"></iconify-icon></a>
												<a href="<?php echo site_url('volumes/set_status/' . $volume['volumeid']); ?>"><img src="./assets/images/articles/archive.png" alt="move to archive" width="24"></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<?php if (empty($volumes)): ?>
                                <p class="text-center">No volume found matching your search criteria.</p>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>


