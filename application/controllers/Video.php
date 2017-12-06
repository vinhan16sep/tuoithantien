<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('video_model');
    }

    public function index(){

        $this->render('video_view');
    }

}
