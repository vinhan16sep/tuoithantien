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
        $this->load->model('admission_model');

        //side activity
        $activity = $this->activity_model->fetch_all_pagination(6, 0);
        if($activity){
            foreach ($activity as $key => $value) {
                $where = array('id' => $value['category_id']);
                $sub = $this->activity_model->fetch_row($where, 'activity_category');
                $activity[$key]['sub'] = $sub['slug'];
            }
        }
        $this->data['activity'] = $activity;
        // print_r($activity);die;

        //Thông tin nhập học
        $admission = $this->admission_model->fetch_all_pagination(3, 0);
        if($admission){
            foreach ($admission as $key => $value) {
                $where = array('id' => $value['category_id']);
                $sub = $this->admission_model->fetch_row($where, 'admission_category');
                $admission[$key]['sub'] = $sub['slug'];
            }
        }
        $this->data['admission'] = $admission;

        //phối hợp cùng phụ huynh
        $where = array('slug' => 'y-kien-phu-huynh');
        $category = $this->parental_model->fetch_row($where, 'parental_category');
        
        $where = array('category_id != ' => $category['id']);
        $experience = $this->parental_model->get_all_pagination($where, 3, 0);
        if($experience){
            foreach ($experience as $key => $value) {
                $where = array('id' => $value['category_id']);
                $sub = $this->parental_model->fetch_row($where, 'parental_category');
                $experience[$key]['sub'] = $sub['slug'];
            }
        }
        $this->data['experience'] = $experience;

        //ý kiến phụ huynh
        $slug = 'y-kien-phu-huynh';
        $where = array('slug' => $slug);
        $parental_category = $this->parental_model->fetch_row($where, 'parental_category');
        $where = array('category_id' => $parental_category['id']);
        $parent_comments = $this->parental_model->get_all_pagination($where, 3, 0);
        $this->data['parent_comments'] = $parent_comments;

        $banner = $this->banner_model->get_all();
        $this->data['banner'] = $banner;
        $this->render('homepage_view');
    }
}
