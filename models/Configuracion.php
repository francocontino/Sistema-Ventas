<?php

//models//Configuracion.php

class Configuracion extends Model{

    public function getIva(){
        $this->db->query("SELECT c.iva FROM configuracion c");
        return $this->db->fetchAll();
    }

    public function getTodo(){
        $this->db->query("SELECT* FROM configuracion");
        return $this->db->fetchAll();
    }
}

?>