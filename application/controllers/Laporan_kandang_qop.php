<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Laporan_kandang_qop extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_laporan_kandang');
	}

	function index(){
		$chickin = "";
		$plant = "-1";
		// Setting from-to dengan menentukan hari minggu ke sabtu
		$day = date('w');
		$from = date('Y-m-d', strtotime('-'.$day.' days'));
		$to = date('Y-m-d', strtotime('+'.(6-$day).' days'));

		if(isset($_GET['from'])) $from = $_GET['from'];
		if(isset($_GET['to'])) $to = $_GET['to'];
		if(isset($_GET['plant'])) $plant = $_GET['plant'];
		
		$data['plant'] = $plant;
		$data['from'] = $from;
		$data['to'] = $to;
	
		$data['record'] = $this->db->query("SELECT tb_jadwal.*, tb_kandang.nama_kandang AS kandang, tb_chickin.jml_jantan AS male, tb_chickin.jml_betina AS female, tb_chickin.total_harga AS tharga, tb_chickin.no_chickin AS no_chickin FROM tb_jadwal
		JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
		JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
		JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
		WHERE tb_jadwal.id_jadwal 
		AND tb_chickin.id_plant= '$plant' 
		AND tb_chickin.status_chickin = '1' GROUP BY tb_jadwal.id_jadwal ");
		$this->template->load('administrator/template','administrator/mod_laporan_kandang_qop/view_laporan_kandang_qop',$data);
	}

	// function index(){
	// 	$chickin = "";
	// 	$plant = "-1";
	// 	// Setting from-to selama 1 minggu dimulai NOW (hari ini)
	// 	$from = date("Y-m-d");
	// 	$to = date("Y-m-d", strtotime("+1 week"));

	// 	if(isset($_GET['from'])) $from = $_GET['from'];
	// 	if(isset($_GET['to'])) $to = $_GET['to'];
	// 	if(isset($_GET['plant'])) $plant = $_GET['plant'];
		
	// 	$data['plant'] = $plant;
	// 	$data['from'] = $from;
	// 	$data['to'] = $to;
	
	// 	$data['record'] = $this->db->query("SELECT tb_jadwal.*, tb_kandang.nama_kandang AS kandang, tb_chickin.jml_jantan AS male, tb_chickin.jml_betina AS female, tb_chickin.total_harga AS tharga, tb_chickin.no_chickin AS no_chickin FROM tb_jadwal
	// 	JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
	// 	JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
	// 	JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
	// 	WHERE tb_jadwal.id_jadwal 
	// 	AND tb_chickin.id_plant= '$plant' 
	// 	AND tb_chickin.status_chickin = '1' GROUP BY tb_jadwal.id_jadwal ");
	// 	$this->template->load('administrator/template','administrator/mod_laporan_kandang_qop/view_laporan_kandang_qop',$data);
	// }

}