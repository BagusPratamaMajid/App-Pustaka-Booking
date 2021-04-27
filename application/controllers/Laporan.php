<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Controllername extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	// List all your items
	public function laporan_buku()
	{	
				$data['judul'] = 'Laporan Data Buku';
				$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
				$data['buku'] = $this->ModelBuku->getBuku()->result_array();
				$data['kategori'] = $this->ModelBuku->getKategori()->result_array();

				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('buku/laporan_buku', $data);
				$this->load->view('templates/footer');
			}

	
}

/* End of file Controllername.php */



?>
