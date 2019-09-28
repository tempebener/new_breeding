<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Administrator extends CI_Controller {
	function __construct()
  {
    parent::__construct();
    /* memanggil model untuk ditampilkan pada masing2 modul */
$this->load->helper('dropdown');
$this->load->helper('format_all');
$this->load->model('Model_purchase');
    /* memanggil function dari masing2 model yang akan digunakan */

  }


  function index(){
  		if (isset($_POST['submit'])){
  			$username = $this->input->post('a');
  			$password = hash("sha512", md5($this->input->post('b')));
  			$cek = $this->model_app->cek_login($username,$password,'users');
  		    $row = $cek->row_array();
  		    $total = $cek->num_rows();
  			if ($total > 0){
  				$this->session->set_userdata('upload_image_file_manager',true);
  				$this->session->set_userdata(array('username'=>$row['username'],
  								   'level'=>$row['level'],
                                     'id_session'=>$row['id_session']));

  				redirect('administrator/home');
  			}else{
  				$data['title'] = 'Username atau Password salah!';
  				$this->load->view('administrator/view_login',$data);
  			}
  		}else{
  			$data['title'] = 'Administrator &rsaquo; Log In';
  			$this->load->view('administrator/view_login',$data);
  		}
  	}
    function home(){
        if ($this->session->level=='admin'){
      $this->template->load('administrator/template','administrator/view_home');
        }else{
          $data['users'] = $this->model_app->view_where('users',array('username'=>$this->session->username))->row_array();
          $data['modul'] = $this->model_app->view_join_one('users','users_modul','id_session','id_umod','DESC');
          $this->template->load('administrator/template','administrator/view_home_users',$data);
        }
  }

  function manajemenuser(){
		cek_session_akses('manajemenuser',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('users','username','level_users','nama_level','DESC');
		$this->template->load('administrator/template','administrator/mod_users/view_users',$data);
	}

	function tambah_manajemenuser(){
		cek_session_akses('manajemenuser',$this->session->id_session);
		$id = $this->session->username;
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
																		'alamat'=>$this->db->escape_str($this->input->post('z')),
                                    'level'=>$this->db->escape_str($this->input->post('g')),

                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }else{
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
																		'alamat'=>$this->db->escape_str($this->input->post('z')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('g')),

                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }
            $this->model_app->insert('users',$data);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              $sess = md5($this->input->post('a')).'-'.date('YmdHis');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$sess,
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);

              }

			redirect('administrator/manajemenuser');
		}else{

				$data['asu'] = $this->model_app->view_ordering('level_users','id_level','DESC');
             $data['record'] = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
			$this->template->load('administrator/template','administrator/mod_users/view_users_tambah',$data);
		}
	}

	function edit_manajemenuser(){
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
																		'alamat'=>$this->db->escape_str($this->input->post('z')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
																		'alamat'=>$this->db->escape_str($this->input->post('z')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
																		'alamat'=>$this->db->escape_str($this->input->post('z')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
																		'alamat'=>$this->db->escape_str($this->input->post('z')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }
            $where = array('username' => $this->input->post('id'));
            $this->model_app->update('users', $data, $where);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$this->input->post('ids'),
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('administrator/edit_manajemenuser/'.$this->input->post('id'));
		}else{
            if ($this->session->username==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('username' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
    			$this->template->load('administrator/template','administrator/mod_users/view_users_edit',$data);
            }else{

                redirect('administrator/edit_manajemenuser/'.$this->session->username);
            }
		}
	}

	function delete_manajemenuser(){
        cek_session_akses('manajemenuser',$this->session->id_session);
		$id = array('username' => $this->uri->segment(3));
        $this->model_app->delete('users',$id);
		redirect('administrator/manajemenuser');
	}

    function delete_akses(){
        cek_session_admin();
        $id = array('id_umod' => $this->uri->segment(3));
        $this->model_app->delete('users_modul',$id);
        redirect('administrator/edit_manajemenuser/'.$this->uri->segment(4));
    }


  function logout(){
    $this->session->sess_destroy();
    redirect('');
  }

	function add_permintaan(){
				$data['chickin'] = $this->Model_purchase->get_combo_ci('tb_chickin');
				$data['plant'] = $this->Model_purchase->get_combo_plant('tb_chickin');
				$this->template->load('administrator/template','administrator/mod_permintaan/view_permintaan_add',$data);
			}
			function lookup()
{
$option = "";
$id = $_GET['id'];
$sql = "select * from tb_stok where id_chickin = '" . $id . "'";
$a = $this->db->query($sql)->result();
foreach($a as $b)
{
	$option.="<option value='" .  $b->account_mp . "'>" . $b->description . "</option>";
}
echo $option;
}

	function get_satuan(){
		$kode=$this->input->post('kode');
		$data=$this->Model_purchase->get_data_satuan($kode);
		echo json_encode($data);
	}

	function lookupa()
   {
 	$option = "";
 	$id = $_GET['id'];
 	$sql = "select * from tb_stock where id_stock = '" . $id . "'";
 	$a = $this->db->query($sql)->result();
 	foreach($a as $b)
 	{
 		$option.="<option value='" .  $b->id_stock . "'>" . $b->nama_stock . "</option>";
 	}
 	echo $option;
   }
	 function lookup2()
  {
	$option = "";
	$id = $_GET['id'];
	$sql = "select * from tb_stock where id_stock = '" . $id . "'";
	$a = $this->db->query($sql)->result();
	foreach($a as $b)
	{
		echo $b->satuan;
		exit;
	}
	echo $option;
  }

	function stock(){
	$material = "";

	if(isset($_GET['material'])) $material = $_GET['material'];

	$data['material'] = $material;

	$data['record'] = $this->db->query("select tb_kat_stock.* from tb_kat_stock
	join tb_material_stock ON tb_kat_stock.id_material_stock = tb_material_stock.id_material_stock
	 where tb_kat_stock.id_material_stock= '$material'

	");
				$this->template->load('administrator/template','administrator/mod_stock/view_stock',$data);
			}

			function detail_stock($id){

		$row = $this->Model_purchase->get_by_id_katstock($id);
	/* melakukan pengecekan data, apabila ada maka akan ditampilkan */
	if ($row)
	{
	/* memanggil function dari masing2 model yang akan digunakan */
	$stock = $this->Model_purchase->get_by_id_katstock($id);
	$data['stock']            = $stock;
	$data['record'] = $this->db->query("select tb_stock.* , tb_kandang.nama_kandang as kandang from tb_stock
	join tb_kat_stock on tb_stock.id_kat_stock = tb_kat_stock.id_kat_stock
	join tb_chickin on tb_stock.id_chickin = tb_chickin.id_chickin
	join tb_kandang on tb_chickin.id_kandang = tb_kandang.id_kandang
	join tb_material_stock ON tb_stock.id_material_stock = tb_material_stock.id_material_stock
	 where  tb_stock.id_kat_stock = '$id' and tb_stock.status_stock ='1'

	");

 	$this->template->load('administrator/template','administrator/mod_stock/view_stock_detail',$data);
 }
}
}
