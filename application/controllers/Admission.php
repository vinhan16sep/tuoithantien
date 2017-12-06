<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('admission_model');
    }

    public function admission_procedure(){
        $slug = $this->uri->segment(3);
        $where = array('category' => 0, 'slug' => $slug);
        $list = $this->admission_model->fetch_row($where);
        
        $this->render('admission_procedure_view');
    }

    public function list(){
        $id = 1;
        $where = array('category' => $id);
        $limit = 3;
        $start = 0; 
        $list = $this->admission_model->fetch_all($where, $limit, $start);
        $this->data['list'] = $list;

        $this->render('list_admission_view');
    }
}
