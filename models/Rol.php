<?php
//models/Rol.php

class Rol extends Model{

    public function getTodos(){
        $this->db->query("SELECT* FROM rol");
        return $this->db->fetchAll();
    }

    public function getUno($id){

        if(!ctype_digit($id)) throw new excepcionr('error');
        if($id < 1) throw new excepcionr('error');

        $this->db->query("SELECT* FROM rol
                         WHERE id_rol = $id");
        
        if($this->db->numRows() != 1) throw new excepcionr('error');

        $this->db->query("SELECT* FROM rol WHERE id_rol=$id LIMIT 1");
        return $this->db->fetchAll();
    }

}
class excepcionr extends Exception{}
?>