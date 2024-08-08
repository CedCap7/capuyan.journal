
<div class="space-sm bg-light-subtle" id="services">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<h3 class="section-title" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
					Latest Issues
				</h3> 
			</div>

			<div class="container-fluid">
			<div class="row">
			<!-- column -->
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">					
						<div class="col-lg-20 col-md-20">
						<?php foreach ($articles as $article): ?>
							<div class="card">
							
								<div class="card-body">
									<div class="mb-3">
										<h5 class="mb-0">Article</h5>
									</div>
									<!-- sample modal content -->
									<span class="pull-left">
										<a href=""><small type="button" class="label pull-right mb-1 badge text-bg-primary fs-1 zoom-in" data-bs-toggle="modal" data-bs-target="#samedata-modal" >
										<?php echo $article['keywords']; ?>
										</small></a>
									</span>
								</div>
								<!-- <img src="./assets/images/bg.jpg" class="card-img-top" alt="..." /> -->
								<div class="card-body p-10">
									<h5 class="card-title fs-5"><?php echo $article['title']; ?></h5>
									<p class="card-text">
										Authors: <a href=""></a>
									</p>
									<p class="card-text">
										Volume: <a href=""><?php echo $article['volumeid']; ?></a>
									</p>
									<p class="card-text">
										DOI: <a href=""><?php echo $article['doi']; ?></a>
									</p>
									<p class="card-text">
										<?php echo $article['abstract']; ?>
									</p>
								</div>

								<div class="card-body button-group d-flex align-items-stretch p-10">
									<a href="#" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center"><iconify-icon icon="mdi:like-outline" width="24" height="24"></iconify-icon>&nbsp Like</a>
									<a href="#" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center"><iconify-icon icon="mage:message-round" width="24" height="24"></iconify-icon>&nbsp Comment</a>
									<div class="ms-auto">
										<a href="#" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center flex-column flex-sm-row"><iconify-icon icon="tabler:share" width="24" height="24"></iconify-icon> </a>
									</div>
								</div>
								
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				
				</div>
			</div>
			
		</div>
		
			</div>
		</div>
		
	</div>
</div> 
