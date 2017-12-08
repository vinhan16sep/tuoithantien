<?php 
 
class Activity extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->model('activity_model');
	}

    private function check_slug($slug){
        if($slug == 'thong-bao'){
            $where = array('category' => 1);
        }elseif($slug == 'tuyen-sinh'){
            $where = array('category' => 2);
        }
        elseif($slug == 'trai-nghiem'){
            $where = array('category' => 3);
        }
        return $where;
    }

	public function index(){
    	$this->load->helper('form');
        $this->load->library('form_validation');

        $slug = $this->uri->segment(4);
        $slug_array = array(
                        'thong-bao' => 'thông báo',
                        'tuyen-sinh' => 'tuyển sinh',
                        'trai-nghiem' => 'trải nghiệm'
                    );
        if(array_key_exists($slug, $slug_array) == false){
            redirect('admin/dashboard','refresh');
        }
        if(!empty($this->uri->segment(5)) && !is_numeric($this->uri->segment(5))){
            redirect('admin/dashboard','refresh');
        }
        
        $this->data['slug'] = $slug;
        
        $where = $this->check_slug($slug);

        if (count($_POST) > 0){
            $this->session->set_userdata('search_activity', $_POST );
            redirect('admin/activity/index/'.$slug,'refresh');
        }else{
            if($this->session->userdata('search_activity')){
                $_POST = $this->session->userdata('search_activity');
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
        		redirect('admin/activity/index/'.$slug,'refresh');
        	}
	        $total_rows  = $this->activity_model->count_all($where,$search);
        }else{
        	$total_rows  = $this->activity_model->count_all($where);

        }

        $config = array();
        $base_url = base_url() . 'admin/activity/index/'.$slug;
        $per_page = 20;
        $uri_segment = 5;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result  =  array();
        if($keywords != ''){
            $result = $this->activity_model->fetch_all($where, $per_page, $page, $keywords);
        }else{
            $result = $this->activity_model->fetch_all($where, $per_page, $page);
        }

        $this->data['activity'] = $result;


		$this->render('admin/activity/list_activity_view');
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
                $unique_slug = $this->activity_model->build_unique_slug($slug);

                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/activity', 'assets/upload/article/thumbs');
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
                    $this->activity_model->save($data);
                    $this->session->set_flashdata('message', 'Thêm bài viết thành công');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Thêm bài viết thất bại: ' . $e->getMessage());
                }
                redirect('admin/activity/index/'.$this->input->post('url'), 'refresh');
            }
        }

        $this->render('admin/activity/create_activity_view');
	}

	public function edit(){
		$slug = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $this->data['slug'] = $slug;
        $where = $this->check_slug($slug);

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');

        $activity_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $activity = $this->activity_model->fetch_by_id($activity_id);
        $this->data['activity'] = $activity;
        // print_r($activity);die;
        if ($this->form_validation->run() == FALSE) {
            $activity = $this->activity_model->fetch_by_id($activity_id);
            if(!$activity){
                $this->session->set_flashdata('message', 'Không tồn tại bài viết');
                redirect('admin/activity/index/'.$slug, 'refresh');
            }

            
            $this->render('admin/activity/edit_activity_view');
        } else {
            if ($this->input->post()) {
                $input_slug = $this->input->post('slug');
                if($activity['slug'] == $input_slug){
                    $unique_slug = $this->activity_model->build_unique_slug($input_slug, $activity['id']);
                }else{
                    $unique_slug = $this->activity_model->build_unique_slug($input_slug);
                }
                
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/activity', 'assets/upload/article/thumbs');
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
                    $this->activity_model->update($activity_id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }
                redirect('admin/activity/index/'.$slug, 'refresh');
            }
        }
	}

	public function remove(){
		$id = $_GET['id'];
		$this->activity_model->delete($id);
	}
}

 ?>