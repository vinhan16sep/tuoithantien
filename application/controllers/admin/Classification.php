<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14/12/2017
 * Time: 4:58 PM
 */
class Classification extends Admin_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('classification_model');
    }

    public function index(){
        $this->load->library('pagination');
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $total_rows  = $this->classification_model->count_all();

        $config = array();
        $base_url = base_url() . 'admin/classification/index';
        $per_page = 10;
        $uri_segment = 4;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $classification = $this->classification_model->fetch_all(null, $per_page, $page);
        $this->load->model('placement_model');
        if($classification){
            foreach ($classification as $key => $value){
                $sub = $this->placement_model->fetch_by_id($value['placement_id']);
                $classification[$key]['placement_name'] = $sub['name'];
            }
        }

        $this->data['classification'] = $classification;
        $this->render('admin/classification/list_classification_view');
    }

    public function create(){
        $this->output->enable_profiler(TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Tên cơ sở', 'trim|required');

        $this->load->model('placement_model');
        $placement = $this->placement_model->fetch_all();

        foreach ($placement as $value){
            $this->data['placement'][$value['id']] = $value['name'];
        }

        if($this->input->post()){
            if($this->form_validation->run()){
                $where = array(
                    'name' => $this->input->post('name'),
                    'placement_id' => $this->input->post('placement_id')
                );

                $check = $this->classification_model->count_all($where);

                if($check > 0){
                    $this->session->set_flashdata('message', 'Lớp học này đã có trong dách sách. Vui lòng chọn tên khác!');
                    redirect('admin/classification/create');
                }else{
                    $data =  array(
                        'name' => $this->input->post('name'),
                        'placement_id' => $this->input->post('placement_id'),
                        'created_at'    => $this->author_info['created_at'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified_at'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                    try {
                        $this->classification_model->save($data);
                        $this->session->set_flashdata('message', 'Thêm cơ sở mới thành công!');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Thêm cơ sở mới thất bại! ' . $e->getMessage());
                    }
                    redirect('admin/classification/index');
                }
            }
        }

        $this->render('admin/classification/create_classification_view');
    }

    public function edit(){
        $this->output->enable_profiler(TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');

        $id = $this->uri->segment(4);
        $classification = $this->classification_model->fetch_by_id($id);

        if(!$classification){
            $this->session->set_flashdata('message', 'Bài viết không tồn tại!');
            redirect('admin/classification/index');
        }

        $this->load->model('placement_model');
        $placement = $this->placement_model->fetch_all();

        foreach ($placement as $value){
            $this->data['placement'][$value['id']] = $value['name'];
        }


        $this->data['classification'] = $classification;

        $this->form_validation->set_rules('name', 'Tên cơ sở', 'trim|required');
        if($this->input->post()){
            if($this->form_validation->run()){
                $where = array(
                    'name' => $this->input->post('name'),
                    'placement_id' => $this->input->post('placement_id')
                );

                $check = $this->classification_model->count_all($where);
                if($check > 0){
                    $this->session->set_flashdata('message', 'Lớp học này đã có trong dách sách. Vui lòng chọn tên khác!');
                    redirect('admin/classification/index');
                }
                $data = array(
                    'name' => $this->input->post('name'),
                    'placement_id' => $this->input->post('placement_id'),
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );
                try {
                    $this->classification_model->update($id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật thành công!');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật thất bại! ' . $e->getMessage());
                }
                redirect('admin/classification/index');

            }
        }

        $this->render('admin/classification/edit_classification_view');
    }

    public function remove(){
        $id = $_GET['id'];
        $this->classification_model->delete($id);
    }
}