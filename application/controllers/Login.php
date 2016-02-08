<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            
           $sess_data = $this->session->userdata();
           
           if(isset($sess_data['logged_in'])){
               $this->output->set_header("Location: /home");
           }
        }
	
	public function index()
	{
		$this->load->view('login');
	}
        
        public function verificar()
        {
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            if(!empty($username) && !empty($password)){
                
                $this->load->model('dblogin');
                
                if($this->dblogin->existe_usuario($username)){
                    
                    if($this->dblogin->validar($username, $password)){
                        
                        $sess_data = array(
                                            'username'  => $username,
                                            'logged_in' => TRUE,
                                            'uid'       => $this->dblogin->user_id($username),
                                        );

                        $this->session->set_userdata($sess_data);

                        $this->output->set_header("Location: /home");
                    }else{
                       $this->load->view('login',array("error" => "Datos de acceso incorrectos (1020).")); 
                    }
                            
                }else{
                    $this->load->view('login',array("error" => "Datos de acceso incorrectos (1010)."));
                }
                
            }else{
                $this->load->view('login',array("error" => "Faltan datos."));
            }
            
            
        }
        
        public function salir()
        {
            $this->session->sess_destroy();
        }
}
