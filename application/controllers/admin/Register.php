<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14/12/2017
 * Time: 11:18 AM
 */
    class Register extends Admin_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('register_model');
        }

        public function index(){
            $keywords = '';
            $place = '';
            $grade = '';
            if($this->input->get('search')){
                $keywords = $this->input->get('search');
            }
            if($this->input->get('search_place')){
                $place = $this->input->get('search_place');
            }
            if($this->input->get('search_grade')){
                $grade = $this->input->get('search_grade');
            }
            $this->load->library('pagination');
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

            $total_rows  = $this->register_model->count_all();

            if($keywords != ''){
                $where = array('place' => $place, 'grade' => $grade);
                $total_rows  = $this->register_model->count_all(null,$keywords);
            }

            if($place != ''){
                $where = array('place' => $place);
                $total_rows  = $this->register_model->count_all($where);
            }

            if($grade != ''){
                $where = array('grade' => $grade);
                $total_rows  = $this->register_model->count_all($where);
            }


            $config = array();
            $base_url = base_url() . 'admin/register/index';
            $per_page = 10;
            $uri_segment = 4;
            $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

            $this->pagination->initialize($config);
            $this->data['page_links'] = $this->pagination->create_links();

            $result = $this->register_model->fetch_all(null, $per_page, $page);
            if($keywords != ''){
                $result = $this->register_model->fetch_all(null, $per_page, $page, $keywords);
            }

            if($place != ''){
                $where = array('place' => $place);
                $result = $this->register_model->fetch_all($where, $per_page, $page);
            }
            if($grade != ''){
                $where = array('grade' => $grade);
                $result = $this->register_model->fetch_all($where, $per_page, $page);
            }

            $this->data['register'] = $result;
            $this->data['search'] = $keywords;

            $this->render('admin/register/list_register_view');
        }
    }