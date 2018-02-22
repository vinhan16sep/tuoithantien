<?php
/**
* 
*/
class View_month_model extends CI_Model
{
	
	function __construct(){
		parent::__construct();
	}

	public function insert($data){
        $this->db->set($data)
            ->insert('view_month');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
	}

	public function count_all($where = array()) {
        if($where != NULL){
            $query = $this->db->select('SUM(total)')
                ->from('view_month')
                ->where($where)
                ->get();
        }else{
            $query = $this->db->select('*')
                ->from('view_month')
                ->get();
        }

        return $query->row_array();
    }

    public function check_day($time){
    	$query = $this->db->select('*')->from('view_month')->where('created_at', $time)->get();
    	if($this->db->affected_rows() >= 1){
    		return false;
    	}
    	return true;
    }

    public function delete($time){
        $this->db->delete('view_month', array('created_at <' => $time)); 

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
}