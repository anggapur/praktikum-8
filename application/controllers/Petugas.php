<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

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
	public $page = 'petugas';
	public $view = 'Petugas/';
	public function __construct(){
        parent::__construct();
        $this->load->model('PetugasModel');
         if(!$this->session->has_userdata('kd_petugas'))
		{
			redirect('login');
		}
      }
	public function index()
	{

		$data['listBuku'] = $this->PetugasModel->getData();
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'index',$data);
		$this->load->view('layout/footer');
	}
	public function create()
	{

		$data['listBuku'] = $this->PetugasModel->getData();
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'create',$data);
		$this->load->view('layout/footer');
	}

	public function store()
	{
		$dataInsert = $this->input->post();
		$dataInsert['password'] = md5($dataInsert['password']);
		$q = $this->PetugasModel->insertData($dataInsert);
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Tambah Data Petugas');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Tambah Data Petugas');
			redirect($this->view.'index');
		}
	}

	public function edit($id)
	{

		$where = ['kd_petugas' => $id];
		$data['dataBuku'] = $this->PetugasModel->getOneData($where);
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'edit',$data);
		$this->load->view('layout/footer');
	}

	public function update($id)
	{
		$where = ['kd_petugas' => $id];
		$dataUpdate = $this->input->post();
		$dataUpdate['password'] = md5($dataUpdate['password']);
		$q = $this->PetugasModel->updateData($where,$dataUpdate);
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Update Data Petugas');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Update Data Petugas');
			redirect($this->view.'index');
		}
	}

	public function delete($id)
	{
		$where = ['kd_petugas' => $id];
		$q = $this->PetugasModel->deleteData($where);
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Hapus Data Petugas');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Hapus Data Petugas');
			redirect($this->view.'index');
		}
	}
}
