<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    public function get_usuario($id_usuario)
    {
        $query = $this->db->get_where('usuarios', array('id' => $id_usuario));

        if($query->num_rows() > 0){
            return $query;
        } else {
            return "Algo ha ido mal con ese usuario";
        }
    }

    public function create_usuario(array $datos)
    {
        $success = false;

        $this->db->insert('usuarios', $datos);

        if( $this->db->affected_rows() == 1 ){
            $success = true;
        }

        return $success;  
    }

    public function validar_usuario(string $email, string $password)
    {
        $query = $this->db->select('1')->from('usuarios')
                 ->where('email', $email)
                 ->where('password', $password)
                 ->get()->result();

        return $query;
    }
}