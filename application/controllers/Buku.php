<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
	public $page = 'buku';
	public $view = 'Buku/';
	public $limit = 2;
	public function __construct(){
        parent::__construct();
        $this->load->model(['BukuModel','GlobalModel']);
        if(!$this->session->has_userdata('kd_petugas'))
		{
			redirect('login');
		}
      }


	public function index()
	{	
		$search = "";
	    if($this->input->post('submit') != NULL ){
	      $search = $this->input->post('search');
	      $this->session->set_userdata(array("search"=>$search));
	    }
	    else if($this->input->post('reload') != NULL ){
	    	$search = "";
	    	$this->session->unset_userdata('search');
	    }
	    else{
	      if($this->session->userdata('search') != NULL){
	        $search = $this->session->userdata('search');
	      }
	    }

		$from = $this->uri->segment(3);
		$data['listBuku'] = $this->BukuModel->getData($this->limit,$from,$search);
		$data['limitPerPage'] = $this->limit;
		$data['activePage'] = $this->page;
		$data['search'] =  ($search == null) ? '' : $search;

		$this->load->library('pagination');
		$config = $this->GlobalModel->paginationConfig();
		$config['base_url'] = base_url().'/Buku/index';
		$config['total_rows'] = $this->BukuModel->allData($search);
		$config['per_page'] = $this->limit;
		$config['enable_query_strings'] = TRUE;
		$this->pagination->initialize($config);

		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'index',$data);
		$this->load->view('layout/footer');
	}
	public function datatable()
	{
		$data['activePage'] = $this->page;
		$data['listBuku'] = $this->BukuModel->getData(10000,0);
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'datatable',$data);
		$this->load->view('layout/footer');
	}
	public function create()
	{

		$data['listBuku'] = $this->BukuModel->getData();
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'create',$data);
		$this->load->view('layout/footer');
	}

	public function store()
	{
		$q = $this->BukuModel->insertData($this->input->post());
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Tambah Data Buku');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Tambah Data Buku');
			redirect($this->view.'index');
		}
	}

	public function edit($id)
	{

		$where = ['kd_register' => $id];
		$data['dataBuku'] = $this->BukuModel->getOneData($where);
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'edit',$data);
		$this->load->view('layout/footer');
	}

	public function update($id)
	{
		$where = ['kd_register' => $id];
		$q = $this->BukuModel->updateData($where,$this->input->post());
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Update Data Buku');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Update Data Buku');
			redirect($this->view.'index');
		}
	}

	public function delete($id)
	{
		$where = ['kd_register' => $id];
		$q = $this->BukuModel->deleteData($where);
		if($q)
		{
			$this->session->set_flashdata('state', 'success');
			$this->session->set_flashdata('message', 'Berhasil Hapus Data Buku');
			redirect($this->view.'index');
		}
		else
		{
			$this->session->set_flashdata('state', 'danger');
			$this->session->set_flashdata('message', 'Gagal Hapus Data Buku');
			redirect($this->view.'index');
		}
	}
}
