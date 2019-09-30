<?php
class Model_import extends CI_model{

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

    function find($id_ub){
        return $this->db
                ->where(['id_unit_bisnis' => $id_ub])
                ->get('tb_unit_bisnis')->row_array();
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

    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('import', $data);
    }
    // get employee list
    public function employeeList() {
        $this->db->select(array('e.id', 'e.first_name', 'e.last_name', 'e.email', 'e.dob', 'e.contact_no'));
        $this->db->from('import as e');
        $query = $this->db->get();
        return $query->result_array();
    }
}
