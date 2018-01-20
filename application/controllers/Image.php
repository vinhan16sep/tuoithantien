<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('library_model');
    }

    public function index(){
        $this->output->enable_profiler(TRUE);
        $this->load->model('image_model');
        $this->data['meta']['description'] = 'Thư viện ảnh';

        $this->load->library('pagination');
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $total_rows = count($this->library_model->fetch_all());

        $config = array();
        $base_url = base_url() . 'thu-vien/thu-vien-anh';
        $per_page = 12;
        $uri_segment = $page;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $list = $this->library_model->fetch_all(null, $per_page, $page);

        if(!empty($list)){
            foreach ($list as $key => $value) {
                $where = array('image_id' => $value['id']);
                $image = $this->image_model->fetch_row($where);
                $list[$key]['sub_image'] = $image['image'];
            }
        }
//        print_r($list);die;
        $this->data['list'] = $list;


        $this->render('list_image_view');
    }

    public function detail(){
        $slug = $this->uri->segment(3);
        $where = array('slug' => $slug);
        $library = $this->library_model->fetch_row($where);
        if(!$library){
            redirect('trang-chu','refresh');
        }

        $list = $this->library_model->fetch_all(null, 5, 0);

        $this->load->model('image_model');
        $where = array('image_id' => $library['id']);
        $images = $this->image_model->fetch_all($where);

        $this->data['images'] = $images;
        $this->data['library'] = $library;
        $this->data['list'] = $list;

        $this->render('detail_image_view');
    }

}
