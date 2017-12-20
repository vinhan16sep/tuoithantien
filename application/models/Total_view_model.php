<?php
	class Total_view_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function insert($data){
	        $this->db->set($data)
	            ->insert('total_view');

	        if($this->db->affected_rows() == 1){
	            return $this->db->insert_id();
	        }

	        return false;
    	}

    	public function count_all($where = array()) {
	        if($where != NULL){
	            $query = $this->db->select('*')
	                ->from('total_view')
	                ->where($where)
	                ->get();
	        }else{
	            $query = $this->db->select('*')
	                ->from('total_view')
	                ->get();
	        }

	        return $query->num_rows();
	    }

	    public function update($id, $data){
	        $this->db->set($data)
	            ->where('guest_id', $id)
	            ->update('total_view');

	        if($this->db->affected_rows() == 1){
	            return true;
	        }

	        return false;
	    }

	    public function delete($time){
	        $this->db->delete('total_view', array('created_at <' => $time)); 

	        if($this->db->affected_rows() == 1){
	            return true;
	        }

	        return false;
	    }

	    public function fetch_all(){
	        $query = $this->db->select('*')
	            ->from('total_view')
	            ->get();

	        if($query->num_rows() > 0){
	            return $query->result_array();
	        }

	        return false;
	    }

	    public function fetch_row($where = array(), $type = 'total_view'){
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