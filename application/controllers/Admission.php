<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('admission_model');
    }

    protected function list_slug($slug){
        switch ($slug) {
            case 'hoc-phi':
                $category = 1;
                break;
            case 'chuong-trinh-khuyen-mai':
                $category = 2;
                break;
            default:
                # code...
                break;
        }
        return $category;
    }

    public function admission_procedure(){
        $this->load->model('comment_model');
        $slug = $this->uri->segment(2);
        $check_slug = array('thu-tuc-nhap-hoc', 'lich-hoc');
        if(in_array($slug, $check_slug) == false){
            redirect('trang-chu','refresh');
        }
        $where = array('category' => 0, 'slug' => $slug);
        $admission = $this->admission_model->fetch_row($where);
        $this->data['admission'] = $admission;

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

        $this->render('admission_procedure_view');
    }

    public function show_list(){
        $slug = $this->uri->segment(3);
        $check_slug = array('hoc-phi', 'chuong-trinh-khuyen-mai');
        if(in_array($slug, $check_slug) == false){
            redirect('trang-chu','refresh');
        }
        
        $category = $this->list_slug($slug);

        $this->load->library('pagination');
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $where = array('category' => $category);

        $total_rows = count($this->admission_model->fetch_all($where));

        $config = array();
        $base_url = base_url() . 'thong-tin-nhap-hoc/danh-sach/'.$slug;
        $per_page = 12;
        $uri_segment = 4;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();


        $list = $this->admission_model->fetch_all($where, $per_page, $page);
        if($list){
            $this->data['list'] = $list;
        }else{
            $this->data['list'] = '';
        }

        $this->render('list_admission_view');
    }

    public function detail(){
        $sub_category = $this->uri->segment(2);
        
        $category = $this->list_slug($sub_category);

        $slug = $this->uri->segment(3);
        $where = array('slug' => $slug);
        $total = $this->admission_model->count_all($where);
        if($total == 0){
            redirect('gioi-thieu','refresh');
        }

        $this->data['sub_category'] = $sub_category;
        $this->data['slug'] = $slug;

        $where = array('category' => $category, 'slug !=' => $slug);

        $list = $this->admission_model->fetch_all($where, 5, 0);
        if($list){
            $this->data['list'] = $list;
        }else{
            $this->data['list'] = '';
        }

        $where = array('slug' => $slug);
        $detail = $this->admission_model->fetch_row($where);
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

        $this->render('detail_admission_view');
    }
}
