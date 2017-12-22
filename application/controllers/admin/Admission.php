<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admission_model');
        $this->load->library('session');
        $this->data['categories'] = $this->dropdown_category();
    }

    public function index() {
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/admission/index';
        $total_rows = $this->admission_model->count_all();
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['admission'] = $this->admission_model->fetch_all_pagination($per_page, $this->data['page']);

        $this->render('admin/admission/list_admission_view');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('image', 'Image', 'callback_check_file_selected');

        if ($this->form_validation->run() == FALSE) {
            $this->data['categories'] = $this->dropdown_category();
            $this->render('admin/admission/create_admission_view');
        } else {
            if ($this->input->post()) {
                $slug = $this->input->post('slug');
                $unique_slug = $this->admission_model->build_unique_slug($slug);
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/admission', 'assets/upload/admission/thumbs');

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug'          => $unique_slug,
                    'category_id'      => $this->input->post('category'),
                    'image' => $image,
                    'description' => $this->input->post('description'),
                    'content' => $this->input->post('content'),
                    'created_at' => $this->author_info['created_at'],
                    'created_by' => $this->author_info['created_by'],
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $insert = $this->admission_model->insert('admission', $data);
                if (!$insert) {
                    $this->session->set_flashdata('message', 'There was an error inserting item');
                }
                $this->session->set_flashdata('message', 'Item added successfully');

                redirect('admin/admission/list_in_category/'.$this->input->post('url'), 'refresh');
            }
        }
    }

    public function edit($request_id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        $id = isset($request_id) ? (int) $request_id : (int) $this->input->post('id');
        $result = $this->admission_model->fetch_by_id('admission', $id);
        if ($this->form_validation->run() == FALSE) {
            $this->data['categories'] = $this->dropdown_category();
            $this->data['admission'] = $result;

            if (!$this->data['admission']) {
                redirect('admin/admission', 'refresh');
            }

            $this->render('admin/admission/edit_admission_view');
        } else {
            if ($this->input->post()) {
                $input_slug = $this->input->post('slug');

                if($result['slug'] == $input_slug){
                    $unique_slug = $this->admission_model->build_unique_slug($input_slug, $result['id']);
                }else{
                    $unique_slug = $this->admission_model->build_unique_slug($input_slug);
                }

                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/admission', 'assets/upload/admission/thumbs');

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug'          => $unique_slug,
                    'category_id'      => $this->input->post('category'),
                    'image' => $image,
                    'description' => $this->input->post('description'),
                    'content' => $this->input->post('content'),
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );
                if ($image == '') {
                    unset($data['image']);
                }

                try {
                    $this->admission_model->update('admission', $id, $data);
                    $this->session->set_flashdata('message', 'Item updated successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error updating the item: ' . $e->getMessage());
                }

                redirect('admin/admission/list_in_category/'.$this->input->post('url'), 'refresh');
            }
        }
    }

    public function remove($id = NULL){
        $id = $this->input->get('id');
        if(!isset($id)){
            redirect('admin/admission', 'refresh');
        }

        $admission = $this->admission_model->fetch_by_id('admission', $id);
        if(!$admission){
            redirect('admin/admission', 'refresh');
        }

        $result = $this->admission_model->delete('admission', $id);
        if($result){
            unlink('assets/upload/admission/'. $admission['image']);
        }else{
            $this->session->set_flashdata('message', 'There was an error when delete item');
        }
        $this->session->set_flashdata('message', 'Item deleted successfully');

        redirect('admin/admission', 'refresh');
    }

    public function category(){
        $this->data['target'] = 'admission';
        $this->data['categories'] = $this->admission_model->fetch_all('admission_category');

        $this->render('admin/category/list_category_view');
    }

    public function list_in_category($type){
        $this->load->model('comment_model');
        $category_id = $this->uri->segment(4);
        $this->data['category_id'] = $category_id;

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/admission/list_in_category/' . $type;
        $total_rows = $this->admission_model->count_all($type);
        $per_page = 10;
        $uri_segment = 5;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(5) : 0;
        $admission = $this->admission_model->fetch_all_by_type($type, $per_page, $this->data['page']);

        if($admission){
            foreach ($admission as $key => $value) {
                $where =  array('category' => 'admission', 'slug' => $value['slug'], 'status' => 0);
                $count = $this->comment_model->count_all($where);
                $admission[$key]['count_comment'] = $count;
            }
        }

        $this->data['admission'] = $admission;
        $this->render('admin/admission/list_admission_view');
    }

    public function create_category(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $this->render('admin/category/create_category_view');
        }else{
            if($this->input->post()){
                $slug = $this->input->post('slug');
                $unique_slug = $this->admission_model->build_unique_slug_category($slug);

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $unique_slug,
                    'created_at' => $this->author_info['created_at'],
                    'created_by' => $this->author_info['created_by'],
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $result = $this->admission_model->insert('admission_category', $data);
                if (!$result) {
                    $this->session->set_flashdata('message', 'There was an error inserting item');
                }
                $this->session->set_flashdata('message', 'Item added successfully');

                redirect('admin/admission/category', 'refresh');
            }
        }
    }

    public function edit_category($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        if(!isset($id)){
            redirect('admin/admission/category', 'refresh');
        }

        $result = $this->admission_model->fetch_by_id('admission_category', $id);

        if($this->form_validation->run() == FALSE) {
            if(!$result){
                redirect('admin/admission/category', 'refresh');
            }

            $this->data['category'] = $result;
            $this->render('admin/category/edit_category_view');
        }else{
            if($this->input->post()){
                $input_slug = $this->input->post('slug');

                if($result['slug'] == $input_slug){
                    $unique_slug = $this->admission_model->build_unique_slug_category($input_slug, $result['id']);
                }else{
                    $unique_slug = $this->admission_model->build_unique_slug_category($input_slug);
                }

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $unique_slug,
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $result = $this->admission_model->update('admission_category', $id, $data);
                if (!$result) {
                    $this->session->set_flashdata('message', 'There was an error when update item');
                }
                $this->session->set_flashdata('message', 'Item updated successfully');

                redirect('admin/admission/category', 'refresh');
            }
        }
    }

    public function remove_category(){
        $id = $this->input->get('id');
        if(!isset($id)){
            redirect('admin/admission/category', 'refresh');
        }

        $category = $this->admission_model->fetch_by_id('admission_category', $id);
        if(!$category){
            redirect('admin/admission/category', 'refresh');
        }

        $result = $this->admission_model->delete('admission_category', $id);
        if (!$result) {
            $this->session->set_flashdata('message', 'There was an error when delete item');
        }
        $this->session->set_flashdata('message', 'Item deleted successfully');

        redirect('admin/admission/category', 'refresh');
    }



    public function dropdown_category(){
        $categories = $this->admission_model->fetch_all('admission_category');
        $titles = array(
            '' => '---Chọn một danh mục---'
        );
        if($categories){
            foreach($categories as $key => $value){
                $titles[$value['id']] = $value['title'];
            }
        }
        return $titles;
    }

    function check_file_selected(){

        $this->form_validation->set_message('check_file_selected', 'Please select file.');
        if (empty($_FILES['image']['name'])) {
            return false;
        }else{
            return true;
        }
    }

}
