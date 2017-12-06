<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('image_model');
    }

    public function index(){

        $this->render('image_view');
    }

}
