<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
			public function index()
			{
						$this->load->view('view-form-matakuliah');
			}

			public function cetak()
			{
						$this->form_validation->set_rules(
							'kode', 'Kode', 
							'required|min_length[3]|max_length[10]',
								array(
									'required' => '%s harus diisi.',
									'min_length' => '%s Minimal 3 karakter',
									'max_length' => '%s Maksimal 10 karakter'
								)  
						);

						$this->form_validation->set_rules(
							'nama', 'Nama', 
							'required|min_length[5]|max_length[15]',
								array(
									'required' => '%s harus diisi.',
									'min_length' => '%s Minimal 5 karakter',
									'max_length' => '%s Maksimal 15 karakter'
									)
						);
						
						$this->form_validation->set_rules('sks', 'SKS', 'required',
								array('required' => '%s harus diisi.')
						);

						if ($this->form_validation->run() == FALSE)
						{
								$this->load->view('view-form-matakuliah');
						}
						else
						{
								$data = [
									'kode' => $this->input->post('kode'),
									'nama' => $this->input->post('nama'),
									'sks' => $this->input->post('sks') 
								];
		
								$this->load->view('view-data-matakuliah', $data);
							}
						
			}	
}
