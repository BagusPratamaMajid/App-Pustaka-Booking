<?php  

function cek_login()
{
		$ci = get_instance();

		if (!$ci->session->userdata('email')) {
					$ci->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">Akses ditolak! Anda belum login!</div>');
		
					if ($ci->session->userdata('role_id') == 1) {
							redirect(base_url('autentifikasi'));
					}else{
							redirect(base_url('home'));
					}

		} else {
			$role_id = $ci->session->userdata('role_id');
			$id_user = $ci->session->userdata('id');
		}

		function cek_user() 
		{ 
			$ci = get_instance(); 
			$role_id = $ci->session->userdata('role_id'); 
			
			if ($role_id != 1) { 
				$ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses tidak diizinkan </div>'); 
				redirect('home'); 
			} 
		}
}
