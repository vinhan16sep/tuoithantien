<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Introduce extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('introduce_model');
        $this->load->library('session');
        $this->data['categories'] = $this->dropdown_category();
    }

    public function index() {

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/introduce/index';
        $total_rows = $this->introduce_model->count_all();
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['introduces'] = $this->introduce_model->fetch_all_pagination($per_page, $this->data['page']);

        $this->render('admin/introduce/list_introduce_view');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('image', 'Image', 'callback_check_file_selected');

        if ($this->form_validation->run() == FALSE) {
            $this->data['categories'] = $this->dropdown_category();
            $this->render('admin/introduce/create_introduce_view');
        } else {
            if ($this->input->post()) {
                $slug = $this->input->post('slug');
                $unique_slug = $this->introduce_model->build_unique_slug($slug);
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/introduce', 'assets/upload/introduce/thumbs');

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

                $insert = $this->introduce_model->insert('introduce', $data);
                if (!$insert) {
                    $this->session->set_flashdata('message', 'There was an error inserting item');
                }
                $this->session->set_flashdata('message', 'Item added successfully');

                redirect('admin/introduce/list_in_category/'.$this->input->post('url'), 'refresh');
            }
        }
    }

    public function edit($request_id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        $id = isset($request_id) ? (int) $request_id : (int) $this->input->post('id');
        $result = $this->introduce_model->fetch_by_id('introduce', $id);
        if ($this->form_validation->run() == FALSE) {
            $this->data['categories'] = $this->dropdown_category();
            $this->data['introduce'] = $result;

            if (!$this->data['introduce']) {
                redirect('admin/introduce', 'refresh');
            }

            $this->render('admin/introduce/edit_introduce_view');
        } else {
            if ($this->input->post()) {
                $input_slug = $this->input->post('slug');

                if($result['slug'] == $input_slug){
                    $unique_slug = $this->introduce_model->build_unique_slug($input_slug, $result['id']);
                }else{
                    $unique_slug = $this->introduce_model->build_unique_slug($input_slug);
                }

                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/introduce', 'assets/upload/introduce/thumbs');

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
                    $this->introduce_model->update('introduce', $id, $data);
                    $this->session->set_flashdata('message', 'Item updated successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error updating the item: ' . $e->getMessage());
                }

                redirect('admin/introduce/list_in_category/'.$this->input->post('url'), 'refresh');
            }
        }
    }

    public function remove($id = NULL){
        $id = $this->input->get('id');
        if(!isset($id)){
            redirect('admin/introduce', 'refresh');
        }

        $introduce = $this->introduce_model->fetch_by_id('introduce', $id);
        if(!$introduce){
            redirect('admin/introduce', 'refresh');
        }

        $result = $this->introduce_model->delete('introduce', $id);
        if($result){
            unlink('assets/upload/introduce/'. $introduce['image']);
        }else{
            $this->session->set_flashdata('message', 'There was an error when delete item');
        }
        $this->session->set_flashdata('message', 'Item deleted successfully');

        redirect('admin/introduce', 'refresh');
    }

    public function category(){
        $this->data['target'] = 'introduce';
        $this->data['categories'] = $this->introduce_model->fetch_all('introduce_category');

        $this->render('admin/category/list_category_view');
    }

    public function list_in_category($type){
        $category_id = $this->uri->segment(4);
        $this->data['category_id'] = $category_id;

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/introduce/list_in_category/' . $type;
        $total_rows = $this->introduce_model->count_all($type);
        $per_page = 10;
        $uri_segment = 5;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(5) : 0;
        $this->data['introduces'] = $this->introduce_model->fetch_all_by_type($type, $per_page, $this->data['page']);

        $this->render('admin/introduce/list_introduce_view');
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
                $unique_slug = $this->introduce_model->build_unique_slug_category($slug);

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $unique_slug,
                    'created_at' => $this->author_info['created_at'],
                    'created_by' => $this->author_info['created_by'],
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $result = $this->introduce_model->insert('introduce_category', $data);
                if (!$result) {
                    $this->session->set_flashdata('message', 'There was an error inserting item');
                }
                $this->session->set_flashdata('message', 'Item added successfully');

                redirect('admin/introduce/category', 'refresh');
            }
        }
    }

    public function edit_category($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        if(!isset($id)){
            redirect('admin/introduce/category', 'refresh');
        }

        $result = $this->introduce_model->fetch_by_id('introduce_category', $id);

        if($this->form_validation->run() == FALSE) {
            if(!$result){
                redirect('admin/introduce/category', 'refresh');
            }

            $this->data['category'] = $result;
            $this->render('admin/category/edit_category_view');
        }else{
            if($this->input->post()){
                $input_slug = $this->input->post('slug');

                if($result['slug'] == $input_slug){
                    $unique_slug = $this->introduce_model->build_unique_slug_category($input_slug, $result['id']);
                }else{
                    $unique_slug = $this->introduce_model->build_unique_slug_category($input_slug);
                }

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $unique_slug,
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $result = $this->introduce_model->update('introduce_category', $id, $data);
                if (!$result) {
                    $this->session->set_flashdata('message', 'There was an error when update item');
                }
                $this->session->set_flashdata('message', 'Item updated successfully');

                redirect('admin/introduce/category', 'refresh');
            }
        }
    }

    public function remove_category(){
        $id = $this->input->get('id');
        if(!isset($id)){
            redirect('admin/introduce/category', 'refresh');
        }

        $category = $this->introduce_model->fetch_by_id('introduce_category', $id);
        if(!$category){
            redirect('admin/introduce/category', 'refresh');
        }

        $result = $this->introduce_model->delete('introduce_category', $id);
        if (!$result) {
            $this->session->set_flashdata('message', 'There was an error when delete item');
        }
        $this->session->set_flashdata('message', 'Item deleted successfully');

        redirect('admin/introduce/category', 'refresh');
    }



    public function dropdown_category(){
        $categories = $this->introduce_model->fetch_all('introduce_category');
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
