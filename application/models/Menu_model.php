<?php

class Menu_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function fetch_all($is_first = 0){
        if($is_first == 1){
            $query = $this->db->select('*')
                ->from('menu')
                ->where('level', 1)
                ->where('is_deleted', 0)
                ->order_by('sort', 'asc')
                ->get();
        }else{
            $query = $this->db->select('*')
                ->from('menu')
                ->where('is_deleted', 0)
                ->get();
        }

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_all_to_frontend(){
        $query = $this->db->select('*')
            ->from('menu')
            ->where('level', 1)
            ->where('is_actived', 1)
            ->where('is_deleted', 0)
            ->order_by('sort', 'asc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_sub_menu_by_parent($parent_id){
        $query = $this->db->select('*')
            ->from('menu')
            ->where('level', 2)
            ->where('parent', $parent_id)
            ->where('is_deleted', 0)
            ->order_by('sort', 'asc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_all_pagination($limit = NULL, $start = NULL, $search = null) {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('level', 1);
        $this->db->where('is_deleted', 0);
        if(!empty($search)){
            $this->db->like('title', $search);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by("sort", "asc");

        return $result = $this->db->get()->result_array();
    }

    public function fetch_all_by_type($type){
        $query = $this->db->select('*')
            ->from('menu')
            ->where('type', $type)
            ->where('is_deleted', 0)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_latest_menus($quantity){
        $query = $this->db->select('*')
            ->from('menu')
            ->where('is_deleted', 0)
            ->order_by('created_at', 'desc')
            ->limit($quantity)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function count_all($search = null) {
        $query = $this->db->select('*')
            ->from('menu')
            ->where('is_deleted', 0);
        if(!empty($search)){
            $query->like('title', $search);
        }

        return $query->get()->num_rows();
    }

    public function count_all_first_menu() {
        $query = $this->db->select('*')
            ->from('menu')
            ->where('is_actived', 1)
            ->where('level', 1)
            ->where('is_deleted', 0);

        return $query->get()->num_rows();
    }

    public function count_all_sub_in_main($id) {
        $query = $this->db->select('*')
            ->from('menu')
            ->where('is_actived', 1)
            ->where('parent', $id)
            ->where('level', 2)
            ->where('is_deleted', 0);

        return $query->get()->num_rows();
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

    public function fetch_categories_by_main($main){
        if($main != ''){
            $query = $this->db->select('*')
                ->from($main)
                ->where('is_deleted', 0)
                ->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        return false;
    }

    public function fetch_articles_by_sub_category($main, $sub){
        if($main != '' && $sub != ''){
            $main_table = explode('_', $main);
            $query = $this->db->select($main_table[0] . '.*')
                ->from($main_table[0])
                ->join($main, $main . '.id = ' . $main_table[0] . '.category_id')
                ->where($main . '.slug', $sub)
                ->where($main_table[0] . '.is_deleted', 0)
                ->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
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

    public function update($type, $id, $menu){
        $this->db->set($menu)
            ->where('id', $id)
            ->update($type);

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }

    public function update_sort($sort, $id){
        $this->db->set(array('sort' => $sort))
            ->where('id', $id)
            ->update('menu');

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

    public function active($type, $id, $change){
        $this->db->set('is_actived', $change)
            ->where('id', $id)
            ->update($type);

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
}