<?php

class MY_Controller extends CI_Controller {


    protected $data = array();
    protected $author_info = array();
    protected $langAbbreviation = 'vi';

    function __construct() {
        parent::__construct();

        $this->data['page_title'] = 'Template';
        $this->data['before_head'] = '';
        $this->data['before_body'] = '';

        $this->data['active'] = $this->uri->segment(2);
        $this->data['sub_active'] = $this->uri->segment(3);
        $this->data['icon_active'] = $this->uri->segment(4);
    }

    protected function render($the_view = NULL, $template = 'master') {
        if ($template == 'json' || $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->data['lang'] = $this->langAbbreviation;
            $this->load->view('templates/' . $template . '_view', $this->data);
        }
    }

    protected function pagination_config($base_url, $total_rows, $per_page, $uri_segment) {
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = $uri_segment;

        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = true;
        $config['last_link'] = true;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        return $config;
    }

    protected function pagination_con($base_url, $total_rows, $per_page, $uri_segment){
        $config['base_url']    = $base_url;
        $config['per_page']    = $per_page;
        $config['uri_segment'] = $uri_segment;
        $config['prev_link'] = 'Prev';
        $config['next_link'] = 'Next';
        $config['total_rows']  = $total_rows;
        $config['reuse_query_string'] = true;
        return $config;
    }

}

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/user/login', 'refresh');
        }
        $this->data['user_email'] = $this->ion_auth->user()->row()->username;
        $this->data['page_title'] = 'Administrator area';

        $this->load->model('introduce_model');
        $this->load->model('admission_model');
        $this->load->model('parental_model');
        $this->load->model('activity_model');

        // Get current class
        //$class = $this->router->fetch_class();
        // Set timezone
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        // Insert author informations to database when insert, update or delete
        $this->author_info = array(
            'created_at' => date('Y-m-d H:i:s', now()),
            'created_by' => $this->ion_auth->user()->row()->username,
            'modified_at' => date('Y-m-d H:i:s', now()),
            'modified_by' => $this->ion_auth->user()->row()->username
        );

        $this->data['introduce_menu'] = $this->introduce_model->fetch_all('introduce_category');
        $this->data['admission_menu'] = $this->admission_model->fetch_all('admission_category');
        $this->data['parental_menu'] = $this->parental_model->fetch_all('parental_category');
        $this->data['activity_menu'] = $this->activity_model->fetch_all('activity_category');

//        echo '<pre>';
//        print_r($this->data);die;

        //new comment
//        $this->load->model('count_comment_model');
//        $news_comment = $this->count_comment_model->fetch_all();
//        if($news_comment){
//            $total = count($news_comment);
//        }else{
//            $total = 0;
//        }
//
//        $this->data['news_comment'] = $news_comment;
//        $this->data['total'] = $total;
    }



    protected function render($the_view = NULL, $template = 'admin_master') {
        parent::render($the_view, $template);
    }

    protected function upload_image($image_input_id, $image_name, $upload_path, $upload_thumb_path = '', $thumbs_with = 75, $thumbs_height = 50) {
        $image = '';
        if (!empty($image_name)) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $image_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload($image_input_id)) {
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];

                $config_thumb['source_image'] = $upload_path . '/' . $image;
                $config_thumb['create_thumb'] = TRUE;
                $config_thumb['maintain_ratio'] = TRUE;
                $config_thumb['new_image'] = $upload_thumb_path;
                $config_thumb['width'] = $thumbs_with;
                $config_thumb['height'] = $thumbs_height;

                $this->load->library('image_lib', $config_thumb);

                $this->image_lib->resize();
            }
        }

        return $image;
    }

    function upload_file($upload_path = '', $file_name = '')
    {
        //lay thong tin cau hinh upload
        $config = $this->config($upload_path);

        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES[$file_name];
        $count = count($file['name']);//lấy tổng số file được upload

        $image_list = array(); //luu ten cac file anh upload thanh cong
        for($i=0; $i<=$count-1; $i++) {

            $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
            $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
            $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
            $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
            //load thư viện upload và cấu hình
            $this->load->library('upload', $config);
            //thực hiện upload từng file
            if($this->upload->do_upload())
            {
                //nếu upload thành công thì lưu toàn bộ dữ liệu
                $data = $this->upload->data();
                //in cấu trúc dữ liệu của các file
                $image_list[] = $data['file_name'];
            }
        }
        return $image_list;
    }

    function config($upload_path = '')
    {
        //Khai bao bien cau hinh
        $config = array();
        //thuc mục chứa file
        $config['upload_path']   = $upload_path;
        //Định dạng file được phép tải
        $config['allowed_types'] = 'jpg|png|gif';
        //Dung lượng tối đa
        $config['max_size']      = '1200';
//        //Chiều rộng tối đa
//        $config['max_width']     = '1028';
//        //Chiều cao tối đa
//        $config['max_height']    = '1028';

        return $config;
    }



}

