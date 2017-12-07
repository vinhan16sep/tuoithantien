<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Introduce extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('introduce_model');
    }

    public function index() {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $slug = $this->uri->segment(4);
        $slug = isset($slug) ? $slug : 'muc-tieu';
        if($slug == 'ngoai-khoa'){
            $where = array('category' => 2);
        }else{
            $where = array('category' => 1, 'sub_category' => $slug);
        }

        $this->data['slug'] = $slug;

        $sub_cat = array(
                    'muc-tieu'                  => 'Mục tiêu',
                    'ngoai-ngu'                 => 'Ngoại ngữ',
                    'giao-duc-theo-lua-tuoi'    => 'Giáo dục theo lứa tuổi',
                    'tap-huan'                  => 'Tập huấn',
                    'ngoai-khoa'                => 'Ngoại khóa',
                    );
        if(array_key_exists($slug, $sub_cat) == false){
            redirect('admin/dashboard','refresh');
        }
        if(!empty($this->uri->segment(5)) && !is_numeric($this->uri->segment(5))){
            redirect('admin/dashboard','refresh');
        }
        $this->data['sub_cat'] = $sub_cat;

        if (count($_POST) > 0){
            $this->session->set_userdata('search', $_POST );
            redirect('admin/introduce/index/'.$slug,'refresh');
        }else{
            if($this->session->userdata('search')){
                $_POST = $this->session->userdata('search');
            }
        }

        $keywords = '';
        if($this->input->post()){
            $keywords = $this->input->post('search');
        }
        $this->load->library('pagination');
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

        if($keywords != ''){
            $search = $this->input->post('search');

            if($keywords == null){
                redirect('admin/introduce/index/'.$slug,'refresh');
            }
            $total_rows  = $this->introduce_model->count_all($where,$search);
        }else{
            $total_rows  = $this->introduce_model->count_all($where);

        }
        
        $config = array();
        $base_url = base_url() . 'admin/introduce/index/'.$slug;
        $per_page = 20;
        $uri_segment = 5;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result  =  array();
        if($keywords != ''){
            $result = $this->introduce_model->fetch_all($where, $config['per_page'], $page, $keywords);
        }else{
            $result = $this->introduce_model->fetch_all($where, $config['per_page'], $page);
        }

        $this->data['introduces'] = $result;

        $this->render('admin/introduce/list_introduce_view');
    }

    public function edit($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $sub_cat = array(
                    'muc-tieu'                  => 'Mục tiêu',
                    'ngoai-ngu'                 => 'Ngoại ngữ',
                    'giao-duc-theo-lua-tuoi'    => 'Giáo dục theo lứa tuổi',
                    'tap-huan'                  => 'Tập huấn'
                    );
        $this->data['sub_cat'] = $sub_cat;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');

        $introduce_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        if ($this->form_validation->run() == FALSE) {
            $introduce = $this->introduce_model->fetch_by_id($introduce_id);
            if(!$introduce){
                redirect('admin/dashboard','refresh');
            }

            $this->data['introduce'] = $introduce;
            $this->render('admin/introduce/edit_introduce_view');
        } else {
            if ($this->input->post()) {
                $slug = $this->input->post('slug');
                $unique_slug = $this->introduce_model->build_unique_slug($slug);
                
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/introduce', 'assets/upload/article/thumbs');
                $data = array(
                    'title'        => $this->input->post('title'),
                    'slug'         => $unique_slug,
                    'category'     => $this->input->post('cat'),
                    'content'      => $this->input->post('content'),
                    'modified_at'  => $this->author_info['modified_at'],
                    'modified_by'  => $this->author_info['modified_by']
                );
                if($this->input->post('cat') == 1){
                    $data['sub_category'] = $this->input->post('sub-cat');
                }elseif($this->input->post('cat') == 2){
                    $data['sub_category'] = 'ngoai-khoa';
                }else{
                    $data['sub_category'] = '';
                }

                if($image != null){
                    $data['image'] = $image;
                }
                try {
                    $this->introduce_model->update($introduce_id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }

                $id = $this->input->post('id');
                $introduce_row = $this->introduce_model->fetch_by_id($id);
                if($introduce_row['category'] == 2){
                    redirect('admin/introduce/index/ngoai-khoa', 'refresh');
                }
                redirect('admin/introduce/index/'.$this->input->post('url'), 'refresh');
            }
        }
    }

    public function create(){
        
        $this->load->helper('form');
        $this->load->library('form_validation');

        $sub_cat = array(
                    'muc-tieu'                  => 'Mục tiêu',
                    'ngoai-ngu'                 => 'Ngoại ngữ',
                    'giao-duc-theo-lua-tuoi'    => 'Giáo dục theo lứa tuổi',
                    'tap-huan'                  => 'Tập huấn'
                    );
        $this->data['sub_cat'] = $sub_cat;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('content', 'Nội dung', 'required');
        if($this->input->post()){
            if($this->form_validation->run() == TRUE){
                $slug = $this->input->post('slug');
                $unique_slug = $this->introduce_model->build_unique_slug($slug);

                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/introduce', 'assets/upload/article/thumbs');
                $data = array(
                    'title'         => $this->input->post('title'),
                    'slug'          => $unique_slug,
                    'category'      => $this->input->post('cat'),
                    'image'         => $image,
                    'content'       => $this->input->post('content'),
                    'created_at'    => $this->author_info['created_at'],
                    'created_by'    => $this->author_info['created_by'],
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );
                if($this->input->post('cat') == 1){
                    $data['sub_category'] = $this->input->post('sub-cat');
                }elseif($this->input->post('cat') == 2){
                    $data['sub_category'] = 'ngoai-khoa';
                }else{
                    $data['sub_category'] = '';
                }

                try {
                    $this->introduce_model->save($data);
                    $this->session->set_flashdata('message', 'Item created successfully');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error creating item: ' . $e->getMessage());
                }
                redirect('admin/introduce/index/'.$this->input->post('url'), 'refresh');
            }
        }

        $this->render('admin/introduce/create_introduce_view');
    }

    public function overview(){
        $where = array('category' => 0,'sub_category' => '');
        $introduce = $this->introduce_model->fetch_row($where);

        $this->data['introduces'] = $introduce;
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
        
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post()) {
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/introduce', 'assets/upload/article/thumbs');
                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $this->input->post('slug'),
                    'content' => $this->input->post('content'),
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );
                if($image != null){
                    $data['image'] = $image;
                }

                try {
                    $this->introduce_model->update($introduce['id'], $data);
                    $this->session->set_flashdata('message', 'Thêm mới bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Thêm mới bài viết thất bại: ' . $e->getMessage());
                }

                redirect('admin/introduce/overview', 'refresh');
            }
        }
        $this->render('admin/introduce/overview_view');

        
    }



    public function remove(){
        $id = $_GET['id'];
        $this->introduce_model->delete($id);
    }


}
