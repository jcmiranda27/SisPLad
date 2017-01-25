<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* lleva a cabo la búsqueda de los datos en la base de datos
*
*@autor Juan Miranda
*/

class Model_usuario extends CI_Model
{
	private $table = "usuario";
	private $id = "idusuario";
	
	function login($login,$password)
	{
		$this->db->select('idUsuario','login','password','estado');
		$this->db->from('usuario');
		$this->db->where('login',$login);
		$this->db->where('password',$password);
		$this->db->where('estado','1');
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}
}
