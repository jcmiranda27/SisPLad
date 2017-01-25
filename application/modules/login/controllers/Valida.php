<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Valida extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_usuario', '',TRUE);
		$this->load->helper('url');
		$this->load->helper('security');
	}

	function index()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_message('required','Campo %s obligatorio');
		$this->form_validation->set_rules('login','Usuario','trim|required');
		$this->form_validation->set_rules('password','Contraseña','trim|required|callback_database');	

		if($this->form_validation->run()==FALSE)
		{
			redirect('login','refresh');
		}else{
			$login=$this->input->post('login');
			$sess_array=array();
			$sess_array=array(
				'usuariologin'=>$login
			);
			$this->session->set_userdata('logged_in',$sess_array);
			redirect('home/dashboard','refresh');
		}
	}

	function database($password)
	{
		$login=$this->input->post('login');
		$result=$this->model_usuario->login($login,$password);
		$usuarioid='';
		$nombreusuario='';
		if($result)
		{
			return true;
		}else{
			return false;
		}
	}

}
?>