<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        admin_is_logged_in();
    }

	public function index()
	{
		$this->load->view('admin/page/slide/vw_slide');

	}
}
