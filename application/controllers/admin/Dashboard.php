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
        $active = $this->theme_model->fetch_row();
        $not_article = array('is_active' => 0);
        $article = array('is_active' => 1);
        $this->theme_model->update($active['id'], $not_article);
        $this->theme_model->update($id, $article);
        if($this->theme_model->update($active['id'], $not_article) && $this->theme_model->update($id, $article)){
            $isExists = false;
        }else{
            $isExists = true;
        }
        $this->output->set_status_header(200)->set_output(json_encode(array('isExists' => $isExists)));
    }

    public function fetch_survey(){
    }
}