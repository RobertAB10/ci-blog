<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensaje_model extends CI_Model
{
    
    public function get_mensaje(int $id_usuario, int $id_mensaje)
    {
        $query = $this->db->select('*')
                          ->from('mensajes')
                          ->where('id_mensaje', $id_mensaje)
                          ->where('id_emisor', $id_usuario)
                          ->or_where('id_remitente', $id_usuario)
                          ->get();
        
        if( $query->num_rows() > 0 ){
            return $query->row();
        } else {
            return "Lo sentimos, no estamos encontrando este mensaje.";
        }
    }

    public function get_mensajes_salida(int $id_usuario)
    {
        $query = $this->db->get_where('mensajes', array('id_emisor' => $id_usuario));

        if($query->num_rows() > 0){
            return $query;
        } else {
            return "No hay mensajes.";
        }
    }

    public function get_mensajes_entrada(int $id_usuario)
    {
        $query = $this->db->get_where('mensajes', array('id_receptor' => $id_usuario));

        if($query->num_rows() > 0){
            return $query;
        } else {
            return "No hay mensajes.";
        }
    }

    public function create_mensaje(array $datos)
    {
        $success = false;

        $this->db->insert('mensajes', $datos);

        if( $this->db->affected_rows() == 1 ){
            $success = true;
        }

        return $success;
    }

    public function delete_mensaje(int $id_usuario, int $id_mensaje)
    {
        $query = $this->get_mensajes_salida($id_usuario)->result();

        if(in_array($query)){
            $this->where('id', $id)->delete('mensajes');
        }
    }

}