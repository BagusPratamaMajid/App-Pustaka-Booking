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
											<i class="fas fa-file-alt">&nbsp;Tambah Kategori</i>
									</a>

									 <?= $this->session->flashdata('pesan'); ?>
									<table class="table table-hover">
											<thead>
												<tr>
													<td scope="col">No</td>
													<td scope="col">Kategori</td>
													<td scope="col">Pilihan</td>
												</tr>
											</thead>
											<tbody>
													<?php $no = 1; foreach ($kategori as $k) : ?>
															<tr>
																	<th scope="row"><?= $no; ?></th>
																	<td><?= $k['nama_kategori']; ?></td>
																	<td>
																			<a href="<?= base_url('buku/ubahKategori/').$k['id_kategori']; ?>" class="badge badge-warning">
																					<i class="fas fa-edit"> Ubah</i>
																			</a>
																			<a href="<?= base_url('buku/hapusKategori/').$k['id_kategori']; ?>" onclick="return confirm('Anda yakin ingin lanjut menghapus <?= $judul.' '.$k['nama_kategori']; ?>');" class="badge badge-danger">
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
				<h5 class="modal-title" id="kategoriBaruModalLabel">Tambah Kategori</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span arial-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('buku/kategori'); ?>" method="post">
			
				<div class="modal-body">
					<div class="form-grup">
						<select class="form-control form-control-user" name="kategori">
								<option value="">Pilih Kategori</option>
								<?php $k = ['Sains','Hobby','Komputer','Komunikasi','Hukum','Agama','Populer','Bahasa','Komik']; 
								for ($i=0; $i<9; $i++) : ?>
										<option value="<?= $k[$i]; ?>"><?= $k[$i]; ?></option>
								<?php endfor; ?>
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


	
	
	
	
	
	
	
	
	
	
	
	
