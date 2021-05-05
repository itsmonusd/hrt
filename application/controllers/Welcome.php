<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
	}



	public function index()
	{
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	public function user()
	{
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/user');
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}


	public function table()
	{
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/tables');
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}


}
