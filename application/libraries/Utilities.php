<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities{

	protected $CI;

	public function __construct(){

		$this->CI = & get_instance();
	}

	public function getDate() {
		return date('Y-m-d H:i:s');
	}

/*  --  CAMBIAR NOMBRE AL GUARDAR IMAGEN  -- */
	public function randomString($length) {
		$str = "";
		$characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++){
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

/*  --  CAMBIAR A MINUSCULAS  -- */
	public function randomStringLower($length) {
	$str = "";
		$characters = array_merge(range('a', 'z'), range('0', '9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++){
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

/*  --  GENERA NUMERO ALEATORIO PARA PASSWORD  -- */
	public function random_salt(){
		return md5(mt_rand());
	}

/*  --  ENCRIPTA PASSWORD  -- */
	public function hash_passwd($password, $random_salt){
		return is_php('5.5') ? password_hash($password . config_item('encryption_key'), PASSWORD_BCRYPT, array('cost' => 11)) : crypt($password . config_item('encryption_key'), '$2a$09$' . $random_salt . '$');
	}

	/*  --  VALIDAR PASSWORD  -- */
	public function check_passwd($hash, $random_salt, $password){
		if (is_php('5.5') && password_verify($password . config_item('encryption_key'), $hash)){
			return TRUE;
		} else if ($hash === $this->hash_passwd($password, $random_salt)){
			return TRUE;
		}
		return FALSE;
	}

	/* -- CAMBIAR FECHA CON FORMATO DE MYSQL -- */
	public function cambiaf_a_mysql($fecha){
		$fecha = strtotime($fecha);
		$fecha_nueva = date('Y-m-d', $fecha);
		return $fecha_nueva;
	}


}