<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('video_model');
    }

    public function index(){

    	$video = $this->video_model->fetch_all_pagination(9, 0);
    	$this->data['list'] = $video;
        $this->render('list_video_view');
    }

}
