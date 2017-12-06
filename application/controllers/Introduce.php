<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Introduce extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('introduce_model');
    }

    public function index(){
        $where =  array('category' => 0);
        $overview = $this->introduce_model->fetch_row($where);
        $this->data['overview'] = $overview;
        $this->render('introduce_view');
    }

    public function list(){
        $slug = $this->uri->segment(2);
        $where = array('sub_category' => $slug);
        if($slug == 'ngoai-khoa'){
            $where = array('category' => 2);
        }
        $list = $this->introduce_model->fetch_all($where, 9, 0);
        $this->data['list'] = $list;
        $this->render('list_introduce_view');
    }

    public function detail(){
        $this->load->model('comment_model');
        $sub_category = $this->uri->segment(2);
        $slug = $this->uri->segment(3);

        $this->data['sub_category'] = $sub_category;
        $this->data['slug'] = $slug;

        $where = array('sub_category' => $sub_category);
        if($sub_category == 'ngoai-khoa'){
            $where = array('category' => 2);
        }
        $list = $this->introduce_model->fetch_all($where, 5, 0);
        $this->data['list'] = $list;

        $where = array('slug' => $slug);
        $detail = $this->introduce_model->fetch_row($where);
        $this->data['detail'] = $detail;

        //comment
        $where = array('slug' => $slug);
        $comment = $this->comment_model->fetch_all($where);
        if($comment){
            $this->data['comment'] = $comment;
        }
        
        
        $this->render('detail_introduce_view');
    }
}
