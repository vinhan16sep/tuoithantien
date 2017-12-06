<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('activity_model');
    }

    public function index(){

        $this->render('activity_view');
    }

}
