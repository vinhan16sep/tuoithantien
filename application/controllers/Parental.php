<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parental extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('parental_model');
    }

    protected function list_slug($slug){
        switch ($slug) {
            case 'lien-lac':
                $category = 1;
                break;
            case 'thuc-don':
                $category = 2;
                break;
            case 'y-te':
                $category = 3;
                break;
            case 'ky-luat':
                $category = 4;
                break;
            default:
                # code...
                break;
        }
        return $category;
    }

    public function activity(){
        $this->load->model('comment_model');
        $slug = $this->uri->segment(1);
        $check_slug = array('che-do-sinh-hoat-1-ngay', 'gio-dua-don');
        if(in_array($slug, $check_slug) == false){
            redirect('trang-chu','refresh');
        }
        $where = array('category' => 0, 'slug' => $slug);
        $activity = $this->parental_model->fetch_row($where);
        $this->data['activity'] = $activity;

        //comment
        $comment = $this->comment($slug);
        if($comment){
            $this->data['comment'] = $comment;
        }

        $this->render('parental_activity_view');
    }

    public function show_list(){
        $slug = $this->uri->segment(2);
        $check_slug = array('lien-lac', 'thuc-don', 'y-te', 'ky-luat');
        if(in_array($slug, $check_slug) == false){
            redirect('trang-chu','refresh');
        }
        
        $category = $this->list_slug($slug);

        $where = array('category' => $category);
        $list = $this->parental_model->fetch_all($where, 9, 0);
        if($list){
            $this->data['list'] = $list;
        }else{
            $this->data['list'] = '';
        }
        
        $this->render('list_parental_view');
    }

    public function detail(){
        $sub_category = $this->uri->segment(2);
        
        $category = $this->list_slug($sub_category);

        $slug = $this->uri->segment(3);
        $where = array('slug' => $slug);
        $total = $this->parental_model->count_all($where);
        if($total == 0){
            redirect('gioi-thieu','refresh');
        }

        $this->data['sub_category'] = $sub_category;
        $this->data['slug'] = $slug;

        $where = array('category' => $category, 'slug !=' => $slug);

        $list = $this->parental_model->fetch_all($where, 5, 0);
        if($list){
            $this->data['list'] = $list;
        }else{
            $this->data['list'] = '';
        }

        $where = array('slug' => $slug);
        $detail = $this->parental_model->fetch_row($where);
        $this->data['detail'] = $detail;
        //comment
        $comment = $this->comment($slug);
        if($comment){
            $this->data['comment'] = $comment;
        }

        $this->render('detail_parental_view');
    }
}
