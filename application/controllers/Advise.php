<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Advise extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('advise_model');
    }

    public function index() {
        $this->data['advise_categories'] = $this->advise_model->fetch_all('advise_category');
        $this->data['advises'] = $this->advise_model->fetch_all('advise');

        $this->render('advise_view');
    }

    public function detail($id = null){
        $advise_id = isset($id) ? (int) $id : (int) $this->input->post('id');

        $this->data['advise_categories'] = $this->advise_model->fetch_all('advise_category');
        $this->data['advise'] = $this->advise_model->fetch_by_id('advise', $advise_id);

        if (!$this->data['advise']) {
            redirect('', 'refresh');
        }

        $this->render('advise_detail_view');
    }

    public function list_advise_in_category($id){
        $this->data['advise_categories'] = $this->advise_model->fetch_all('advise_category');
        $this->data['advises'] = $this->advise_model->fetch_all_advise_in_category($id);

        $this->render('advise_by_category_view');
    }
}
