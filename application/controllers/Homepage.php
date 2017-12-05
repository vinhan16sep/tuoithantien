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
        $this->data['banners'] = $this->banner_model->get_all();
        $this->data['videos'] = $this->video_model->fetch_all();
        $this->data['latest_products'] = $this->product_model->fetch_latest_products();
        $this->data['feature_products'] = $this->product_model->fetch_feature_products();
        $this->data['latest_articles'] = $this->article_model->fetch_latest_articles(4);

        $this->render('homepage_view');
    }
}
