<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('product_model');
    }

    public function index() {


        $this->load->helper('form');
        $this->load->library('pagination');
        $base_url = base_url() . 'product/index';
        $total_rows = $this->product_model->count_all();
        $per_page = 9;
        $uri_segment = 3;

        $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->data['products'] = $this->product_model->fetch_all_pagination($per_page, $this->data['page']);

        $this->data['product_menu'] = $this->generate_product_menu();
//        $this->data['products'] = $this->product_model->fetch_all('product');

        $this->render('product_view');
    }

    public function detail($id = null){
        $product_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $this->data['product'] = $this->product_model->fetch_by_id('product', $product_id);
        $this->data['trademark_products'] = $this->product_model->fetch_all_relation_product_in_trademark($this->data['product']['trademark_id'], $product_id);

        if (!$this->data['product']) {
            redirect('', 'refresh');
        }

        $this->render('product_detail_view');
    }

    public function list_product_in_trademark($id){
        $this->load->helper('form');
        $this->load->library('pagination');
        $base_url = base_url() . 'product/list_product_in_trademark/' . $id . '/index';
        $total_rows = $this->product_model->count_all('trademark_id', $id);
        $per_page = 9;
        $uri_segment = 5;

        $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

        $this->data['product_menu'] = $this->generate_product_menu();
        $this->data['products'] = $this->product_model->fetch_all_product_in_trademark($id, $per_page, $this->data['page']);
        $this->data['trademark'] = $this->product_model->fetch_by_id('trademark', $id);

        $this->render('product_by_trademark_view');
    }

    public function list_product_in_category($id){
        $this->load->helper('form');
        $this->load->library('pagination');
        $base_url = base_url() . 'product/list_product_in_category/' . $id . '/index';
        $total_rows = $this->product_model->count_all('category_id', $id);
        $per_page = 9;
        $uri_segment = 5;

        $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;


        $this->data['product_menu'] = $this->generate_product_menu();
        $this->data['products'] = $this->product_model->fetch_all_product_in_category($id, $per_page, $this->data['page']);
        $this->data['category'] = $this->product_model->fetch_by_id('category', $id);

        $this->render('product_by_category_view');
    }

    public function generate_product_menu(){
        $product_menu = array();
        $trademarks = $this->product_model->fetch_all_trademark();
        foreach($trademarks as $trademark){
            $categories = $this->product_model->get_category_by_trademark($trademark['id']);
            foreach($categories as $key => $category){
                $product_menu[$trademark['id'] . '|||' . $trademark['title']][$category['id']] = $category['title'];
            }
        }

        return $product_menu;
    }

}
