<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('contact_model');
    }

    public function index(){
        $this->load->model('theme_model');
        $this->data['themes'] = $this->theme_model->fetch_all();

        $this->data['count'] = $this->contact_model->count_survey();

        $this->render('admin/dashboard_view');
    }

    public function edit_theme(){
        $this->load->model('theme_model');
        $id = $this->input->get('id');
        echo $id;
    }

    public function fetch_survey(){
    }
}