<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('library_model');
    }

    public function index(){
        $this->load->model('image_model');

        $list = $this->library_model->fetch_all(null, 9, 0);
        if(!empty($list)){
            foreach ($list as $key => $value) {
                $where = array('image_id' => $value['id']);
                $image = $this->image_model->fetch_row($where);
                $list[$key]['sub_image'] = $image['image'];
            }
        }
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
