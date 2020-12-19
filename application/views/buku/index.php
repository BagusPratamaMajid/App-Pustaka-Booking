				<!-- ==================================== Contents =================================== -->

				<div class="container-fluid">

				<!-- Page Heading -->
				  <div class="d-sm-flex align-items-center justify-content-between mb-4">
								<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
						</div>

						<div class="row">
							<div class="col-lg-5">
									<?php if (validation_errors()) : ?>
											<div class="alert alert-danger alert-message" role="alert">
													<?= validation_errors(); ?>
											</div>
									<?php endif; ?>

									<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#kategoriBaruModal">
											<i class="fas fa-file-alt">&nbsp; Buku Baru</i>
									</a>

									 <?= $this->session->flashdata('pesan'); ?>
									<table class="table table-hover">
											<thead>
												<tr>
													<td scope="col">No</td>
													<td scope="col">Judul</td>
													<td scope="col">Pengarang</td>
													<td scope="col">Penerbit</td>
													<td scope="col">Tahun Terbit</td>
													<td scope="col">ISBN</td>
													<td scope="col">Stok</td>
													<td scope="col">Dipinjam</td>
													<td scope="col">Dibooking</td>
													<td scope="col">Gambar</td>
													<th scope="col">Pilihan</th>
												</tr>
											</thead>
											<tbody>
													<?php $no = 1; foreach ($buku as $b) : ?>
															<tr>
																	<th scope="row"><?= $no; ?></th>
																 <td><?= $b['judul_buku']; ?></td>
																 <td><?= $b['pengarang']; ?></td>
																 <td><?= $b['penerbit']; ?></td>
																 <td><?= $b['tahun_terbit']; ?></td>
																 <td><?= $b['isbn']; ?></td>
																 <td><?= $b['stok']; ?></td>
																 <td><?= $b['dipinjam']; ?></td>
																	<td><?= $b['dibooking']; ?></td>
																	<td>
																			<picture>
																				<source srcset="" type="image/svg+xml">
																				<img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" alt="default" class="img-fluid img-thumbnail">
																			</picture>
																	</td>
																	<td>
																		<a href="<?= base_url('buku/ubahBuku/') . $b['id']; ?>"  class="badge badge-info">
																					<i class="fas fa-edit"> Ubah</i>
																	 </a>
																		<a href="<?= base_url('buku/hapusBuku/') . $b['id']; ?>"  class="badge badge-danger" onclick="return confirm('Anda yakin ingin lanjut menghapus <?= $judul.' '.$b['judul_buku']; ?>')">
																					<i class="fas fa-trash"> Hapus</i>
																	 </a>
																	</td>
															</tr>
													<?php $no++; endforeach; ?>
											</tbody>
									</table>
							</div>
						</div>
									
				</div>
				<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->


<!-- Modal Tambah Kategori -->
<div class="modal fade" id="kategoriBaruModal" tabindex="-1" role="dialog" aria-labelledby="kategoriBaruModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="kategoriBaruModalLabel">Tambah Buku</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span arial-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('buku'); ?>" method="post" enctype="multipart/form-data">
			
				<div class="modal-body">
					<div class="form-grup">
						<input type="text" name="judul_buku" id="judul_buku" class="form-control form-control-user" placeholder="Masukkan Judul Buku">
					</div>

					<div class="form-grup">
						<select name="id_kategori" class="form-control form-control-user">
							<option value="">Pilih </option>
						</select>
					</div>
				</div>

					<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
									<i class="fas fa-ban"> Close</i>
							</button>
							<button type="submit" class="btn btn-primary">
									<i class="fas fa-plus-circle"> Tambah</i>
							</button>
					</div>
			
		</form>

		</div>
	</div>
</div>


	
	
	
	
	
	
	
	
	
	
	
	
