<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Material extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_material');
	}

	function index(){
		cek_session_admin();
		$data = $this->Model_material->view_join('tb_kat_stock','tb_material_stock','id_material_stock','id_kat_stock');
        $data = array('record' => $data);
		$this->template->load('administrator/template','administrator/mod_material/view_material',$data);
	}

	function add_material(){
		cek_session_admin();
		if (isset($_POST['submit'])){

			$data = array('nama_kat_stock' => $this->input->post('a'),
						  'id_material_stock' => $this->input->post('b'),
						  'satuan_stock' => $this->input->post('c'),
						  // 'harga_beli' => $this->input->post('d'),
						  'id_supplier' => $this->input->post('e'),
						  'publish' => 'Y',
						  'create_date' => date('Y-m-d H:i:s')
						);
			$this->Model_material->insert('tb_kat_stock',$data);
			redirect('material');
			// echo "<script>window.location.href='javascript:history.go(-2);'</script>";
		}else{
			$data['material_stock'] = $this->Model_material->view_all_asc('tb_material_stock','id_material_stock');
			$data['supplier'] = $this->Model_material->view_all_asc('tb_supplier','id_supplier');
			$this->template->load('administrator/template','administrator/mod_material/view_material_add', $data);
		}
	}

	function edit_material(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$data = array('nama_kat_stock' => $this->input->post('a'),
						  'id_material_stock' => $this->input->post('b'),
						  'satuan_stock' => $this->input->post('c'),
						  // 'harga_beli' => $this->input->post('d'),
						  'id_supplier' => $this->input->post('e'),
						  'update_date' => date('Y-m-d H:i:s')
						);
			$where = array('id_kat_stock' => $this->input->post('id'));
			$this->Model_material->update('tb_kat_stock', $data, $where);
			// $this->rat->log('success');
			if ($this->session->id_users == $this->input->post('id')){
				redirect('material/edit_material/'.$this->session->id_users);
			}else{
				$this->session->set_flashdata('msg', 
                '<div class="alert alert-success" role="alert">
                    <h4>Berhasil </h4>
                    <p>Update berhasil.</p>
                </div>');  	
				redirect('material');
				// echo "<script>window.location.href='javascript:history.go(-2);'</script>";
			}
		}else{
			$data['row'] = $this->Model_material->edit('tb_kat_stock', array('id_kat_stock' => $id))->row_array();
			$data['material_stock'] = $this->Model_material->view_all_asc('tb_material_stock','id_material_stock');
			$data['supplier'] = $this->Model_material->view_all_asc('tb_supplier','id_supplier');
			$this->template->load('administrator/template','administrator/mod_material/view_material_edit', $data);
		}
	}

	function delete_material(){
        cek_session_admin();
        $id = array('id_kat_stock' => $this->uri->segment(3));
        $this->Model_material->delete('tb_kat_stock',$id);
		redirect($_SERVER['HTTP_REFERER']);
    }
}