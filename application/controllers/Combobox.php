<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Combobox extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_combobox');
	}

	// function company(){
	// 	cek_session_admin();
	// 	$country_id = $this->input->post('count_id');
	// 	$data['company'] = $this->Model_combobox->view_where_desc('tb_company',array('id_company' => $country_id),'id_plant');
	// 	$this->load->view('administrator/mod_combobox/view_company',$data);
	// }

	function plant(){
		cek_session_admin();
		$company_id = $this->input->post('company_id');
		$data['plant'] = $this->Model_combobox->view_where_asc('tb_plant',array('id_perusahaan' => $company_id),'id_plant');
		$this->load->view('administrator/mod_combobox/view_plant',$data);
	}

	function kandang(){
		cek_session_admin();
		$plant_id = $this->input->post('plant_id');
		$data['kandang'] = $this->Model_combobox->view_where_asc('tb_kandang',array('id_plant' => $plant_id),'id_kandang');
		$this->load->view('administrator/mod_combobox/view_kandang',$data);
	}

}