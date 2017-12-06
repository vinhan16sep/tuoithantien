<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parental extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('parental_model');
    }

    public function activity(){
        $slug = $this->uri->segment(3);
        $where = array('category' => 0, 'slug' => $slug);
        $activity = $this->parental_model->fetch_row($where);
        $this->render('parental_activity_view');
    }

    public function list(){
        $slug = $this->uri->segment(3);
        $where = array('category' => 1, 'slug' => $slug);
        $list = $this->parental_model->fetch_all($where);
        print_r($list);
        $this->render('list_parental_view');
    }
}
