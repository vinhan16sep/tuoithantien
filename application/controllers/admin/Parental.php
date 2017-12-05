<?php 
class Parental extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->model('parental_model');
	}

	public function activity(){

        $this->load->helper('form');
        $this->load->library('form_validation');

        $slug = $this->uri->segment(4);
        $this->data['slug'] = $slug;

        if($slug == 'che-do-sinh-hoat-1-ngay'){
        	$where = array('slug' => 'che-do-sinh-hoat-1-ngay');
        }
        if($slug == 'gio-dua-don'){
        	$where = array('slug' => 'gio-dua-don');
        }

        $activity = $this->parental_model->fetch_row($where);
        $this->data['activity'] =  $activity;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
        
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post()) {
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/parental', 'assets/upload/article/thumbs');
                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $this->input->post('slug'),
                    'content' => $this->input->post('content'),
                    'created_at'    => $this->author_info['created_at'],
                    'created_by'    => $this->author_info['created_by'],
                    'modified_at' => $this->author_info['modified_at'],
                    'modified_by' => $this->author_info['modified_by']
                );
                if($image != null){
                    $data['image'] = $image;
                }

                try {
                    $this->parental_model->update($activity['id'], $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }

                redirect('admin/parental/activity/'.$slug, 'refresh');
            }
        }


		$this->render('admin/parental/activity_view');
	}

	public function list(){

    	$this->load->helper('form');
        $this->load->library('form_validation');

        $slug = $this->uri->segment(4);
        $this->data['slug'] = $slug;
        if($slug == 'lien-lac'){
        	$where = array('category' => 1);
        }elseif($slug == 'thuc-don'){
        	$where = array('category' => 2);
        }
        elseif($slug == 'y-te'){
        	$where = array('category' => 3);
        }
        elseif($slug == 'ky-luat'){
        	$where = array('category' => 4);
        }

        if (count($_POST) > 0){
            $this->session->set_userdata('search_parental', $_POST );
            redirect('admin/parental/list/'.$slug,'refresh');
        }else{
            if($this->session->userdata('search_parental')){
                $_POST = $this->session->userdata('search_parental');
            }
        }

        $keywords = '';
        if($this->input->post()){
            $keywords = $this->input->post('search');
        }
        $this->load->library('pagination');
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        

        if($keywords != ''){
        	$search = $this->input->post('search');

        	if($keywords == null){
        		redirect('admin/parental/list/'.$slug,'refresh');
        	}
	        $total_rows  = $this->parental_model->count_all($where,$search);
        }else{
        	$total_rows  = $this->parental_model->count_all($where);

        }

        $config = array();
        $base_url = base_url() . 'admin/parental/list/'.$slug;
        $per_page = 20;
        $uri_segment = 5;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result  =  array();
        if($keywords != ''){
            $result = $this->parental_model->fetch_all($where, $config['per_page'], $page, $keywords);
        }else{
            $result = $this->parental_model->fetch_all($where, $config['per_page'], $page);
        }

        $this->data['parental'] = $result;

		$this->render('admin/parental/list_parental_view');
	}

	public function edit(){
		$slug = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $this->data['slug'] = $slug;
        if($slug == 'lien-lac'){
        	$where = array('category' => 1);
        }elseif($slug == 'thuc-don'){
        	$where = array('category' => 2);
        }
        elseif($slug == 'y-te'){
        	$where = array('category' => 3);
        }
        elseif($slug == 'ky-luat'){
        	$where = array('category' => 4);
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');

        $parental_id = isset($id) ? (int) $id : (int) $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $parental = $this->parental_model->fetch_by_id($parental_id);
            if(!$parental){
                $this->session->set_flashdata('message', 'Item does not exist');
                redirect('admin/parental/list/'.$slug, 'refresh');
            }

            $this->data['parental'] = $parental;
            $this->render('admin/parental/edit_parental_view');
        } else {
            if ($this->input->post()) {
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/parental', 'assets/upload/article/thumbs');
                $data = array(
                    'title'        => $this->input->post('title'),
                    'slug'         => $this->input->post('slug'),
                    'category'     => $this->input->post('cat'),
                    'content'      => $this->input->post('content'),
                    'modified_at'  => $this->author_info['modified_at'],
                    'modified_by'  => $this->author_info['modified_by']
                );

                if($image != null){
                    $data['image'] = $image;
                }
                try {
                    $this->parental_model->update($parental_id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viêt thất bại: ' . $e->getMessage());
                }
                redirect('admin/parental/list/'.$slug, 'refresh');
            }
        }
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
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/parental', 'assets/upload/article/thumbs');
                $data = array(
                    'title'         => $this->input->post('title'),
                    'slug'          => $this->input->post('slug'),
                    'category'      => $this->input->post('cat'),
                    'image'         => $image,
                    'content'       => $this->input->post('content'),
                    'created_at'    => $this->author_info['created_at'],
                    'created_by'    => $this->author_info['created_by'],
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );

                try {
                    $this->parental_model->save($data);
                    $this->session->set_flashdata('message', 'Thêm mơi bài viết thành công');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Thêm mới bài viết thất bại: ' . $e->getMessage());
                }
                redirect('admin/parental/list/'.$this->input->post('url'), 'refresh');
            }
        }

        $this->render('admin/parental/create_parental_view');
	}

	public function remove(){
		$id = $_GET['id'];
		$this->parental_model->delete($id);
	}
}

 ?>