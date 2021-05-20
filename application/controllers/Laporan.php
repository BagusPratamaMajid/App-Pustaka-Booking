<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
				$this->load->view('laporan/laporan_buku', $data);
				$this->load->view('templates/footer');
			}

	public function cetak_laporan_buku() 
	{
			$data['buku'] = $this->ModelBuku->getBuku()->result_array();
			$data['kategori'] = $this->ModelBuku->getKategori()->result_array();

			$this->load->view('laporan/laporan_print_buku', $data);
	}

	public function laporan_buku_pdf() 
	{
			$data['buku'] = $this->ModelBuku->getBuku()->result_array();

			$sroot = $_SERVER['DOCUMENT_ROOT'];
			include $sroot."/codeigniter_3/pustaka-booking/application/third_party/dompdf/autoload.inc.php";
			$dompdf = new Dompdf\Dompdf();	

			$this->load->view('laporan/laporan_pdf_buku', $data);

   $paper_size = 'A4'; // ukuran kertas
			$orientation = 'landscape'; //tipe format kertas potrait atau landscape 
			$html = $this->output->get_output(); 
			
			$dompdf->set_paper($paper_size, $orientation);
			//Convert to PDF
			$dompdf->load_html($html); 
			$dompdf->render(); 
			$dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0)); 
			// nama file pdf yang di hasilkan
			
	}

	public function export_excel() 
	{
			$data = array( 'title' => 'Laporan Buku', 'buku' => $this->ModelBuku->getBuku()->result_array() );
			$this->load->view('laporan/export_excel_buku', $data);
	}

	
}

/* End of file Controllername.php */



?>
