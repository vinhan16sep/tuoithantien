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
		$content = nl2br($_GET['content']);
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

        $comment = '<div class="media">';
        $comment .= '<div class="media-left">';
        $comment .= '<img class="media-object" src="'.site_url('assets/public/img/comment_ava.png').'" alt="Comment Avatar" width="64">';
        $comment .= '</div>';
        $comment .= '<div class="media-body">';
        $comment .= '<h3 class="media-heading" style="color: #f4aa1c">'.$name.':</h3>';
        $comment .= '<span>'.$content.'</span>';
        $comment .= '<span style="float: right; font-size: 1em">'.date('Y/m/d').'</span>';
        $comment .= '</div>';
        $comment .= '</div>';

//		$comment = '<p><span style="color: red">'.$name.' :</span style="color: red"> <span>'.$content.'</span> <span style="float: right; font-size: 10px">'.date("d/m/Y").'</span></p>';

		$this->output->set_status_header(200)->set_output(json_encode(array('comment' => $comment)));

	}
}

?>