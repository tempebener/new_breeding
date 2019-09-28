<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Chickin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('cek');
		$this->load->helper('format_all');
		$this->load->model('Model_chickin');
	}

	function index(){
		$status = "";
		$plant = "";

		if(isset($_GET['plant'])) $plant = $_GET['plant'];
		if(isset($_GET['status'])) $status = $_GET['status'];

		$data['status'] = $status;
		$data['plant'] = $plant;

		$data['record'] = $this->db->query("SELECT tb_chickin.*, tb_plant.id_plant, tb_strain.nama_strain as strain, tb_kandang.nama_kandang AS kandang, tb_status.nama_status AS status FROM tb_chickin
		JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
		JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
		JOIN tb_status ON tb_chickin.status_chickin = tb_status.id_status
		JOIN tb_strain ON tb_chickin.id_strain = tb_strain.id_strain
		WHERE tb_chickin.status_chickin = '$status' AND tb_chickin.id_plant = '$plant' ");

		$this->template->load('administrator/template','administrator/mod_chickin/view_chickin',$data);
	}

	function add(){
		cek_session_admin();
		if (isset($_POST['submit'])){

	        if ($this->input->post('no_chickin')!=''){
		        $unit_bisnis2 = $this->input->post('id_unit_bisnis');
		        $plant2 = $this->input->post('id_plant');
		        $kandang2 = $this->input->post('id_kandang');
		        $strain2 = $this->input->post('id_strain');

	        	$kode = $this->db->query("SELECT id_chickin FROM tb_chickin ORDER BY id_chickin DESC LIMIT 1")->row();
	        	$q_unit_bisnis = $this->db->query("SELECT kode_unit_bisnis FROM tb_unit_bisnis WHERE id_unit_bisnis='$unit_bisnis2' ORDER BY id_unit_bisnis DESC LIMIT 1")->row();
	        	$q_plant = $this->db->query("SELECT kode_plant FROM tb_plant WHERE id_plant='$plant2' ORDER BY id_plant DESC LIMIT 1")->row();
	        	$q_kandang = $this->db->query("SELECT kode_kandang FROM tb_kandang WHERE id_kandang='$kandang2' ORDER BY id_kandang DESC LIMIT 1")->row();
	        	$q_strain = $this->db->query("SELECT kode_strain FROM tb_strain WHERE id_strain='$strain2' ORDER BY id_strain DESC LIMIT 1")->row();
	        	$q_periode = $this->db->query("SELECT periode FROM tb_chickin WHERE id_unit_bisnis='$unit_bisnis2' ORDER BY id_unit_bisnis DESC LIMIT 1")->row();
		        date_default_timezone_set("Asia/Jakarta");
		        $date= date("Ym");
		        $tahun=substr($date, 2, 4);
		        $bulan=substr($date, 6, 2);

		        $kode_unit_bisnis2 = $q_unit_bisnis->kode_unit_bisnis;
		        $kode_plant2 = $q_plant->kode_plant;
		        $kode_kandang2 = $q_kandang->kode_kandang;
		        $kode_strain2 = $q_strain->kode_strain;
		        $kode_periode2 = $q_periode->periode;

				$no_chickin = $kode_unit_bisnis2.$kode_plant2."/".$kode_kandang2."/".$kode_strain2."/".$tahun.$bulan.sprintf("%04s", $kode_periode2+1);

				$data = array('jml_betina' => $this->input->post('jml_betina'),
							  'jml_jantan' => $this->input->post('jml_jantan'),
							  'umur_chickin' => $this->input->post('umur_chickin'),
							  'id_perusahaan' => $this->input->post('id_perusahaan'),
							  'tgl_chickin' => $this->input->post('tgl_chickin'),
							  'id_plant' => $this->input->post('id_plant'),
							  'id_kandang' => $this->input->post('id_kandang'),
							  'id_strain' => $this->input->post('id_strain'),
							  'status_chickin' => '1',
							  'periode' => $kode_periode2+1,
							  'id_unit_bisnis' => $this->input->post('id_unit_bisnis'),
							  'id_supplier' => $this->input->post('id_supplier'),
							  'create_date' => date('Y-m-d H:i:s'),
							  'no_chickin' => $no_chickin
							);
	        }else{
	        	$no_chickin = $this->input->post('no_chickin');
	        }
			$this->Model_chickin->insert('tb_chickin',$data);
			$id = $this->db->insert_id();

			for($i = 1,$j = 0;$i <= $data['umur_chickin'];$i++,$j++) {
			$dataa = array('id_chickin'	=> $id,
						 	'no_chickin'	=> $data['no_chickin'],
							'hari_ke'		=> $i,
						 	'tgl_pembuatan'	=>date("Y-m-d", strtotime("+$j day",strtotime($data['tgl_chickin']))),
				 			);
			$this->Model_chickin->insert('tb_jadwal',$dataa);
 			}

			$mod=count($this->input->post('modul'));
			$modul=$this->input->post('modul');
			$modul2=$this->input->post('modul2');
			$modul3=$this->input->post('modul3');
			$modul4=$this->input->post('modul4');
			$modul5=$this->input->post('modul5');

			for($y=0;$y< $mod;$y++){
			$datam = array('id_chickin'	=> $id,
						   'status_stock' => '1',
						   'nama_stock'=>$modul2[$y],
						   'id_material_stock'=>$modul3[$y],
						   'satuan'=>$modul4[$y],
						   'harga_beli'=>$modul5[$y],
						   'id_kat_stock'=>$modul[$y]);
			$this->Model_chickin->insert('tb_stock',$datam);
			}
			redirect('chickin');
			// echo "<script>window.location.href='javascript:history.go(-2);'</script>";
		}else{
			$data['perusahaan'] = $this->Model_chickin->view_all_asc('tb_perusahaan','id_perusahaan');
			$data['unit_bisnis'] = $this->Model_chickin->view_all_asc('tb_unit_bisnis','id_unit_bisnis');
			// $data['plant'] = $this->Model_chickin->view_all_asc('tb_plant','id_plant');
			// $data['kandang'] = $this->Model_chickin->view_all_asc('tb_kandang','id_kandang');
			$data['strain'] = $this->Model_chickin->view_all_asc('tb_strain','id_strain');
			$data['supplier'] = $this->Model_chickin->view_all_asc('tb_supplier','id_supplier');
			$data['kat_stock'] = $this->Model_chickin->view_where_ordering('tb_kat_stock', array('publish' => 'Y'), 'id_kat_stock','DESC');
			$this->template->load('administrator/template','administrator/mod_chickin/view_chickin_add', $data);
		}
	}

	function edit(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

	   //      if (trim($this->input->post('a'))=='' ){
		  //       $periode = $this->input->post('l');
		  //       $unit_bisnis2 = $this->input->post('m');
		  //       $plant2 = $this->input->post('g');
		  //       $kandang2 = $this->input->post('h');
		  //       $strain2 = $this->input->post('j');
		  //       $ub_periode = $this->input->post('m');

	   //      	$kode = $this->db->query("SELECT id_chickin FROM tb_chickin ORDER BY id_chickin DESC LIMIT 1")->row();
	   //      	$q_unit_bisnis = $this->db->query("SELECT kode_unit_bisnis FROM tb_unit_bisnis WHERE id_unit_bisnis='$unit_bisnis2' ORDER BY id_unit_bisnis DESC LIMIT 1")->row();
	   //      	$q_plant = $this->db->query("SELECT kode_plant FROM tb_plant WHERE id_plant='$plant2' ORDER BY id_plant DESC LIMIT 1")->row();
	   //      	$q_kandang = $this->db->query("SELECT kode_kandang FROM tb_kandang WHERE id_kandang='$kandang2' ORDER BY id_kandang DESC LIMIT 1")->row();
	   //      	$q_strain = $this->db->query("SELECT kode_strain FROM tb_strain WHERE id_strain='$strain2' ORDER BY id_strain DESC LIMIT 1")->row();
	   //      	$q_periode = $this->db->query("SELECT * FROM tb_chickin WHERE id_unit_bisnis='$ub_periode' ORDER BY periode DESC LIMIT 1")->row();
		  //       date_default_timezone_set("Asia/Jakarta");
		  //       $date= date("Ym");
		  //       $tahun=substr($date, 2, 4);
		  //       $bulan=substr($date, 6, 2);

		  //       $kode_unit_bisnis2 = $q_unit_bisnis->kode_unit_bisnis;
		  //       $kode_plant2 = $q_plant->kode_plant;
		  //       $kode_kandang2 = $q_kandang->kode_kandang;
		  //       $kode_strain2 = $q_strain->kode_strain;
		  //       $kode_periode2 = $q_periode->periode;

				// $no_chickin = $kode_unit_bisnis2.$kode_plant2."/".$kode_kandang2."/".$kode_strain2."/".$tahun.$bulan.sprintf("%04s", $q_periode->periode+1);
		  //       $kode_periode3 = $q_periode->periode+1;

			// 	$data = array('jml_betina' => $this->input->post('b'),
			// 				  'jml_jantan' => $this->input->post('c'),
			// 				  'umur_chickin' => $this->input->post('d'),
			// 				  'id_perusahaan' => $this->input->post('e'),
			// 				  'id_plant' => $this->input->post('g'),
			// 				  'id_kandang' => $this->input->post('h'),
			// 				  'umur_chickin' => $this->input->post('i'),
			// 				  'id_strain' => $this->input->post('j'),
			// 				  'status_chickin' => $this->input->post('k'),
			// 				  'periode' => $kode_periode3,
			// 				  'id_unit_bisnis' => $this->input->post('m'),
			// 				  'id_supplier' => $this->input->post('n'),
			// 				  'update_date' => date('Y-m-d H:i:s'),
			// 				  'no_chickin' => $no_chickin
			// 				);

			// }else{

			// }

			$data = array('jml_betina' => $this->input->post('b'),
						  'jml_jantan' => $this->input->post('c'),
						  'umur_chickin' => $this->input->post('d'),
						  'update_date' => date('Y-m-d H:i:s')
						);

			$where = array('id_chickin' => $this->input->post('id'));
			$this->Model_chickin->update('tb_chickin', $data, $where);
			// $this->rat->log('success');
			if ($this->session->id_users == $this->input->post('id')){
				redirect('chickin/edit_chickin/'.$this->session->id_users);
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
			$data['row'] = $this->Model_chickin->edit('tb_chickin', array('id_chickin' => $id))->row_array();
			// $data['unit_bisnis'] = $this->Model_chickin->view_all_asc('tb_unit_bisnis','id_unit_bisnis');
            // $data['unit_bisnis'] = $this->Model_chickin->find($id_unit_bisnis);
			$data['perusahaan'] = $this->Model_chickin->view_all_asc('tb_perusahaan','id_perusahaan');
			$data['plant'] = $this->Model_chickin->view_all_asc('tb_plant','id_plant');
			$data['kandang'] = $this->Model_chickin->view_all_asc('tb_kandang','id_kandang');
			$data['strain'] = $this->Model_chickin->view_all_asc('tb_strain','id_strain');
			$data['supplier'] = $this->Model_chickin->view_all_asc('tb_supplier','id_supplier');
			$this->template->load('administrator/template','administrator/mod_chickin/view_chickin_edit', $data);
		}
	}

	function delete(){
        cek_session_admin();
        $id = array('id_chickin' => $this->uri->segment(3));
        $this->Model_chickin->delete('tb_chickin',$id);
        $this->Model_chickin->delete('tb_jadwal',$id);
		redirect($_SERVER['HTTP_REFERER']);
    }

    function cancel(){
        cek_session_admin();
		$id = $this->uri->segment(3);

		$data = array('status_chickin' => '2'
					 );
		// $where = array('id_chickin' => $this->input->post('id'));
		$this->Model_chickin->cancel($id, $data);

		redirect($_SERVER['HTTP_REFERER']);
    }
}