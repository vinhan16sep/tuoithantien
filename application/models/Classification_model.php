<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14/12/2017
 * Time: 3:40 PM
 */
class Classification_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function fetch_all($where = array(),$limit = NULL, $start = NULL){
        $this->db->select('*');
        $this->db->from('class');
        $this->db->where('is_deleted', 0);
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

    public function count_all($where = array()) {
        $this->db->select('*')
            ->from('class');
        $this->db->where('is_deleted', 0);
        if($where != null){
            $this->db->where($where);
        }
        return $this->db->get()->num_rows();
    }

    public function save($class){
        $this->db->set($class)->insert('class');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }

    public function fetch_by_id($id){
        $query = $this->db->select('*')
            ->from('class')
            ->where('id', $id)
            ->where('is_deleted', 0)
            ->limit(1)
            ->get();

        if($query->num_rows() == 1){
            return $query->row_array();
        }

        return false;
    }

    public function update($id, $class){
        $this->db->set($class)->where('id', $id)->update('class');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }

    public function delete($id){
        $this->db->set('is_deleted', 1)->where('id', $id)->update('class');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
}