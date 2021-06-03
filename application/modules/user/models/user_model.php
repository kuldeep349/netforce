<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($table,$data){
        $res = $this->db->insert($table,$data);
        return $res;
    }

    public function getSum($table,$where,$select){
        $this->db->select($select);
        $this->db->where($where);
        $query = $this->db->get($table);
        $res = $query->row_object();
        return $res->sum;
    }
}
?>