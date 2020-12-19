<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller 
{

		public function __construct() 
		{
				parent::__construct();
				cek_login();
		}

		// Manajemen Buku
		public function index() 
		{
				$data['judul'] = 'Data Buku';
				$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
				$data['buku'] = $this->ModelBuku->tampil()->result_array();
				$data['kategori'] = $this->ModelBuku->getKategori()->result_array();

				$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', [
							'required' => '%s harus diisi!',
							'min_lenght' => '%s terlalu pendek'
				]);

				$this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
							'required' => '%s harus diisi!',
				]);

				$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', [
					'required' => '%s harus diisi!',
					'min_lenght' => '%s terlalu pendek'
				]);
				
				$this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required|min_length[3]', [
					'required' => '%s harus diisi!',
					'min_lenght' => '%s buku terlalu pendek'
				]);
				
				$this->form_validation->set_rules('tahun', 'Tahun terbit', 'required|min_length[3]|max_length[4]|numeric', [
					'required' => '%s harus diisi!',
					'min_lenght' => '%s terlalu pendek',
					'max_length' => '%s terlalu panjang',
					'numeric' => 'Yang anda masukkan bukan angka!'
				]);

				$this->form_validation->set_rules('isbn', 'Nomor ISBN', 'required|min_length[3]|numeric', [
					'required' => '%s harus diisi!',
					'min_lenght' => '%s terlalu pendek',
					'numeric' => 'Yang anda masukkan bukan angka!'
				]);

				$this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
					'required' => '%s harus diisi!',
					'min_lenght' => 'Yang anda masukkan bukan angka!'
				]);

				// Konfigurasi sebelum gambar diupload
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '3000';
				$config['max_width'] = '1024';
				$config['max_height'] = '1000';
				$config['file_name'] = 'pro' . time();

				$this->load->library('upload', $config);

				if ($this->form_validation->run() == false)
				{
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar', $data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('buku/index', $data);
						$this->load->view('templates/footer');

				} else {
					
						if ($this->upload->do_upload('image'))
						{
								$image = $this->upload->data();
								$gambar = $image['file_name'];

						} else {
									$gambar = '';
						}

						$data = [
								'judul_buku' => $this->input->post('judul_buku', true),
								'id_kategori' => $this->input->post('id_kategori', true),
								'pegarang' => $this->input->post('pegarang', true),
								'penerbit' => $this->input->post('penerbit', true),
								'tahun_terbit' => $this->input->post('tahun', true),
								'isbn' => $this->input->post('isbn', true),
								'stok' => $this->input->post('stok', true),
								'dipinjam' => 0,
								'dibooking' => 0,
								'image' => $gambar
						];

						$this->ModelBuku->simpanBuku($data);
						redirect(base_url('buku'));
				}
				
		}

		// Manajemen Kategori
		public function kategori() 
		{
				$data['judul'] = 'Kategori Buku';
				$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
				$data['kategori'] = $this->ModelBuku->getKategori()->result_array();

				$this->form_validation->set_rules('kategori', 'Kategori', 'required', [
							'required' => 'Judul buku harus diisi!'
				]);
				
				if ($this->form_validation->run() == false) {
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar',$data);
						$this->load->view('templates/topbar', $data);
						$this->load->view('buku/kategori', $data);
						$this->load->view('templates/footer');
				} else {
						$data = [
								'nama_kategori' => $this->input->post('kategori')
						];

						$this->ModelBuku->simpanKategori($data);

						$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Kategori buku berhasil ditambah </div>');
						redirect(base_url('buku/kategori'));
				}
		}

		public function hapusKategori() 
		{
				$where = ['id_kategori' => $this->uri->segment(3)];
				$this->ModelBuku->hapusKategori($where);

				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Kategori buku berhasil dihapus </div>');
				redirect(base_url('buku/kategori'));
		}

}
