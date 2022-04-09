<?php
//models/Proveedor.php

class Proveedor extends Model{

    public function getTodos(){
        $this->db->query("SELECT* FROM proveedor");
        return $this->db->fetchAll();
    }

    public function nuevoProveedor($razon_social,$telefono,$direccion){

        if(strlen($razon_social)<1) throw new excepcionpro('error');  
        $razon_social = $this->db->escape($razon_social); 

        if(!ctype_digit($telefono)) throw new excepcionpro('error'); 
        if($telefono<1) throw new excepcionpro('error');  

        if(strlen($direccion)<1) throw new excepcionpro('error');  
        $direccion = $this->db->escape($direccion);

        $this->db->query("INSERT INTO proveedor
                        (razon_social,telefono,direccion)
                        VALUES('$razon_social',$telefono,'$direccion')");
    }

    public function eliminarProveedor($p){

        $provaux = new Proveedor();
        if(!$provaux->existeProv($p)) throw new excepcionpro('error');  

        $this->db->query("DELETE FROM proveedor
                          WHERE id_prove=$p
                          LIMIT 1");
    }

    public function getUno($id){

        $provaux = new Proveedor();
        if(!$provaux->existeProv($id)) throw new excepcionpro('error');  

        $this->db->query("SELECT* FROM proveedor WHERE id_prove=$id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function editarProveedor($razon_social,$telefono,$direccion,$id){

        if(strlen($razon_social)<1) throw new excepcionpro('error');     
        $razon_social = $this->db->escape($razon_social); 

        if(!ctype_digit($telefono))throw new excepcionpro('error');  
        if($telefono<1) throw new excepcionpro('error');  
        if(strlen($direccion)<1) throw new excepcionpro('error');  
        $direccion = $this->db->escape($direccion);

        $provaux = new Proveedor();
        if(!$provaux->existeProv($id)) throw new excepcionpro('error');  

        $this->db->query("UPDATE proveedor
                          set razon_social='$razon_social',telefono=$telefono,direccion='$direccion'
                          WHERE id_prove=$id LIMIT 1");
    }

    public function getProv($razon_social){

        if(strlen($razon_social)<1) throw new excepcionpro('error');  
        //if(strlen($_GET['nombre'])>20) die("error3"); opcion 1
        $razon_social = substr($razon_social,0,25); //opcion 2
        $razon_social = $this->db->escape($razon_social);
        $razon_social = $this->db->escapeWildcards($razon_social);

        $this->db->query("SELECT* FROM proveedor WHERE razon_social LIKE '$razon_social' LIMIT 1");
        return $this->db->fetchAll();           
    }

    public function getCant(){
        $this->db->query("SELECT COUNT(*) total FROM proveedor");
        return $this->db->fetchAll();
    }

    public function existeProv($id){
        if(!ctype_digit($id)) return false;
        if($id < 1) return false;

        $this->db->query("SELECT* FROM proveedor
                         WHERE id_prove = $id");
        
        if($this->db->numRows() != 1) return false;

        return true;
    }

}
class excepcionpro extends Exception{}
?>