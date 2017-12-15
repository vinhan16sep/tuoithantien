<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14/12/2017
 * Time: 3:39 PM
 */

class Placement extends Admin_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('placement_model');
    }

    public function index(){
        $this->load->library('pagination');
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $total_rows  = $this->placement_model->count_all();

        $config = array();
        $base_url = base_url() . 'admin/placement/index';
        $per_page = 10;
        $uri_segment = 4;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $placement = $this->placement_model->fetch_all(null, $per_page, $page);
        $this->data['placement'] = $placement;

        $this->render('admin/placement/list_placement_view');
    }

    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Tên cơ sở', 'trim|required');
        $this->form_validation->set_rules('location', 'Địa chỉ', 'trim|required');

        if($this->input->post()){
            if($this->form_validation->run()){
                $data =  array(
                    'name' => $this->input->post('name'),
                    'location' => $this->input->post('location'),
                    'created_at'    => $this->author_info['created_at'],
                    'created_by'    => $this->author_info['created_by'],
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );
                try {
                    $this->placement_model->save($data);
                    $this->session->set_flashdata('message', 'Thêm cơ sở mới thành công!');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Thêm cơ sở mới thất bại! ' . $e->getMessage());
                }
                redirect('admin/placement/index');
            }
        }

        $this->render('admin/placement/create_placement_view');
    }

    public function edit(){
        $this->output->enable_profiler(TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');

        $id = $this->uri->segment(4);
        $placement = $this->placement_model->fetch_by_id($id);
        if(!$placement){
            $this->session->set_flashdata('message', 'Bài viết không tồn tại!');
            redirect('admin/placement/index');
        }
        $this->data['placement'] = $placement;

        $this->form_validation->set_rules('name', 'Tên cơ sở', 'trim|required');
        $this->form_validation->set_rules('location', 'Địa chỉ', 'trim|required');
        if($this->input->post()){
            if($this->form_validation->run()){
                $data = array(
                    'name' => $this->input->post('name'),
                    'location' => $this->input->post('location'),
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );
                try {
                    $this->placement_model->update($id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật thành công!');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật thất bại! ' . $e->getMessage());
                }
                redirect('admin/placement/index');
            }
        }

        $this->render('admin/placement/edit_placement_view');
    }

    public function remove(){
        $id = $_GET['id'];
        $this->placement_model->delete($id);
    }

}