<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-7 col-lg-12 col-md-9 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register Now!</h1>
                  </div>

                  <form class="user" method="post" action="<?= base_url('autentifikasi/registrasi'); ?>">

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama'); ?>">
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
																				
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" placeholder="Masukkan Alamat Email" name="email" value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group row">
										  <div class="col-sm-6 mb-3 mb-sm-0">
													<input type="password" class="form-control form-control-user" id="password1" placeholder="Masukkan Password" name="password1">
													<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
											</div>
											<div class="col-sm-6">
													<input type="password" class="form-control form-control-user" id="password2" placeholder="Konfirmasi Password" name="password2">
													<?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
											</div>
                    </div>

                    <button type="submit" class="btn btn-google btn-user btn-block">
                      Sign Up
                    </button>
																				
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('autentifikasi/forgetPassword'); ?>">Lupa Password ?</a>
                  </div>
                  <div class="text-center">
                    Sudah Memiliki Akun?<a class="small" href="<?= base_url('autentifikasi'); ?>">&nbsp;Sign In !</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

	

