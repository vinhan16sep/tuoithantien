<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->render('admin/dashboard_view');
    }

    public function list_subcribe(){
        $this->load->model('contact_model');

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/dashboard/list_subcribe';
        $total_rows = $this->contact_model->count_all();
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['subcribes'] = $this->contact_model->fetch_all_pagination($per_page, $this->data['page']);

        $this->render('admin/subcribe_view');
    }
}