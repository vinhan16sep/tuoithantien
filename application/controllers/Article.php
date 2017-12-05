<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('article_model');
    }

    public function index() {
        $this->data['articles'] = $this->article_model->fetch_all('article');

        $this->render('article_view');
    }

    public function detail($id = null){
        $article_id = isset($id) ? (int) $id : (int) $this->input->post('id');

        $this->data['article'] = $this->article_model->fetch_by_id('article', $article_id);

        if (!$this->data['article']) {
            redirect('', 'refresh');
        }

        $this->render('article_detail_view');
    }

    public function news(){
        $this->data['articles'] = $this->article_model->fetch_all_by_type(0);

        $this->render('news_view');
    }

    public function recruitment(){
        $this->data['articles'] = $this->article_model->fetch_all_by_type(1);

        $this->render('recruitment_view');
    }
}
