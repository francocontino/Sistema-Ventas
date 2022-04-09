<?php

//models//Clintes.php

class Clientes extends Model{

    public function getTodos(){
        $this->db->query("SELECT* FROM cliente");
        return $this->db->fetchAll();
    }

    public function nuevoCliente($nombre,$dni,$telefono,$direccion){

        if(strlen($nombre)<1) throw new excepcion('error');
        $nombre = $this->db->escape($nombre); 
        
        if(!ctype_digit($dni)) throw new excepcion('error');
        if($dni<1) throw new excepcion('error');

        if(!ctype_digit($telefono)) throw new excepcion('error');
        if($telefono<1) throw new excepcion('error');

        if(strlen($direccion)<1) throw new excepcion('error');
        $direccion = $this->db->escape($direccion); 

        $this->db->query("INSERT INTO cliente
                        (nombre,dni,telefono,direccion)
                        VALUES('$nombre',$dni,$telefono,'$direccion')");
    }

    public function eliminarCliente($c){
        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($c)) throw new excepcion('error');

        $this->db->query("DELETE FROM cliente
                          WHERE id_cliente=$c
                          LIMIT 1");
    }

    public function getUno($id){

        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($id)) throw new excepcion('error');

        $this->db->query("SELECT* FROM cliente WHERE id_cliente=$id LIMIT 1");
        return $this->db->fetchAll();
    }

    public function editarCliente($nombre,$dni,$telefono,$direccion,$id){

        if(strlen($nombre)<1) throw new excepcion('error');    
        $nombre = $this->db->escape($nombre); 
        
        if(!ctype_digit($dni)) throw new excepcion('error');
        if($dni<1) die('error2');

        if(!ctype_digit($telefono)) throw new excepcion('error');
        if($telefono<1) throw new excepcion('error');

        if(strlen($direccion)<1) throw new excepcion('error');
        $direccion = $this->db->escape($direccion);
        
        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($id)) throw new excepcion('error');

        $this->db->query("UPDATE cliente
                          set nombre='$nombre',dni=$dni,telefono=$telefono,direccion='$direccion'
                          WHERE id_cliente=$id LIMIT 1");
    }

    public function getdni($dni){

        if(!ctype_digit($dni)) throw new excepcion('error');
        if($dni<1) throw new excepcion('error');

        $this->db->query("SELECT* FROM cliente WHERE dni LIKE '$dni' LIMIT 1");
        return $this->db->fetchAll();
    }

    public function getCant(){
        $this->db->query("SELECT COUNT(*) total FROM cliente");
        return $this->db->fetchAll();
    }

    public function existeCliente($id){
        if(!ctype_digit($id)) return false;
        if($id < 1) return false;

        $this->db->query("SELECT* FROM cliente
                         WHERE id_cliente = $id");
        
        if($this->db->numRows() != 1) return false;

        return true;
    }
}

class excepcion extends Exception{}

?>