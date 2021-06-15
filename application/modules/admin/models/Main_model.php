
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends Common_Model
{
 
  public function __construct()
    {
        //@call to parent CI_Model constructor
        parent::__construct();
    }
	
	
    public function get_single_record($table, $where, $select) {
        $this->db->select($select);
        $this->db->where($where);
        $this->db->from($table);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
//       echo $this->db->last_query();
        return $res;
    }
    public function get_records($table, $where, $select) {
        $this->db->select($select);
        $query = $this->db->get_where($table, $where);
        $res = $query->result_array();
        return $res;
    }
    public function get_limit_records($table, $where, $select , $limit , $offset) {
        $this->db->select($select);
        $this->db->where($where);
        $this->db->limit($limit , $offset);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($table);
        $res = $query->result_array();
//        echo $this->db->last_query();
        return $res;
    }

    
    public function get_sum($table, $where, $select) {
        $res = $this->db->count_all($table);
        return $res;
    }
 
}