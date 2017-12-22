<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('contact_model');
    }

    public function index(){
        //theme
        $this->load->model('theme_model');
        $this->data['themes'] = $this->theme_model->fetch_all();

        // count acticle
        $this->load->model('activity_model');
        $this->load->model('admission_model');
        $this->load->model('article_model');
        $this->load->model('library_model');
        $this->load->model('introduce_model');
        $this->load->model('parental_model');
        $this->load->model('video_model');
        $this->load->model('image_model');

        //total acticle
        $count_activity = $this->activity_model->count_all();
        $count_admission = $this->admission_model->count_all();
        $count_article = $this->article_model->count_all();
        $count_library = $this->library_model->count_all();
        $count_introduce = $this->introduce_model->count_all();
        $count_parental = $this->parental_model->count_all();
        $count_video = $this->video_model->count_all();

        $this->data['total_acticle'] = $count_activity + $count_admission + $count_article + $count_library + $count_introduce + $count_parental + $count_video;

        //total acticle in day
        $date = date('Y-m-d 00:00:00');
        $date1 = str_replace('-', '/', $date);
        $tomorrow = date('Y-m-d 00:00:00',strtotime($date1 . "+1 days"));

        $where = array('created_at >=' => date('Y-m-d 00:00:00'), 'created_at <' => $tomorrow);

        $day_activity = $this->activity_model->count_day($where);
        $day_admission = $this->admission_model->count_day($where);
        $day_article = $this->article_model->count_day($where);
        $day_library = $this->library_model->count_day($where);
        $day_introduce = $this->introduce_model->count_day($where);
        $day_parental = $this->parental_model->count_day($where);
        $day_video = $this->video_model->count_day($where);

        $this->data['day_activity'] = $day_activity;
        $this->data['day_admission'] = $day_admission;
        $this->data['day_article'] = $day_article;
        $this->data['day_library'] = $day_library;
        $this->data['day_introduce'] = $day_introduce;
        $this->data['day_parental'] = $day_parental;
        $this->data['day_video'] = $day_video;

        $this->data['total_day_acticle'] = $day_activity + $day_admission + $day_article + $day_library + $day_introduce + $day_parental + $day_video;
        // $this->output->enable_profiler(TRUE);
        

        // list article
        $list_activity = $this->activity_model->get_all_pagination($where);
        $list_admission = $this->admission_model->get_all_pagination($where);
        $list_article = $this->article_model->get_all_pagination($where);
        $list_introduce = $this->introduce_model->get_all_pagination($where);
        $list_parental = $this->parental_model->get_all_pagination($where);
        $list_video = $this->video_model->fetch_all($where);
        $list_library = $this->library_model->fetch_all($where);
        if($list_library){
            foreach ($list_library as $key => $value) {
                $where = array('image_id' => $value['id']);
                $sub = $this->image_model->fetch_row($where);
                $list_library[$key]['sub'] = $sub['image'];
            }
        }
        

        $this->data['list_activity'] = $list_activity;
        $this->data['list_admission'] = $list_admission;
        $this->data['list_article'] = $list_article;
        $this->data['list_library'] = $list_library;
        $this->data['list_introduce'] = $list_introduce;
        $this->data['list_parental'] = $list_parental;
        $this->data['list_video'] = $list_video;

        //total register
        $this->load->model('register_model');
        $where = array('status' => 0);
        $this->data['total_register'] = $this->register_model->count_all($where);

        //total new comment
        $this->load->model('comment_model');
        $where = array('status' => 0);
        $this->data['total_comment'] = $this->comment_model->count_all($where);

        $this->data['count'] = $this->contact_model->count_survey();

        $this->render('admin/dashboard_view');
    }

    public function edit_theme(){
        $this->load->model('theme_model');
        $id = $this->input->get('id');
        $active = $this->theme_model->fetch_row();
        $not_article = array('is_active' => 0);
        $article = array('is_active' => 1);
        $this->theme_model->update($active['id'], $not_article);
        $this->theme_model->update($id, $article);
        if($this->theme_model->update($active['id'], $not_article) && $this->theme_model->update($id, $article)){
            $isExists = false;
        }else{
            $isExists = true;
        }
        $this->output->set_status_header(200)->set_output(json_encode(array('isExists' => $isExists)));
    }


}