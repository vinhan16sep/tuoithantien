<?php 

class Comment extends Admin_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('comment_model');
        
	}

	public function index(){
        $this->output->enable_profiler(TRUE);
        $segment = $this->uri->segment(4);
        $new_array = array();

        $where = array('status' => 0);
        $list_comment = $this->comment_model->fetch_all($where);
        if($list_comment){
            foreach ($list_comment as $key => $value) {
                $array_slug[$value['category']][] = $value['slug'];
            }
            $new_array_slug = array();
            foreach ($array_slug as $key => $value) {
                $new_array_slug[$key] = array_unique($value);
            }
            foreach ($new_array_slug as $key => $value) {
                foreach ($value as $k => $item) {
                    $where = array('slug' => $item, 'status' => 0);
                    $news_comment[] = $this->comment_model->fetch_all($where);
                    $this->load->model($key.'_model');
                    $model = $key.'_model';
                    $where = array('slug' => $item);
                    $title = $this->$model->fetch_row($where);
                    $array_title[] = $title['title'];
                    $new_array[$key] = $news_comment;
                    foreach ($array_title as $sub => $val) {
                        $new_array[$key][$sub][0]['title'] = $val;
                    }
                    foreach ($news_comment as $s => $v) {
                        $new_array[$key][$s]['total'] = count($v);
                    }
                }
            }
        }

		$this->data['list_comment'] = $new_array;
		$this->render('admin/comment/new_comment_view');
	}

	public function introduce(){
        $this->load->model('introduce_model');
        $segment = $this->uri->segment(4);
        $where =  array('slug' => $segment, 'category' => 'introduce');
        $list_comment = $this->comment_model->fetch_all($where);

        if($list_comment){
            foreach ($list_comment as $key => $value) {
                $where =  array('slug' => $value['slug']);
                $sub = $this->introduce_model->fetch_row($where);
                $list_comment[$key]['sub'] = $sub['title'];
            }
        }

        $this->data['list_comment'] = $list_comment;

        $this->render('admin/comment/list_comment_view');
    }

    public function activity(){
        $this->load->model('activity_model');
        $segment = $this->uri->segment(4);
        $where =  array('slug' => $segment, 'category' => 'activity');
        $list_comment = $this->comment_model->fetch_all($where);

        if($list_comment){
            foreach ($list_comment as $key => $value) {
                $where =  array('slug' => $value['slug']);
                $sub = $this->activity_model->fetch_row($where);
                $list_comment[$key]['sub'] = $sub['title'];
            }
        }

        $this->data['list_comment'] = $list_comment;

        $this->render('admin/comment/list_comment_view');
    }

    public function admission(){
        $this->load->model('admission_model');
        $segment = $this->uri->segment(4);
        $where =  array('slug' => $segment, 'category' => 'admission');
        $list_comment = $this->comment_model->fetch_all($where);

        if($list_comment){
            foreach ($list_comment as $key => $value) {
                $where =  array('slug' => $value['slug']);
                $sub = $this->admission_model->fetch_row($where);
                $list_comment[$key]['sub'] = $sub['title'];
            }
        }

        $this->data['list_comment'] = $list_comment;

        $this->render('admin/comment/list_comment_view');
    }

    public function parental(){
        $this->load->model('parental_model');
        $segment = $this->uri->segment(4);
        $where =  array('slug' => $segment, 'category' => 'parental');
        $list_comment = $this->comment_model->fetch_all($where);

        if($list_comment){
            foreach ($list_comment as $key => $value) {
                $where =  array('slug' => $value['slug']);
                $sub = $this->parental_model->fetch_row($where);
                $list_comment[$key]['sub'] = $sub['title'];
            }
        }

        $this->data['list_comment'] = $list_comment;

        $this->render('admin/comment/list_comment_view');
    }

    public function article(){
        $this->load->model('article_model');
        $segment = $this->uri->segment(4);
        $where =  array('slug' => $segment, 'category' => 'article');
        $list_comment = $this->comment_model->fetch_all($where);

        if($list_comment){
            foreach ($list_comment as $key => $value) {
                $where =  array('slug' => $value['slug']);
                $sub = $this->article_model->fetch_row($where);
                $list_comment[$key]['sub'] = $sub['title'];
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

    public function check_status(){
        $slug = $this->input->get('slug');
        $category = $this->input->get('category');
        $where = array('category' => $category, 'slug' => $slug);
        $data =  array('status' => 1);
        $this->comment_model->update($where, $data);
    }

}

 ?>