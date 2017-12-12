<?php 

class Library_model extends CI_Model{
	
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
            $query = $this->db->get('library');
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
    }
    
	public function fetch_row($where = array()){
        $query = $this->db->select('*')
            ->from('library')
            ->where('is_deleted', 0)
            ->where($where)
            ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }

        return false;
    }

    public function update($id, $library){
        $this->db->set($library)->where('id', $id)->update('library');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }

    public function count_all($where = array(), $search = null) {
        $this->db->select('*')
            ->from('library');
        $this->db->where('is_deleted', 0);
        if($where != null){
            $this->db->where($where);
        }
        
        
        if($search != null){
            $this->db->like('title', $search);
        }
        return $this->db->get()->num_rows();
    }


    public function fetch_all($where = array(),$limit = NULL, $start = NULL, $like = null){
        $this->db->select('*');
        $this->db->from('library');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('id', 'desc');
        if($where != null){
            $this->db->where($where);
        }
        if($like != null){
            $this->db->like('title', $like);
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
            ->from('library')
            ->where('id', $id)
            ->where('is_deleted', 0)
            ->limit(1)
            ->get();

        if($query->num_rows() == 1){
            return $query->row_array();
        }

        return false;
    }

    public function save($library){
        $this->db->set($library)->insert('library');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }

    public function delete($id){
        $this->db->set('is_deleted', 1)->where('id', $id)->update('library');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
}

 ?>