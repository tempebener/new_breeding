<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Stock_material extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_stock_material');
	}

	function index(){
	$material = "";

	if(isset($_GET['material'])) $material = $_GET['material'];

	$data['material'] = $material;

	$data['record'] = $this->db->query("SELECT tb_kat_stock.* FROM tb_kat_stock
	JOIN tb_material_stock ON tb_kat_stock.id_material_stock = tb_material_stock.id_material_stock
	WHERE tb_kat_stock.id_material_stock= '$material' ");
		$this->template->load('administrator/template','administrator/mod_stock_material/view_stock',$data);
	}

	function detail($id){
		$row = $this->Model_stock_material->get_by_id_katstock($id);

		/* melakukan pengecekan data, apabila ada maka akan ditampilkan */
		if ($row){
			/* memanggil function dari masing2 model yang akan digunakan */
			$stock = $this->Model_stock_material->get_by_id_katstock($id);
			$data['stock'] = $stock;
			$data['record'] = $this->db->query("SELECT tb_stock.*, tb_kandang.nama_kandang AS kandang FROM tb_stock
			JOIN tb_kat_stock ON tb_stock.id_kat_stock = tb_kat_stock.id_kat_stock
			JOIN tb_chickin ON tb_stock.id_chickin = tb_chickin.id_chickin
			JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
			JOIN tb_material_stock ON tb_stock.id_material_stock = tb_material_stock.id_material_stock
			WHERE  tb_stock.id_kat_stock = '$id' AND tb_stock.status_stock = '1' ");

			$this->template->load('administrator/template','administrator/mod_stock_material/view_stock_detail',$data);
		}
	}
}