<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
        {
           parent::__construct();
            
           $sess_data = $this->session->userdata();
           
           if(!isset($sess_data['logged_in'])){
               $this->output->set_header("Location: /login");
           }
        }
        
	public function index()
	{
            
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('home/home');
            $this->load->view('footer');
	}
}
