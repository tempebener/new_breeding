<?php
class Model_purchase extends CI_model{

  function get_combo_ci() {
$this->db->select('*');
$this->db->from('tb_chickin');
$query = $this->db->get();
return $query->result();
}

function get_combo_plant() {
$this->db->select('*');
$this->db->from('tb_plant');
$query = $this->db->get();
return $query->result();
}
function insert_jadwal($data)
  {

    $this->db->insert('tb_jadwal', $data);
  }
  public function view_join_chickin($table1,$table2,$field,$order){
          $this->db->select('*');
          $this->db->from($table1);
          $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
          $this->db->join('tb_plant', $table1.'.id_plant=tb_plant.id_plant');
          $this->db->join('tb_kandang', $table1.'.id_kandang=tb_kandang.id_kandang');
          $this->db->join('tb_strain', $table1.'.id_strain=tb_strain.id_strain');
          $this->db->order_by($order,"DESC");
          return $this->db->get()->result_array();
      }
function get_by_id_purchasereq($id)
{
  $this->db->where('account_pr', $id);
  $this->db->or_where('no_pr', $id);
  $this->db->join('cam_material_category', 'cam_material_category.account_mc = cam_purchase_requisition.account_mc','inner');
  $this->db->join('cam_company_plant', 'cam_company_plant.account_cp = cam_purchase_requisition.account_cp','inner');
  return $this->db->get('cam_purchase_requisition')->row();
}

function get_data_satuan($kode){
		$hsl=$this->db->query("SELECT * FROM tb_stock WHERE id_stock='$kode'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
          'id_stock' => $data->id_stock,
					'satuan' => $data->satuan,

					);
			}
		}
		return $hasil;
	}
  function get_by_id_katstock($id)
  {
    $this->db->where('id_kat_stock', $id);
    $this->db->or_where('id_kat_stock', $id);
      $this->db->join('tb_material_stock', 'tb_material_stock.id_material_stock = tb_kat_stock.id_material_stock','inner');
    return $this->db->get('tb_kat_stock')->row();
  }

  function get_by_id_jadwal($id)
  {
    $this->db->where('id_jadwal', $id);
    $this->db->or_where('id_jadwal', $id);
    $this->db->join('tb_chickin', 'tb_chickin.id_chickin = tb_jadwal.id_chickin','inner');
    $this->db->join('tb_kandang', 'tb_kandang.id_kandang = tb_chickin.id_chickin','inner');
    $this->db->join('tb_plant', 'tb_plant.id_plant = tb_chickin.id_plant','inner');
    return $this->db->get('tb_jadwal')->row();
  }
}
