<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/12/2017
 * Time: 5:41 PM
 */
    class Subcribe_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        public function fetch_all($limit = NULL, $start = NULL){
            $query = $this->db->select('*')
                ->from('subcribe')
                ->limit($limit, $start)
                ->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function count_all($where = array()){
            $this->db->select('*')
                ->from('subcribe');
            if($where != null){
                $this->db->where($where);
            }
            return $this->db->get()->num_rows();
        }

        public function save($activity){
            $this->db->set($activity)->insert('subcribe');

            if($this->db->affected_rows() == 1){
                return $this->db->insert_id();
            }

            return false;
        }
    }