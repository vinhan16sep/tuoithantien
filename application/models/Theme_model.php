<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15/12/2017
 * Time: 3:10 PM
 */
class Theme_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function fetch_row($where = array()){
        $query = $this->db->select('*')
            ->from('theme')
            ->where('is_active', 1)
            ->where($where)
            ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }

        return false;
    }

    public function fetch_all($where = array()){
        $query = $this->db->select('*')
            ->from('theme')
            ->where($where)
            ->order_by('id', 'asc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }
}