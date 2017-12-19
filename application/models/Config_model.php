<?php
	class Config_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function insert($data){
	        $this->db->set($data)
	            ->insert('config');

	        if($this->db->affected_rows() == 1){
	            return $this->db->insert_id();
	        }

	        return false;
    	}

	    public function update($id, $data){
	        $this->db->set($data)
	            ->where('id', $id)
	            ->update('config');

	        if($this->db->affected_rows() == 1){
	            return true;
	        }

	        return false;
	    }

	    public function delete($time){
	        $this->db->delete('config', array('created_at' => $time)); 

	        if($this->db->affected_rows() == 1){
	            return true;
	        }

	        return false;
	    }

	    public function fetch_row($where = array(), $type = 'config'){
	        $this->db->select('*');
	        $this->db->from($type);
	        if($where != null){
	            $this->db->where($where);
	        }

	        $query = $this->db->get();

	        if($query->num_rows() > 0){
	            return $query->row_array();
	        }

	        return false;
	    }
	}
?>