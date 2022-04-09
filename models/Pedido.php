<?php

//models//Pedido.php

class Pedido extends Model{

    /*public function getTodos(){
        $this->db->query("SELECT* FROM pedido");
        return $this->db->fetchAll();
    }*/

    public function getTodos(){
        $this->db->query("SELECT  p.id_pedido,p.fecha,p.factu_total,p.id_cliente,p.estatus, cl.nombre as cliente FROM pedido p
                            INNER JOIN cliente cl
                            ON p.id_cliente = cl.id_cliente
                            WHERE p.estatus != 10
                            ORDER BY p.fecha");
        return $this->db->fetchAll();
    }

    public function cantped(){
        $this->db->query("SELECT COUNT(*) total_reg FROM pedido");
        return $this->db->fetchAll();
    }

    public function cantpedest($estado){
        if(!is_numeric($estado)) throw new excepcionp('error');
        if($estado < 1) throw new excepcionp('error');
        if($estado > 2) throw new excepcionp('error');

        $this->db->query("SELECT COUNT(*) total_reg FROM pedido WHERE estatus = $estado ");
        return $this->db->fetchAll();
    }

    public function paginador($desde,$pag){
        if(!is_numeric($desde)) throw new excepcionp('error');
        if($desde < 0) throw new excepcionp('error');
        if(!is_numeric($pag)) throw new excepcionp('error');
        if($pag < 0) throw new excepcionp('error');
        
        $this->db->query("SELECT p.id_pedido, date_format(p.fecha, '%d-%m-%Y') fecha,p.id_cliente,c.nombre as cliente, p.factu_total, p.estatus 
                        FROM pedido p INNER JOIN cliente c ON c.id_cliente=p.id_cliente
                        ORDER BY p.fecha DESC
                        LIMIT $desde,$pag");
        return $this->db->fetchAll();
    }

    public function getEstado($desde,$pag,$estado){
        if(!is_numeric($desde)) throw new excepcionp('error');
        if($desde < 0) throw new excepcionp('error');
        if(!is_numeric($pag)) throw new excepcionp('error');
        if($pag < 0) throw new excepcionp('error');

        if(!is_numeric($estado)) throw new excepcionp('error');
        if($estado < 1) throw new excepcionp('error');
        if($estado > 2) throw new excepcionp('error');

        $this->db->query("SELECT  p.id_pedido,date_format(p.fecha, '%d-%m-%Y') fecha,p.factu_total,p.id_cliente,p.estatus, cl.nombre as cliente FROM pedido p
                            INNER JOIN cliente cl
                            ON p.id_cliente = cl.id_cliente
                            WHERE p.estatus = $estado
                            ORDER BY p.fecha
                            LIMIT $desde,$pag");
        return $this->db->fetchAll();
    }

    public function setPedido($cliente){

        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($cliente)) throw new excepcionp('error');

        $this->db->query("CALL procesar_venta($cliente)");
        return $this->db->fetchAll();
    }

    public function getPedido($codCliente,$noFactura){

        $clienteaux = new Clientes();
        if(!$clienteaux->existeCliente($codCliente)) throw new excepcionp('error');

        $pediaux = new Pedido();
        if(!$pediaux->existePedido($noFactura)) throw new excepcionp('error');


        $this->db->query("SELECT f.id_pedido, DATE_FORMAT(f.fecha, '%d/%m/%Y') as fecha, DATE_FORMAT(f.fecha,'%H:%i:%s') as  hora, f.id_cliente, 
                        f.estatus, cl.nombre, cl.telefono,cl.direccion, cl.dni
                        FROM pedido f
                        INNER JOIN cliente cl
                        ON f.id_cliente = cl.id_cliente
                        WHERE f.id_pedido = $noFactura AND f.id_cliente = $codCliente  AND f.estatus != 10");
        return $this->db->fetchAll();
    }

    public function getDetalle($no_factura){

        $pediaux = new Pedido();
        if(!$pediaux->existePedido($no_factura)) throw new excepcionp('error');

        $this->db->query("SELECT p.descripcion,dt.cantidad,dt.precio_venta,(dt.cantidad * dt.precio_venta) as precio_total
                        FROM pedido f
                        INNER JOIN detalle_pedido dt
                        ON f.id_pedido = dt.id_pedido
                        INNER JOIN producto p
                        ON dt.id_produ = p.id_produ
                        WHERE f.id_pedido = $no_factura ");
        return $this->db->fetchAll();
    }

    
    public function setAnular($no_factura){
        $pediaux = new Pedido();
        if(!$pediaux->existePedido($no_factura)) throw new excepcionp('error');

        $this->db->query("CALL anular_pedido($no_factura)");
        return $this->db->fetchAll();
    }

    public function getCant(){
        $this->db->query("SELECT COUNT(*) total FROM pedido WHERE estatus != 2");
        return $this->db->fetchAll();
    }

    public function getTotal(){
        $this->db->query("SELECT SUM(factu_total) total FROM pedido WHERE estatus != 2");
        return $this->db->fetchAll();
    }

    public function existePedido($id){
        if(!ctype_digit($id)) return false;
        if($id < 1) return false;

        $this->db->query("SELECT* FROM pedido
                         WHERE id_pedido = $id");
        
        if($this->db->numRows() != 1) return false;

        return true;
    }
}
class excepcionp extends Exception{}
?>