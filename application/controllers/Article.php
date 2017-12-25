<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class article extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('article_model');
    }


    public function detail(){
        $slug = $this->uri->segment(2);
        $where = array('slug' => $slug);
        $description = $this->article_model->fetch_row($where);
        $this->data['meta']['description'] = $description['title'];
        
        $sidebar = $this->article_model->fetch_all_by_type($slug);
        $this->data['sidebar'] = $sidebar;

        $where = array('slug' => $slug);
        $detail = $this->article_model->fetch_row($where);
        $this->data['detail'] = $detail;

        //comment
        $comment = $this->comment('article', $slug);
        if($comment){
            $this->data['comment'] = $comment;
        }
        //count comment
        $count_comment = $this->count_comment($slug);
        if($count_comment){
            $this->data['count_comment'] = count($count_comment);
        }else{
            $this->data['count_comment'] = 0;
        }

        $this->render('detail_article_view');
    }

}
