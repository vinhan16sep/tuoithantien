<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('product_model');
        $this->load->model('article_model');
        $this->load->model('banner_model');
        $this->load->model('video_model');
    }

    public function index(){
        $banner = $this->banner_model->get_all();
        $this->data['banner'] = $banner;
        $this->render('homepage_view');
    }
}
