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
            $this->load->model('placement_model');
            $this->load->model('classification_model');
            $placement = $this->placement_model->fetch_all();
            $this->data['placement'] = $placement;

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

            $where = array('status' => 0);
            $result = $this->register_model->fetch_all($where, $per_page, $page);
            if($keywords != ''){
                $result = $this->register_model->fetch_all($where, $per_page, $page, $keywords);
            }

            if($place != ''){
                $where = array('place' => $place, 'status' => 0);
                $result = $this->register_model->fetch_all($where, $per_page, $page);
            }
            if($grade != ''){
                $where = array('grade' => $grade, 'status' => 0);
                $result = $this->register_model->fetch_all($where, $per_page, $page);
            }


            if($result){
                foreach ($result as $key => $value){
                    $sub_place = $this->placement_model->fetch_by_id($value['place']);
                    $result[$key]['sub_place'] = $sub_place['name'];
                    $sub_grade = $this->classification_model->fetch_by_id($value['grade']);
                    $result[$key]['sub_grade'] = $sub_grade['name'];
                }
            }
            $this->data['register'] = $result;
            $this->data['search'] = $keywords;

            $this->render('admin/register/list_register_view');
        }

        public function select_class(){
            $this->load->model('classification_model');
            $placement_id = $this->input->get('search_place');
            $where =  array('placement_id' => $placement_id);
            $classification = $this->classification_model->fetch_all($where);
            if($classification){
                foreach ($classification as $value){
                    echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
//                $this->output->set_status_header(200)->set_output(json_encode(array('classification' => $result)));
                }
            }
        }

        public function call_back(){
            $id = $this->input->get('id');
            $where = array('callback' => 2);
            $this->register_model->update($id, $where);
        }

        public function finish(){
            $id = $this->input->get('id');
            $where = array('status' => 1);
            $this->register_model->update($id, $where);
        }

        public function register_finish(){
            $this->load->model('placement_model');
            $this->load->model('classification_model');
            $placement = $this->placement_model->fetch_all();
            $this->data['placement'] = $placement;

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
            $base_url = base_url() . 'admin/register/register_finish';
            $per_page = 10;
            $uri_segment = 4;
            $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

            $this->pagination->initialize($config);
            $this->data['page_links'] = $this->pagination->create_links();

            $where = array('status' => 1);
            $result = $this->register_model->fetch_all($where, $per_page, $page);
            if($keywords != ''){
                $result = $this->register_model->fetch_all($where, $per_page, $page, $keywords);
            }

            if($place != ''){
                $where = array('place' => $place, 'status' => 1);
                $result = $this->register_model->fetch_all($where, $per_page, $page);
            }
            if($grade != ''){
                $where = array('grade' => $grade, 'status' => 1);
                $result = $this->register_model->fetch_all($where, $per_page, $page);
            }

            if($result){
                foreach ($result as $key => $value){
                    $sub_place = $this->placement_model->fetch_by_id($value['place']);
                    $result[$key]['sub_place'] = $sub_place['name'];
                    $sub_grade = $this->classification_model->fetch_by_id($value['grade']);
                    $result[$key]['sub_grade'] = $sub_grade['name'];
                }
            }

            $this->data['register'] = $result;
            $this->data['search'] = $keywords;

            $this->render('admin/register/list_register_finish_view');
        }
    }