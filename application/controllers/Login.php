<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login/login');
	}

	public function proses()
	{
		if($this->input->post('jenis') == 'petugas')
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$sql = 'SELECT * FROM petugas WHERE username="'.$username.'" AND password ="'.$password.'"';
			$query = $this->db->query($sql);
			
			$countQuery =  count($query->result());

			if($countQuery > 0)
			{
				$userdata = array(
					'kd_petugas' => $query->result()[0]->kd_petugas,
					'nama' => $query->result()[0]->nama,
					'alamat' => $query->result()[0]->alamat,
					'username' => $query->result()[0]->username
				);
				$this->session->set_userdata($userdata);
				// Update last login
				$this->load->model(['PetugasModel']);	
				$this->PetugasModel->updateLastLogin();
				redirect('AdminPetugas/index');
			}
			else
			{
				$this->session->set_flashdata('state', 'danger');
				$this->session->set_flashdata('message', 'Kombinasi Username, Password dan Jenis User Tidak Ditemukan');
				redirect('Login');
			}
		}
		else
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$sql = 'SELECT * FROM anggota WHERE username="'.$username.'" AND password ="'.$password.'"';
			$query = $this->db->query($sql);
			
			$countQuery =  count($query->result());

			if($countQuery > 0)
			{
				$userdata = array(
					'kd_anggota' => $query->result()[0]->kd_anggota,
					'nama' => $query->result()[0]->nama,
					'prodi' => $query->result()[0]->prodi,
					'jenjang' => $query->result()[0]->jenjang,
					'alamat' => $query->result()[0]->alamat,
					'username' => $query->result()[0]->username
				);
				$this->session->set_userdata($userdata);
				// Update last login
				$this->load->model(['AnggotaModel']);	
				$this->AnggotaModel->updateLastLogin();
				redirect('PeminjamanBuku/index');
			}
			else
			{
				$this->session->set_flashdata('state', 'danger');
				$this->session->set_flashdata('message', 'Kombinasi Username, Password dan Jenis User Tidak Ditemukan');
				redirect('Login');
			}
		}

	}
	public function Logout()
	{
		$this->session->unset_userdata(['kd_anggota','kd_petugas','nama','alamat','username']);
		redirect('Login');
	}
}
