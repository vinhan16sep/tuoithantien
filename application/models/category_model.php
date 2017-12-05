<?php 
class Category_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	public function get_list(){
		this->db->select('*');
        $this->db->from('banner');
        $this->db->where('is_deleted', 0);

        $result = $this->db->get()->result_array();

        return $result;
	}
}
 ?>