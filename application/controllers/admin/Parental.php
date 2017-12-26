<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parental extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('parental_model');
        $this->load->library('session');
        $this->data['categories'] = $this->dropdown_category();
    }

    public function index() {
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/parental/index';
        $total_rows = $this->parental_model->count_all();
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['parental'] = $this->parental_model->fetch_all_pagination($per_page, $this->data['page']);

        $this->render('admin/parental/list_parental_view');
    }

    public function create() {
        $category_id = $this->uri->segment(4);
        $this->data['category_id'] = $category_id;
        $where = array('id' => $category_id);
        $category = $this->parental_model->fetch_row($where, 'parental_category');
        $this->data['slug'] = $category['slug'];
        $this->data['check_slug'] = array('y-kien-phu-huynh');


        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('image', 'Image', 'callback_check_file_selected');

        if ($this->form_validation->run() == FALSE) {
            $this->data['categories'] = $this->dropdown_category();
            $this->render('admin/parental/create_parental_view');
        } else {
            if ($this->input->post()) {
                $slug = $this->input->post('slug');
                $unique_slug = $this->parental_model->build_unique_slug($slug);
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/parental', 'assets/upload/parental/thumbs');

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

                $insert = $this->parental_model->insert('parental', $data);
                if (!$insert) {
                    $this->session->set_flashdata('message', 'There was an error inserting item');
                }
                $this->session->set_flashdata('message', 'Item added successfully');

                redirect('admin/parental/list_in_category/'.$this->input->post('url'), 'refresh');
            }
        }
    }

    public function edit($request_id = NULL) {
        $category_id = $this->uri->segment(4);
        $this->data['category_id'] = $category_id;
        $where = array('id' => $category_id);
        $category = $this->parental_model->fetch_row($where, 'parental_category');
        $this->data['slug'] = $category['slug'];
        $this->data['check_slug'] = array('y-kien-phu-huynh');

        
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        $id = isset($request_id) ? (int) $request_id : (int) $this->input->post('id');
        $result = $this->parental_model->fetch_by_id('parental', $id);
        if ($this->form_validation->run() == FALSE) {
            $this->data['categories'] = $this->dropdown_category();
            $this->data['parental'] = $result;

            if (!$this->data['parental']) {
                redirect('admin/parental', 'refresh');
            }

            $this->render('admin/parental/edit_parental_view');
        } else {
            if ($this->input->post()) {
                $input_slug = $this->input->post('slug');

                if($result['slug'] == $input_slug){
                    $unique_slug = $this->parental_model->build_unique_slug($input_slug, $result['id']);
                }else{
                    $unique_slug = $this->parental_model->build_unique_slug($input_slug);
                }

                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/parental', 'assets/upload/parental/thumbs');

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
                    $this->parental_model->update('parental', $id, $data);
                    $this->session->set_flashdata('message', 'Item updated successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error updating the item: ' . $e->getMessage());
                }

                redirect('admin/parental/list_in_category/'.$this->input->post('url'), 'refresh');
            }
        }
    }

    public function remove($id = NULL){
        $id = $this->input->get('id');
        if(!isset($id)){
            redirect('admin/parental', 'refresh');
        }

        $parental = $this->parental_model->fetch_by_id('parental', $id);
        if(!$parental){
            redirect('admin/parental', 'refresh');
        }

        $result = $this->parental_model->delete('parental', $id);
        if($result){
            unlink('assets/upload/parental/'. $parental['image']);
        }else{
            $this->session->set_flashdata('message', 'There was an error when delete item');
        }
        $this->session->set_flashdata('message', 'Item deleted successfully');

        redirect('admin/parental', 'refresh');
    }

    public function category(){
        $this->data['target'] = 'parental';
        $this->data['categories'] = $this->parental_model->fetch_all('parental_category');
        $check_slug = array('y-kien-phu-huynh');
        $this->data['check_slug'] = $check_slug;

        $this->render('admin/category/list_category_view');
    }

    public function list_in_category($type){
        $this->load->model('comment_model');
        $category_id = $this->uri->segment(4);
        $this->data['category_id'] = $category_id;
        $where = array('id' => $category_id);
        $category = $this->parental_model->fetch_row($where, 'parental_category');
        $this->data['slug'] = $category['slug'];
        $this->data['check_slug'] = array('y-kien-phu-huynh');

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/parental/list_in_category/' . $type;
        $total_rows = $this->parental_model->count_all($type);
        $per_page = 10;
        $uri_segment = 5;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(5) : 0;
        $parental = $this->parental_model->fetch_all_by_type($type, $per_page, $this->data['page']);

        if($parental){
            foreach ($parental as $key => $value) {
                $where =  array('category' => 'parental', 'slug' => $value['slug'], 'status' => 0);
                $count = $this->comment_model->count_all($where);
                $parental[$key]['count_comment'] = $count;
            }
        }

        $this->data['parental'] = $parental;

        $this->render('admin/parental/list_parental_view');
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
                $unique_slug = $this->parental_model->build_unique_slug_category($slug);

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $unique_slug,
                    'created_at' => $this->author_info['created_at'],
                    'created_by' => $this->author_info['created_by'],
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $result = $this->parental_model->insert('parental_category', $data);
                if (!$result) {
                    $this->session->set_flashdata('message', 'There was an error inserting item');
                }
                $this->session->set_flashdata('message', 'Item added successfully');

                redirect('admin/parental/category', 'refresh');
            }
        }
    }

    public function edit_category($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        if(!isset($id)){
            redirect('admin/parental/category', 'refresh');
        }

        $result = $this->parental_model->fetch_by_id('parental_category', $id);

        if($this->form_validation->run() == FALSE) {
            if(!$result){
                redirect('admin/parental/category', 'refresh');
            }

            $this->data['category'] = $result;
            $this->render('admin/category/edit_category_view');
        }else{
            if($this->input->post()){
                $input_slug = $this->input->post('slug');

                if($result['slug'] == $input_slug){
                    $unique_slug = $this->parental_model->build_unique_slug_category($input_slug, $result['id']);
                }else{
                    $unique_slug = $this->parental_model->build_unique_slug_category($input_slug);
                }

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $unique_slug,
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $result = $this->parental_model->update('parental_category', $id, $data);
                if (!$result) {
                    $this->session->set_flashdata('message', 'There was an error when update item');
                }
                $this->session->set_flashdata('message', 'Item updated successfully');

                redirect('admin/parental/category', 'refresh');
            }
        }
    }

    public function remove_category(){

        $isExists = null;
        $id = $this->input->get('id');
        $count_parental = $this->parental_model->count_all($id);
        if($count_parental > 0){
            $isExists = false;
        }else{
            
            if(!isset($id)){
                $isExists = false;
            }

            $category = $this->parental_model->fetch_by_id('parental_category', $id);
            if(!$category){
                $isExists = false;
            }

            $result = $this->parental_model->delete('parental_category', $id);
            if (!$result) {
                $isExists = false;
            }else{
                $isExists = true;
            }
        }
        $this->output->set_status_header(200)->set_output(json_encode(array('isExists' => $isExists)));
    }



    public function dropdown_category(){
        $categories = $this->parental_model->fetch_all('parental_category');
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
