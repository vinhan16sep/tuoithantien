<?php

class Activity_model extends CI_Model{

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
            $query = $this->db->get('activity');
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
    }

    public function build_unique_slug_category($slug, $id = null){
        $count = 0;
        $temp_slug = $slug;
        while(true) {
            $this->db->select('id');
            $this->db->where('slug', $temp_slug);
            if($id != null){
                $this->db->where('id !=', $id);
            }
            $query = $this->db->get('activity_category');
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
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

    public function get_type($type, $slug){
        $query = $this->db->select('*')
            ->from($type)
            ->where('is_deleted', 0)
            ->like('slug', $slug)
            ->order_by('id', 'desc')
            ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }

        return false;
    }

    public function fetch_limit($limit, $start, $category_id){
        $query = $this->db->select('*')
            ->from('activity')
            ->where('is_deleted', 0)
            ->limit($limit, $start)
            ->where('category_id', $category_id)
            ->order_by('id', 'desc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_row($where = array(), $type = 'activity'){
        $this->db->select('*');
        $this->db->from($type);
        $this->db->where('is_deleted', 0);
        if($where != null){
            $this->db->where($where);
        }

        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }

        return false;
    }

    public function fetch_all_pagination($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function get_all_pagination($where = array(), $limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->where('is_deleted', 0);
        if($where != null){
            $this->db->where($where);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function fetch_all_by_type($type, $limit = NULL, $start = NULL){
        $query = $this->db->select('*')
            ->from('activity')
            ->where('category_id', $type)
            ->where('is_deleted', 0)
            ->limit($limit, $start)
            ->order_by("id", "desc")
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_latest_articles($quantity){
        $query = $this->db->select('*')
            ->from('article')
            ->where('is_deleted', 0)
            ->order_by('created_at', 'desc')
            ->limit($quantity)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function count_all($type = NULL) {
        if($type != NULL){
            $query = $this->db->select('*')
                ->from('activity')
                ->where('category_id', $type)
                ->where('is_deleted', 0)
                ->get();
        }else{
            $query = $this->db->select('*')
                ->from('activity')
                ->where('is_deleted', 0)
                ->get();
        }

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

    public function update($type, $id, $article){
        $this->db->set($article)
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

 ?>