<!-- Footer -->
<footer class="sticky-footer bg-white">
		<div class="container my-auto">
				<div class="copyright text-center my-auto">
						<span>Copyright &copy; Web Programming Univ. BSI <?= date('Y'); ?></span>
				</div>
		</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button -->
<a href="#page-top" class="scroll-to-top rounded">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Sign Out Modal -->
<div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar ?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span arial-hidden="true">x</span>
				</button>
			</div>
			<div class="modal-body">
				Klik "Sign Out" dibawah jika kamu yakin sudah selesai 
			</div>
			 <div class="modal-footer">
					<a href="<?= base_url('autentifikasi/logout'); ?>" class="btn btn-danger">Sign out</a>
			 </div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script> 
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/vendor/js/sb-admin-2.min.js'); ?>"></script>

  <script>
  	$('.custom-file-input').on('change', function() {
  		let fileName = $(this).val().split('\\').pop();
  		$(this).next('.custom-file-label').addClass("selected").html(fileName);
  	});

			$(document).ready(function() {
					$('#table-datatable').dataTable();
			});

			$('.alert-message').alert().delay(3500).slideUp('slow');
  </script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

	 <!-- Page level custom scripts -->
	 <script src="<?= base_url('assets/vendor/js/demo/chart-area-demo.js'); ?> "></script>
  <script src="<?= base_url('assets/vendor/js/demo/chart-pie-demo.js'); ?> "></script>


