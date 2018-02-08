<?php

class Product_model extends CI_Model {

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
        $this->db->select('product.*, trademark.title as tTitle, category.title as cTitle');
        $this->db->from('product');
        $this->db->join('trademark', 'trademark.id = product.trademark_id');
        $this->db->join('category', 'category.id = product.category_id');
        $this->db->where('product.is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("product.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function get_category_by_trademark($id){
        $this->db->select('id, title');
        $this->db->from('category');
        $this->db->where('trademark_id', $id);
        $this->db->where('is_deleted', 0);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function fetch_all_trademark(){
        $query = $this->db->select('*')
            ->from('trademark')
            ->where('is_deleted', 0)
            ->order_by('id', 'asc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_all_category(){
        $query = $this->db->select('*')
            ->from('trademark')
            ->where('is_deleted', 0)
            ->order_by('id', 'asc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_all_product_in_trademark($id, $limit = NULL, $start = NULL){
        $query = $this->db->select('*')
            ->from('product')
            ->where('trademark_id', $id)
            ->where('is_deleted', 0)
            ->limit($limit, $start)
            ->order_by('id', 'desc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_all_relation_product_in_trademark($trademark_id, $current_product_id){
        $query = $this->db->select('*')
            ->from('product')
            ->where('trademark_id', $trademark_id)
            ->where('id !=', $current_product_id)
            ->where('is_deleted', 0)
            ->order_by('id', 'desc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_all_product_in_category($id, $limit = NULL, $start = NULL){
        $query = $this->db->select('*')
            ->from('product')
            ->where('category_id', $id)
            ->where('is_deleted', 0)
            ->limit($limit, $start)
            ->order_by('id', 'desc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_latest_products(){
        $query = $this->db->select('*')
            ->from('product')
            ->where('is_deleted', 0)
            ->order_by('created_at', 'desc')
            ->limit(2)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_feature_products(){
        $query = $this->db->select('*')
            ->from('product')
            ->where('is_deleted', 0)
            ->order_by('created_at', 'desc')
            ->limit(5)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_all_category_with_trademark(){
        $query = $this->db->select('category.*, trademark.title as tTitle')
            ->from('category')
            ->join('trademark', 'category.trademark_id = trademark.id')
            ->where('category.is_deleted', 0)
            ->order_by('category.created_at', 'desc')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function count_all($type = null, $id = null) {
        $this->db->select('*')
            ->from('product');
        if($type != null && $id != null){
            $this->db->where($type, $id);
        }
        $this->db->where('is_deleted', 0);

        return $this->db->get()->num_rows();
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

    public function update($type, $id, $product){
        $this->db->set($product)
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