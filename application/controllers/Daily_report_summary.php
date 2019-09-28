<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Daily_report_summary extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_daily_report_summary');
	}

	function index(){
		$from = "";
		$plant = "";

		if(isset($_GET['transdate1'])) $from = $_GET['transdate1'];
		if(isset($_GET['plant'])) $plant = $_GET['plant'];
		if(empty($from)) $from = date("Y-m-d");

		$data['from'] = $from;
		$data['plant'] = $plant;

		$data['record'] = $this->db->query("SELECT tb_jadwal.*, tb_strain.nama_strain AS strain, tb_kandang.nama_kandang AS kandang, tb_jadwal.tgl_pembuatan AS pembuatan FROM tb_jadwal
		JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
		JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
		JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
		JOIN tb_strain ON tb_chickin.id_strain = tb_strain.id_strain
		WHERE tb_jadwal.id_jadwal AND tb_jadwal.tgl_pembuatan= '$from' AND tb_chickin.id_plant= '$plant' AND tb_chickin.status_chickin = '1' GROUP BY tb_jadwal.id_jadwal ");

		$this->template->load('administrator/template','administrator/mod_daily_report_summary/view_daily_report_summary',$data);
	}
}