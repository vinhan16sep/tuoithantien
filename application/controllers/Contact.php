<?php 
	class Contact extends Public_Controller{
		
		function __construct(){
			parent::__construct();
		}
		function index(){
			$this->render('contact_view');
		}
	}
?>