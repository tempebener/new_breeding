<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Kandang extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('cek');
		$this->load->helper('format_all');
		$this->load->model('Model_kandang');
	}

	function index(){
		// $perusahaan = "";
		$plant = "";
		$status = "";

		// if(isset($_GET['perusahaan'])) $perusahaan = $_GET['perusahaan'];
		if(isset($_GET['plant'])) $plant = $_GET['plant'];
		if(isset($_GET['status'])) $status = $_GET['status'];

		// $data['perusahaan'] = $perusahaan;
		$data['plant'] = $plant;
		$data['status'] = $status;

		$data['record'] = $this->db->query("SELECT tb_kandang.*, tb_flock.nama_flock as flock, tb_plant.id_plant, tb_status.nama_status AS status FROM tb_kandang
		JOIN tb_plant ON tb_kandang.id_plant = tb_plant.id_plant
		JOIN tb_perusahaan ON tb_kandang.id_perusahaan = tb_perusahaan.id_perusahaan
		JOIN tb_flock ON tb_kandang.id_flock = tb_flock.id_flock
		JOIN tb_status ON tb_kandang.status_kandang = tb_status.id_status
		WHERE tb_kandang.status_kandang = '$status' AND tb_kandang.id_plant = '$plant' ");

		$this->template->load('administrator/template','administrator/mod_kandang/view_kandang',$data);
	}

	function add(){
		cek_session_admin();
		if (isset($_POST['submit'])){

	   //      if (trim($this->input->post('a'))==''){
	   //      	$kode = $this->db->query("SELECT id_kandang FROM tb_kandang ORDER BY id_kandang DESC LIMIT 1")->row();
		  //       date_default_timezone_set("Asia/Jakarta");
		  //       $date= date("Ym");
		  //       $tahun=substr($date, 2, 4);
		  //       $bulan=substr($date, 6, 2);
		  //       $plant2 = $this->input->post('g');
				// $no_kandang = "HH/".$plant2."/".$tahun.$bulan.sprintf("%04s", $kode->id_kandang+1);
	   //      }else{
	   //      	$no_kandang = $this->input->post('a');
	   //      }

			$data = array('id_perusahaan' => $this->input->post('a'),
						  'id_plant' => $this->input->post('b'),
						  'id_flock' => $this->input->post('c'),
						  'nama_kandang' => $this->input->post('d'),
						  'id_kat_kandang' => $this->input->post('e'),
						  'status_kandang' => $this->input->post('f'),
						  'kode_kandang' => $this->input->post('g'),
						  'tgl_pembuatan_kandang' => tgl_standard($this->input->post('h')),
						  'create_date' => date('Y-m-d H:i:s')
						  // 'no_kandang' => $no_kandang
						);
			$this->Model_kandang->insert('tb_kandang',$data);
			// redirect('kandang');
			echo "<script>window.location.href='javascript:history.go(-2);'</script>";
		}else{
			$data['perusahaan'] = $this->Model_kandang->view_all_asc('tb_perusahaan','id_perusahaan');
			$data['plant'] = $this->Model_kandang->view_all_asc('tb_plant','id_plant');
			$data['flock'] = $this->Model_kandang->view_all_asc('tb_flock','id_flock');
			$data['kat_kandang'] = $this->Model_kandang->view_all_asc('tb_kat_kandang','id_kat_kandang');
			$this->template->load('administrator/template','administrator/mod_kandang/view_kandang_add', $data);
		}
	}

	function edit(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$data = array('id_perusahaan' => $this->input->post('a'),
						  'id_plant' => $this->input->post('b'),
						  'id_flock' => $this->input->post('c'),
						  'nama_kandang' => $this->input->post('d'),
						  'id_kat_kandang' => $this->input->post('e'),
						  'kode_kandang' => $this->input->post('g'),
						  'tgl_pembuatan_kandang' => $this->input->post('h'),
						  'update_date' => date('Y-m-d H:i:s')
						  // 'status_kandang' => $this->input->post('f'),
						  // 'no_kandang' => $no_kandang
						);
			$where = array('id_kandang' => $this->input->post('id'));
			$this->Model_kandang->update('tb_kandang', $data, $where);
			// $this->rat->log('success');
			if ($this->session->id_users == $this->input->post('id')){
				redirect('kandang/edit/'.$this->session->id_users);
			}else{
				$this->session->set_flashdata('msg', 
                '<div class="alert alert-success" role="alert">
                    <h4>Berhasil </h4>
                    <p>Update berhasil.</p>
                </div>');  
				echo "<script>window.location.href='javascript:history.go(-2);'</script>";
			}
		}else{
			$data['row'] = $this->Model_kandang->edit('tb_kandang', array('id_kandang' => $id))->row_array();
			$data['perusahaan'] = $this->Model_kandang->view_all_asc('tb_perusahaan','id_perusahaan');
			$data['plant'] = $this->Model_kandang->view_all_asc('tb_plant','id_plant');
			$data['flock'] = $this->Model_kandang->view_all_asc('tb_flock','id_flock');
			$data['kat_kandang'] = $this->Model_kandang->view_all_asc('tb_kat_kandang','id_kat_kandang');
			$this->template->load('administrator/template','administrator/mod_kandang/view_kandang_edit', $data);
		}
	}

	function delete(){
        cek_session_admin();
        $id = array('id_kandang' => $this->uri->segment(3));
        $this->Model_kandang->delete('tb_kandang',$id);
		redirect($_SERVER['HTTP_REFERER']);
    }
}