class Public_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');

        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $this->langAbbreviation = $this->uri->segment(1) ? $this->uri->segment(1) : 'vi';
        if($this->langAbbreviation == 'en' || $this->langAbbreviation == 'vi' || $this->langAbbreviation == ''){
            $this->session->set_userdata('langAbbreviation', $this->langAbbreviation);
        }

        if($this->session->userdata('langAbbreviation') == 'en'){
            $langName = 'english';
            $this->config->set_item('language', $langName);
            $this->session->set_userdata("langAbbreviation",'en');
            $this->lang->load('english_lang', 'english');
        }

        if($this->session->userdata('langAbbreviation') == 'vi' || $this->session->userdata('langAbbreviation') == ''){
            $langName = 'vietnamese';
            $this->config->set_item('language', $langName);
            $this->session->set_userdata("langAbbreviation",'vi');
            $this->lang->load('vietnamese_lang', 'vietnamese');
        }

        $this->load->model('menu_model');
        $menus = $this->menu_model->fetch_all_to_frontend();
        foreach($menus as $key => $value){
            $menus[$key]['sub'] = $this->menu_model->fetch_sub_menu_by_parent($value['id']);
        }
        $this->data['menus'] = $menus;

        //menu introduce
        $this->load->model('introduce_model');
        $introduce_nav = $this->introduce_model->fetch_all('introduce_category');
        $this->data['introduce_nav'] = $introduce_nav;

        //menu admission
        $this->load->model('admission_model');
        $admission_nav = $this->admission_model->fetch_all('admission_category');
        $this->data['admission_nav'] = $admission_nav;

        //menu parental
        $this->load->model('parental_model');
        $parental_nav = $this->parental_model->fetch_all('parental_category');
        $this->data['parental_nav'] = $parental_nav;

        //menu activity
        $this->load->model('activity_model');
        $activity_nav = $this->activity_model->fetch_all('activity_category');
        $this->data['activity_nav'] = $activity_nav;

        /* thu tuc nhap hoc */

        $this->load->model('admission_model');
        $where = array('slug' => 'thu-tuc-nhap-hoc');
        $category = $this->admission_model->fetch_row($where, 'admission_category');
        $where = array('category_id' => $category['id']);
        $procedure = $this->admission_model->fetch_row($where);
        $this->data['procedure'] = $procedure;
        //theme frontend
        $this->load->model('theme_model');
        $theme = $this->theme_model->fetch_row();
        $this->data['theme'] = $theme['name'];

        // count total view online
        $this->count_view();


        

        /* thu tuc nhap hoc */
//        $this->load->model('admission_model');
//        $where = array('category' => 0, 'slug' => 'thu-tuc-nhap-hoc');
//        $procedure = $this->admission_model->fetch_row($where);
//        $this->data['procedure'] = $procedure;
    }

    protected function render($the_view = NULL, $template = 'master') {
        parent::render($the_view, $template);
    }

    protected function comment($category, $slug) {
        $this->load->model('comment_model');
        $where = array('category' => $category, 'slug' => $slug);
        $comment = $this->comment_model->fetch_all($where, 5, 0);
        if($comment){
            $this->data['comment'] = $comment;
        }
    }

    protected function count_comment($slug){
        $this->load->model('comment_model');
        $where = array('slug' => $slug);
        $count_comment = $this->comment_model->fetch_all($where);
        return $count_comment;
    }

    public function procedure(){
        $this->load->model('admission_model');
        $where = array('category' => 0, 'slug' => 'thu-tuc-nhap-hoc');
        $procedure = $this->admission_model->fetch_row($where);
        $this->data['procedure'] = $procedure;

    }

    protected function count_view(){
        // count view
        $this->load->model('total_view_model');
        $this->load->model('count_view_model');
        $this->load->model('config_model');

        $guest_id = session_id();
        $created_at = time();
        $time = 600;
        $time_check = time() - $time;
        $this->count_view_model->delete($time_check);

        //dang olnine
        

        $count_view = $this->count_view_model->fetch_all();

        $check_view = array();
        if($count_view){
            foreach ($count_view as $key => $value) {
                $check_view[] = $value['guest_id'];
            }
        }
        

        $config = $this->config_model->fetch_row();

        if(in_array($guest_id, $check_view) == null){
            $data = array('total' => $config['total'] + 1);
            $this->config_model->update(1, $data);
        }

        
        $where = array('guest_id' => $guest_id);
        $count = $this->count_view_model->count_all($where);
        $count_total = $this->total_view_model->count_all($where);
        
        
        if($count == 0){
            $data = array('guest_id' => $guest_id, 'created_at' => time());
            $result = $this->count_view_model->insert($data);
        }else{
            $data = array('created_at' => time());
            $result = $this->count_view_model->update($guest_id, $data);
        }

        // print_r($count);
        $this->data['total'] = $config['total'];
        $this->data['olnine'] = $this->count_view_model->count_all();

        if(isset($result)){
            $total_view = $this->total_view_model->fetch_row($where);
        }

        //online theo ngay
        if($count_total == 0){
            $data = array('guest_id' => $guest_id, 'created_at' => date('Y/m/d H:i:s'));
            $this->total_view_model->insert($data);
        }else{
            $total_view = $this->total_view_model->fetch_row($where);
            $x = time() - strtotime($total_view['created_at']);
            if($x > $time){
                $data = array('guest_id' => $guest_id, 'created_at' => date('Y/m/d H:i:s'));
                $this->total_view_model->insert($data);
            }else{
                $data = array('created_at' => date('Y/m/d H:i:s'));
                $this->total_view_model->update($guest_id, $data);
            }
        }
        $date = date('Y-m-d 00:00:00');
        $date1 = str_replace('-', '/', $date);
        $tomorrow = date('Y-m-d 00:00:00',strtotime($date1 . "+1 days"));
        $yesterday = date('Y-m-d 00:00:00',strtotime($date1 . "-1 days"));

        $this->total_view_model->delete($yesterday);

        $where = array('created_at >=' => date('Y-m-d 00:00:00'), 'created_at <' => $tomorrow);
        $total_day = $this->total_view_model->count_all($where);

        $where = array('created_at <' => date('Y-m-d 00:00:00'));
        $total_yesterday = $this->total_view_model->count_all($where);
        $this->data['total_day'] = $total_day;
        $this->data['total_yesterday'] = $total_yesterday;
    }

}
