<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sist extends MY_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->libraries([
			'Utilities'
		]);
		$this->load->model([
			"Sist_model"
		]);
	}

	public function sist_add(){
		$fecha = $this->utilities->getDate();
		$insert = [
			"sist_date_add" => $fecha,
		];
		$success = $this->Sist_model->insert($insert);

		if($success > 0){
			$this->session->set_flashdata('message_success','Se agrego de manera correcta');
			redirect('sist');
		}else{
			$this->session->set_flashdata('message_error','Ocurrio un error al agregar la informacion');
			redirect('sist');
		}
	}

	public function index(){
		$data = new stdClass();
		$data->title = "Admin";
		$data->view_content = "sist/view_admin";
		$data->title_container = $this->lang->line('dashboard_title');
		$data->fecha = $this->utilities->getDate();
		$data->subtitle_container = $this->lang->line('dashboard_subtitle');
		$this->template->admin_template($data);
	}

	public function Home(){
		$data = new stdClass();
		$data->title = "Home";
		$data->title_container = $this->lang->line('home_title');
		$data->view_content = "sist/view_home";
		$this->template->home_template($data);
	}
}