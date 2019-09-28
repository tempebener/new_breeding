<?php
class Model_recording extends CI_model{

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

	function edit_bw($where,$data){
		$this->db->where($where);
		$this->db->update('tb_bw_detail',$data);
    }	
}
