<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller {
    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('register_model');
    }

    public function index(){
        $this->data['meta']['description'] = 'Đăng ký nhập học';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('placement_model');

        $placement = $this->placement_model->fetch_all();
        $this->data['placement'][''] = "---Chọn một cơ sở---";
        if($placement){
            foreach ($placement as $value){
                $this->data['placement'][$value['id']] = $value['name'];
            }
        }
        

        $this->form_validation->set_rules('parent_name', 'Họ và Tên phụ huynh, người đăng ký', 'required', array('required' => 'Họ và Tên phụ huynh không được trống.'));
        $this->form_validation->set_rules('phone', 'Số điện thoại liên hệ', 'required', array('required' => 'Số điện thoại liên hệ không được trống.'));
        $this->form_validation->set_rules('name', 'Họ và Tên học sinh', 'trim|required', array('required' => 'Họ và Tên học sinh không được trống.'));
        $this->form_validation->set_rules('dob', 'Ngày sinh', 'required', array('required' => 'Ngày sinh không được trống.'));
        $this->form_validation->set_rules('grade', 'Chọn lớp học tham gia', 'required', array('required' => 'Lớp học tham gia không được trống.'));
        $this->form_validation->set_rules('place', 'Chọn cở sở trường học', 'required', array('required' => 'Cở sở trường học không được trống.'));
        $this->form_validation->set_rules('email', 'Email liên hệ', 'required|valid_email', array('valid_email' => 'Định dạng email không đúng.', 'required' => 'Email liên hệ không được trống.'));

        if($this->input->post()){
            if($this->form_validation->run()){
                $data = array(
                    'parent_name' => $this->input->post('parent_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'name' => $this->input->post('name'),
                    'dob' => date_format(date_create($this->input->post('dob')), "Y-m-d"),
                    'pob' => $this->input->post('pob'),
                    'grade' => $this->input->post('grade'),
                    'place' => $this->input->post('place')
                );
                if($this->input->post('callback') != null){
                    $data['callback'] = $this->input->post('callback');
                }else{
                    $data['callback'] = 0;
                }
                try {
                    $this->register_model->save($data);
                    $this->session->set_flashdata('message', 'Đăng ký học thành công!');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Đăng ký học thất bại! ' . $e->getMessage());
                }
            }
        }

        $this->render('register_view');
    }

    public function select_class(){
        $this->load->model('classification_model');
        $placement_id = $this->input->get('search_place');
        $where =  array('placement_id' => $placement_id);
        $classification = $this->classification_model->fetch_all($where);
        if($classification){
            foreach ($classification as $value){
                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
//                $this->output->set_status_header(200)->set_output(json_encode(array('classification' => $result)));
            }
        }
    }

}
