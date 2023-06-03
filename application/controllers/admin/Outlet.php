<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		admin_is_logged_in();
		$this->load->model('admin/Auth_model');
		$this->load->model('admin/Outlet_model');
	}

	public function index()
	{
		$data['appconfig'] = [
			'title' => 'Outlet',
			'ajaxfun' => 'dataOutlet();',

		];
		$data['authData'] =  $this->Auth_model->userData();
		$data['area'] =  $this->Outlet_model->getArea();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/outlet/vw_outlet', $data);
		$this->load->view('admin/layout/footer', $data);
	}



	public function upc($id)
	{
		$data['appconfig'] = [ 
			'title' => 'UPC',
			'ajaxfun' => 'dataUpc();',
		];
		$data['authData'] =  $this->Auth_model->userData();
		$data['cabang'] = $this->Outlet_model->getById($id);
		$data['cabid'] = $id;
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/outlet/vw_upc', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function outlet_data()
	{
		// Ambil data dari parameter AJAX
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search_value = $this->input->post('search')['value'];

		//filter
		$area = '';
		$jenis = '';
		$status = '';
		if (strtolower($this->input->get('area')) != 'all') {
			$area = $this->input->get('area');
		}

		if (strtolower($this->input->get('jenis')) != 'all') {
			$jenis = $this->input->get('jenis');
		}
		if (strtolower($this->input->get('status')) != 'all') {
			$status = $this->input->get('status');
		}

		// Hitung total data
		$total_data = $this->Outlet_model->count_all();

		// Ambil data dari database
		$data = $this->Outlet_model->get_data($area, $jenis, $status, $start, $length, $search_value);

		// Format data untuk DataTable
		$output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data,
		);

		// Convert output menjadi format JSON
		echo json_encode($output);;
	}

	public function upc_data($id)
	{
		// Ambil data dari parameter AJAX
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search_value = $this->input->post('search')['value'];

		// Hitung total data
		$total_data = $this->Outlet_model->count_all();

		// Ambil data dari database
		$data = $this->Outlet_model->get_upc($id, $start, $length, $search_value);

		// Format data untuk DataTable
		$output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data,
		);

		// Convert output menjadi format JSON
		echo json_encode($output);;
	}


	public function delete_outlet()
	{
		$id = $this->input->post('id');

		$result = $this->Outlet_model->delete($id);

		if ($result) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false));
		}
	}


	public function edit($id)
	{
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$area = $this->input->post('area');
			$jenis = $this->input->post('jenis');
			$status = $this->input->post('status');

			// memasukkan data user baru ke database
			$data = array(
				'nama_outlet' => $nama,
				'alamat' => $alamat,
				'id_area' => $area,
				'id_cabang' => '',
				'jenis' => $jenis,
				'status' => $status,
			);

			//update to model db
			$this->Outlet_model->update(['id' => $id], $data);
			echo "success";
		} else {
 
			$data['appconfig'] = [
				'title' => 'Edit Outlet',
				'ajaxfun' => 'editOutlet();',
			];

			$data['authData'] = $this->Auth_model->userData();
			$data['outlet'] = $this->Outlet_model->getById($id);
			$data['getArea'] = $this->Outlet_model->getarea();
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/outlet/vw_edit', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	
	public function editupc($id)
	{
		$data['outlet'] = $this->Outlet_model->getById($id);
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$area = $this->input->post('area');
			$jenis = $this->input->post('jenis'); 
			$status = $this->input->post('status');

			// memasukkan data user baru ke database
			$data = array(
				'nama_outlet' => $nama,
				'alamat' => $alamat,
				'id_area' => $data['outlet']['areaid'],
				'id_cabang' => $data['outlet']['cabang'],
				'jenis' => $jenis,
				'status' => $status,
			);

			//update to model db
			$this->Outlet_model->update(['id' => $id], $data);
			echo "success";
		} else {
 
			$data['appconfig'] = [
				'title' => 'Edit Outlet (UPC)',
				'ajaxfun' => 'editUPC();',
			];

			$data['authData'] = $this->Auth_model->userData();
			$data['getArea'] = $this->Outlet_model->getarea();
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/outlet/vw_editupc', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function tambah()
	{
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$area = $this->input->post('area');
			$jenis = $this->input->post('jenis');
			$status = $this->input->post('status');

			// memasukkan data user baru ke database
			$data = array( 
				'nama_outlet' => $nama,
				'alamat' => $alamat,
				'id_area' => $area,
				'id_cabang' => '',
				'jenis' => $jenis,
				'status' => $status,
			);
			
			//insert to model db
			$inresult = $this->Outlet_model->insert($data);
			if($inresult){
				echo "success";
			}else{
				echo "error";
			}

		} else {

			$data['appconfig'] = [
				'title' => 'Tambah Outlet',
				'ajaxfun' => 'tambahOutlet();',
			];

			$data['authData'] = $this->Auth_model->userData();
			$data['getArea'] = $this->Outlet_model->getarea();

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/outlet/vw_tambah', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}


	public function tambahupc($id)
	{
		$data['uide'] = $id;
		$data['cabang'] = $this->Outlet_model->getById($id);
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$jenis = $this->input->post('jenis');
			$status = $this->input->post('status');

			// memasukkan data user baru ke database
			$data = array( 
				'nama_outlet' => $nama,
				'alamat' => $alamat,
				'id_area' => $data['cabang']['areaid'],
				'id_cabang' => $id,
				'jenis' => $jenis,
				'status' => $status,
			);
			
			//insert to model db
			$inresult = $this->Outlet_model->insert($data);
			if($inresult){
				echo "success";
			}else{
				echo "error";
			}

		} else {

			$data['appconfig'] = [
				'title' => 'Tambah Outlet (UPC)',
				'ajaxfun' => 'tambahUPC();',
			];

			$data['authData'] = $this->Auth_model->userData();
			$data['getArea'] = $this->Outlet_model->getarea();

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/outlet/vw_tambahupc', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}


	public function import_cabang()
	{
		$data['appconfig'] = [
			'title' => 'Cabang',
		];
		$data['authData'] =  $this->Auth_model->userData();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/outlet/vw_import_cabang', $data);
		$this->load->view('admin/layout/footer', $data);
	}
}
