<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('activity_model');
    }

    public function index(){
    	$id = 1;
    	$where = array('category' => $id);
    	$limit = 3;
    	$start = 0; 
    	$list = $this->activity_model->fetch_all($where, $limit, $start);
    	$this->data['list'] = $list;
    	
        $this->render('activity_view');
    }

}
