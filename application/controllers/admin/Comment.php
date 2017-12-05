<?php 

class Comment extends Admin_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('comment_model');
        $this->load->model('introduce_model');
        $this->load->model('admission_model');
        $this->load->model('parental_model');
        $this->load->model('activity_model');
        $this->load->library('session');
	}

	public function index(){
		$this->output->enable_profiler(TRUE);
		$list_comment = $this->comment_model->fetch_all();
		$comment = array('giới thiệu, thông tin nhập học, phối hợp cùng phụ huynh, hoạt động');
		if($list_comment){
			foreach ($list_comment as $key => $value) {
				switch ($value['category_id']) {
					case '1':
						$where =  array('id' => $value['post_id']);
						$sub = $this->introduce_model->fetch_row($where);
						$list_comment[$key]['sub'] = $sub;
						break;
					case '2':
						$where =  array('id' => $value['post_id']);
						$sub = $this->admission_model->fetch_row($where);
						$list_comment[$key]['sub'] = $sub;
						break;
					case '3':
						$where =  array('id' => $value['post_id']);
						$sub = $this->parental_model->fetch_row($where);
						$list_comment[$key]['sub'] = $sub;
						break;
					case '4':
						$where =  array('id' => $value['post_id']);
						$sub = $this->activity_model->fetch_row($where);
						$list_comment[$key]['sub'] = $sub;
						break;
					default:
						# code...
						break;
				}
			}
		}
		// print_r($list_comment);
		$this->data['list_comment'] = $list_comment;

		$this->render('admin/comment/list_comment_view');
	}

	public function remove(){
		$id = $_GET['id'];
		$this->comment_model->delete($id);
	}

}

 ?>