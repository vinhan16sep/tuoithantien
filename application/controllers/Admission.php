<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('Admission_model');
    }

    public function admission_procedure(){

        $this->render('admission_procedure_view');
    }

    public function list(){

        $this->render('list_admission_view');
    }
}
