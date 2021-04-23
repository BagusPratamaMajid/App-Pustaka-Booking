<?php 
		
		
		 if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');
		
		class Pinjam extends CI_Controller {
		
			public function __construct()
			{
				parent::__construct();
				cek_login();
				cek_user();
			}

			public function index() {}
		
			public function daftarBooking() 
			{
					$data['judul'] = "Daftar Booking";
					$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
					$data['pinjam'] = $this->db->query("SELECT * FROM booking")->result_array();

					$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('booking/daftar-Booking', $data);
			$this->load->view('templates/footer');
			}

			public function bookingDetail() 
			{
					$id_booking = $this->uri->segment(3);
					$data['judul'] = "Booking Detail";
					$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
					$data['agt_booking'] = $this->db->query("SELECT * FROM booking, user WHERE booking.id_user=user.id AND booking.id_booking='$id_booking'")->result_array();
					$data['detail'] = $this->db->query("SELECT id_buku, judul_buku, pengarang, penerbit, tahun_tebit FROM booking_detail, buku WHERE booking_detail.id_buku=buku.id AND booking_detail.id_booking='$id_booking'")->result_array();

					$this->load->view('templates/header', $data); 
					$this->load->view('templates/sidebar', $data); 
					$this->load->view('templates/topbar', $data); 
					$this->load->view('booking/booking-detail', $data); 
					$this->load->view('templates/footer');
			}
			
		}
		
		/* End of file Controllername.php */
		
		
?>
