<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14/12/2017
 * Time: 10:16 AM
 */
 class Register_model extends CI_Model {
     function __construct(){
         parent::__construct();
     }
     public function save($register){
         $this->db->set($register)->insert('register');

         if($this->db->affected_rows() == 1){
             return $this->db->insert_id();
         }

         return false;
     }

     public function fetch_all($where = array(),$limit = NULL, $start = NULL, $like = null){
        $this->db->select('*');
        $this->db->from('register');
        $this->db->where('is_deleted', 0);
        $this->db->like('name', $like);
        if($where != null){
            $this->db->where($where);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

         return false;
     }

     public function count_all($where = array(), $search = null) {
         $this->db->select('*')
             ->from('register');
         $this->db->where('is_deleted', 0);
         if($where != null){
             $this->db->where($where);
         }

         if($search != null){
             $this->db->like('name', $search);
         }
         return $this->db->get()->num_rows();
     }
 }