<?php
class Model_combobox extends CI_model{

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

    function view_where_desc($table,$data,$order){
        $this->db->where($data);
        $this->db->order_by($order,"DESC");
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function view_where_asc($table,$data,$order){
        $this->db->where($data);
        $this->db->order_by($order,"ASC");
        $query = $this->db->get($table);
        return $query->result_array();
    }
}
