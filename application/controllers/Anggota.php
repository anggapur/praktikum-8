<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

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
	public $page = 'anggota';
	public $view = 'Anggota/';
	public function __construct(){
        parent::__construct();
        $this->load->model('AnggotaModel');
         if(!$this->session->has_userdata('kd_petugas'))
		{
			redirect('login');
		}
      }
	public function index()
	{

		$data['listBuku'] = $this->AnggotaModel->getData();
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'index',$data);
		$this->load->view('layout/footer');
	}
	public function create()
	{

		$data['listBuku'] = $this->AnggotaModel->getData();
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'create',$data);
		$this->load->view('layout/footer');
	}

	public function store()
	{
		$dataInsert = $this->input->post();
		$dataInsert['password'] = md5($dataInsert['password']);
		$q = $this->AnggotaModel->insertData($dataInsert);
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Tambah Data Anggota');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Tambah Data Anggota');
			redirect($this->view.'index');
		}
	}

	public function edit($id)
	{

		$where = ['kd_anggota' => $id];
		$data['dataBuku'] = $this->AnggotaModel->getOneData($where);
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'edit',$data);
		$this->load->view('layout/footer');
	}

	public function update($id)
	{
		$where = ['kd_anggota' => $id];
		$q = $this->AnggotaModel->updateData($where,$this->input->post());
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Update Data Anggota');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Update Data Anggota');
			redirect($this->view.'index');
		}
	}

	public function delete($id)
	{
		$where = ['kd_anggota' => $id];
		$q = $this->AnggotaModel->deleteData($where);
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Hapus Data Anggota');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Hapus Data Anggota');
			redirect($this->view.'index');
		}
	}
}
