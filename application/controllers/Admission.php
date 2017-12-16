<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('admission_model');
    }

    public function index(){

        $slug = $this->uri->segment(2);
        $sidebar = $this->admission_model->fetch_all('admission_category');
        $this->data['sidebar'] = $sidebar;

        $where = array('slug' => $slug);
        $category = $this->admission_model->fetch_row($where, 'admission_category');
        $where = array('category_id' => $category['id']);

        $this->load->library('pagination');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_rows = count($this->admission_model->get_all_pagination($where));
        $config = array();
        $base_url = base_url() . 'thong-tin-nhap-hoc/'.$slug;
        $per_page = 12;
        $uri_segment = 3;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $list = $this->admission_model->get_all_pagination($where, $per_page, $page);
        if($list){
            foreach ($list as $key => $value){
                $where = array('id' => $value['category_id']);
                $sub = $this->admission_model->fetch_row($where, 'admission_category');
                $list[$key]['sub'] = $sub['slug'];
            }
        }

        $this->data['list'] = $list;

        $this->render('list_admission_view');
    }

    public function detail(){
        $slug = $this->uri->segment(3);
        $category_id = $this->uri->segment(2);
        $where = array('slug' => $category_id);
        $category = $this->admission_model->fetch_row($where, 'admission_category');
        $this->data['category'] = $category;
        $sidebar = $this->admission_model->fetch_all_by_type($category['id']);
        $this->data['sidebar'] = $sidebar;

        $where = array('slug' => $slug);
        $detail = $this->admission_model->fetch_row($where);
        $this->data['detail'] = $detail;

        //comment
        $comment = $this->comment('admission', $slug);
        if($comment){
            $this->data['comment'] = $comment;
        }
        //count comment
        $count_comment = $this->count_comment($slug);
        if($count_comment){
            $this->data['count_comment'] = count($count_comment);
        }else{
            $this->data['count_comment'] = 0;
        }

        $this->render('detail_admission_view');
    }
}
