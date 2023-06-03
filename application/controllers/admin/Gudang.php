<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Gudang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		admin_is_logged_in();
		$this->load->model('admin/Auth_model');
		$this->load->model('admin/Gudang_model');
	}
	public function index($layout = false)
	{
		$data['appconfig'] = [
			'title' => 'Gudang',
			'ajaxfun' => 'dataGudang();',
		];
		$data['authData'] = $this->Auth_model->userData();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/gudang/vw_gudang', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function import_masuk($layout = false)
	{
		$data['appconfig'] = [
			'title' => 'Import Barang Masuk',
		];
		$data['authData'] = $this->Auth_model->userData();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/gudang/import_masuk', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function import_keluar($layout = false)
	{
		$data['appconfig'] = [
			'title' => 'Import Barang Keluar',
		];
		$data['authData'] = $this->Auth_model->userData();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/gudang/import_keluar', $data);
		$this->load->view('admin/layout/footer', $data);
	}


	public function import_barang($layout = false)
	{
		$data['appconfig'] = [
			'title' => 'Import Data Barang',
		];
		$data['authData'] = $this->Auth_model->userData();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/gudang/import_barang', $data);
		$this->load->view('admin/layout/footer', $data);
	}


	public function do_import()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size'] = 2048; // 2MB

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_excel')) {
			$error = $this->upload->display_errors();
			echo $error;
		} else {
			$file_data = $this->upload->data();
			$file_path = $file_data['full_path'];

			$rows_imported = $this->Gudang_model->importDataFromExcel($file_path);

			echo "Data imported: " . $rows_imported;
		}
	}

	public function generateExcel($jenis)
{
    // Buat objek Spreadsheet
    $spreadsheet = new Spreadsheet();

    // Buat objek Worksheet
    $worksheet = $spreadsheet->getActiveSheet();

    // Set header kolom
    $worksheet->setCellValue('A1', 'Tanggal');
    $worksheet->setCellValue('B1', 'Nama Barang');
    $worksheet->setCellValue('C1', 'Keterangan');
    $worksheet->setCellValue('D1', 'Jumlah');

    // Menggunakan DataValidation pada kolom barang
    $barang_validation = $worksheet->getCell('B2')->getDataValidation();
    $barang_validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);

    // Buat daftar pilihan barang
    $barangs = $this->Gudang_model->baranglog(true);
    $barangList = array();

    foreach ($barangs as $barang) {
        $barangList[] = $barang['nama_barang'];
    }

    $barang_formula = '"' . implode(",", $barangList) . '"';
    $barang_validation->setFormula1($barang_formula);

    // Mengatur validasi keterangan hanya pada kolom sampai 100
    $worksheet->setDataValidation("B2:B100", $barang_validation);

    if ($jenis == 'keluar') {
        // Menggunakan DataValidation pada kolom Keterangan
        $keterangan_validation = $worksheet->getCell('C2')->getDataValidation();
        $keterangan_validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);

        // Buat daftar pilihan keterangan
        $outlets = $this->Gudang_model->getOutlet(true);
        $keteranganList = array();

        foreach ($outlets as $outlet) {
            $keteranganList[] = $outlet['nama_outlet'];
        }

        $keterangan_formula = '"' . implode(",", $keteranganList) . '"';
        $keterangan_validation->setFormula1($keterangan_formula);

        // Mengatur validasi keterangan hanya pada kolom sampai 100
        $worksheet->setDataValidation("C2:C100", $keterangan_validation);
    }

    // Simpan file Excel
    $path = './uploads/';
    $filename = $path . date('YmdHis');
    if ($jenis == 'keluar') {
        $filename .= '_keluar';
    } else {
        $filename .= '_masuk';
    }
    $filename .= '_logimport.xlsx';

    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);

    // Set header HTTP untuk mengunduh file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // Mengirim file Excel ke output
    $writer->save('php://output');
}


	public function log()
	{
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$barang = $this->input->post('barang');
			$jenis = $this->input->post('jenis');
			$outlet = $this->input->post('outlet');
			$keterangan = $this->input->post('keterangan');
			$jumlah = $this->input->post('jumlah');
			$tanggal = $this->input->post('tanggal');

			// memasukkan data user baru ke database
			$data = array(
				'id_barang' => $barang,
				'tanggal' => $tanggal,
				'id_outlet' => $outlet,
				'keterangan' => $keterangan,
				'jenis' => $jenis,
				'jumlah' => $jumlah,
			);

			//insert to model db
			$inresult = $this->Gudang_model->insertLog($data);
			echo "success";

		} else {

			$data['appconfig'] = [
				'title' => 'Log Barang',
				'ajaxfun' => 'dataGudangLog(); tambahLog();',
			];
			$data['authData'] = $this->Auth_model->userData();
			$data['barang'] = $this->Gudang_model->baranglog(false);
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/gudang/vw_log', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function edit($id)
	{
		$data['barang'] = $this->Gudang_model->getById($id);
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$nama = $this->input->post('nama');
			$satuan = $this->input->post('satuan');
			$harga = $this->input->post('harga');
			$min = $this->input->post('min');
			$status = $this->input->post('status');

			// memasukkan data user baru ke database
			$data = array(
				'nama_barang' => $nama,
				'satuan_barang' => $satuan,
				'harga_satuan' => $harga,
				'min_stok' => $min,
				'status' => $status,
			);

			//update to model db
			$this->Gudang_model->update(['id' => $id], $data);
			echo "success";

		} else {

			$data['appconfig'] = [
				'title' => 'Gudang',
				'ajaxfun' => 'editGudang();',
			];

			$data['authData'] = $this->Auth_model->userData();
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/gudang/vw_edit', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function tambah()
	{
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {

			// mengambil data inputan dari form
			$nama = $this->input->post('nama');
			$satuan = $this->input->post('satuan');
			$harga = $this->input->post('harga');
			$min = $this->input->post('min');
			$status = $this->input->post('status');

			// memasukkan data user baru ke database
			$data = array(
				'nama_barang' => $nama,
				'satuan_barang' => $satuan,
				'harga_satuan' => $harga,
				'min_stok' => $min,
				'status' => $status,
			);

			//insert to model db
			$inresult = $this->Gudang_model->insert($data);
			echo "success";

		} else {

			$data['appconfig'] = [
				'title' => 'Gudang',
				'ajaxfun' => 'tambahGudang();',
			];

			$data['authData'] = $this->Auth_model->userData();
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/gudang/vw_tambah', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function gudang_data()
	{
		// Ambil data dari parameter AJAX
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search_value = $this->input->post('search')['value'];

		// Hitung total data
		$total_data = $this->Gudang_model->count_all();

		// Ambil data dari database
		$data = $this->Gudang_model->get_data($start, $length, $search_value);

		// Format data untuk DataTable
		$output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data,
		);

		// Convert output menjadi format JSON
		echo json_encode($output);

	}

	public function log_data()
	{
		// Ambil data dari parameter AJAX
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search_value = $this->input->post('search')['value'];
		// Hitung total data
		$total_data = $this->Gudang_model->count_all_log();

		// Filter data
		$filstart = $this->input->get('filstart');
		$filend = $this->input->get('filend');
		$filbarang = $this->input->get('filbarang');
		$filstatus = '';
		if (strtolower($this->input->get('filstatus')) != 'all') {
			$filstatus = $this->input->get('filstatus');
		}

		$filter = [
			'filstart' => $filstart,
			'filend' => $filend,
			'filbarang' => $filbarang,
			'filstatus' => $filstatus,
		];

		// Ambil data dari database
		$data = $this->Gudang_model->log_data($filter, $start, $length, $search_value);

		// Format data untuk DataTable
		$output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data,
		);

		// Convert output menjadi format JSON
		echo json_encode($output);
	}

	//atk gudang
	public function atk($layout = false)
	{

	}
	public function tambahatk($layout = false)
	{

	}
	public function editatk($layout = false)
	{

	}

	public function logatk($layout = false)
	{

	}

	public function tambahlogatk($layout = false)
	{

	}

	public function atk_data()
	{

	}

	public function atk_log_data()
	{

	}

	public function deleteAtk()
	{

	}

	public function delete_logAtk()
	{

	}



	public function getBarang()
	{
		$data = $this->Gudang_model->baranglog(false);
		echo json_encode($data);
	}

	public function getOutlet()
	{
		$data = $this->Gudang_model->getOutlet(true);
		echo json_encode($data);
	}

	public function delete()
	{
		$id = $this->input->post('id');

		$result = $this->Gudang_model->delete($id);

		if ($result) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false));
		}
	}

	public function deleteLog()
	{
		$id = $this->input->post('id');

		$result = $this->Gudang_model->deleteLog($id);

		if ($result) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false));
		}
	}



	//export log barang
	public function exportlog_data()
	{
		// Filter data
		$filstart = $this->input->get('filstart');
		$filend = $this->input->get('filend');
		$filbarang = $this->input->get('filbarang');
		$filstatus = '';
		if ($this->input->get('filstatus') != 'all') {
			$filstatus = $this->input->get('filstatus');
		}

		$filter = [
			'filstart' => $filstart,
			'filend' => $filend,
			'filbarang' => $filbarang,
			'filstatus' => $filstatus,
		];

		// Ambil data dari database melalui model
		$data = $this->Gudang_model->exportlog_data($filter);

		// Mengirimkan data sebagai respons JSON
		header('Content-Type: application/json');
		echo json_encode($data);
	}


	public function export_logbarang()
	{
		if (empty($_GET['filbarang']) || $_GET['filbarang'] === 'all') {
			// Return 403 Forbidden response
			show_error('403 Forbidden', 403);
			return;
		}

		$data['appconfig'] = [
			'title' => 'Export Log Barang',
			'ajaxfun' => 'dataGudang();',
		];
		$data['authData'] = $this->Auth_model->userData();
		$data['barang'] = $this->Gudang_model->getById($_GET['filbarang']);
		$this->load->view('admin/export/log_barang', $data);
	}

}