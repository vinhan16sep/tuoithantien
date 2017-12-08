<?php 
class Admission extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->model('admission_model');
	}

	public function admission_procedure(){

        $slug = $this->uri->segment(4);
        if($slug == 'thu-tuc-nhap-hoc'){
        	$where = array('slug' => 'thu-tuc-nhap-hoc');
        }elseif($slug == 'lich-hoc'){
        	$where = array('slug' => 'lich-hoc');
        }

        $slug_array = array('thu-tuc-nhap-hoc' => 'thủ tục nhập học', 'lich-hoc' => 'lịch học');
        if(array_key_exists($slug, $slug_array) == false || $this->uri->segment(5) != null){
            redirect('admin/dashboard','refresh');
        }

        $this->data['slug'] = $slug;
        $admission = $this->admission_model->fetch_row($where);
        $this->data['admission'] = $admission;
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
        
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post()) {
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/admission', 'assets/upload/article/thumbs');
                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $this->input->post('slug'),
                    'content' => $this->input->post('content'),
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );
                if($image != null){
                    $data['image'] = $image;
                }

                try {
                    $this->admission_model->update($admission['id'], $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }

                redirect('admin/admission/admission_procedure/'.$slug, 'refresh');
            }
        }
        $this->render('admin/admission/admission_procedure_view');
    }

    public function list(){

    	$this->load->helper('form');
        $this->load->library('form_validation');

        $slug = $this->uri->segment(4);

        $slug_array = array('hoc-phi' => 'học phí', 'chuong-trinh-khuyen-mai' => 'chương trình khuyến mại');
        if(array_key_exists($slug, $slug_array) == false){
            redirect('admin/dashboard','refresh');
        }
        if(!empty($this->uri->segment(5)) && !is_numeric($this->uri->segment(5))){
            redirect('admin/dashboard','refresh');
        }
        
        $this->data['slug'] = $slug;
        if($slug == 'hoc-phi'){
        	$where = array('category' => 1);
        }elseif($slug == 'chuong-trinh-khuyen-mai'){
        	$where = array('category' => 2);
        }

        $keywords = '';
        if($this->input->get()){
            $keywords = $this->input->get('search');
        }

        $this->load->library('pagination');
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        

        if($keywords != ''){
	        $total_rows  = $this->admission_model->count_all($where,$keywords);
        }else{
        	$total_rows  = $this->admission_model->count_all($where);

        }

        $config = array();
        $base_url = base_url() . 'admin/admission/list/'.$slug;
        $per_page = 10;
        $uri_segment = 5;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result  =  array();
        if($keywords != ''){
            $result = $this->admission_model->fetch_all($where, $config['per_page'], $page, $keywords);
        }else{
            $result = $this->admission_model->fetch_all($where, $config['per_page'], $page);
        }

        $this->data['admission'] = $result;
        $this->data['search'] = $keywords;


    	$this->render('admin/admission/list_admission_view');
    }

    public function create(){
        $slug = $this->uri->segment(4);
        $this->data['slug'] = $slug;

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('content', 'Nội dung', 'required');
        if($this->input->post()){
            if($this->form_validation->run() == TRUE){
                $slug = $this->input->post('slug');
                $unique_slug = $this->admission_model->build_unique_slug($slug);
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/admission', 'assets/upload/article/thumbs');
                $data = array(
                    'title'         => $this->input->post('title'),
                    'slug'          => $unique_slug,
                    'category'      => $this->input->post('cat'),
                    'image'         => $image,
                    'description'  => $this->input->post('description'),
                    'content'       => $this->input->post('content'),
                    'created_at'    => $this->author_info['created_at'],
                    'created_by'    => $this->author_info['created_by'],
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );

                try {
                    $this->admission_model->save($data);
                    $this->session->set_flashdata('message', 'Thêm bài viết thành công');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Thêm bài viết thất bại: ' . $e->getMessage());
                }
                redirect('admin/admission/list/'.$this->input->post('url'), 'refresh');
            }
        }

        $this->render('admin/admission/create_admission_view');
    }

    public function edit(){

        $slug = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $this->data['slug'] = $slug;
        if($slug == 'hoc-phi'){
            $where = array('category' => 1);
        }elseif($slug == 'chuong-trinh-khuyen-mai'){
            $where = array('category' => 2);
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');

        $admission_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $admission = $this->admission_model->fetch_by_id($admission_id);
        if ($this->form_validation->run() == FALSE) {
            $admission = $this->admission_model->fetch_by_id($admission_id);
            if(!$admission){
                $this->session->set_flashdata('message', 'Bài viết không tồn tại!');
                redirect('admin/admission/list/'.$slug, 'refresh');
            }

            $this->data['admission'] = $admission;
            $this->render('admin/admission/edit_admission_view');
        } else {
            if ($this->input->post()) {
                $input_slug = $this->input->post('slug');
                if($admission['slug'] == $input_slug){
                    $unique_slug = $this->admission_model->build_unique_slug($input_slug, $admission['id']);
                }else{
                    $unique_slug = $this->admission_model->build_unique_slug($input_slug);
                }
                
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/admission', 'assets/upload/article/thumbs');
                $data = array(
                    'title'        => $this->input->post('title'),
                    'slug'         => $unique_slug,
                    'category'     => $this->input->post('cat'),
                    'description'  => $this->input->post('description'),
                    'content'      => $this->input->post('content'),
                    'modified_at'  => $this->author_info['modified_at'],
                    'modified_by'  => $this->author_info['modified_by']
                );

                if($image != null){
                    $data['image'] = $image;
                }
                try {
                    $this->admission_model->update($admission_id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }
                redirect('admin/admission/list/'.$slug, 'refresh');
            }
        }

    }


    public function remove(){
    	$id = $_GET['id'];
    	$this->admission_model->delete($id);
    }

}
 ?>