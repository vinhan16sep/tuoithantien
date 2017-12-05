<?php 

class Parental_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function fetch_row($where = array()){
        $query = $this->db->select('*')
            ->from('parental')
            ->where('is_deleted', 0)
            ->where($where)
            ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }

        return false;
    }

    public function update($id, $parental){
        $this->db->set($parental)->where('id', $id)->update('parental');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }

    public function count_all($where = array(), $search = null, $type = null, $id = null) {
        $this->db->select('*')
            ->from('parental');
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


    public function fetch_all($where = array(),$limit = NULL, $start = NULL, $like = null){
        $query = $this->db->select('*')
            ->from('parental')
            ->where('is_deleted', 0)
            ->like('title', $like)
            ->where($where)
            ->limit($limit, $start)
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }

    public function fetch_by_id($id){
        $query = $this->db->select('*')
            ->from('parental')
            ->where('id', $id)
            ->where('is_deleted', 0)
            ->limit(1)
            ->get();

        if($query->num_rows() == 1){
            return $query->row_array();
        }

        return false;
    }

    public function save($introduce){
        $this->db->set($introduce)->insert('parental');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }

    public function delete($id){
        $this->db->set('is_deleted', 1)->where('id', $id)->update('parental');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
}

 ?>