<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

    private $sess_data;
    
	public function __construct()
        {
            parent::__construct();
            
           $this->sess_data = $this->session->userdata();
           
           if(!isset($this->sess_data['logged_in'])){
               $this->output->set_header("Location: /login");
           }
           
           $this->load->model('dbempresas');
        }
        
	public function index()
	{
            
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('empresas/ver');
            $this->load->view('footer');
	}
        
        public function ver()
	{
            
            $empresas = $this->dbempresas->ver($this->sess_data['uid']);
            
            $data = array('empresas' => $empresas);
            
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('empresas/ver', $data);
            $this->load->view('footer');
	}
        
        public function nueva()
	{
                        
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('empresas/nueva');
            $this->load->view('footer');
	}
        
        public function guardar()
	{
            
            $nombre         = $this->input->post('nombre');
            $rut            = $this->input->post('rut');
            $razonsocial    = $this->input->post('razonsocial');
            $sueldo_base    = $this->input->post('sueldo_base');
            
            if(!empty($nombre) && !empty($rut)){
                $data = array(
                   'nombre'         => $nombre,
                   'rut'            => $rut,
                   'razonsocial'    => $razonsocial,
                   'idusuarios'     => $this->sess_data['uid'],
                   'sueldo_base'    => $sueldo_base,
                );

                if($this->dbempresas->guardar($data)){
                    $this->output->set_header("Location: /empresas/ver");
                }else{

                }
            }else{
                
            }
	}
        
         
}
