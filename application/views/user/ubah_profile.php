<!-- ==================================== Contents =================================== -->

				<div class="container-fluid">

				<!-- Page Heading -->
				  <div class="d-sm-flex align-items-center justify-content-between mb-4">
								<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
						</div>

					<div class="row">
						<div class="col-lg-9">
								<?= form_open_multipart('user/changeProfile'); ?>
								<div class="form-grup row mb-3">
										<label for="email" class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
										</div>
								</div>

								<div class="form-grup row mb-3">
										<label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
										<div class="col-sm-10">
											 <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>">
												<?= form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
										</div>
								</div>

								<div class="form-grup row mb-4">
										<div class="col-sm-2">Gambar</div>
										<div class="col-sm-10">
												<div class="row">
													<div class="col-sm-3">
															<img src="<?= base_url('assets/img/profile/'); ?><?= $user['image']; ?>" alt="default.jpg" class="img-thumbnail">
													</div>
													<div class="col-sm-9">
															<div class="custom-file">
																	<input type="file" name="image" id="image" class="custom-file-input">
																	<label for="image" class="custom-file-label">Pilih File</label>
															</div>
													</div>
												</div>
										</div>
								</div>

								<div class="form-grup row justify-content-end">
										<div class="col-sm-10">
												<button type="submit" class="btn btn-outline-primary">Ubah</button>
												<button class="btn btn-outline-danger" onclick="window.history.go(-1)"> Kembali</button>
										</div>
								</div>

								</from>

						 </div>
					</div>
									
				</div>
				<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

	
	
	
	
	
	
	
	
	
	
	
	
