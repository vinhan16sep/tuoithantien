<?php 

class Image_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function fetch_row($where = array()){
        $query = $this->db->select('*')
            ->from('image')
            ->where($where)
            ->order_by("id", "asc")
            ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }

        return false;
    }

    public function update($id, $image){
        $this->db->set($image)->where('id', $id)->update('image');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }

    public function count_all($where = array(), $search = null, $type = null, $id = null) {
        $this->db->select('*')
            ->from('image');
        if($type != null && $id != null){
            $this->db->where($type, $id);
        }
        if($where != null){
            $this->db->where($where);
        }
        
        
        if($search != null){
            $this->db->like('title', $search);
        }
        return $this->db->get()->num_rows();
    }


    public function fetch_all($where = array(),$limit = NULL, $start = NULL){
        $this->db->select('*');
        $this->db->from('image');
        if($where != null){
            $this->db->where($where);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_by_id($id){
        $query = $this->db->select('*')
            ->from('image')
            ->where('id', $id)
            ->limit(1)
            ->get();

        if($query->num_rows() == 1){
            return $query->row_array();
        }

        return false;
    }

    public function save($image){
        $this->db->set($image)->insert('image');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }

    public function delete($id){
        $this->db->delete('image', array('id' => $id)); 

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }


    public function delete_all($id = array()){
        $this->db->where_in('image_id', $id);
        $this->db->delete('image'); 

        // if($this->db->affected_rows() == 1){
        //     return true;
        // }

        return true;
    }

    public function total($where = array()){
        $this->db->select('*')
            ->from('image');
        if($where != null){
            $this->db->where($where);
        }
        return $this->db->get()->num_rows();
    }
}

 ?>