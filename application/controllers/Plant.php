<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Plant extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_plant');
	}

	function index(){
		cek_session_admin();
		$data = $this->Model_plant->view_join('tb_plant','tb_perusahaan','id_perusahaan','id_plant');
        $data = array('record' => $data);
		$this->template->load('administrator/template','administrator/mod_plant/view_plant',$data);
	}

	function add_plant(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('nama_plant' => $this->input->post('a'),
						  'alamat' => $this->input->post('b'),
						  'telp' => $this->input->post('c'),
						  'fax' => $this->input->post('d'),
						  'email' => $this->input->post('e'),
						  'website' => $this->input->post('f'),
						  'id_perusahaan' => $this->input->post('g'),
						  'create_date' => date('Y-m-d H:i:s')
						);
			$this->Model_plant->insert('tb_plant',$data);
			// redirect('plant');
			echo "<script>window.location.href='javascript:history.go(-2);'</script>";
		}else{
			$data['perusahaan'] = $this->Model_plant->view_all_asc('tb_perusahaan','id_perusahaan');
			$this->template->load('administrator/template','administrator/mod_plant/view_plant_add', $data);
		}
	}

	function edit_plant(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_plant' => $this->input->post('a'),
						  'alamat' => $this->input->post('b'),
						  'telp' => $this->input->post('c'),
						  'fax' => $this->input->post('d'),
						  'email' => $this->input->post('e'),
						  'website' => $this->input->post('f'),
						  'id_perusahaan' => $this->input->post('g'),
						  'update_date' => date('Y-m-d H:i:s')
						);
			$where = array('id_plant' => $this->input->post('id'));
			$this->Model_plant->update('tb_plant', $data, $where);
			// $this->rat->log('success');
			if ($this->session->id_users == $this->input->post('id')){
				redirect('plant/edit_plant/'.$this->session->id_users);
			}else{
				$this->session->set_flashdata('msg', 
                '<div class="alert alert-success" role="alert">
                    <h4>Berhasil </h4>
                    <p>Update berhasil.</p>
                </div>');  
				// redirect($_SERVER['HTTP_REFERER']);
				echo "<script>window.location.href='javascript:history.go(-2);'</script>";
			}
		}else{
			$data['row'] = $this->Model_plant->edit('tb_plant', array('id_plant' => $id))->row_array();
			$data['perusahaan'] = $this->Model_plant->view_all_asc('tb_perusahaan','id_perusahaan');
			$this->template->load('administrator/template','administrator/mod_plant/view_plant_edit', $data);
		}
	}

	function delete_plant(){
        cek_session_admin();
        $id = array('id_plant' => $this->uri->segment(3));
        $this->Model_plant->delete('tb_plant',$id);
		redirect($_SERVER['HTTP_REFERER']);
    }
}