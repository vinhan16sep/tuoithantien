<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('library_model');
    }

    public function index(){
    	$list = $this->library_model->fetch_all();
    	$this->data['list'] = $list;

        $this->render('image_view');
    }

}
