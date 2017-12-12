<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/12/2017
 * Time: 6:12 PM
 */
    class Subcribe extends Public_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('subcribe_model');
        }

        public function create(){
            $email = $this->input->get('email');
            $where = array('email' => $email);
            $count = $this->subcribe_model->count_all($where);
            if($count > 0){
                $isExitsts = false;

            }else{
                $isExitsts = true;
                $data = array(
                    'email' => $email,
                    'created_at' => date("Y/m/d")
                );
                $this->subcribe_model->save($data);
            }


            $this->output->set_status_header(200)->set_output(json_encode(array('isExitsts' => $isExitsts)));
        }
    }