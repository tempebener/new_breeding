<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Stock_kandang extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_stock_kandang');
	}

	function index(){
		$chickin = "";
		$plant = "";

		if(isset($_GET['plant'])) $plant = $_GET['plant'];
		if(isset($_GET['chickin'])) $chickin = $_GET['chickin'];

		$data['plant'] = $plant;
		$data['chickin'] = $chickin;

		$data['record'] = $this->db->query("SELECT tb_chickin.*, tb_kandang.nama_kandang AS kandang, tb_plant.nama_plant AS nm_plant FROM tb_chickin
		JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
		JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
		WHERE tb_chickin.id_plant = '$plant' AND tb_chickin.status_chickin = '1'  GROUP BY tb_chickin.id_chickin ");

		$this->template->load('administrator/template','administrator/mod_stock_kandang/view_stock_kandang',$data);
	}

	function detail($id){

		$row = $this->Model_stock_kandang->get_by_id_chickin($id);
		/* melakukan pengecekan data, apabila ada maka akan ditampilkan */
		if ($row){
		/* memanggil function dari masing2 model yang akan digunakan */
		$chickin = $this->Model_stock_kandang->get_by_id_chickin($id);
		$data['chickin'] = $chickin;

		$data['record'] = $this->db->query("SELECT tb_stock.* , tb_kandang.nama_kandang AS kandang, tb_material_stock.nama_material_stock AS nama_kat FROM tb_stock
		JOIN tb_kat_stock on tb_stock.id_kat_stock = tb_kat_stock.id_kat_stock
		JOIN tb_material_stock on tb_kat_stock.id_material_stock = tb_material_stock.id_material_stock
		JOIN tb_chickin on tb_stock.id_chickin = tb_chickin.id_chickin
		JOIN tb_kandang on tb_chickin.id_kandang = tb_kandang.id_kandang
		WHERE tb_stock.id_chickin = '$id' AND tb_stock.status_stock = '1' ");

		$this->template->load('administrator/template','administrator/mod_stock_kandang/view_stock_kandang_detail',$data);
		}
	}
}