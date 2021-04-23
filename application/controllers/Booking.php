<?php 

		defined('BASEPATH') OR exit('No direct script access allowed');
		date_default_timezone_set('Asia/Jakarta');
		
		class Booking extends CI_Controller {

			
			public function __construct()
			{
				parent::__construct();
				cek_login();
				$this->load->model('ModelBooking', 'ModelUser');
			}
			
		
			public function index()
			{
					$id = ['booking.id_user' => $this->uri->segment(3)];
					$id_user = $this->session->userdata('id_user');
					$data['booking'] = $this->ModelBooking->joinOrder($id)->result();

					$user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

					foreach ($user as $a) 
					{
							$data = [
								'image' => $user['image'],
								'user' => $user['nama'],
								'email' => $user['email'],
								'tanggal_input' => $user['tanggal_input']
							];	
					}

					$dtb = $this->ModelBooking->showtemp(['id_user' => $id_user])->num_rows();

					if ($dtb < 1)
					{
							$this->session->set_flashdata('pesan', '<div class="alert alert-massege alert-danger" role="alert">Tidak Ada Buku dikeranjang</div>');
							
							redirect(base_url());
							
					}else{
							$data['temp'] = $this->db->query("SELECT image, judul_buku, penulis, penerbit, tahun_terbit,id_buku FROM temp WHERE id_user='$id_user'")->result_array();
					}

					$data['judul'] = "Data Booking";

					$this->load->view('templates/templates-user/header', $data);
					$this->load->view('booking/data-booking', $data);
					$this->load->view('templates/templates-user/modal');
					$this->load->view('templates/templates-user/footer');
			}

			public function tambahBooking() 
			{
					$id_buku = $this->uri->segment(3);

					//memilih data buku => tabel temp/keranjang
					$d = $this->db->query("SELECT * FROM buku WHERE id = '$id_buku'")->row();

					// Data => disimpan ke tabel temp
					$isi = [
							'id_buku' => $id_buku,
							'judul_buku' => $d->judul_buku,
							'id_user' => $this->session->userdata('id_user'),
							'email_user' => $this->session->userdata('email'),
							'tgl_booking' => date('Y-m-d H:i:s'),
							'image' => $d->image,
							'penulis' => $d->pengarang,
							'penerbit' => $d->penerbit,
							'tahun_terbit' => $d->tahun_terbit
					];

					// Cek Buku sudah masuk keranjang / belum
					$temp = $this->ModelBooking->getDataWhere('temp', ['id_buku' => $id_buku])->num_rows();

					$userid = $this->session->userdata('id_user');
					
					// Cek Jika sudah memasukkan 3 buku ke keranjang
					$tempuser = $this->db->query("SELECT * FROM temp WHERE id_user = '$userid'")->num_rows();

					// Cek Jika booking buku belum diambil
					$databooking = $this->db->query("SELECT * FROM booking WHERE id_user = '$userid'")->num_rows();

					if ($databooking > 0)
					{
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Masih Ada booking buku sebelumnya yang belum diambil.<br> Abmil Buku yang dibooking atau tunggu 1x24 Jam untuk bisa booking kembali </div>');

							redirect(base_url());
							
					}

					// Jika Buku sudah ada di keranjang
					if ($temp > 0)
					{
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Buku ini Sudah anda booking </div>');

							redirect(base_url('home'));
							
					}

					// Jika Buku sudah = 3
					if ($tempuser == 3)
					{
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Booking Buku Tidak Boleh Lebih dari 3</div>');

							redirect(base_url('home'));
							
					} 

					// create table temp, if not exist
					$this->ModelBooking->createTemp();
					$this->ModelBooking->insertData('temp', $isi);

					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Buku berhasil ditambahkan ke keranjang </div>'); 
					redirect(base_url('home'));
				}

				public function hapusbooking() 
				{
					$id_buku = $this->uri->segment(3); 
					$id_user = $this->session->userdata('id_user');

					$this->ModelBooking->deleteData(['id_buku' => $id_buku], 'temp'); 
					$kosong = $this->db->query("select*from temp where id_user='$id_user'")->num_rows();

					if ($kosong < 1)
					{
							$this->session->set_flashdata('pesan', '<div class="alert alert-massege alert-danger" role="alert">Tidak Ada Buku dikeranjang</div>');
							
							redirect(base_url());
							
						}else{
						 redirect(base_url('booking'));
							
					}
				}

				public function bookingSelesai($where) 
				{
							// Mengupdate Stok buku dan info buku yang dibooking
							$this->db->query("UPDATE	buku, temp SET buku.dibooking=buku.dibooking+1, buku.stok=buku.stok-1 WHERE buku.id=temp.id_buku");

						 $tglSekarang = date('Y-m-d');
							$isiBooking = [
									'id_booking' => $this->ModelBooking->kodeOtomatis('booking', 'id_booking'),
									'tgl_booking' => date('Y-m-d H:m:s'),
									'batas_ambil' => date('Y-m-d', strtotime('+2 days', strtotime($tglSekarang))),
									'id_user' => $where
							];

							//menyimpan ke tabel booking dan detail booking, dan mengosongkan tabel temporari 
							$this->ModelBooking->insertData('booking', $isiBooking);
							$this->ModelBooking->simpanDetail($where);
							$this->ModelBooking->kosongkanData('temp');

							redirect(base_url('booking/info'));
							
				}

				public function info() 
				{
						$where = $this->session->userdata('id_user');
						$data['user'] = $this->session->userdata('nama');
						$data['judul'] = "Selesai Booking";
						$data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
						$data['items'] = $this->db->query("SELECT * FROM booking, booking_detail, buku WHERE booking_detail.id_booking=booking.id_booking AND booking_detail.id_buku=buku.id AND booking.id_user='$where'")->result_array();

						$this->load->view('templates/templates-user/header', $data);
						$this->load->view('booking/info-booking', $data);
						$this->load->view('templates/templates-user/modal');
						$this->load->view('templates/templates-user/footer');
				}

				public function exportToPdf() { 
					$id_user = $this->session->userdata('id_user'); 
					$data['user'] = $this->session->userdata('nama'); 
					$data['judul'] = "Cetak Bukti Booking"; 
					$data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result(); 
					$data['items'] = $this->db->query("SELECT * FROM booking, booking_detail, buku WHERE booking_detail.id_booking=booking.id_booking AND booking_detail.id_buku=buku.id AND booking.id_user='$id_user'")->result_array(); 

					$sroot = $_SERVER['DOCUMENT_ROOT'];
					include $sroot."/codeigniter_3/pustaka-booking/application/third_party/dompdf/autoload.inc.php";
					$dompdf = new Dompdf\Dompdf();	

					$this->load->view('booking/bukti-pdf', $data); 

					$paper_size = 'A4'; // ukuran kertas
					$orientation = 'landscape'; //tipe format kertas potrait atau landscape 
					$html = $this->output->get_output(); 
					
					$dompdf->set_paper($paper_size, $orientation);
     //Convert to PDF
					$dompdf->load_html($html); 
					$dompdf->render(); 
					$dompdf->stream("bukti-booking-$id_user.pdf", array('Attachment' => 0)); 
					// nama file pdf yang di hasilkan
			}
		
		}
		
		/* End of file Booking.php */
		

?>
