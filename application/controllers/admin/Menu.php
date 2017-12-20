<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
    }

    public function index() {
        $this->load->library('pagination');
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $total_rows = $this->menu_model->count_all();

        $base_url = base_url() . 'admin/menu/index';
        $per_page = 100;
        $uri_segment = 4;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $menus = $this->menu_model->fetch_all_pagination($config['per_page'], $page);
        foreach($menus as $key => $value){
            $menus[$key]['sub'] = $this->menu_model->fetch_sub_menu_by_parent($value['id']);
        }
        $this->data['menus'] = $menus;

        $this->render('admin/menu/list_menu_view');
    }

   public function create() {
       $this->load->helper('form');
       $this->load->library('form_validation');

       $this->form_validation->set_rules('title', 'Title', 'trim|required');
//       $this->form_validation->set_rules('url', 'Url', 'trim|required');

       if ($this->form_validation->run() == FALSE) {
           $this->render('admin/menu/create_menu_view');
       } else {
           if ($this->input->post()) {
               $count = $this->menu_model->count_all_first_menu();
               $data = array(
                   'title' => $this->input->post('title'),
                   'url' => $this->input->post('url'),
                   'color' => $this->input->post('color'),
                   'is_actived' => $this->input->post('is_actived'),
                   'level' => 1,
                   'parent' => 0,
                   'sort' => (int)$count + 1,
                   'select_main' => $this->input->post('select_main'),
                   'select_category' => $this->input->post('select_category'),
                   'select_article' => $this->input->post('select_article'),
                   'created_at' => $this->author_info['created_at'],
                   'created_by' => $this->author_info['created_by'],
                   'modified_at' => $this->author_info['modified_at'],
                   'modified_by' => $this->author_info['modified_by']
               );

               $insert = $this->menu_model->insert('menu', $data);
               if (!$insert) {
                   $this->session->set_flashdata('message', 'Bài viết này không tồn tại');
               }
               $this->session->set_flashdata('message', 'Item added successfully');

               redirect('admin/menu', 'refresh');
           }
       }
   }

    public function create_sub($request_id = null) {
        if(!isset($request_id)){
            redirect('admin/menu', 'refresh');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
//        $this->form_validation->set_rules('url', 'Url', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['parent'] =  $request_id;
            $this->data['list_parent'] = $this->dropdown_parent();
            $this->render('admin/menu/create_sub_menu_view');
        } else {
            if ($this->input->post()) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'is_actived' => $this->input->post('is_actived'),
                    'level' => 2,
                    'parent' => $this->input->post('parent'),
                    'select_main' => $this->input->post('select_main'),
                    'select_category' => $this->input->post('select_category'),
                    'select_article' => $this->input->post('select_article'),
                    'created_at' => $this->author_info['created_at'],
                    'created_by' => $this->author_info['created_by'],
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                $insert = $this->menu_model->insert('menu', $data);
                if (!$insert) {
                    $this->session->set_flashdata('message', 'Bài viết này không tồn tại');
                }
                $this->session->set_flashdata('message', 'Item added successfully');

                redirect('admin/menu', 'refresh');
            }
        }
    }

    public function edit($request_id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
//        $this->form_validation->set_rules('url', 'Url', 'trim|required');

        $id = isset($request_id) ? (int) $request_id : (int) $this->input->post('id');
        if ($this->form_validation->run() == FALSE) {
            $this->data['subs'] = $this->list_sub_menu($id);
            $this->data['count_sub'] = $this->menu_model->count_all_sub_in_main($id);
            $menu = $this->menu_model->fetch_by_id('menu', $id);

            if($this->data['count_sub'] == 0){
                $this->data['dropdown_sub'] = $this->build_dropdown_sub_by_main($menu['select_main']);
                $this->data['dropdown_article'] = $this->build_dropdown_article($menu['select_main'], $menu['select_category']);
            }

            $this->data['menu'] = $menu;

            if (!$this->data['menu']) {
              $this->session->set_flashdata('message', 'Bài viết không tồn tại');
              redirect('admin/menu', 'refresh');
            }

            $this->render('admin/menu/edit_menu_view');
        } else {
            if ($this->input->post()) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'color' => $this->input->post('color'),
                    'select_main' => $this->input->post('select_main'),
                    'select_category' => $this->input->post('select_category'),
                    'select_article' => $this->input->post('select_article'),
                    'is_actived' => $this->input->post('is_actived'),
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                try {
                    $this->menu_model->update('menu', $id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }

                redirect('admin/menu', 'refresh');
            }
        }
    }

    public function edit_sub($request_id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
//        $this->form_validation->set_rules('url', 'Url', 'trim|required');

        $id = isset($request_id) ? (int) $request_id : (int) $this->input->post('id');
        if ($this->form_validation->run() == FALSE) {
            $this->data['list_parent'] = $this->dropdown_parent();
            $this->data['count_sub'] = $this->menu_model->count_all_sub_in_main($id);
            $menu = $this->menu_model->fetch_by_id('menu', $id);
            $this->data['parent'] =  $menu['parent'];

            if($this->data['count_sub'] == 0){
                $this->data['dropdown_sub'] = $this->build_dropdown_sub_by_main($menu['select_main']);
                $this->data['dropdown_article'] = $this->build_dropdown_article($menu['select_main'], $menu['select_category']);
            }

            $this->data['menu'] = $menu;

            if (!$this->data['menu']) {
                $this->session->set_flashdata('message', 'Bài viết không tồn tại');
                redirect('admin/menu', 'refresh');
            }

            $this->render('admin/menu/edit_sub_menu_view');
        } else {
            if ($this->input->post()) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'select_main' => $this->input->post('select_main'),
                    'select_category' => $this->input->post('select_category'),
                    'select_article' => $this->input->post('select_article'),
                    'is_actived' => $this->input->post('is_actived'),
                    'parent' => $this->input->post('parent'),
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );

                try {
                    $this->menu_model->update('menu', $id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }

                redirect('admin/menu', 'refresh');
            }
        }
    }

   public function remove($id = NULL){
        $id = $this->input->get('id');
        $this->menu_model->delete('menu',$id);

        redirect('admin/menu', 'refresh');
   }

    public function active($id = NULL){
        $id = $this->input->get('id');
        $is_actived = $this->input->get('is_actived');
        $change = ($is_actived == 1) ? 0 : 1;
        $this->menu_model->active('menu',$id, $change);

        redirect('admin/menu', 'refresh');
    }

   protected function dropdown_parent(){
       // Select only first class item
       $parent = $this->menu_model->fetch_all(1);
       $result = array();
       foreach($parent as $key => $value){
           $result[$value['id']] = $value['title'];
       }

       return $result;
   }

   public function sort(){
        $params = array();
        parse_str($this->input->get('sort'), $params);
        $i = 1;
        foreach($params as $value){
            $this->menu_model->update_sort($i, $value[0]);
            $i++;
        }
   }

    protected function list_sub_menu($id){
       $menus = $this->menu_model->fetch_sub_menu_by_parent($id);
       return $menus;
   }

   public function fetch_category(){
      $main_category = $this->input->get('main_category');
      $categories = $this->menu_model->fetch_categories_by_main($main_category);

      $this->output->set_status_header(200)
                ->set_output(json_encode(array('data' => $categories)));
   }

    public function fetch_article(){
        $main_category = $this->input->get('main_category');
        $sub_category = $this->input->get('sub_category');
        $articles = $this->menu_model->fetch_articles_by_sub_category($main_category, $sub_category);

        $this->output->set_status_header(200)
            ->set_output(json_encode(array('data' => $articles)));
    }

    protected function build_dropdown_sub_by_main($main){
        $categories = $this->menu_model->fetch_categories_by_main($main);
        if($main == 'article'){
            $result = array('' => 'Chọn bài viết');
        }else{
            $result = array('' => 'Chọn danh mục');
        }
        foreach($categories as $key => $value){
            $result[$value['slug']] = $value['title'];
        }

        return $result;
    }

    protected function build_dropdown_article($main, $sub){
        $articles = $this->menu_model->fetch_articles_by_sub_category($main, $sub);
        $result = array('' => 'Chọn bài viết');
        if($articles){
          foreach($articles as $key => $value){
            $result[$value['slug']] = $value['title'];
          }
        }
        

        return $result;
    }
}





















