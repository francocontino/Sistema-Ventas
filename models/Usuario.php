<?php
//models/Usuario.php

class Usuario extends Model{

    public function getTodos(){
        $this->db->query("SELECT* FROM usuario");
        return $this->db->fetchAll();
    }

    public function nuevoUsuario($nombre,$clave,$id_rol){

        if(strlen($nombre)<1) throw new excepcionu('error');  
        $nombre = $this->db->escape($nombre);

        if(strlen($clave)<1)throw new excepcionu('error');   
        $clave = $this->db->escape($clave);
        
        if(!is_numeric($id_rol))throw new excepcionu('error');
        if($id_rol < 1) throw new excepcionu('error');
        if($id_rol > 3) throw new excepcionu('error');

        $this->db->query("INSERT INTO usuario
                        (nombre,clave,id_rol)
                        VALUES('$nombre',$clave,$id_rol)");
    }

    public function eliminarUsuario($u){

        $usuaux = new Usuario();
        if(!$usuaux->existeUsu($u)) throw new excepcionu('error');

        $this->db->query("DELETE FROM usuario
                          WHERE id_usuario=$u
                          LIMIT 1");
    }

    public function getUno($id){

        $usuaux = new Usuario();
        if(!$usuaux->existeUsu($id))throw new excepcionu('error');

        $this->db->query("SELECT* FROM usuario WHERE id_usuario=$id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function editarUsuario($nombre,$rol,$id){

        if(strlen($nombre)<1) throw new excepcionu('error');  
        $nombre = $this->db->escape($nombre);
        
        if(!is_numeric($rol))throw new excepcionu('error');
        if($rol < 1) throw new excepcionu('error');
        if($rol > 3) throw new excepcionu('error');

        $usuaux = new Usuario();
        if(!$usuaux->existeUsu($id))throw new excepcionu('error');

        $this->db->query("UPDATE usuario
                          set nombre='$nombre',id_rol=$rol
                          WHERE id_usuario=$id LIMIT 1");
    }

    public function login($nombre,$clave){

        if(strlen($nombre)<1) throw new excepcionu('error');  
        $nombre = $this->db->escape($nombre);

        if(strlen($clave)<1)throw new excepcionu('error');   
        $clave = $this->db->escape($clave);
        
        $this->db->query("SELECT* FROM usuario WHERE nombre='$nombre' and clave='$clave' LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getCant(){
        $this->db->query("SELECT COUNT(*) total FROM usuario");
        return $this->db->fetchAll();
    }

    public function existeUsu($id){
        if(!ctype_digit($id)) return false;
        if($id < 1) return false;

        $this->db->query("SELECT* FROM usuario
                         WHERE id_usuario = $id");
        
        if($this->db->numRows() != 1) return false;

        return true;
    }
}
class excepcionu extends Exception{}
?>