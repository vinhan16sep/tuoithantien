<?php 
class Comment extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('comment_model');
	}
	public function create_comment(){
		$this->load->helper('date');
		$name = $_GET['name'];
		$email = $_GET['email'];
		$content = $_GET['content'];
		$category_id = $_GET['category_id'];
		$slug = $_GET['slug'];
		// echo date(DATE_RFC822, time());die;
		// print_r(now());die;

		$data = array(
				'name' => $name,
				'email' => $email,
				'content' => $content,
				'slug' => $slug,
				'category_id' => $category_id,
				'created_at' => date("Y/m/d")
				);
		$this->comment_model->save($data);
		echo '<p><span style="color: red">'.$name.' :</span style="color: red"> <span>'.$content.'</span> <span style="float: right; font-size: 10px">'.date("d/m/Y").'</span></p>';

	}
}

?>