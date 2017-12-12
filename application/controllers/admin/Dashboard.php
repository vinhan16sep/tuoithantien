<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('contact_model');
    }

    public function index(){
        $this->data['count'] = $this->contact_model->count_survey();
        $this->render('admin/dashboard_view');
    }

    public function fetch_survey(){
    }
}