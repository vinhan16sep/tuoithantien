<?php 

class Library extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->model('image_model');
        $this->load->model('library_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
	}

	public function index(){


        $keywords = '';
        if($this->input->get()){
            $keywords = $this->input->get('search');
        }

        $this->load->library('pagination');
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if($keywords != ''){
	        $total_rows  = $this->library_model->count_all(null,$keywords);
        }else{
        	$total_rows  = $this->library_model->count_all(null);

        }


        $config = array();
        $base_url = base_url() . 'admin/library/index';
        $per_page = 10;
        $uri_segment = 4;
        $config = $this->pagination_con($base_url, $total_rows, $per_page, $uri_segment);

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result  =  array();
        if($keywords != ''){
            $result = $this->library_model->fetch_all(null, $config['per_page'], $page, $keywords);
        }else{
            $result = $this->library_model->fetch_all(null, $config['per_page'], $page);
        }

        $this->data['library'] = $result;
        $this->data['search'] = $keywords;

		$this->render('admin/image/list_library_view');
	}

	public function create(){
        $slug = $this->uri->segment(4);
        $this->data['slug'] = $slug;
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('content', 'Nội dung', 'required');
        $this->form_validation->set_rules('image_list', 'Hình ảnh', 'callback_check_size_image');
        if($this->input->post()){
            if($this->form_validation->run() == TRUE){

                $slug = $this->input->post('slug');
                $unique_slug = $this->library_model->build_unique_slug($slug);
                if(!file_exists("assets/upload/image/".$unique_slug)){
                    mkdir("assets/upload/image/".$unique_slug, 0755);
                }

                // $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/image/'.$link, 'assets/upload/article/thumbs');
                $image_list = $this->upload_file('./assets/upload/image/'.$unique_slug, 'image_list');
                $data = array(
                    'title'         => $this->input->post('title'),
                    'slug'          => $unique_slug,
                    'content'       => $this->input->post('content'),
                    'created_at'	=> $this->author_info['created_at'],
                    'created_by'	=> $this->author_info['created_by'],
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );

                try {
                    $this->library_model->save($data);
                    $id = $this->db->insert_id();

                    $data2 = array();
		        	foreach ($image_list as $key => $value) {
		        		$data2['image_id'] = $id;
		        		$data2['image'] = $value;
		        		$this->image_model->save($data2);
		        	}

                    $this->session->set_flashdata('message', 'Thêm mới thư viện ảnh thành công');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Thêm mới thư viện ảnh thất bại: ' . $e->getMessage());
                }
                redirect('admin/library/index', 'refresh');
            }
        }

        $this->render('admin/image/create_library_view');
	}

    function check_size_image(){
        $this->form_validation->set_message('check_size_image', 'Ảnh đã vượt quá dung lượng 1 MB, vui lòng kiểm tra lại');
        if(!empty($_FILES)){
            foreach ($_FILES['image_list']['size'] as $value){
                if($value > 1048576 || $value <= 0){
                    return false;
                }
            }
            return true;
        }
    }

	public function edit($id = null){
        $id = $this->uri->segment(4);
        $this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required');

        $image_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $image_link = $this->library_model->fetch_by_id($image_id);
        $this->data['image_link'] = $image_link;
        if ($this->form_validation->run() == FALSE) {
            if(!$image_link){
                $this->session->set_flashdata('message', 'Bài viết không tồn tại');
                redirect('admin/library/index', 'refresh');
            }
            $this->render('admin/image/edit_library_view');
        } else {
            if ($this->input->post()) {
                $input_slug = $this->input->post('slug');
                if($image_link['slug'] == $input_slug){
                    $unique_slug = $this->library_model->build_unique_slug($input_slug, $image_link['id']);
                }else{
                    $unique_slug = $this->library_model->build_unique_slug($input_slug);
                }
                
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/image/'.$image_link['slug'], 'assets/upload/article/thumbs');
                $data = array(
                    'title'        => $this->input->post('title'),
                    'slug'         => $unique_slug,
                    'content'      => $this->input->post('content'),
                    'modified_at'  => $this->author_info['modified_at'],
                    'modified_by'  => $this->author_info['modified_by']
                );

                // if($image != null){
                //     $data['image_link'] = $image;
                // }
                try {
                    $this->library_model->update($image_id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
                }
                redirect('admin/library/index', 'refresh');
            }
        }
	}

	public function remove(){
		$id = $_GET['id'];
		$where = array('image_id' => $id);
		$count = $this->image_model->count_all($where);

		$where = array('id' => $id);
		$delete_image = $this->library_model->fetch_row($where);
		$isExist = false;
		if($count == 0){
			if ($this->library_model->delete($id)){
				if(file_exists("assets/upload/image/".$delete_image['slug'])){
					if(rmdir('assets/upload/image/'.$delete_image['slug'])){
						$isExist = true;
					}
				}
			}
		}
		$this->output->set_status_header(200)->set_output(json_encode(array('check' => $isExist)));
	}

	public function image(){
		
		$this->load->helper('form');
		
		$id = $this->uri->segment(4);
		$this->data['id'] = $id;
		$where =  array('id' => $id);
		$title = $this->library_model->fetch_row($where);
		$this->data['title'] = $title;

		$image_id = $this->uri->segment(4);
		$where = array('image_id' => $image_id);
		$library = $this->image_model->fetch_all($where);
		$this->data['library'] = $library;

		$this->render('admin/image/image_view');
	}

	public function create_image(){
        $id = $this->uri->segment(4);
        $image_link = $this->library_model->fetch_by_id($id);
        if($this->input->post()){
    		$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/image/'.$image_link['slug'], 'assets/upload/article/thumbs');
    		$data = array(
    			'title' => $this->input->post('title'),
    			'image' => $image,
    			'image_id' => $id
    		);
    		try {
    			$this->image_model->save($data);
    			$this->session->set_flashdata('message', 'Thêm ảnh thành công');
    		}catch(Exception $e){
    			$this->session->set_flashdata('message', 'Thêm ảnh thất bại: ' . $e->getMessage());
    		}
    		redirect('admin/library/image/'.$id, 'refresh');
        }
		
		$this->render('admin/image/create_image_view');
	}

	public function edit_image(){
		$id = $this->uri->segment(5);
		$where = array('id' => $id);
		$this->data['image_row'] = $this->image_model->fetch_row($where);

		$image_id = $this->uri->segment(4);
		$image_link = $this->library_model->fetch_by_id($image_id);

		if($this->input->post()){
			// $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/image/'.$image_link['slug'], 'assets/upload/article/thumbs');
			$data = array(
    			'title' => $this->input->post('title')
    		);
    		// if($image){
    		// 	$data['image'] = $image;
    		// }
    		try {
    			$this->image_model->update($id, $data);
    			$this->session->set_flashdata('message', 'Cập nhật ảnh thành công');
    		}catch(Exception $e){
    			$this->session->set_flashdata('message', 'Cập nhật ảnh thất bại: ' . $e->getMessage());
    		}
    		redirect('admin/library/image/'.$image_id,'refresh');
		}
		$this->render('admin/image/edit_image_view');
	}

	public function remove_image(){
		$image_id = $_GET['image_id'];
		$id = $_GET['id'];
		$image_link = $this->library_model->fetch_by_id($image_id);		
		$where = array('id' => $id);
		$delete_image = $this->image_model->fetch_row($where);
		if ($this->image_model->delete($id)){
		    unlink('assets/upload/image/'.$image_link['slug'].'/'. $delete_image['image']);
		}
	}

	public function remove_all_image(){
		$id = $this->uri->segment(4);
		$where = array('image_id' => $id);
		$image_link = $this->library_model->fetch_by_id($id);
		$delete_image = $this->image_model->fetch_all($where);
		$count = count($this->image_model->total($where));
		if($count > 0){
			if($this->image_model->delete_all($id) == true){
				foreach ($delete_image as $key => $value) {
					unlink('assets/upload/image/'.$image_link['slug'].'/'. $value['image']);
				}
			}
			$this->session->set_flashdata('message', 'Xóa ảnh thành công');
		}else{
			$this->session->set_flashdata('message', 'Xóa ảnh thất bại');
		}
		redirect('admin/library/index','refresh');
	}
}

 ?>