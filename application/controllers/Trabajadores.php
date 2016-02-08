<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Trabajadores extends CI_Controller {

    private $sess_data;
    
	public function __construct()
        {
            parent::__construct();
            
           $this->sess_data = $this->session->userdata();
           
           if(!isset($this->sess_data['logged_in']) ){
               $this->output->set_header("Location: /login");
           }
           
           $this->load->model('dbtrabajadores');
        }
        
	public function index()
	{
            
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('trabajadores/ver');
            $this->load->view('footer');
	}
        
        public function ver($idempresa = '')
	{
            
            
            $trabajadores   = array();
            
            if(empty($idempresa)){
                $empresas       = $this->dbtrabajadores->empresas($this->sess_data['uid']);
                foreach($empresas as $empresa){
                
                    $conjunto_trabajadores = $this->dbtrabajadores->ver($empresa->idempresas);
                
                    foreach($conjunto_trabajadores as $trabajador){
                        $trabajadores[] = $trabajador;
                    }
                }
            }else{
                $conjunto_trabajadores = $this->dbtrabajadores->ver($idempresa);
                
                foreach($conjunto_trabajadores as $trabajador){
                    $trabajadores[] = $trabajador;
                }
            }   
            
            $data = array('trabajadores' => $trabajadores);
            
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('trabajadores/ver', $data);
            $this->load->view('footer');
	}
        
        public function nueva()
	{
                        
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('trabajadores/nueva');
            $this->load->view('footer');
	}
        
        public function guardar()
	{
            
            $nombre         = $this->input->post('nombre');
            $rut            = $this->input->post('rut');
            $razonsocial    = $this->input->post('razonsocial');
            
            if(!empty($nombre) && !empty($rut)){
                $data = array(
                   'nombre'         => $nombre,
                   'rut'            => $rut,
                   'razonsocial'    => $razonsocial,
                   'idusuarios'     => $this->sess_data['uid'],
                );

                if($this->dbempresas->guardar($data)){
                    $this->output->set_header("Location: /empresas/ver");
                }else{

                }
            }else{
                
            }
	}
        
    public function calendario($trabajador)
    {
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('trabajadores/calendario');
        $this->load->view('footer');
    }
    
    public function ajax_calendario()
    {
        $fecha = $this->input->post('fecha');
        
        $partes = explode("/", $fecha);
        
        $mes = $partes[0];
        $ano = $partes[1];
        
        $mes_anterior = ($mes-1)==0 ? $mes = 12 : $mes-1;
        
        $primer_dia_mes = (new DateTime($ano.'-'.$mes.'-01'))->modify('first day of this month')->format('N');
            
        $total_dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        
        echo '<ol class="calendar" start="'.$primer_dia_mes.'">';

	echo '<li id="lastmonth">';
         echo '<ol>';
        echo '  <li>Lunes</li>';
        echo '  <li>Martes</li>';
        echo '  <li>Miercoles</li>';
        echo '  <li>Jueves</li>';
        echo '  <li>Viernes</li>';
        echo '  <li>Sábado</li>';
        echo '  <li>Domingo</li>';
        echo '</ol>';
	echo '	<ol start="'.$primer_dia_mes.'">';
        
        if($primer_dia_mes>1){
            for($a=1;$a<$primer_dia_mes;$a++){
                
                echo '		<li>_</li>'; 
             
            }
        }
        
	echo '	</ol>';
	echo '</li>';
	
	echo '<li id="thismonth">';
       
	echo '	<ol>';
	    
        $dia_inicio = $primer_dia_mes;
        $nombre_dias = array("","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo");
        
        for($i=1;$i<=$total_dias;$i++){
            
            $n_dia = (($i<10) ? "0".$i : $i);
            
            echo '		<li>'.$i;
            echo '                  <input type="checkbox" name="asistencia[]" value="'.$ano.'-'.$mes.'-'.$n_dia.'">';
            echo '              </li>';
            $dia_inicio++;
            if($dia_inicio==8){ $dia_inicio = 1; }
            
            
        }
        
        echo '	</ol>';
	echo '</li>';
	
	echo '<li id="nextmonth">';
	echo '	<ol>';
	
	echo '	</ol>';
	echo '</li>';
	
        echo '</ol>';
        
        
    }
    
}
