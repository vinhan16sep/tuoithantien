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
        $this->load->model('activity_model');
        $this->load->model('parental_model');
        //Thông báo nhà trường
        $slug = 'thong-bao-nha-truong';
        $activity_category = $this->activity_model->get_type('activity_category', $slug);
        $notify = $this->activity_model->fetch_limit(3, 0, $activity_category['id']);
        $this->data['notify'] = $notify;

        //Chia sẻ kinh nghiệm hay
        $slug = 'chia-se-kinh-nghiem-hay';
        $parental_category = $this->parental_model->get_type('parental_category', $slug);
        $experience = $this->parental_model->fetch_limit(3, 0, $parental_category['id']);
        $this->data['experience'] = $experience;
//        print_r($experience);die;

        $banner = $this->banner_model->get_all();
        $this->data['banner'] = $banner;
        $this->render('homepage_view');
    }
}
