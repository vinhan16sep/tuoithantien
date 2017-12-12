<?php
    class Count_comment_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        public function fetch_all(){
            $query = $this->db->select('*')
                ->from('count_comment')
                ->order_by('id', 'desc')
                ->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function fetch_row($where = array()){
            $query = $this->db->select('*')
                ->from('count_comment')
                ->where($where)
                ->get();

            if($query->num_rows() > 0){
                return $query->row_array();
            }

            return false;
        }

        public function delete($id){
            $this->db->delete('count_comment', array('id' => $id));
        }

        public function save($comment){
            $this->db->set($comment)->insert('count_comment');

            if($this->db->affected_rows() == 1){
                return $this->db->insert_id();
            }

            return false;
        }
    }
?>