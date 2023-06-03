<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        admin_is_logged_in();
		$this->load->model('admin/Auth_model');

    }

	public function index()
	{
		$data['appconfig'] = [
			'title' => 'Dashboard',
		];
		$data['authData'] =  $this->Auth_model->userData();
        $this->load->view('admin/layout/header',$data);
		$this->load->view('admin/page/dashboard/vw_dashboard',$data);
        $this->load->view('admin/layout/footer',$data);
	}
}
	