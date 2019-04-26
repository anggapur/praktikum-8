<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAnggota extends CI_Controller {

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
	public $page = 'home';

	public function __construct(){
        parent::__construct();
        $this->load->model(['BukuModel','AnggotaModel']);	
         if(!$this->session->has_userdata('kd_anggota'))
		{
			redirect('login');
		}
     }

	public function index()
	{
		$this->load->model('BukuModel','AnggotaModel');	
		$data['activePage'] = $this->page;
		$data['countBuku'] = count($this->BukuModel->getData());
		$data['countAnggota'] = count($this->AnggotaModel->getData());
		$this->load->view('layout/header',$data);
		$this->load->view('AdminPetugas/index',$data);
		$this->load->view('layout/footer');
	}
}
