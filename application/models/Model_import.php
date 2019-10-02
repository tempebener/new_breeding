<?php
class Model_import extends CI_model{
    public $tb_chickin = 'tb_chickin';
    public $id = 'id';
    public $order_desc = 'DESC';
    
    private $id_super_admin=1;

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

    // =============================================================================================  

    public function json(){
        $this->datatables->select('
             tb_chickin.id_chickin,
             tb_chickin.id_unit_bisnis,
             tb_chickin.id_plant,
             tb_chickin.id_kandang,
             tb_chickin.jml_betina,
             tb_chickin.jml_jantan,
             tb_chickin.umur_chickin,
             tb_chickin.id_strain,
             tb_chickin.id_supplier,
             tb_unit_bisnis.nama_unit_bisnis,
             tb_plant.nama_plant,
             tb_kandang.nama_kandang,
             tb_strain.nama_strain,
             tb_supplier.nama_supplier,
        ');
        
        $this->datatables->from('tb_chickin');
        $this->datatables->join('tb_unit_bisnis','tb_unit_bisnis.id_unit_bisnis=tb_chickin.id_unit_bisnis','LEFT'); 
        $this->datatables->join('tb_plant','id_plant.id=tb_chickin.id_plant','LEFT'); 
        
        
        //mengembalikan dalam bentuk array
        $q =  json_decode($this->datatables->generate(),true);
        return $q;
    }  

    /* Memastikan data yg dibuat tidak kembar/sama,
       fungsi ini sebagai pengganti fungsi primary key dr db,
       krn primary key sudah di gunakan untuk column id,
       untuk memastikan data yg exist bukan data yang sementara di proses
       maka di gunakan fungsi " where_not_in ".
       -create : id di kosongkan.
       -update : id di isi dengan id data yg di proses. 
    */  
    function if_exist($id,$data){

        $this->db->where_not_in($this->tb_chickin.'.'.'id',$id);
        $q=$this->db->get_where($this->tb_chickin, $data)->result_array();
        if(count($q)>0){
            return true;
        }else{
            return false;
        }       
    }   

    function insert_multiple($data){
        $this->db->trans_start();

         $this->db->insert_batch($this->tb_chickin, $data);
        
        
        $this->db->trans_complete();
        return $this->db->trans_status();   
    }

}
