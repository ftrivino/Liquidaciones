<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbempresas extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function ver($uid)
    {
        $query = $this->db->query("SELECT * FROM empresas WHERE idusuarios=$uid;");
        
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
        if($this->db->insert('empresas', $data)){
            return(true);
        }else{
            return(false);
        }
    }
}