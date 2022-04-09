<?php
//models/Producto.php

class Producto extends Model{

    public function getTodos(){
        $this->db->query("SELECT* FROM producto");
        return $this->db->fetchAll();
    }

    public function nuevoProducto($descripcion,$precio,$stock,$pto_repo){
        
        if(strlen($descripcion)<1)throw new excepcionpr('error');   
        $descripcion = $this->db->escape($descripcion);
        
        if(!is_numeric($precio)) throw new excepcionpr('error');

        if(!is_numeric($stock))throw new excepcionpr('error');

        if(!is_numeric($pto_repo)) throw new excepcionpr('error');

        $this->db->query("INSERT INTO producto
                        (descripcion,precio,stock,pto_repo)
                        VALUES('$descripcion',$precio,$stock,$pto_repo)");
    }

    public function eliminarProducto($p){

        $prodaux = new Producto();
        if(!$prodaux->existeProd($p)) throw new excepcionpr('error');

        $this->db->query("DELETE FROM producto
                          WHERE id_produ=$p
                          LIMIT 1");
    }

    public function getUno($id){

        $prodaux = new Producto();
        if(!$prodaux->existeProd($id)) throw new excepcionpr('error');

        $this->db->query("SELECT* FROM producto WHERE id_produ=$id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function editarProducto($descripcion,$precio,$stock,$pto_repo,$id){

        if(strlen($descripcion)<1)throw new excepcionpr('error');   
        $descripcion = $this->db->escape($descripcion);
        
        if(!is_numeric($precio)) throw new excepcionpr('error');

        if(!is_numeric($stock))throw new excepcionpr('error');

        if(!is_numeric($pto_repo)) throw new excepcionpr('error');

        $prodaux = new Producto();
        if(!$prodaux->existeProd($id)) throw new excepcionpr('error');

        $this->db->query("UPDATE producto
                          set descripcion='$descripcion',precio=$precio,stock=$stock,pto_repo=$pto_repo
                          WHERE id_produ=$id LIMIT 1");
    }

    public function actualizarProducto($descripcion,$stock){

        if(strlen($descripcion)<1)throw new excepcionpr('error');   
        $descripcion = $this->db->escape($descripcion);

        if(!is_numeric($stock))throw new excepcionpr('error');

        $this->db->query("UPDATE producto
                          set stock=$stock+stock
                          WHERE descripcion LIKE '$descripcion%' LIMIT 1");
    }

    public function getcod($cod){

        if(strlen($cod)<1) throw new excepcionpro('error');  
        //if(strlen($_GET['nombre'])>20) die("error3"); opcion 1
        $cod = substr($cod,0,25); //opcion 2
        $cod = $this->db->escape($cod);
        $cod = $this->db->escapeWildcards($cod);
        /*$prodaux = new Producto();
        if(!$prodaux->existeProd($cod)) throw new excepcionpr('error');*/
        $this->db->query("SELECT* FROM producto WHERE descripcion LIKE '$cod' LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getProdRepo(){
        $this->db->query("SELECT* FROM producto HAVING stock<pto_repo");
        return $this->db->fetchAll();
    }

    public function getCant(){
        $this->db->query("SELECT COUNT(*) total FROM producto");
        return $this->db->fetchAll();
    }

    public function getRep(){
        $this->db->query("SELECT COUNT(*) total FROM producto WHERE stock<pto_repo");
        return $this->db->fetchAll();
    }

    public function existeProd($id){
        if(!ctype_digit($id)) return false;
        if($id < 1) return false;

        $this->db->query("SELECT* FROM producto
                         WHERE id_produ = $id");
        
        if($this->db->numRows() != 1) return false;

        return true;
    }
}
class excepcionpr extends Exception{}
?>