<?php

class Advise_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function fetch_all($type){
        $query = $this->db->select('*')
            ->from($type)
            ->where('is_deleted', 0)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_all_pagination($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('advise');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function fetch_all_advise_in_category($id){
        $query = $this->db->select('*')
            ->from('advise')
            ->where('category_id', $id)
            ->where('is_deleted', 0)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_latest_advises($quantity){
        $query = $this->db->select('*')
            ->from('advise')
            ->where('is_deleted', 0)
            ->order_by('created_at', 'desc')
            ->limit($quantity)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function count_all() {
        $query = $this->db->select('*')
            ->from('advise')
            ->where('is_deleted', 0)
            ->get();

        return $query->num_rows();
    }

    public function fetch_by_id($type, $id){
        $query = $this->db->select('*')
            ->from($type)
            ->where('id', $id)
            ->where('is_deleted', 0)
            ->limit(1)
            ->get();

        if($query->num_rows() == 1){
            return $query->row_array();
        }

        return false;
    }

    public function insert($type, $data){
        $this->db->set($data)
            ->insert($type);

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }

    public function update($type, $id, $advise){
        $this->db->set($advise)
            ->where('id', $id)
            ->update($type);

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }

    public function delete($type, $id){
        $this->db->set('is_deleted', 1)
            ->where('id', $id)
            ->update($type);

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
}