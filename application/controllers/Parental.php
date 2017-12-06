<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parental extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('parental_model');
    }

    public function activity(){

        $this->render('parental_activity_view');
    }

    public function list(){

        $this->render('list_parental_view');
    }
}
