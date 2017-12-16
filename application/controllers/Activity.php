<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('activity_model');
    }

    public function index(){

        $slug = $this->uri->segment(2);
        $sidebar = $this->activity_model->fetch_all('activity_category');
        $this->data['sidebar'] = $sidebar;

        $where = array('slug' => $slug);
        $category = $this->activity_model->fetch_row($where, 'activity_category');
        $where = array('category_id' => $category['id']);


        $this->load->library('pagination');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $total_rows = count($this->activity_model->get_all_pagination($where));

        $config = array();
        $base_url = base_url() . 'hoat-dong/'.$slug;
        $per_page = 12;
        $uri_segment = 3;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $list = $this->activity_model->get_all_pagination($where, $per_page, $page);

        if($list){
            foreach ($list as $key => $value){
                $where = array('id' => $value['category_id']);
                $sub = $this->activity_model->fetch_row($where, 'activity_category');
                $list[$key]['sub'] = $sub['slug'];
            }
        }
        $this->data['list'] = $list;
        $this->render('list_activity_view');
    }

    public function detail(){
//        $this->output->enable_profiler(TRUE);
        $slug = $this->uri->segment(3);
        $category_id = $this->uri->segment(2);
        $where = array('slug' => $category_id);
        $category = $this->activity_model->fetch_row($where, 'activity_category');
        $this->data['category'] = $category;
        $sidebar = $this->activity_model->fetch_all_by_type($category['id']);
        $this->data['sidebar'] = $sidebar;

        $where = array('slug' => $slug);
        $detail = $this->activity_model->fetch_row($where);
        $this->data['detail'] = $detail;

        //comment
        $comment = $this->comment('activity', $slug);
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

        $this->render('detail_activity_view');
    }

}
