<?php
class Introducecategory extends Admin_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('introducecategory_model');
    }
    public function index(){
        $this->load->library('pagination');
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $config = array();
        $base_url = base_url() . 'admin/introducecategory/index';
        $per_page = 10;
        $uri_segment = $page;
        $total_rows = $this->introducecategory_model->count_all();
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links($per_page, $uri_segment);

        $introducecategorys = $this->introducecategory_model->get_all_with_pagination();
        if($introducecategorys){
            $this->data['introducecategorys'] = $introducecategorys;
        }else{
            $this->data['introducecategorys'] = '';
        }

        $this->render('admin/introducecategory/list_introducecategory_view');
    }

    function check_file_selected(){

        $this->form_validation->set_message('check_file_selected', 'Vui lòng chọn hình ảnh.');
        if (empty($_FILES['image']['name'])) {
            return false;
        }else{
            return true;
        }
    }

    function check_file_type(){

        $this->form_validation->set_message('check_file_type', 'Định dạng file không đúng');
        if ($_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/jpeg') {
            return true;
        }else{
            return false;
        }
    }

    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('text', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('image', 'introducecategory', 'callback_check_file_selected');
        $this->form_validation->set_rules('image', 'introducecategory', 'callback_check_file_type');
        if($this->input->post()){
            if($this->form_validation->run() == true){
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/introducecategory', 'assets/upload/article/thumbs');
                $data = array(
                    'text' => $this->input->post('text'),
                    'image' => $image,
                    'url' => $this->input->post('url'),
                    'created_at'    => $this->author_info['created_at'],
                    'created_by'    => $this->author_info['created_by'],
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );
                try {
                    $this->introducecategory_model->insert($data);
                    $this->session->set_flashdata('message', 'Thêm introducecategory thành công');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Thêm introducecategory thất bại: ' . $e->getMessage());
                }
                redirect('admin/introducecategory/index', 'refresh');

            }

        }
        $this->render('admin/introducecategory/create_introducecategory_view');
    }

    public function remove(){
        $id = $_GET['id'];
        $introducecategory = $this->introducecategory_model->get_by_id($id);
        if($this->introducecategory_model->remove($id) == true){
            unlink('assets/upload/introducecategory/'.$introducecategory['image']);
        }
    }

}
?>