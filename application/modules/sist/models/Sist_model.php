<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sist_model extends CI_Model{

	private $table = "sist";
	private $id = "sist_id";

	public function __construct(){
		parent::__construct();
	}

	public function delete($id){
		$this->db->delete($this->table, array($this->id => $id));
		return $this->db->affected_rows();
	}

	public function get($id = FALSE){
		if ($id){
			$query = $this->db->get_where($this->table, [$this->id => $id]);
			return $query->row();
		}
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function insert($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data){
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

}