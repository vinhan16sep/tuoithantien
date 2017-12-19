<?php
	class Count_view_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function insert($data){
			$this->db->trans_start();
	        $this->db->set($data)
	            ->insert('count_view');
	        $this->db->trans_complete();
	        if($this->db->affected_rows() == 1){
	            return true;
	        }

	        return false;
    	}

    	public function count_all($where = array()) {
	        if($where != NULL){
	            $query = $this->db->select('*')
	                ->from('count_view')
	                ->where($where)
	                ->get();
	        }else{
	            $query = $this->db->select('*')
	                ->from('count_view')
	                ->get();
	        }

	        return $query->num_rows();
	    }

	    public function update($guest_id, $data){
	        $this->db->set($data)
	            ->where('guest_id', $guest_id)
	            ->update('count_view');
	        if($this->db->affected_rows() == 1){
	            return true;
	        }

	        return false;
	    }

	    public function delete($time){
	        $this->db->delete('count_view', array('created_at <' => $time)); 

	        if($this->db->affected_rows() == 1){
	            return true;
	        }

	        return false;
	    }

	    public function fetch_all(){
        $query = $this->db->select('*')
            ->from('count_view')
            ->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }
	}
?>