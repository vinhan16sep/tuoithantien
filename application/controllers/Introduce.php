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

    public function show_list(){
        $slug = $this->uri->segment(2);
        $this->data['slug'] = $slug;
        $check_slug =  array('muc-tieu', 'ngoai-ngu', 'giao-duc-theo-lua-tuoi', 'tap-huan', 'ngoai-khoa');
        if(in_array($slug, $check_slug) == false){
            redirect('gioi-thieu','refresh');
        }
        $where = array('sub_category' => $slug);
        if($slug == 'ngoai-khoa'){
            $where = array('category' => 2);
        }
        $list = $this->introduce_model->fetch_all($where, 9, 0);
        if($list){
            $this->data['list'] = $list;
        }else{
            $this->data['list'] = '';
        }
        
        $this->render('list_introduce_view');
    }

    public function detail(){
        $sub_category = $this->uri->segment(2);

        $slug = $this->uri->segment(3);
        $where = array('slug' => $slug);
        $total = $this->introduce_model->count_all($where);
        if($total == 0){
            redirect('gioi-thieu','refresh');
        }

        $this->data['sub_category'] = $sub_category;
        $this->data['slug'] = $slug;

        $where = array('sub_category' => $sub_category, 'slug !=' => $slug);
        if($sub_category == 'ngoai-khoa'){
            $where = array('category' => 2);
        }
        $list = $this->introduce_model->fetch_all($where, 5, 0);
        if($list){
            $this->data['list'] = $list;
        }else{
            $this->data['list'] = '';
        }
        

        $where = array('slug' => $slug);
        $detail = $this->introduce_model->fetch_row($where);
        $this->data['detail'] = $detail;

        //comment
        $comment = $this->comment($slug);
        if($comment){
            $this->data['comment'] = $comment;
        }
        
        
        $this->render('detail_introduce_view');
    }
}
