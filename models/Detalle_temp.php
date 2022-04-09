<?php

//models//Detalle_temp.php

class Detalle_temp extends Model{

    public function setAlmacenado($codproducto,$cantidad,$cliente){

        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($cliente)) throw new excepciond('error');

        if(!ctype_digit($cantidad)) throw new excepciond('error');
        if($cantidad < 1) throw new excepciond('error');

        $prodaux = new Producto();
        if(!$prodaux->existeProd($codproducto)) throw new excepciond('error');

        $this->db->query("CALL add_detalle_temp($codproducto,$cantidad,$cliente)");
        return $this->db->fetchAll();
    }

    public function delAlmacenado($id_detalle,$cliente){

        if(!ctype_digit($id_detalle)) throw new excepciond('error');
        if($id_detalle < 1) throw new excepciond('error');

        $this->db->query("SELECT* FROM detalle_temp
                         WHERE id_detalletemp = $id_detalle");
        
        if($this->db->numRows() != 1) throw new excepciond('error');

        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($cliente)) throw new excepciond('error');

        $this->db->query("CALL del_detalle_temp($id_detalle,$cliente)");
        return $this->db->fetchAll();
    }

    public function deleteCliente($cliente){

        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($cliente)) throw new excepciond('error');

        $this->db->query("DELETE FROM detalle_temp WHERE id_cliente=$cliente");
        return $this->db->fetchAll();
    }

    public function infoDettmp($cliente){

        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($cliente)) throw new excepciond('error');

        $this->db->query("SELECT* FROM detalle_temp WHERE id_cliente=$cliente");
        return $this->db->fetchAll();
    }
}
class excepciond extends Exception{}
?>