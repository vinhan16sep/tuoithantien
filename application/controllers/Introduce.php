<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Introduce extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('introduce_model');
    }

    public function index(){
        $this->data['item'] = $this->introduce_model->fetch_by_id(1);
        $this->render('about_us_view');
    }

    public function vision(){
        $this->data['item'] = $this->introduce_model->fetch_by_id(2);
        $this->render('vision_view');
    }

    public function destiny(){
        $this->data['item'] = $this->introduce_model->fetch_by_id(3);
        $this->render('destiny_view');
    }

    public function indentify(){
        $this->data['item'] = $this->introduce_model->fetch_by_id(4);
        $this->render('indentify_view');
    }

    public function clause(){
        $this->data['item'] = $this->introduce_model->fetch_by_id(5);
        $this->render('clause_view');
    }

    public function image_library(){
        $this->data['item'] = $this->introduce_model->fetch_by_id(6);
        $this->render('image_library_view');
    }
}
