<?php
//models/Compra.php

class Compra extends Model{

    public function getTodos(){
        $this->db->query("SELECT* FROM compra");
        return $this->db->fetchAll();
    }

    
    public function cantped(){
        $this->db->query("SELECT COUNT(*) total_reg FROM compra");
        return $this->db->fetchAll();
    }

    public function cantpedp($compra_repo){

        if(!is_numeric($compra_repo))throw new excepcionc('error');
        if($compra_repo < 1) throw new excepcionc('error');
        if($compra_repo > 2)throw new excepcionc('error');

        $this->db->query("SELECT COUNT(*) total_reg FROM compra WHERE compra_repo=$compra_repo");
        return $this->db->fetchAll();
    }

    public function paginador($desde,$pag){

        if(!is_numeric($desde)) throw new excepcionc('error');
        if($desde < 0) throw new excepcionc('error');
        if(!is_numeric($pag)) throw new excepcionc('error');
        if($pag < 0) throw new excepcionc('error');

        $this->db->query("SELECT c.id_compra, date_format(c.fecha, '%d-%m-%Y') fecha,c.descripcion, c.precio, c.cantidad, c.compra_repo, c.estatus_compra, c.id_prove 
                        FROM compra c
                        ORDER BY c.fecha DESC
                        LIMIT $desde,$pag");
        return $this->db->fetchAll();
    }

    public function getEstatus($no_compra){
        
        $compraaux = new Compra();
        if(!$compraaux->existeCompra($no_compra)) throw new excepcionc('error');

        $this->db->query("SELECT c.compra_repo estatus, c.estatus_compra estatuscompra FROM compra c WHERE c.id_compra=$no_compra LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getUno($no_compra){
        
        $compraaux = new Compra();
        if(!$compraaux->existeCompra($no_compra)) throw new excepcionc('error');

        $this->db->query("SELECT* FROM compra WHERE id_compra = $no_compra LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getEspe($desde,$pag,$compra_repo){

        if(!is_numeric($desde)) throw new excepcionc('error');
        if($desde < 0) throw new excepcionc('error');
        if(!is_numeric($pag)) throw new excepcionc('error');
        if($pag < 0) throw new excepcionc('error');

        if(!is_numeric($compra_repo))throw new excepcionc('error');
        if($compra_repo < 1) throw new excepcionc('error');
        if($compra_repo > 2)throw new excepcionc('error');

        $this->db->query("SELECT c.id_compra, date_format(c.fecha, '%d-%m-%Y') fecha,c.descripcion, c.precio, c.cantidad, c.compra_repo, c.estatus_compra, c.id_prove 
                            FROM compra c WHERE compra_repo = $compra_repo LIMIT $desde,$pag");
        return $this->db->fetchAll();
    }

    public function nuevaCompra($id_prove,$descripcion,$cantidad,$precio,$compra_repo){
        //VERIFICAR SI EXISTE UN PRODUCTO CON ESE NOMBRE

        $provaux = new Proveedor();
        if(!$provaux->existeProv($id_prove))throw new excepcionc('error');

        if(strlen($descripcion)<1) throw new excepcionc('error');    
        $descripcion = $this->db->escape($descripcion);
        
        if(!is_numeric($precio)) throw new excepcionc('error');

        if(!is_numeric($compra_repo)) throw new excepcionc('error');
        if($compra_repo < 1) throw new excepcionc('error');
        if($compra_repo > 2) throw new excepcionc('error');

        if(!ctype_digit($cantidad)) throw new excepcionc('error');
        if($cantidad < 1) throw new excepcionc('error');


        $this->db->query("INSERT INTO compra
                        (id_prove,descripcion,cantidad,precio,compra_repo)
                        VALUES($id_prove,'$descripcion',$cantidad,$precio,$compra_repo)");
    }

    public function actualizarEstado($no_compra,$val){

        $compraaux = new Compra();
        if(!$compraaux->existeCompra($no_compra)) throw new excepcionc('error');

        if(!ctype_digit($val)) throw new excepcionc('error');
        if($val < 1) throw new excepcionc('error');
        if($val > 4) throw new excepcionc('error');

        $this->db->query("UPDATE compra
                        SET estatus_compra = $val
                        WHERE id_compra = $no_compra    
                        LIMIT 1");
    }

    public function getCant(){
        $this->db->query("SELECT COUNT(*) total FROM compra WHERE estatus_compra != 4");
        return $this->db->fetchAll();
    }

    public function getRep(){
        $this->db->query("SELECT COUNT(*) total FROM compra WHERE compra_repo = 2 and estatus_compra != 4");
        return $this->db->fetchAll();
    }

    public function existeCompra($id){
        if(!ctype_digit($id)) return false;
        if($id < 1) return false;

        $this->db->query("SELECT* FROM compra
                         WHERE id_compra = $id");
        
        if($this->db->numRows() != 1) return false;

        return true;
    }
}
class excepcionc extends Exception{}
?>