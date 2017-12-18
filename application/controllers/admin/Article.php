<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('article_model');
        $this->load->library('session');
        // $this->data['categories'] = $this->dropdown_category();
    }

    public function index() {
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/article/index';
        $total_rows = $this->article_model->count_all();
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['article'] = $this->article_model->fetch_all_pagination($per_page, $this->data['page']);

        $this->render('admin/article/list_article_view');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('image', 'Image', 'callback_check_file_selected');

        if ($this->form_validation->run() == FALSE) {
            // $this->data['categories'] = $this->dropdown_category();
            $this->render('admin/article/create_article_view');
        } else {
            if ($this->input->post()) {
                $slug = $this->input->post('slug');
                $unique_slug = $this->article_model->build_unique_slug($slug);
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/article', 'assets/upload/article/thumbs');

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug'          => $unique_slug,
                    'image' => $image,
                    'description' => $this->input->post('description'),
                    'content' => $this->input->post('content'),
                    'created_at' => $this->author_info['created_at'],
                    'created_by' => $this->author_info['created_by'],
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $insert = $this->article_model->insert('article', $data);
                if (!$insert) {
                    $this->session->set_flashdata('message', 'There was an error inserting item');
                }
                $this->session->set_flashdata('message', 'Item added successfully');

                redirect('admin/article/index', 'refresh');
            }
        }
    }

    public function edit($request_id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        $id = isset($request_id) ? (int) $request_id : (int) $this->input->post('id');
        $result = $this->article_model->fetch_by_id('article', $id);
        $this->data['article'] = $result;
        if ($this->form_validation->run() == FALSE) {


            if (!$this->data['article']) {
                redirect('admin/article', 'refresh');
            }

            $this->render('admin/article/edit_article_view');
        } else {
            if ($this->input->post()) {
                $input_slug = $this->input->post('slug');

                if($result['slug'] == $input_slug){
                    $unique_slug = $this->article_model->build_unique_slug($input_slug, $result['id']);
                }else{
                    $unique_slug = $this->article_model->build_unique_slug($input_slug);
                }

                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/article', 'assets/upload/article/thumbs');

                $data = array(
                    'title' => $this->input->post('title'),
                    'slug'          => $unique_slug,
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
                    $this->article_model->update('article', $id, $data);
                    $this->session->set_flashdata('message', 'Item updated successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error updating the item: ' . $e->getMessage());
                }

                redirect('admin/article/index', 'refresh');
            }
        }
    }

    public function remove($id = NULL){
        $id = $this->input->get('id');
        if(!isset($id)){
            redirect('admin/article', 'refresh');
        }

        $article = $this->article_model->fetch_by_id('article', $id);
        if(!$article){
            redirect('admin/article', 'refresh');
        }

        $result = $this->article_model->delete('article', $id);
        if($result){
            unlink('assets/upload/article/'. $article['image']);
        }else{
            $this->session->set_flashdata('message', 'There was an error when delete item');
        }
        $this->session->set_flashdata('message', 'Item deleted successfully');

        redirect('admin/article', 'refresh');
    }

    public function category(){
        $this->data['target'] = 'article';
        $this->data['categories'] = $this->article_model->fetch_all('article_category');

        $this->render('admin/category/list_category_view');
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
