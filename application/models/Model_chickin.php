<?php
class Model_chickin extends CI_model{

    function view($table){
        return $this->db->get($table);
    }

    function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    function edit($table, $data){
        return $this->db->get_where($table, $data);
    }

    function update($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    function update2($id){
        $query = $this->db->query("SELECT * FROM tb_chickin a JOIN tb_perusahaan b ON a.id_perusahaan=b.id_perusahaan JOIN tb_unit_bisnis c ON a.id_unit_bisnis=c.id_unit_bisnis JOIN tb_plant d ON a.id_plant=d.id_plant JOIN tb_kandang e ON a.id_kandang=e.id_kandang JOIN tb_strain f ON a.id_strain=f.id_strain JOIN tb_supplier g ON a.id_supplier=g.id_supplier WHERE a.id_chickin='$id' ORDER BY a.id_chickin DESC");

        return $query->result_array();
    }

    function find($id_ub){
        return $this->db
                ->where(['id_unit_bisnis' => $id_ub])
                ->get('tb_unit_bisnis')->row_array();
    }

    function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    function active_nonactive($id, $data, $data2){
        $this->db
                ->where(['id_chickin' => $id])
                ->update('tb_chickin',$data);
        $this->db
                ->where(['id_chickin' => $id])
                ->update('tb_jadwal',$data2);
    }

    function view_all_asc($table,$order){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,"ASC");
        return $this->db->get()->result_array();
    }

    function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
  }
}
