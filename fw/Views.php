<?php
//fw/Viwes.php

abstract class Views{

    public function render(){
        include '../html/'.get_class($this).'.php';
    }
}
?>