<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase extends CI_Controller {
	function __construct()
  {
    parent::__construct();
    /* memanggil model untuk ditampilkan pada masing2 modul */
$this->load->helper('dropdown');
$this->load->helper('format_all');
$this->load->model('Model_purchase');
    /* memanggil function dari masing2 model yang akan digunakan */

  }

  function lookup()
  {
  $option = "";
  $id = $_GET['id'];
  $sql = "select * from cam_material_product where account_mc = '" . $id . "'";
  $a = $this->db->query($sql)->result();
  foreach($a as $b)
  {
    $option.="<option value='" .  $b->account_mp . "'>" . $b->description . "</option>";
  }
  echo $option;
  }

   function lookup2()
  {
  $option = "";
  $id = $_GET['id'];
  $sql = "select * from cam_material_product where account_mp = '" . $id . "'";
  $a = $this->db->query($sql)->result();
  foreach($a as $b)
  {
    echo $b->unit_code;
    exit;
  }
  echo $option;
  }

  function purchase_request(){
    $from = "";
    $to = "";

if(isset($_GET['transdate1'])) $from = $_GET['transdate1'];
if(isset($_GET['transdate2'])) $to = $_GET['transdate2'];

if(empty($from)) $from = date("Y-m-d");
if(empty($to)) $to = date("Y-m-d");

$data['from'] = $from;
$data['to'] = $to;

$data['record'] = $this->db->query("select * from cam_purchase_requisition x join cam_material_category y on x.account_mc = y.account_mc join cam_status c on x.account_status = c.account_status where date_request between '$from' and '$to'

  ")->result_array();
    $this->template->load('administrator/template','administrator/mod_purchase/req/view_purchase_req',$data);
  }

  function add_purchase_request(){
    $data['material'] = $this->Model_purchase->get_combo_mc('cam_material_category');
    $data['lokasi'] = $this->Model_purchase->get_combo_lokasi('cam_company_plant');
    $this->template->load('administrator/template','administrator/mod_purchase/req/view_purchase_req_add',$data);
  }

  function purchase_order(){
		$this->template->load('administrator/template','administrator/mod_purchase/order/view_purchase_order');
	}
	function add_purchase_order(){

		$this->template->load('administrator/template','administrator/mod_purchase/order/view_purchase_order_add');
	}

	function save_purchase_req()
	{
		$group = $this->input->post('d');
		$location = $this->input->post('e');
		$product = $this->input->post('aa');
		$req_date = $this->input->post('bb');
		$qty = $this->input->post('cc');
		$notes = $this->input->post('ee');

		$no = "PR-000001";
		$no2 = "PRI-000001";
		$sql = "select max(right(no_pr, 6)) as m from cam_purchase_requisition";
		$aa = $this->db->query($sql)->row()->m;
		if($aa)
		{
			$aa = $aa+1;
			$no = "PR-" . str_pad($aa, 6, '0', STR_PAD_LEFT);
			$no2 = "PRI-" . str_pad($aa, 6, '0', STR_PAD_LEFT);
		}
		$data = [
			"no_pr"=>$no,
			"date_request"=>date("Y-m-d"),
			"account_mc"=>$group,
			"account_cp"=>$location,
			"account_status"=>3,
			"create_user"=>$this->session->userdata["username"],
			"create_date "=>date("Y-m-d H:i:s"),
		];

		$this->db->insert("cam_purchase_requisition", $data);

		$i = 0;
		$j = 0;
		for($i = 0;$i < count($product);$i++)
		{
			if(!empty($product[$i]))
		{




			$data = [
				"no_pr"=>$no,
				"no_po"=>$no2,
				"required_date"=>$req_date[$i],
				"note"=>$notes[$i],
				"account_mp"=>$product[$i],
				"qty"=>$qty[$i],
				"unit_code"=>"kg",
				"create_user"=>$this->session->userdata["username"],
				"create_date "=>date("Y-m-d H:i:s"),
			];

			$this->db->insert("cam_purchase_requisition_items", $data);
			}

		}
		redirect('purchase/purchase_request');
	}

	function detailpurchasereq($id){
		$id = array('account_pr' => $this->uri->segment(3));
		$data['id'] = $id;

	 $this->template->load('administrator/template','administrator/mod_purchase/req/view_purchase_req_detail', $data);

}
	function delete_purchase_request(){
       $id = array('account_pr' => $this->uri->segment(3));
        $this->model_app->delete('cam_purchase_requisition',$id);
		redirect('administrator/purchase_request');
	}

	function save_purchase_req_edit()
	{
		$group = $this->input->post('d');
		$location = $this->input->post('e');
		$product = $this->input->post('aa');
		$req_date = $this->input->post('bb');
		$qty = $this->input->post('cc');
		$notes = $this->input->post('ee');
		$no = $this->input->post('no');
		$no2 = $this->input->post('no2');



		$i = 0;

		$this->db->query("delete from cam_purchase_requisition_items where no_pr = '$no'");
		for($i = 0;$i < count($product);$i++)
		{
			if(!empty($product[$i])){
			$data = [
				"no_pr"=>$no,
				"no_po"=>$no2,
				"required_date"=>$req_date[$i],
				"note"=>$notes[$i],
				"account_mp"=>$product[$i],
				"qty"=>$qty[$i],
				"unit_code"=>"kg",
				"create_user"=>$this->session->userdata["username"],
				"create_date "=>date("Y-m-d H:i:s"),
			];


			$this->db->insert("cam_purchase_requisition_items", $data);
			}

		}

		redirect('administrator/purchase_request');
	}
	function edit_purchase_request(){
			 $id = array('account_pr' => $this->uri->segment(3));
		 $data['id'] = $id;

		$this->template->load('administrator/template','administrator/mod_purchase/req/view_purchase_req_edit', $data);
	}
	function approve_purchase_request(){
	       $id = array('account_pr' => $this->uri->segment(3));
		  $this->db->query("update cam_purchase_requisition set account_Status = '1'
		  where account_pr = '" . $this->uri->segment(3) . "'");


			redirect($_SERVER['HTTP_REFERER']);
		}

			function reject_purchase_request(){
	       $id = array('account_pr' => $this->uri->segment(3));
		  $this->db->query("update cam_purchase_requisition set account_Status = '2'
		  where account_pr = '" . $this->uri->segment(3) . "'")
		  ;


			redirect($_SERVER['HTTP_REFERER']);
		}
}
