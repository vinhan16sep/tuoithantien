<?php 

class Comment extends Admin_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('comment_model');
        $this->load->model('introduce_model');
        $this->load->model('admission_model');
        $this->load->model('parental_model');
        $this->load->model('activity_model');
	}

	public function index(){
        $segment = $this->uri->segment(4);
        if($segment == 'new-comment'){
            $this->load->model('count_comment_model');
            $list_comment = $this->count_comment_model->fetch_all();
        }else{
            $where =  array('slug' => $segment);
            $list_comment = $this->comment_model->fetch_all($where);
        }

		$comment = array('giới thiệu, thông tin nhập học, phối hợp cùng phụ huynh, hoạt động');
		if($list_comment){
			foreach ($list_comment as $key => $value) {
				switch ($value['category_id']) {
					case '1':
						$where =  array('slug' => $value['slug']);
						$sub = $this->introduce_model->fetch_row($where);
						$list_comment[$key]['sub'] = $sub;
						break;
					case '2':
						$where =  array('slug' => $value['slug']);
						$sub = $this->admission_model->fetch_row($where);
						$list_comment[$key]['sub'] = $sub;
						break;
					case '3':
						$where =  array('slug' => $value['slug']);
						$sub = $this->parental_model->fetch_row($where);
						$list_comment[$key]['sub'] = $sub;
						break;
					case '4':
						$where =  array('slug' => $value['slug']);
						$sub = $this->activity_model->fetch_row($where);
						$list_comment[$key]['sub'] = $sub;
						break;
					default:
						# code...
						break;
				}
			}
		}
		$this->data['list_comment'] = $list_comment;
		$this->render('admin/comment/list_comment_view');
	}

	public function delete_all(){
        $this->db->empty_table('count_comment');
        redirect('admin/dashboard');

    }

	public function remove(){
		$id = $_GET['id'];
		$this->comment_model->delete($id);
	}

}

 ?>