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
        $sql = $this->db->query("SELECT * FROM mu_barang a JOIN mu_kategori b ON a.id_kategori=b.id_kategori");
        $this->db->insert_batch($sql, $data);
    }
    // get employee list
    public function employeeList() {
        $this->db->select(array('a.*', 'b.*', 'c.*', 'd.*'));
        $this->db->from('tb_chickin AS a');
        $this->db->join('tb_plant AS b', $table1.'.id_plant=tb_plant.id_plant');
        $this->db->join('tb_kandang AS c', $table1.'.id_kandang=tb_kandang.id_kandang');
        $this->db->join('tb_strain AS d', $table1.'.id_strain=tb_strain.id_strain');
        $query = $this->db->get();
        return $query->result_array();
    }
}
