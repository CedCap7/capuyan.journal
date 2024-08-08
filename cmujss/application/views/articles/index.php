<div class="body-wrapper">
	<div class="container-fluid">
		<div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
			<div class="d-sm-flex d-block justify-content-between align-items-center">
				<h5 class="mb-0 fw-semibold text-uppercase">Article Management</h5>
				<nav aria-label="breadcrumb" class="d-flex align-items-center">
					<ol class="breadcrumb d-flex align-items-center">
						<li class="breadcrumb-item">
							<a class="text-decoration-none" href="home">Home
							</a>
						</li>
						<li class="breadcrumb-item text-primary" aria-current="page">
							Articles
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
						<!-- <h4 class="card-title">Article List</h4> -->
						 <div class="mb-3 text-end button-group">
							<button class="btn bg-secondary-subtle text-secondary px-3 align-items-end" onclick="location.href='<?= base_url('articles/add'); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Articles">
								<!-- <iconify-icon icon="fluent:book-add-24-regular" width="24" height="24"></iconify-icon> -->
                            Add Article</button>
						</div>
						<div class="table-responsive mb-4">
							<table class="table table-striped user-table" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<!-- <th class="text-center">#</th> -->
										<th>Title</th>
										<th>Keywords</th>
										<!-- <th>Filename</th> -->
										<th style="text-align: center;">Status</th>
										<th>Date Published</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($articles as $article): ?>
									<tr>
										
										<td style='vertical-align:middle; width: 30%;'><?php echo $article['title']; ?></td>
										<td style='vertical-align:middle;'><?php echo $article['keywords']; ?></td>
										<!-- <td style='vertical-align:middle;'><?php echo $article['filename']; ?></td> -->
										<!-- <td style='vertical-align:middle;' class="px-12 py-4">
											<a href="<?php echo base_url('assets/articles/' . $article['filename']); ?>" class="text-green-600 hover:underline"><?php echo $article['filename']; ?></a>
										</td> -->
										<td style='vertical-align:middle;'>
											<?php if ($article['published'] == 0): ?>
												<span class="badge rounded-pill bg-primary-subtle text-warning fw-semibold fs-2">
													Unpblished
												</span>
											<?php else: ?>
												<span class="badge rounded-pill bg-success-subtle text-success fw-semibold fs-2">
													Published
												</span>
											<?php endif; ?>
										</td>
										<td><?php echo $article['date_published']; ?></td>
										<td style='text-align: center; vertical-align:middle;'>
											<a href="<?= base_url('./assets/articles/' . $article['filename']); ?>" target="_blank"><iconify-icon icon="solar:eye-linear" class="iconify-md"></iconify-icon></a>
											<a href="<?= base_url('articles/update/' .$article['articleid']); ?>" data-bs-tooltip="tooltip" data-bs-placement="top" title="Edit Article"><iconify-icon icon="tabler:edit" class="iconify-md"></iconify-icon></a>
											<a href="<?= base_url('articles/delete/' .$article['articleid']); ?>" class="btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-bs-tooltip="tooltip" data-bs-placement="top" title="Delete Article">
                                                <iconify-icon icon="solar:trash-bin-trash-outline" class="iconify-md"></iconify-icon>
                                            </a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		

