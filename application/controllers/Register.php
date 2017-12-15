<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller {
    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('register_model');
    }

    public function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('parent_name', 'Họ và Tên phụ huynh, người đăng ký', 'required');
        $this->form_validation->set_rules('phone', 'Số điện thoại liên hệ', 'required');
        $this->form_validation->set_rules('name', 'Họ và Tên học sinh', 'trim|required');
        $this->form_validation->set_rules('dob', 'Ngày sinh', 'required');
        $this->form_validation->set_rules('grade', 'Chọn lớp học tham gia', 'required');
        $this->form_validation->set_rules('place', 'Chọn cở sở trường học', 'required');
        $this->form_validation->set_rules('email', 'Email liên hệ', 'valid_email');

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

}
