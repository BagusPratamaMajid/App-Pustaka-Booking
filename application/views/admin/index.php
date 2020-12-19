				<!-- ==================================== Contents =================================== -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
								<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
						</div>

						<!-- Content Row -->
						<div class="row">

								<!-- Jumlah Anggota -->
								<div class="col-xl-3 col-md-6 mb-4">
										<div class="card border-left-primary shadow h-100 py-2">
												<div class="card-body">
														<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																		<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">jumlah anggota</div>
																		<div class="h5 mb-0 font-weight-bold text-gray-800">
																				<?= $this->ModelUser->getUserwhere(['role_id' => 1])->num_rows(); ?>
																		</div>
																</div>
																<div class="col-auto">
																		<a href="<?= base_url('user/anggota'); ?>">
																			<i class="fas fa-users fa-2x text-primary"></i>
																		</a>
																</div>
														</div>
												</div>
										</div>
								</div>

								<!-- Stok Buku Terdaftar -->
								<div class="col-xl-3 col-md-6 mb-4">
										<div class="card border-left-success shadow h-100 py-2">
												<div class="card-body">
														<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																		<div class="text-xs font-weight-bold text-success text-uppercase mb-1">stok buku terdaftar</div>
																		<div class="h5 mb-0 font-weight-bold text-gray-800">
																			<?php 

																					$where = ['stok != 0'];
																					$totalstok = $this->ModelBuku->total('stok',$where);
																					echo $totalstok;

																			?>
																		</div>
																</div>
																<div class="col-auto">
																		<a href="<?= base_url('buku'); ?>">
																		 <i class="fas fa-book fa-2x text-success"></i>
																		</a>
																</div>
														</div>
												</div>
										</div>
								</div>

								<!-- Buku yang dipinjam -->
								<div class="col-xl-3 col-md-6 mb-4">
										<div class="card border-left-warning shadow h-100 py-2">
												<div class="card-body">
														<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																		<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">buku yang dipinjam</div>
																		<div class="row no-gutters align-items-center">
																				<div class="col-auto">
																						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
																								<?php 
																								
																									$where = ['dipinjam != 0'];
																									$totaldipinjam = $this->ModelBuku->total('dipinjam',$where);
																									echo $totaldipinjam;
																								
																								?>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="col-auto">
																		<a href="<?= base_url('user'); ?>">
																		 <i class="fas fa-user-tag fa-2x text-warning"></i>
																		</a>
																</div>
														</div>
												</div>
										</div>
								</div>

								<!-- Buku yang dibooking -->
								<div class="col-xl-3 col-md-6 mb-4">
										<div class="card border-left-danger shadow h-100 py-2">
												<div class="card-body">
														<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																		<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">buku yang dibooking</div>
																		<div class="h5 mb-0 font-weight-bold text-gray-800">
																			<?php 
																			
																				$where = ['dibooking != 0'];
																				$totaldibooking = $this->ModelBuku->total('dibooking',$where);
																				echo $totaldibooking;
																			
																			?>
																		</div>
																</div>
																<div class="col-auto">
																	<a href="<?= base_url('user	'); ?>">
																		<i class="fas fa-shopping-cart fa-2x text-danger"></i>
																	</a>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>

						<!-- Divider -->
						<hr class="sidebar-divider">

						<!-- row table -->
						<div class="row">
								<div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2 mb-auto">
										<div class="page-header">
												<span class="fas fa-users text-primary mt-3">&nbsp;Data User</span>
												<a href="<?= base_url('user/data_user'); ?>">
													<i class="fas fa-search mt-3 text-primary float-right">&nbsp;Tampilkan</i>
												</a>
										</div>

										<div class="table-responsive">
												<table class="table mt-3" id="table-datatable">
														<thead>
															<tr>
																<th>No</th>
																<th>Nama Anggota</th>
																<th>Email</th>
																<th>Role ID</th>
																<th>Aktif</th>
																<th>Member Sejak</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1; foreach ($anggota as $a) : ?>
																	<tr>
																		<td><?= $i; ?></td>
																		<td><?= $a['nama']; ?></td>
																		<td><?= $a['email']; ?></td>
																		<td><?= $a['role_id']; ?></td>
																		<td><?= $a['is_active']; ?></td>
																		<td><?= date('Y', $a['tanggal_input']); ?></td>
																	</tr>
															<?php $i++; endforeach; ?>
														</tbody>
												</table>
								  </div>
								</div>

								<div class="table-responsive table-bordered col-sm-6 ml-auto mb-auto mr-auto mt-2">
										<div class="page-header">
										  <span class="fas fa-book text-warning mt-3">&nbsp;Data Buku</span>
												<a href="<?= base_url('buku'); ?>">
													<i class="fas fa-search mt-3 text-warning float-right">&nbsp;Tampilkan</i>
												</a>
										</div>
										<div class="table-responsive">
												<table class="table mt-3" id="table-datatable">
														<thead>
															<tr>
																<th>No</th>
																<th>Judul Buku</th>
																<th>Pengarang</th>
																<th>Penerbit</th>
																<th>Tahun Terbit</th>
																<th>ISBN</th>
																<th>Stok</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1; foreach ($buku as $b) : ?>
																<tr>
																	<td><?= $i; ?></td>
																	<td><?= $b['judul_buku']; ?></td>
																	<td><?= $b['pengarang']; ?></td>
																	<td><?= $b['penerbit']; ?></td>
																	<td><?= $b['tahun_terbit']; ?></td>
																	<td><?= $b['isbn']; ?></td>
																	<td><?= $b['stok']; ?></td>
																</tr>
															<?php $i++; endforeach; ?>
														</tbody>
												</table>
										</div>
								</div>
						</div>

						<!-- end of row table -->

										
				</div>
				<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->
