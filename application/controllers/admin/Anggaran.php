<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		admin_is_logged_in();
		$this->load->model('admin/Auth_model');
		$this->load->model('admin/Anggaran_model');

	}

	public function index($layout = false)
	{
		$data['appconfig'] = [
			'title' => 'Anggaran',
			'ajaxfun' => 'dataAnggaran();',
		];
		$data['authData'] = $this->Auth_model->userData();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/anggaran/vw_anggaran', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function edit($id)
	{
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$detail = $this->input->post('detail');
			$tahun = $this->input->post('tahun');
			$iventaris = $this->input->post('iventaris');
			$gedung = $this->input->post('gedung');

			// memasukkan data user baru ke database
			$data = array( 
				'detail	' => $detail,
				'tahun' => $tahun,
				'anggaran_inventaris' => $iventaris,
				'anggaran_gedung' => $gedung,
			);
			
			//update to model db
			$this->Anggaran_model->update(['id' => $id], $data);
			echo "success";

		} else {

			$data['appconfig'] = [
				'title' => 'Anggaran',
				'ajaxfun' => 'editAnggaran();',
			];

			$data['authData'] = $this->Auth_model->userData();
			$data['anggaran'] = $this->Anggaran_model->getById($id);
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/anggaran/vw_edit', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function tambah()
	{
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$detail = $this->input->post('detail');
			$tahun = $this->input->post('tahun');
			$iventaris = $this->input->post('iventaris');
			$gedung = $this->input->post('gedung');

			// memasukkan data user baru ke database
			$data = array( 
				'detail	' => $detail,
				'tahun' => $tahun,
				'anggaran_inventaris' => $iventaris,
				'anggaran_gedung' => $gedung,
			);
			
			//insert to model db
			$inresult = $this->Anggaran_model->insert($data);
			echo "success";

		} else {

			$data['appconfig'] = [
				'title' => 'Anggaran',
				'ajaxfun' => 'tambahAnggaran();',
			];

			$data['authData'] = $this->Auth_model->userData();
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/anggaran/vw_tambah', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function anggaran_data()
	{
		// Ambil data dari parameter AJAX
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search_value = $this->input->post('search')['value'];

		//filter
		$tahun = '';
		if ($this->input->get('tahun') != 'all') {
			$tahun = $this->input->get('tahun');
		}

		// Hitung total data
		$total_data = $this->Anggaran_model->count_all();

		// Ambil data dari database
		$data = $this->Anggaran_model->get_data($tahun, $start, $length, $search_value);

		// Format data untuk DataTable
		$output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data,
		);

		// Convert output menjadi format JSON
		echo json_encode($output);
		;
	}

	public function delete()
	{
		$id = $this->input->post('id');

		$result = $this->Anggaran_model->delete($id);

		if ($result) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false));
		}
	}
}