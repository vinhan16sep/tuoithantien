<?php

class Introduce_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function build_unique_slug($slug, $id = null){
        $count = 0;
        $temp_slug = $slug;
        while(true) {
            $this->db->select('id');
            $this->db->where('slug', $temp_slug);
            if($id != null){
                $this->db->where('id !=', $id);
            }
            $query = $this->db->get('introduce');
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
    }

    public function fetch_all($where = array(),$limit = NULL, $start = NULL, $like = null){
        $query = $this->db->select('*')
            ->from('introduce')
            ->like('title', $like)
            ->where('is_deleted', 0)
            ->where($where)
            ->limit($limit, $start)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }
    
    public function fetch_row($where = array()){
        $query = $this->db->select('*')
            ->from('introduce')
            ->where('is_deleted', 0)
            ->where($where)
            ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }

        return false;
    }

    public function fetch_by_id($id){
        $query = $this->db->select('*')
            ->from('introduce')
            ->where('id', $id)
            ->where('is_deleted', 0)
            ->limit(1)
            ->get();

        if($query->num_rows() == 1){
            return $query->row_array();
        }

        return false;
    }

    public function search($where = array(), $like,$limit = NULL, $start = NULL){
        $query = $this->db->select('*')
            ->from('introduce')
            ->where('is_deleted', 0)
            ->where($where)
            ->like('title', $like)
            ->limit($limit, $start)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function save($introduce){
        $this->db->set($introduce)->insert('introduce');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }

    public function update($id, $introduce){
        $this->db->set($introduce)->where('id', $id)->update('introduce');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
    public function update_slug($slug, $introduce){
        $this->db->set($introduce)->where('slug', $slug)->update('introduce');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }

    public function delete($id){
        $this->db->set('is_deleted', 1)->where('id', $id)->update('introduce');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
    public function count_all($where = array(), $search = null, $type = null, $id = null) {
        $this->db->select('*')
            ->from('introduce');
        if($type != null && $id != null){
            $this->db->where($type, $id);
        }
        $this->db->where('is_deleted', 0);
        $this->db->where($where);
        
        if($search != null){
            $this->db->like('title', $search);
        }

        return $this->db->get()->num_rows();
    }
}