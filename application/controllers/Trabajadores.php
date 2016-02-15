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
            $afps = $this->dbtrabajadores->afps();
            $empresas = $this->dbtrabajadores->empresas($this->sess_data['uid']);
            
            $data = array("afps" => $afps, "empresas" => $empresas);
            
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('trabajadores/nueva', $data);
            $this->load->view('footer');
	}
        
        public function guardar()
	{
            
            $nombre         = $this->input->post('nombre');
            $rut            = $this->input->post('rut');
            $sueldo_liquido = $this->input->post('sueldo_liquido');
            $cargo          = $this->input->post('cargo');
            $fecha          = $this->input->post('fecha');
            $empresa        = $this->input->post('empresa');
            $afp            = $this->input->post('afp');
            $salud          = $this->input->post('salud');
            
            $partes_fecha   = explode("/", $fecha);
            
            if(!empty($nombre) && !empty($rut)){
                $data = array(
                   'nombre'                 => $nombre,
                   'rut'                    => $rut,
                   'fecha_incorporacion'    => $partes_fecha[2].'-'.$partes_fecha[1].'-'.$partes_fecha[0],
                   'sueldo_liquido'         => $sueldo_liquido,
                   'idempresas'             => $empresa,
                   'afp'                    => $afp,  
                   'salud'                  => $salud,
                   'cargo'                  => $cargo,
                );

                if($this->dbtrabajadores->guardar($data)){
                    $this->output->set_header("Location: /trabajadores/ver");
                }else{

                }
            }else{
                
            }
	}
        
    public function calendario($trabajador)
    {
        
        $data = array("idusuario" => $trabajador);
        
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('trabajadores/calendario', $data);
        $this->load->view('footer');
    }
    
    public function ajax_calendario()
    {
        $fecha = $this->input->post('fecha');
        $idusuario = $this->input->post('idusuario');
        
        $partes = explode("/", $fecha);
        
        $mes = $partes[0];
        $ano = $partes[1];
        
        
        $primer_dia_mes = (new DateTime($ano.'-'.$mes.'-01'))->modify('first day of this month')->format('N');
        
        $total_dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        
        
        /* OBTENER CALENDARIO GUARDADO */
        
        $termino_date = (($total_dias<10) ? '0'.$total_dias : $total_dias);
        
        $inicio                 = $ano.'-'.$mes.'-01';
        $termino                = $ano.'-'.$mes.'-'.$termino_date;
        $calendario_guardado    = $this->dbtrabajadores->ver_asistencia($idusuario,$inicio, $termino);
        
               
        /* OBTENER CALENDARIO GUARDADO */
                
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
            
            if(in_array($ano.'-'.$mes.'-'.$n_dia,$calendario_guardado)){
                echo '                  <input type="checkbox" name="asistencia[]" checked="checked" value="'.$ano.'-'.$mes.'-'.$n_dia.'">';
            }else{
                echo '                  <input type="checkbox" name="asistencia[]" value="'.$ano.'-'.$mes.'-'.$n_dia.'">';
            }
            
            
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
    
    public function ajax_guardar_calendario()
    {
        $idusuario  = $this->input->post('idusuario');
        
        $asistencia = $this->input->post('asistencia');
        $fecha_base = $this->input->post('fecha_base');
                
        $partes_fecha_base = explode("/", $fecha_base);
        
        $mes = $partes_fecha_base[0];
        $ano = $partes_fecha_base[1];
        
        $this->dbtrabajadores->limpiar_mes($idusuario, $mes, $ano);
        
        foreach($asistencia as $fecha){
            $data = array("fecha" => $fecha,
                          "idtrabajadores" => $idusuario);
            
            $this->dbtrabajadores->guardar_asistencia($data);
        }
    }
    
    public function liquidacion($idusuario)
    {
        $data = array("idusuario" => $idusuario);
        
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('trabajadores/liquidacion', $data);
        $this->load->view('footer');
    }
    
    public function ajax_liquidacion()
    {
        $this->load->helper("nlet");
        
        $fecha      = $this->input->post('fecha');
        $idusuario  = $this->input->post('idusuario');
        
        $partes = explode("/", $fecha);
        
        $mes = $partes[0];
        $ano = $partes[1];
        
        /* ------------------------------- ADQUIRIR DATOS ------------------------------- */
        
        
        $usuario            = $this->dbtrabajadores->liquidacion_usuario($idusuario);
        $empresa            = $this->dbtrabajadores->liquidacion_empresa($usuario->idempresas);
        $afp_datos          = $this->dbtrabajadores->liquidacion_afp($usuario->afp);
        $dias_trabajados    = $this->dbtrabajadores->liquidacion_diasTrabajados($idusuario, $mes, $ano);
        
        /* ------------------------------- ADQUIRIR DATOS ------------------------------- */
        
        
        /* --------------------------- CALCULANDO LIQUIDACION --------------------------- */
        
        $haberes = 0;
        
        $sueldo_base        = $empresa->sueldo_base;
        $gratificacion      = (($sueldo_base/100)*25);
        $colacion           = 5000;
        $movilizacion       = 5000;
        
        $haberes            = $sueldo_base+$gratificacion+$colacion+$movilizacion;
        
        $factor_comision    = $afp_datos->comision;
        
        $salud              = (($haberes/100)*7);
        $afp                = (($haberes/100)*10);
        $comision           = (($haberes/100)*$factor_comision);
        
        $descuentos         = $salud+$afp+$comision;
        
        $liquido            = ($haberes-$descuentos);
        
        $liquidacion        = array("sueldo_base"   => $sueldo_base,
                                    "gratificacion" => $gratificacion,
                                    "colacion"      => $colacion,
                                    "movilizacion"  => $movilizacion,
                                    "base_imponible"=> $haberes,
                                    "salud"         => $salud,
                                    "afp"           => $afp,
                                    "comision"      => $comision,
                                    "haberes"       => $haberes,
                                    "descuentos"    => $descuentos,
                                    "liquido"       => $liquido,
                                    "esperado_liquido" => $usuario->sueldo_liquido);
        
        /* --------------------------- CALCULANDO LIQUIDACION --------------------------- */
        
        $data = array("dias_trabajados" => count($dias_trabajados),
                      "usuario"         => $usuario,
                      "empresa"         => $empresa,
                        "liquidacion"   => $liquidacion);
        
        $string = $this->load->view('trabajadores/liquidacion_estructura', $data, TRUE);
        
        echo $string;
    }
}
