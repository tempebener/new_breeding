<?php
class Model_stock_kandang extends CI_model{

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

    function delete($table, $where){
        return $this->db->delete($table, $where);
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

    function get_by_id_katstock($id){
        $this->db->where('id_kat_stock', $id);
        $this->db->or_where('id_kat_stock', $id);
        $this->db->join('tb_material_stock', 'tb_material_stock.id_material_stock = tb_kat_stock.id_material_stock','inner');
        return $this->db->get('tb_kat_stock')->row();
    }

    function get_by_id_jadwal($id){
        $this->db->where('id_jadwal', $id);
        $this->db->or_where('id_jadwal', $id);
        $this->db->join('tb_chickin', 'tb_chickin.id_chickin = tb_jadwal.id_chickin','inner');
        $this->db->join('tb_kandang', 'tb_kandang.id_kandang = tb_chickin.id_chickin','inner');
        $this->db->join('tb_plant', 'tb_plant.id_plant = tb_chickin.id_plant','inner');
        return $this->db->get('tb_jadwal')->row();
    }

    function get_by_id_chickin($id){
        $this->db->where('id_chickin', $id);
        $this->db->or_where('no_chickin', $id);
        $this->db->join('tb_kandang', 'tb_kandang.id_kandang = tb_chickin.id_chickin','inner');
        $this->db->join('tb_plant', 'tb_plant.id_plant = tb_chickin.id_plant','inner');
        return $this->db->get('tb_chickin')->row();
    }
}
