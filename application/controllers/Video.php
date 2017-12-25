<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('video_model');
    }

    public function index(){
        $this->data['meta']['description'] = 'Thư viện video';
        $this->load->library('pagination');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $total_rows = count($this->video_model->fetch_all_pagination());

        $config = array();
        $base_url = base_url() . 'thu-vien/video';
        $per_page = 3;
        $uri_segment = 3;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

    	$video = $this->video_model->fetch_all_pagination($per_page, $page);
    	$this->data['list'] = $video;
        $this->render('list_video_view');
    }

}
