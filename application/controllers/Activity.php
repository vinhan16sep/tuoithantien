<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('activity_model');
    }
    protected function list_slug($slug){
        switch ($slug) {
            case 'thong-bao':
                $category = 1;
                break;
            case 'tuyen-sinh':
                $category = 2;
                break;
            case 'trai-nghiem':
                $category = 3;
                break;
            default:
                # code...
                break;
        }
        return $category;
    }

    public function index(){
        $slug = $this->uri->segment(2);
        $this->data['slug'] = $slug;
        $check_slug = array('thong-bao', 'tuyen-sinh', 'trai-nghiem');
        if(in_array($slug, $check_slug) == false){
            redirect('trang-chu','refresh');
        }
        
        $category = $this->list_slug($slug);

        $where = array('category' => $category);

        $this->load->library('pagination');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $total_rows = count($this->activity_model->fetch_all($where));

        $config = array();
        $base_url = base_url() . 'hoat-dong/'.$slug;
        $per_page = 12;
        $uri_segment = 3;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $list = $this->activity_model->fetch_all($where, $per_page, $page);
        if($list){
            $this->data['list'] = $list;
        }else{
            $this->data['list'] = '';
        }
    	
        $this->render('list_activity_view');
    }

    public function detail(){
        $sub_category = $this->uri->segment(2);
        
        $category = $this->list_slug($sub_category);

        $slug = $this->uri->segment(3);
        $where = array('slug' => $slug);
        $total = $this->activity_model->count_all($where);
        if($total == 0){
            redirect('gioi-thieu','refresh');
        }

        $this->data['sub_category'] = $sub_category;
        $this->data['slug'] = $slug;

        $where = array('category' => $category, 'slug !=' => $slug);

        $list = $this->activity_model->fetch_all($where, 5, 0);
        if($list){
            $this->data['list'] = $list;
        }else{
            $this->data['list'] = '';
        }

        $where = array('slug' => $slug);
        $detail = $this->activity_model->fetch_row($where);
        $this->data['detail'] = $detail;

        //comment
        $comment = $this->comment($slug);
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
