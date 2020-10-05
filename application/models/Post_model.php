<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model
{

    public function get_all_posts()
    {
        $query = $this->db->select('posts.*, usuarios.id_usuario, usuarios.email')
                           ->from('posts')
                           ->join('usuarios', 'usuarios.id_usuario = posts.id_usuario')
                           ->get()
                           ->row();

        if( $query->num_rows() > 0 ){
            return $query;
        } else {
            return "No hay posts.";
        }
    }


    public function get_posts( int $id_post ){
        
        $query = $this->db->select('posts.*, usuarios.id_usuario, usuarios.email')
                          ->from('posts')
                          ->join('usuarios', 'usuarios.id_usuario = posts.id_usuario')
                          ->get()
                          ->result();

        if($query->num_rows() > 0){
            return $query;
        } else {
            return "Este post no existe";
        }
    }

    public function create_post(array $datos)
    {
        $success = false;

        $this->db->insert('posts', $datos);

        if( $this->db->affected_rows() == 1 ){
            $success = true;
        }

        return $success;
    }

    public function delete_post(int $id_usuario, int $id_post)
    { 
        $this->where('id', $id_post)
             ->where('id_usuario',$id_usuario)
             ->delete('mensajes'); 
    }

}