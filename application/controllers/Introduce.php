<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Introduce extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('introduce_model');
    }

    public function index(){
        $this->output->enable_profiler(TRUE);

        $this->render('introduce_view');
    }

    public function overview(){

        $this->render('overview_view');
    }
}
