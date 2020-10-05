<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_model extends CI_Model
{
    public function set_sesion(array $datos)
    {
        $success = false;

        $this->db->insert('sesion', $datos);

        if( $this->db->affected_rows() == 1 ){
            $success = true;
        }

        return $success;
    }

    public function get_sesion(int $id_sesion, int $id_usuario){
        $this->db ->select('*')->from('sesion')
                 ->where('id_sesion', $id_sesion)
                 ->where('id_usuario', $id_usuario)
                 ->get()->result();
    }
}