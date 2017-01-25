<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		date_default_timezone_set('America/Lima');
	}
	
	public function index()
	{

/*		$data = new stdClass();
		$data->title = "Admin";
		$data->view_content = "login/login";
		$data->title_container = $this->lang->line('dashboard_title');
		$data->fecha = $this->utilities->getDate();
		$data->subtitle_container = $this->lang->line('dashboard_subtitle');
		$this->template->admin_template($data);

*/


		$this->load->helper(array('form'));
		$this->load->view('view_login');
	}
}
