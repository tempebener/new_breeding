<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Laporan_kandang extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_laporan_kandang');
	}

	function index(){
		$chickin = "";
		$plant = "";

		if(isset($_GET['plant'])) $plant = $_GET['plant'];
		if(isset($_GET['chickin'])) $chickin = $_GET['chickin'];

		$data['plant'] = $plant;
		$data['chickin'] = $chickin;

		$data['record'] = $this->db->query("SELECT tb_jadwal.*, tb_kandang.nama_kandang AS kandang, tb_chickin.jml_jantan AS male, tb_chickin.jml_betina AS female, tb_chickin.total_harga AS tharga, tb_chickin.no_chickin AS no_chickin FROM tb_jadwal
		JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
		JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
		JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
		WHERE tb_jadwal.id_jadwal AND tb_chickin.id_chickin= '$chickin' AND tb_chickin.id_plant= '$plant' AND tb_chickin.status_chickin = '1' GROUP BY tb_jadwal.id_jadwal ");
		$this->template->load('administrator/template','administrator/mod_laporan_kandang/view_laporan_kandang',$data);
	}

	function detail_laporan_kandang($id){

		$row = $this->Model_laporan_kandang->get_by_id_jadwal($id);
		if ($row) {
			$jadwal = $this->Model_laporan_kandang->get_by_id_jadwal($id);
			$data['jadwal']            = $jadwal;
			$data['feed'] = $this->db->query("SELECT tb_pakan_detail.*, tb_kandang.nama_kandang AS kandang, tb_stock.nama_stock AS nama_feed, tb_stock.harga_beli AS hb, tb_stock.satuan AS satuan FROM tb_pakan_detail
			JOIN tb_jadwal ON tb_jadwal.id_jadwal = tb_pakan_detail.id_jadwal
			JOIN tb_chickin ON tb_chickin.id_chickin = tb_pakan_detail.id_chickin
			JOIN tb_kandang ON tb_kandang.id_kandang = tb_chickin.id_kandang
			JOIN tb_stock ON tb_stock.id_stock = tb_pakan_detail.id_stock
			WHERE  tb_pakan_detail.id_jadwal = '$id' ");

			$data['ovk'] = $this->db->query("SELECT tb_ovk_detail.* , tb_kandang.nama_kandang AS kandang,tb_stock.nama_stock AS nama_ovk, tb_stock.harga_beli AS hb, tb_stock.satuan AS satuan FROM tb_ovk_detail
			JOIN tb_jadwal ON tb_jadwal.id_jadwal = tb_ovk_detail.id_jadwal
			JOIN tb_chickin ON tb_chickin.id_chickin = tb_ovk_detail.id_chickin
			JOIN tb_kandang ON tb_kandang.id_kandang = tb_chickin.id_kandang
			JOIN tb_stock ON tb_stock.id_stock = tb_ovk_detail.id_stock
			WHERE  tb_ovk_detail.id_jadwal = '$id' ");

			$data['bw'] = $this->db->query("SELECT tb_bw_detail.* FROM tb_bw_detail
			JOIN tb_jadwal ON tb_jadwal.id_jadwal = tb_bw_detail.id_jadwal
			WHERE  tb_bw_detail.id_jadwal = '$id' ");

			$data['ps'] = $this->db->query("SELECT tb_populasi_detail.*, tb_chickin.*, tb_chickin.jml_jantan AS male, tb_chickin.jml_betina AS female, tb_chickin.total_harga AS tharga, tb_chickin.total_harga AS tharga, tb_populasi_detail.total_male AS tmale, tb_populasi_detail.total_female AS tfemale, tb_populasi_detail.total_akhir AS takhir FROM tb_populasi_detail
			JOIN tb_jadwal ON tb_jadwal.id_jadwal = tb_populasi_detail.id_jadwal
			JOIN tb_chickin ON tb_chickin.id_chickin = tb_jadwal.id_chickin
			WHERE tb_jadwal.id_jadwal = '$id' AND tb_chickin.status_chickin = '1' ORDER BY tb_chickin.id_chickin DESC LIMIT 1");

			$data['egg'] = $this->db->query("SELECT tb_grading_telur_detail.*, tb_chickin.*, tb_chickin.jml_jantan AS male, tb_chickin.jml_betina AS female, tb_chickin.total_harga AS tharga, tb_chickin.total_harga AS tharga, tb_populasi_detail.total_male AS tmale, tb_populasi_detail.total_female AS tfemale, tb_populasi_detail.total_akhir AS takhir FROM tb_populasi_detail
			JOIN tb_jadwal ON tb_jadwal.id_jadwal = tb_populasi_detail.id_jadwal
			JOIN tb_chickin ON tb_chickin.id_chickin = tb_jadwal.id_chickin
			WHERE tb_jadwal.id_jadwal = '$id' AND tb_chickin.status_chickin = '1' ORDER BY tb_chickin.id_chickin DESC LIMIT 1");

			$this->template->load('administrator/template','administrator/mod_laporan_kandang/view_laporan_kandang_detail',$data);
		}
	}
}