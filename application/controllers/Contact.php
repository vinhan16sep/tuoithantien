<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "class.phpmailer.php";
include "class.smtp.php";

class Contact extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('product_model');
        $this->load->model('article_model');
        $this->load->model('contact_model');
    }

    public function index(){
        $this->render('contact_view');
    }

    public function subcribe(){
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['latest_products'] = $this->product_model->fetch_latest_products();
            $this->data['feature_products'] = $this->product_model->fetch_feature_products();
            $this->data['latest_articles'] = $this->article_model->fetch_latest_articles(4);

            $this->render('homepage');
        } else {
            if ($this->input->post()) {
                $data = array(
                    'email' => $this->input->post('email')
                );

                $insert = $this->contact_model->save($data);
                if (!$insert) {
                    $this->session->set_flashdata('message', 'Oops, something wrong!');
                }
                $this->session->set_flashdata('message', 'Congratz, you have subcribed!');

                redirect('homepage', 'refresh');
            }
        }
    }

    public function send_mail($info = array()) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->Host = "host06.emailserver.vn"; // specify main and backup server
        $mail->Port = 465; // set the port to use
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = 'ssl';
        $mail->Username = "contact@namanhkhuong.vn"; // your SMTP username or your gmail username
        $mail->Password = "abcd@1234"; // your SMTP password or your gmail password
        $mail->CharSet = 'UTF-8';
        $from = "contact@namanhkhuong.vn"; // Reply to this email
        $to = 'vinhan16sep@gmail.com'; // Recipients email ID
        $name = 'An Nguyen'; // Recipient's name
        $mail->From = $from;
        $mail->FromName = "From namanhkhuong.vn"; // Name to indicate where the email came from when the recepient received
        $mail->AddAddress($to,$name);
        $mail->AddReplyTo($from);
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = "Email từ website";

        $message = '<html><body>';
        $message .= '<p>Something here</p>';
        $message .= "</body></html>";

        $mail->Body = $message; //HTML Body
        //$mail->SMTPDebug = 2;

        try{
            $mail->Send();
        }catch(Exception $e){
            $this->session->set_flashdata('message', '<h1>Oops, Error: "'. $mail->ErrorInfo . '</h1>');
        }
    }
}
