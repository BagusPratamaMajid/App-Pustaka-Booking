<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
		public function __construct() 
		{
				parent::__construct();
				cek_login();
		}

		public function index() 
		{
			$data['judul'] = 'Profile Saya';
			$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/index', $data);
			$this->load->view('templates/footer');
		}

		public function anggota() 
		{
				$data['judul'] = 'Data Anggota';
				$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
				$this->db->where('role_id', 1);
				$data['anggota'] = $this->db->get('user')->result_array();

				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('user/index', $data);
				$this->load->view('templates/footer');
		}

		public function changeProfile() 
		{
				$data['judul'] = 'Ubah Profile';
				$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

				$this->form_validation->set_rules(
					'nama', 'Nama Lengkap', 'required|trim',
					[
								'required' => 'Nama tidak boleh kosong'
					]);

					
					if ($this->form_validation->run() == false) {
							$this->load->view('templates/header', $data);
							$this->load->view('templates/sidebar',$data);
							$this->load->view('templates/topbar', $data);
							$this->load->view('user/ubah_profile', $data);
							$this->load->view('templates/footer');
					} else {
						 $nama = $this->input->post('nama', true);
							$email = $this->input->post('email', true);
							
							// Jika ada gambar yang akan diupload
					$upload_image = $_FILES['image']['name'];

					if ($upload_image) 
					{
							$config['upload_path'] = './assets/img/profile/';
							$config['allowed_types'] = 'gif|jpg|png';
							$config['max_size'] = '3000';
							$config['max_width'] = '3000'; //default 1024
							$config['max_height'] = '2000'; // default 1000
							$config['file_name'] = 'pro' . time();

							$this->load->library('upload', $config);

							if ($this->upload->do_upload('image'))
							{
										$gambar_lama = $data['user']['image'];
										
										if ($gambar_lama != 'default.jpg')
										{
												unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
										}

										$gambar_baru = $this->upload->data('file_name');
										$this->db->set('image', $gambar_baru);

							 } else { }
						}

					$this->db->set('nama', $nama);
					$this->db->where('email', $email);
					$this->db->update('user');
					
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message role="alert">Profile Berhasil diubah!</div>');

					redirect(base_url('user'));
					
		}
	}
}




