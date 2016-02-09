<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbtrabajadores extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function empresas($uid)
    {
        $query = $this->db->query("SELECT * FROM empresas WHERE idusuarios=$uid;");
        
        return($query->result());
    }
    
    function ver($idempresa)
    {
        $query = $this->db->query("SELECT * FROM trabajadores WHERE idempresas=$idempresa;");
        
        return($query->result());
    }

    function validar($username, $password)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE username='$username' AND password=MD5('$password') LIMIT 1;");
        
        if ($query->num_rows() > 0){
            return(true);
        }else{
            return(false);
        }
    }
    
    function guardar($data)
    {
        if($this->db->insert('trabajadores', $data)){
            return(true);
        }else{
            return(false);
        }
    }
    
    function guardar_asistencia($data)
    {
        if($this->db->insert('asistencia', $data)){
            return(true);
        }else{
            return(false);
        }
    }
    
    function ver_asistencia($idusuario,$inicio, $termino)
    {
        $query = $this->db->query("SELECT *, DATE(fecha) as solo_fecha FROM asistencia WHERE idtrabajadores='$idusuario' AND DATE(fecha)>='$inicio' AND DATE(fecha)<='$termino';");
        
        $resultados = $query->result();
        
        $salida = array();
        
        foreach($resultados as $resultado){
            $salida[] = $resultado->solo_fecha;
        }
        
        return($salida);
    }
    
    function afps()
    {
        $query = $this->db->query("SELECT * FROM afps");
                
        return($query->result());
    }
}