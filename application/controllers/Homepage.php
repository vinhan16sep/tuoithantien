<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('introduce_model');
        $this->load->model('activity_model');
        $this->load->model('banner_model');
        $this->load->model('video_model');
    }

    public function index(){
        //Thông báo nhà trường
//        $where = array('category' => 1);
//        $notify = $this->activity_model->fetch_all($where, 3, 0);
//        $this->data['notify'] = $notify;

        //Chia sẻ kinh nghiệm hay
//        $where = array('category' => 3);
//        $experience = $this->activity_model->fetch_all($where, 3, 0);
//        $this->data['experience'] = $experience;

        $banner = $this->banner_model->get_all();
        $this->data['banner'] = $banner;
        $this->render('homepage_view');
    }
}
