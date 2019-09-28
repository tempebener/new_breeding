<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Recording extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('format_all');
		$this->load->model('Model_recording');
	}

 	function index(){
		cek_session_admin();
		$from = "";
		$plant = "";

		if(isset($_GET['transdate1'])) $from = $_GET['transdate1'];
		if(isset($_GET['plant'])) $plant = $_GET['plant'];
		if(empty($from)) $from = date("Y-m-d");

		$data['from'] = $from;
		$data['plant'] = $plant;

		$data['record'] = $this->db->query("SELECT tb_jadwal.*, tb_plant.id_plant, tb_kandang.nama_kandang AS kandang FROM tb_jadwal
		JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
		JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
		JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
		WHERE tb_jadwal.tgl_pembuatan= '$from' AND tb_chickin.id_plant = '$plant' ");

		$data['record3'] = $this->db->query("SELECT tb_jadwal.*, tb_plant.id_plant, tb_kandang.nama_kandang AS kandang FROM tb_jadwal
		JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
		JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
		JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
		WHERE tb_jadwal.tgl_pembuatan= '$from' AND tb_chickin.id_plant = '$plant'");
		$this->template->load('administrator/template','administrator/mod_recording/view_recording',$data);

		// $data['record3'] = $this->db->query("SELECT tb_jadwal.*, tb_bw_detail.*, tb_plant.id_plant, tb_kandang.nama_kandang AS kandang FROM tb_jadwal
		// JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
		// JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
		// JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
		// LEFT JOIN tb_bw_detail ON tb_bw_detail.id_jadwal = tb_jadwal.id_jadwal
		// WHERE tb_jadwal.tgl_pembuatan= '$from' AND tb_chickin.id_plant = '$plant'");
		// $this->template->load('administrator/template','administrator/mod_recording/view_recording',$data);
	}

	function save_pakan_recording() {
		$product = $this->input->post('aa');
		$jantan = $this->input->post('bb');
		$qty = $this->input->post('cc');
		$betina = $this->input->post('ee');
		$no = $this->input->post('no');
		$chk = $this->input->post('chk');

		$i = 0;

		$this->db->query("delete from tb_pakan_detail where id_jadwal = '$no'");
		for($i = 0;$i < count($product);$i++)
		{
			if(!empty($product[$i])){
			$data = [
				"id_jadwal"=>$no,
				"id_chickin"=>$chk,
				"jml_jantan"=>$jantan[$i],
				"jml_betina"=>$betina[$i],
				"id_stock"=>$product[$i],
				"jml_pakan"=>$qty[$i],
				"create_date" => date('Y-m-d H:i:s')
			];

			$this->db->insert("tb_pakan_detail", $data);
			}
		}
		// redirect('recording');
		echo "<script>window.location.href='javascript:history.go(-2);'</script>";
	}

	function add_pakan(){
		cek_session_admin();
		$id = array('id_jadwal' => $this->uri->segment(3)
					);
		$data['id'] = $id;
		$this->template->load('administrator/template','administrator/mod_recording/view_feed_add', $data);
	}

    function delete_pakan(){
        cek_session_admin();
        $id = array('id_jadwal' => $this->uri->segment(3));
        $this->Model_recording->delete('tb_pakan_detail',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

	function add_ps(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_jadwal' => $this->input->post('id_jadwal'),
						  'id_chickin' => $this->input->post('id_chickin'),
						  'id_kandang' => $this->input->post('id_kandang'),
						  'id_plant' => $this->input->post('id_plant'),
						  'id_stock' => $this->input->post('id_stock'),
						  'male_mati' => $this->input->post('male_mati'),
						  'male_cull' => $this->input->post('male_cull'),
						  'male_seleksi' => $this->input->post('male_seleksi'),
						  'male_afkir' => $this->input->post('male_afkir'),
						  'total_male' => $this->input->post('total_male'),
						  'female_mati' => $this->input->post('female_mati'),
						  'female_cull' => $this->input->post('female_cull'),
						  'female_seleksi' => $this->input->post('female_seleksi'),
						  'female_afkir' => $this->input->post('female_afkir'),
						  'total_female' => $this->input->post('total_female'),
						  'total_akhir' => $this->input->post('total_akhir'),
						  'create_date' => date('Y-m-d H:i:s'));
			$this->Model_recording->insert('tb_populasi_detail', $data);
			// redirect('recording');
			echo "<script>window.location.href='javascript:history.go(-2);'</script>";
		}else{
			$this->template->load('administrator/template','administrator/mod_recording/view_ps_add');
		}
	}

	function edit_ps(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('male_mati' => $this->input->post('male_mati'),
						  'male_cull' => $this->input->post('male_cull'),
						  'male_seleksi' => $this->input->post('male_seleksi'),
						  'male_afkir' => $this->input->post('male_afkir'),
						  'total_male' => $this->input->post('total_male'),
						  'female_mati' => $this->input->post('female_mati'),
						  'female_cull' => $this->input->post('female_cull'),
						  'female_seleksi' => $this->input->post('female_seleksi'),
						  'female_afkir' => $this->input->post('female_afkir'),
						  'total_female' => $this->input->post('total_female'),
						  'total_akhir' => $this->input->post('total_akhir'),
						  'update_date' => date('Y-m-d H:i:s'));
	    	$where = array('id_populasi_detail' => $this->input->post('id'));
			$this->Model_recording->update('tb_populasi_detail', $data, $where);
			// $this->rat->log('success');
			if ($this->session->id_users == $this->input->post('id')){
				redirect('recording/edit_ps/'.$this->session->id_users);
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
			$data['row'] = $this->Model_recording->edit('tb_populasi_detail', array('id_populasi_detail' => $id))->row_array();
			$this->template->load('administrator/template','administrator/mod_recording/view_ps_edit',$data);
		}
    }

    function delete_ps(){
        cek_session_admin();
        $id = array('id_jadwal' => $this->uri->segment(3));
        $this->Model_recording->delete('tb_populasi_detail',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

	function add_ovk(){
		$id = array('id_jadwal' => $this->uri->segment(3));
		$data['id'] = $id;

		$this->template->load('administrator/template','administrator/mod_recording/view_ovk_add', $data);
	}

	function save_ovk_recording(){
		$product = $this->input->post('aa');
		$qty = $this->input->post('cc');
		$no = $this->input->post('no');
		$chk = $this->input->post('chk');
		$stn = $this->input->post('ee');

		$i = 0;

		$this->db->query("delete from tb_ovk_detail where id_jadwal = '$no'");
		for($i = 0;$i < count($product);$i++)
		{
			if(!empty($product[$i])){
			$data = [
				"id_jadwal"=>$no,
				"id_chickin"=>$chk,
				"satuan_unit"=>$stn[$i],
				"id_stock"=>$product[$i],
				"jml_ovk"=>$qty[$i],
			];

			$this->db->insert("tb_ovk_detail", $data);
			}
		}
		// redirect('recording');
		echo "<script>window.location.href='javascript:history.go(-2);'</script>";
	}

    function delete_ovk(){
        cek_session_admin();
        $id = array('id_jadwal' => $this->uri->segment(3));
        $this->Model_recording->delete('tb_ovk_detail',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

	function add_bw(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_jadwal' => $this->input->post('id_jadwal'),
						  'id_chickin' => $this->input->post('id_chickin'),
						  'id_kandang' => $this->input->post('id_kandang'),
						  'id_plant' => $this->input->post('id_plant'),
						  'id_stock' => $this->input->post('id_stock'),
						  'jml_jantan' => $this->input->post('jml_jantan'),
						  'jml_betina' => $this->input->post('jml_betina'),
						  'uniform_jantan' => $this->input->post('uniform_jantan'),
						  'uniform_betina' => $this->input->post('uniform_betina'),
						  // 'rata2_bw' => $this->input->post('rata2_bw'),
						  'create_date' => date('Y-m-d H:i:s'));
			$this->Model_recording->insert('tb_bw_detail', $data);
			// redirect('recording');
			echo "<script>window.location.href='javascript:history.go(-2);'</script>";
		}else{
			$this->template->load('administrator/template','administrator/mod_recording/view_bw_add');
		}
	}

	function edit_bw(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('jml_jantan' => $this->input->post('jml_jantan'),
						  'jml_betina' => $this->input->post('jml_betina'),
						  'uniform_jantan' => $this->input->post('uniform_jantan'),
						  'uniform_betina' => $this->input->post('uniform_betina'),
						  // 'rata2_bw' => $this->input->post('rata2_bw'),
						  'update_date' => date('Y-m-d H:i:s'));
	    	$where = array('id_bw_detail' => $this->input->post('id'));
			$this->Model_recording->update('tb_bw_detail', $data, $where);
			// $this->rat->log('success');
			if ($this->session->id_users == $this->input->post('id')){
				redirect('recording/edit_bw/'.$this->session->id_users);
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
			$data['row'] = $this->Model_recording->edit('tb_bw_detail', array('id_bw_detail' => $id))->row_array();
			$this->template->load('administrator/template','administrator/mod_recording/view_bw_edit',$data);
		}
    }

    function delete_bw(){
        cek_session_admin();
        $id = array('id_jadwal' => $this->uri->segment(3));
        $this->Model_recording->delete('tb_bw_detail',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

	function add_egg(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('id_jadwal' => $this->input->post('id_jadwal'),
						  'id_chickin' => $this->input->post('id_chickin'),
						  'id_kandang' => $this->input->post('id_kandang'),
						  'id_plant' => $this->input->post('id_plant'),
						  'id_stock' => $this->input->post('id_stock'),
						  'he_a' => $this->input->post('he_a'),
						  'he_b' => $this->input->post('he_b'),
						  'he_c' => $this->input->post('he_c'),
						  'he_d' => $this->input->post('he_d'),
						  'total_he' => $this->input->post('total_he'),
						  'komersial_kecil' => $this->input->post('komersial_kecil'),
						  'komersial_jumbo' => $this->input->post('komersial_jumbo'),
						  'komersial_abnormal' => $this->input->post('komersial_abnormal'),
						  'komersial_retak' => $this->input->post('komersial_retak'),
						  'total_komersial' => $this->input->post('total_komersial'),
						  'total_produksi' => $this->input->post('total_produksi'),
						  'create_date' => date('Y-m-d H:i:s'));
			$this->Model_recording->insert('tb_grading_telur_detail', $data);
			// redirect('recording');
			echo "<script>window.location.href='javascript:history.go(-2);'</script>";
		}else{
			$this->template->load('administrator/template','administrator/mod_recording/view_egg_add');
		}
	}

	function edit_egg(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('he_a' => $this->input->post('he_a'),
						  'he_b' => $this->input->post('he_b'),
						  'he_c' => $this->input->post('he_c'),
						  'he_d' => $this->input->post('he_d'),
						  'total_he' => $this->input->post('total_he'),
						  'komersial_kecil' => $this->input->post('komersial_kecil'),
						  'komersial_jumbo' => $this->input->post('komersial_jumbo'),
						  'komersial_abnormal' => $this->input->post('komersial_abnormal'),
						  'komersial_retak' => $this->input->post('komersial_retak'),
						  'total_komersial' => $this->input->post('total_komersial'),
						  'total_produksi' => $this->input->post('total_produksi'),
						  'update_date' => date('Y-m-d H:i:s'));
	    	$where = array('id_populasi_detail' => $this->input->post('id'));
			$this->Model_recording->update('tb_grading_telur_detail', $data, $where);
			// $this->rat->log('success');
			if ($this->session->id_users == $this->input->post('id')){
				redirect('recording/edit_egg/'.$this->session->id_users);
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
			$data['row'] = $this->Model_recording->edit('tb_grading_telur_detail', array('id_grading_telur_detail' => $id))->row_array();
			$this->template->load('administrator/template','administrator/mod_recording/view_egg_edit',$data);
		}
    }

    function delete_egg(){
        cek_session_admin();
        $id = array('id_jadwal' => $this->uri->segment(3));
        $this->Model_recording->delete('tb_grading_telur_detail',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

}
