<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		admin_is_logged_in();
		$this->load->model('admin/User_model');
		$this->load->model('admin/Auth_model');
	}



	public function index()
	{
		$data['appconfig'] = [
			'title' => 'Users',
			'ajaxfun' => 'dataUser();',
		];
		$data['authData'] =  $this->Auth_model->userData();
		$data['userData'] = $this->User_model->get();
		$data['getRole'] = $this->User_model->getrole();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/users/vw_users', $data);
		$this->load->view('admin/layout/footer', $data);
	}
 

	public function tambah()
	{
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {
			// mengambil data inputan dari form
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role = $this->input->post('role');
			$status = $this->input->post('status');

			// memeriksa apakah user sudah terdaftar sebelumnya
			if ($this->Auth_model->get($email)->num_rows() > 0) {
				echo "available";
				exit();
			}

			// memasukkan data user baru ke database
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role_id' => $role,
				'status' => $status
			);
			$inresult = $this->User_model->insert($data);
			echo "success";
		} else {

			$data['appconfig'] = [
				'title' => 'Tambah Pengguna',
				'ajaxfun' => 'tambahUser();',
			];
			
			$data['authData'] =  $this->Auth_model->userData();
			$data['getRole'] = $this->User_model->getrole();
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/users/vw_tambah', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function edit($id)
	{
		// hanya memproses request ajax
		if ($this->input->is_ajax_request()) {
			// mengambil data inputan dari form
			$nama = $this->input->post('nama');
			$password = $this->input->post('password');
			$role = $this->input->post('role');
			$status = $this->input->post('status');

			// mengupdate data user

			$data = array(
				'nama' => $nama,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role_id' => $role,
				'status' => $status
			);

			$this->User_model->update(['id' => $id], $data);

			echo "success";
		} else {
			$data['appconfig'] = [
				'title' => 'Edit Pengguna',
				'ajaxfun' => 'editUser();',
			];
			$data['authData'] =  $this->Auth_model->userData();
			$data['userData'] = $this->User_model->getById($id);
			$data['getRole'] = $this->User_model->getrole();
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/users/vw_edit', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}
	public function log()
	{
		$data['appconfig'] = [
			'title' => 'Log',
			'ajaxfun' => 'dataLog();',
		];
		$data['authData'] =  $this->Auth_model->userData();
		$data['userData'] = $this->User_model->get();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/users/vw_log', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function log_data(){
		
		// Ambil data dari parameter AJAX
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search_value = $this->input->post('search')['value'];

		//filter
		$userid_log = '';
		if ($this->input->get('userid_log') != 'all') {
			$userid_log = $this->input->get('userid_log');
		}

		// Hitung total data
		$total_data = $this->User_model->count_all_log();

		// Ambil data dari database
		$data = $this->User_model->getlog($userid_log, $start, $length, $search_value);

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

	public function akun()
	{
		$data['appconfig'] = [
			'title' => 'Log',
			'ajaxfun' => 'dataAkun();',
		];
		$data['authData'] =  $this->Auth_model->userData();
		$data['userData'] = $this->User_model->get();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/users/vw_akun', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function role()
	{
		$data['appconfig'] = [
			'title' => 'Detail Role',
			'ajaxfun' => 'dataRole();',
		];
		$data['authData'] =  $this->Auth_model->userData();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/page/users/vw_role', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function roledetail($id)
	{

		if(isset($_POST['simpan'])){
			$xmenus[] = $_POST['menu'];
			foreach ($xmenus as $menu) {
				$menus = @implode(",", $menu);
			}

			$data = [
				'role_name' => $_POST['rolename'],
				'role_menu' => $menus,
			];
			$this->User_model->updaterole(['id' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Berhasil Perbarui!</div>');
			redirect('admin/users/roledetail/' . $id);
		}else{
			$data['appconfig'] = [
				'title' => 'Detail Role',
			];
			$data['authData'] =  $this->Auth_model->userData();
			$data['roles'] = $this->User_model->roleById($id);
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/users/vw_detail_role', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function tambahrole()
	{

		if(isset($_POST['simpan'])){
			$xmenus[] = $_POST['menu'];
			foreach ($xmenus as $menu) {
				$menus = @implode(",", $menu);
			}

			$data = [
				'role_name' => $_POST['rolename'],
				'role_menu' => $menus,
			];
			$this->User_model->insertrole($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Berhasil di Tambah!</div>');
			redirect('admin/users/tambahrole');
		}else{
			$data['appconfig'] = [
				'title' => 'Tambah Role',
			];
			$data['authData'] =  $this->Auth_model->userData();
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/page/users/vw_tambah_role', $data);
			$this->load->view('admin/layout/footer', $data);
		}
	}

	public function user_data()
	{
		// Ambil data dari parameter AJAX
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search_value = $this->input->post('search')['value'];

		//filter
		$role = '';
		$status = '';
		if ($this->input->get('role') != 'all') {
			$role = $this->input->get('role');
		}

		if ($this->input->get('status') != 'all') {
			$status = $this->input->get('status');
		}

		// Hitung total data
		$total_data = $this->User_model->count_all();

		// Ambil data dari database
		$data = $this->User_model->get_data($role, $status, $start, $length, $search_value);

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

	public function role_data()
	{
		// Ambil data dari parameter AJAX
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search_value = $this->input->post('search')['value'];

		// Hitung total data
		$total_data = $this->User_model->count_all();

		// Ambil data dari database
		$data = $this->User_model->getrole($start, $length, $search_value);

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


	public function delete_role()
	{
		$id = $this->input->post('id');

		$this->load->model('User_model');
		$result = $this->User_model->delete_role($id);

		if ($result) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false));
		}
	}

	public function delete_user()
	{
		$id = $this->input->post('id');
		//lakukan validasi terhadap $id, misalnya dengan mengecek apakah $id adalah integer dan ada di database

		$this->load->model('User_model');
		$result = $this->User_model->delete($id);

		if ($result) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false));
		}
	}

	
}
