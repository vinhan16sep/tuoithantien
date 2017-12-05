<?php 

class Comment_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function fetch_all($where = array(),$limit = NULL, $start = NULL){
        $query = $this->db->select('*')
            ->from('comment')
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
            ->from('comment')
            ->where('is_deleted', 0)
            ->where($where)
            ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }

        return false;
    }

    public function delete($id){
    	$this->db->delete('comment', array('id' => $id)); 
    }
}

 ?>