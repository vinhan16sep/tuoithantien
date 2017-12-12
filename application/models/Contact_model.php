<?php

class Contact_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function fetch_all_pagination($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('subcribe');
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_all() {
        $query = $this->db->select('*')
            ->from('subcribe')
            ->get();

        return $query->num_rows();
    }

    public function save($data){
        $this->db->set($data)
            ->insert('subcribe');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }

    public function add_survey($data){
        $this->db->set($data)
            ->insert('survey');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }

    public function count_survey(){
        $query = $this->db->select('*');
        $result = array(
            'option_1' => $query->from('survey')->where('option', 1)->get()->num_rows(),
            'option_2' => $query->from('survey')->where('option', 2)->get()->num_rows(),
            'option_3' => $query->from('survey')->where('option', 3)->get()->num_rows(),
            'option_4' => $query->from('survey')->where('option', 4)->get()->num_rows()
        );

        return $result;
    }
}