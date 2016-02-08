<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dblogin extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function existe_usuario($username)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE username='$username' LIMIT 1;");
        
        if ($query->num_rows() > 0){
            return(true);
        }else{
            return(false);
        }
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
    
    function user_id($username)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE username='$username' LIMIT 1;");
        
        if ($query->num_rows() > 0){
            $r = $query->result();
            return($r[0]->idusuarios);
        }else{
            return(false);
        }
    }
}