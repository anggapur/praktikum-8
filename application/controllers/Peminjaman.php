<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

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
	public $page = 'peminjaman';
	public $view = 'Peminjaman/';
	public $limit = 10;
	public function __construct(){
        parent::__construct();
        $this->load->model(['BukuModel','AnggotaModel','GlobalModel']);
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
		$data['listBuku'] = $this->BukuModel->getDataPinjamAnggotaByPetugas($this->limit,$from,$search);
		$data['limitPerPage'] = $this->limit;
		$data['activePage'] = $this->page;
		$data['search'] =  ($search == null) ? '' : $search;

		$this->load->library('pagination');
		$config = $this->GlobalModel->paginationConfig();
		$config['base_url'] = base_url().'/Peminjaman/index';
		$config['total_rows'] = $this->BukuModel->allDataPinjamAnggotaByPetugas($search);
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
		$data['listBuku'] = $this->BukuModel->getDataPinjamAnggotaByPetugas(100000,0);
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'datatable',$data);
		$this->load->view('layout/footer');
	}
	public function create()
	{

		$data['listBuku'] = $this->BukuModel->getData();
		$data['listAnggota'] = $this->AnggotaModel->getData();
		$data['activePage'] = $this->page;
		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'create',$data);
		$this->load->view('layout/footer');
	}

	public function store()
	{
		// Validation
		$variable = ['kd_register','kd_anggota','tanggal_pinjam'];
		foreach ($variable as $key => $value) {
			$nameLabel = ucwords(str_replace('_',' ',$value));
			$this->form_validation->set_rules($value,$nameLabel,'required');
		}
		
 
		if($this->form_validation->run() == false){
			echo json_encode(['status' => 'failed' , 'message' => validation_errors()]);
			return 0;
		}	

		$q = $this->AnggotaModel->insertDataPeminjaman($this->input->post());
		if($q)
		{
			echo json_encode(['status' => 'success','message' => 'Berhasil Tambah Data Peminjaman']);
			// $this->session->set_flashdata('state', 'success');
			// $this->session->set_flashdata('message', 'Berhasil Tambah Data Peminjaman');
			// redirect($this->view.'index');
		}
		else
		{
			echo json_encode(['status' => 'failed','message' => 'Gagal Tambah Data Peminjaman']);
			// $this->session->set_flashdata('state', 'danger');
			// $this->session->set_flashdata('message', 'Gagal Tambah Data Peminjaman');
			// redirect($this->view.'index');
		}
	}

	public function edit($id)
	{

		$where = ['peminjaman.kd_pinjam' => $id];
		$data['dataBuku'] = $this->BukuModel->getOneDataPinjaman($where);
		$data['activePage'] = $this->page;
		$data['listBuku'] = $this->BukuModel->getData();
		$data['listAnggota'] = $this->AnggotaModel->getData();

		$this->load->view('layout/header',$data);
		$this->load->view($this->view.'edit',$data);
		$this->load->view('layout/footer');
	}

	public function update($id)
	{
		// Validation
		$variable = ['kd_register','kd_anggota','tanggal_pinjam','tanggal_kembali'];
		foreach ($variable as $key => $value) {
			$nameLabel = ucwords(str_replace('_',' ',$value));
			$this->form_validation->set_rules($value,$nameLabel,'required');
		}
		
 
		if($this->form_validation->run() == false){
			echo json_encode(['status' => 'failed' , 'message' => validation_errors()]);
			return 0;
		}	


		$where = ['kd_pinjam' => $id];
		$q = $this->AnggotaModel->updateDataPeminjaman($where,$this->input->post());
		if($q)
		{
			echo json_encode(['status' => 'success','message' => 'Berhasil Update Data Peminjaman']);
			// $this->session->set_flashdata('state', 'success');
			// $this->session->set_flashdata('message', 'Berhasil Update Data Peminjaman');
			// redirect($this->view.'index');
		}
		else
		{
			echo json_encode(['status' => 'failed','message' => 'Gagal Update Data Peminjaman']);
			// $this->session->set_flashdata('state', 'danger');
			// $this->session->set_flashdata('message', 'Gagal Update Data Peminjaman');
			// redirect($this->view.'index');
		}
	}

	public function delete($id)
	{
		$where = ['kd_pinjam' => $id];
		$q = $this->BukuModel->deleteDataPinjam($where);


		if($q)
		{
			echo json_encode(['status' => 'success','message' => 'Berhasil Delete Data Peminjaman']);
			// $this->session->set_flashdata('state', 'success');
			// $this->session->set_flashdata('message', 'Berhasil Hapus Data Peminjaman');
			// redirect($this->view.'index');
		}
		else
		{
			echo json_encode(['status' => 'failed','message' => 'Gagal Delete Data Peminjaman']);
			// $this->session->set_flashdata('state', 'danger');
			// $this->session->set_flashdata('message', 'Gagal Hapus Data Peminjaman');
			// redirect($this->view.'index');
		}
	}
}
