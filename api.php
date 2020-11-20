<?php
/*
-- ---------------------------------------------------------------
-- MARKETPLACE MULTI BUYER MULTI SELLER + SUPPORT RESELLER SYSTEM
-- CREATED BY : ROBBY PRIHANDAYA
-- COPYRIGHT  : Copyright (c) 2018 - 2019, PHPMU.COM. (https://phpmu.com/)
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2019-03-26
-- UPDATED ON : 2019-03-27
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
		header('Content-Type: application/json');
		
	}
	public function kategori(){
		$result = $this->db->query("SELECT * FROM kategori ORDER BY nama_kategori ASC")->result_array();
		$array = array(
			"status"=>true,
			"message"=>"Berhasil tarik data!",
			"data"=>$result
		);
		echo json_encode($array);
	}
	public function login(){
		$username = $this->input->post('username');
		$password = hash("sha512", md5($this->input->post('password')));
		$result = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
		if($result->num_rows()>0){
			$array = array(
				"status"=>true,
				"message"=>"Berhasil Login",
				"data"=>$result->row() //ini utk nampilin baris aja 
			);
		} else {
			$array = array(
				"status"=>false,
				"message"=>"Gagal Absen"
			);
		}
		echo json_encode($array);
	}
	
	public function gallery(){
		$result = $this->db->query("SELECT * FROM gallery LIMIT 5")->result_array();
		$array = array(
			"status"=>true,
			"message"=>"Berhasil tarik data",
			"data"=> $result
		);
		echo json_encode($array);
	}


	public function berita(){
		$result = $this->db->query("SELECT * FROM berita")->result_array();
		$array = array(
			"status"=>true,
			"message"=>"Sukses",
			"data"=> $result
		);
		echo json_encode($array);
	}


}
