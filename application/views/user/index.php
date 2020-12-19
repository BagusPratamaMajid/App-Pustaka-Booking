				<!-- ==================================== Contents =================================== -->

				<div class="container-fluid">

				<!-- Page Heading -->
				  <div class="d-sm-flex align-items-center justify-content-between mb-4">
								<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
						</div>

					<div class="row">
						<div class="col-lg-6 justify-content-x">
								<?= $this->session->flashdata('pesan'); ?>
						</div>
					</div>

					<div class="card mb-3 border-0" style="max-width: 540px; background: #F8F9FC;">
      <div class="row no-gutters">
							<div class="col-md-4">
									<img src="<?= base_url('assets/img/profile/') ?><?= $user['image']; ?>" class="card-img" alt="...">
							</div>
							<div class="col-md-8">
									<div class="card-body">
											<h5 class="card-title"><?= $user['nama']; ?></h5>
											<p class="card-text"><?= $user['email']; ?></p>
											<p class="card-text">
												<small class="text-muted">Jadi Member Sejak : <br>
														<b><?= date('d F Y', $user['tanggal_input']); ?></b>
												</small>
											</p>
									</div>

									<div class="btn btn-info ml-3 my-3">
													<a class="text-white" href="<?= base_url('user/changeProfile'); ?>">
															<i class="fas fa-user-edit">Ubah Profile</i>
													</a>
											</div>
       </div>
      </div>
    </div>


										
				</div>
				<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

	
	
	
	
	
	
	
	
	
	
	
	
