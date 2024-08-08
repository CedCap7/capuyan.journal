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
			<!-- column -->
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3 text-end button-group">
							<button class="btn bg-secondary-subtle text-secondary px-3 align-items-end" onclick="location.href='<?= base_url('volumes/add'); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Volume">
								<!-- <iconify-icon icon="mdi:books-add"></iconify-icon>  -->
							Add Volume</button>
						</div>
						<div class="table-responsive mb-4">
							<table class="table table-striped user-table" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<!-- <th class="text-center">#</th> -->
										<th class="col-2">Volume Name</th>
										<!-- <th>Email Address</th> -->
										<th>Desription</th>
										<th>Status</th>
										<th style='text-align: center; '>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($volumes as $volume): ?>
										<tr>

											<td style='vertical-align:middle;'><?php echo $volume['vol_name']; ?></td>
											<td style='vertical-align:middle; width: 50%;'><?php echo $volume['description']; ?></td>
											<td><?php echo $volume['status']; ?></td>
											<td style='text-align: center; vertical-align:middle;'>
												<!-- <a href=""><iconify-icon icon="solar:eye-linear" class="iconify-md"></iconify-icon></a> -->
												<a href="<?= base_url('volumes/update/' .$volume['volumeid']); ?>"><iconify-icon icon="tabler:edit" class="iconify-md"></iconify-icon></a>
												<a href="<?= base_url('volumes/delete/' .$volume['volumeid']); ?>"><iconify-icon icon="solar:trash-bin-trash-outline" class="iconify-md"></iconify-icon></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


