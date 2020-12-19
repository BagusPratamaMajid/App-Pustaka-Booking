<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller
{
		public function index()
		{	
				$data['judul'] = "Halaman Depan";
				$this->load->view('v_header',$data);
				$this->load->view('v_index',$data);
				$this->load->view('v_footer',$data);
		}

		public function about()
		{
				$data['judul'] = "Halaman About";	
				$this->load->view('v_header', $data);
				$this->load->view('v_about',$data);
				$this->load->view('v_footer', $data);
			}

			public function user_input()
			{
				$data['judul'] = "Halaman User";
				$data['user'] = $this->ModelUser->getUser()->result_array();
				$this->load->view('v_header', $data);
				$this->load->view('v_user_db', $data);
				$this->load->view('v_footer', $data);
			}

			public function user_output()
		{

			$input = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
		];

			$data['judul'] = "Halaman Tampil";
			$this->load->view('v_header',$data);
			$this->load->view('v_user_output',$input);
			$this->load->view('v_footer',$data);

		}

}


