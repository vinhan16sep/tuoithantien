<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Introduce extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('introduce_model');
    }

    public function index(){

        $slug = $this->uri->segment(2);
        $sidebar = $this->introduce_model->fetch_all('introduce_category');
        $this->data['sidebar'] = $sidebar;

        $where = array('slug' => $slug);
        $category = $this->introduce_model->fetch_row($where, 'introduce_category');
        $where = array('category_id' => $category['id']);
        $this->data['meta']['description'] = $category['title'];

        $this->load->library('pagination');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_rows = count($this->introduce_model->get_all_pagination($where));
        $config = array();
        $base_url = base_url() . 'gioi-thieu/'.$slug;
        $per_page = 12;
        $uri_segment = 3;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $list = $this->introduce_model->get_all_pagination($where, $per_page, $page);
        if($list){
            foreach ($list as $key => $value){
                $where = array('id' => $value['category_id']);
                $sub = $this->introduce_model->fetch_row($where, 'introduce_category');
                $list[$key]['sub'] = $sub['slug'];
            }
        }

        $this->data['list'] = $list;

        $this->render('list_introduce_view');
    }

    public function detail(){
        $slug = $this->uri->segment(3);
        $where = array('slug' => $slug);
        $description = $this->introduce_model->fetch_row($where);
        $this->data['meta']['description'] = $description['title'];

        $category_id = $this->uri->segment(2);
        $where = array('slug' => $category_id);
        $category = $this->introduce_model->fetch_row($where, 'introduce_category');
        $this->data['category'] = $category;
        $sidebar = $this->introduce_model->fetch_all_by_type($category['id']);
        $this->data['sidebar'] = $sidebar;

        $where = array('slug' => $slug);
        $detail = $this->introduce_model->fetch_row($where);
        $this->data['detail'] = $detail;

        //comment
        $comment = $this->comment('introduce', $slug);
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

        $this->render('detail_introduce_view');
    }

//    public function show_list(){
//        $slug = $this->uri->segment(2);
//        $this->data['slug'] = $slug;
//        $check_slug =  array('muc-tieu', 'ngoai-ngu', 'giao-duc-theo-lua-tuoi', 'tap-huan', 'ngoai-khoa');
//        if(in_array($slug, $check_slug) == false){
//            redirect('gioi-thieu','refresh');
//        }
//        $where = array('sub_category' => $slug);
//        if($slug == 'ngoai-khoa'){
//            $where = array('category' => 2);
//        }
//
//        $this->load->library('pagination');
//        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//
//        $total_rows = count($this->introduce_model->fetch_all($where));
//
//        $config = array();
//        $base_url = base_url() . 'gioi-thieu/'.$slug;
//        $per_page = 12;
//        $uri_segment = 3;
//        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);
//
//        $this->pagination->initialize($config);
//        $this->data['page_links'] = $this->pagination->create_links();
//
//        $list = $this->introduce_model->fetch_all($where, $per_page, $page);
//        if($list){
//            $this->data['list'] = $list;
//        }else{
//            $this->data['list'] = '';
//        }
//
//        $this->render('list_introduce_view');
//    }
}
