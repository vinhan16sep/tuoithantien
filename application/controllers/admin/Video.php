<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('video_model');
    }

    public function index() {
        $search = '';
        if($this->input->get()){
            $search = $this->input->get('search');
        }

        $this->load->library('pagination');
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        if(!empty($search)){
            $total_rows = $this->video_model->count_all($search);
        }else{
            $total_rows = $this->video_model->count_all();
        }

        $config = array();
        $base_url = base_url() . 'admin/video/index';
        $per_page = 10;
        $uri_segment = 4;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        if(!empty($search)){
            $this->data['videos'] = $this->video_model->fetch_all_pagination($config['per_page'], $page, $search);
        }else{
            $this->data['videos'] = $this->video_model->fetch_all_pagination($config['per_page'], $page);
        }
        $this->data['search'] = $search;


        $this->render('admin/video/list_video_view');
    }

   public function create() {
       $this->load->helper('form');
       $this->load->library('form_validation');

       $this->form_validation->set_rules('title', 'Title', 'trim|required');
       $this->form_validation->set_rules('url', 'Url', 'trim|required');

       if ($this->form_validation->run() == FALSE) {
           $this->render('admin/video/create_video_view');
       } else {
           if ($this->input->post()) {
               $data = array(
                   'title' => $this->input->post('title'),
                   'url' => $this->input->post('url'),
                   'created_at' => $this->author_info['created_at'],
                   'created_by' => $this->author_info['created_by'],
                   'modified_at' => $this->author_info['modified_at'],
                   'modified_by' => $this->author_info['modified_by']
               );

               $insert = $this->video_model->insert('video', $data);
               if (!$insert) {
                   $this->session->set_flashdata('message', 'Bài viết này không tồn tại');
               }
               $this->session->set_flashdata('message', 'Item added successfully');

               redirect('admin/video', 'refresh');
           }
       }
   }

    public function edit($request_id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('url', 'Url', 'trim|required');

        $id = isset($request_id) ? (int) $request_id : (int) $this->input->post('id');
        if ($this->form_validation->run() == FALSE) {
            $this->data['video'] = $this->video_model->fetch_by_id('video', $id);

            if (!$this->data['video']) {
              $this->session->set_flashdata('message', 'Bài viết không tồn tại');
              redirect('admin/video', 'refresh');
            }

            $this->render('admin/video/edit_video_view');
        } else {
            if ($this->input->post()) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                try {
                    $this->video_model->update('video', $id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }

                redirect('admin/video', 'refresh');
            }
        }
    }

   public function remove($id = NULL){
      $id = $_GET['id'];
      $this->video_model->delete('video',$id);

       redirect('admin/video', 'refresh');
   }

}
