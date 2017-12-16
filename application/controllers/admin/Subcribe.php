<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/12/2017
 * Time: 5:39 PM
 */
    class Subcribe extends Admin_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('subcribe_model');
        }

        public function index(){
            $this->output->enable_profiler(TRUE);
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->library('pagination');
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $total_rows = count($this->subcribe_model->fetch_all());
            $config = array();
            $base_url = base_url() . 'admin/subcribe/index';
            $per_page = 10;
            $uri_segment = 4;
            $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

            $this->pagination->initialize($config);

            $this->data['page_links'] = $this->pagination->create_links();


            $subcribes = $this->subcribe_model->fetch_all($per_page, $page);
            $this->data['subcribes'] = $subcribes;
            $this->render('admin/subcribe_view');
        }

        public function send_mail_all(){

        }
    }