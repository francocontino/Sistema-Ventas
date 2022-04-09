<!--html//listadoProductos.php-->
<?php
require '../controllers/verisesion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</head>
<style>
    .pagado, .anulado{
        background: #4CAF50;
        color:#FFF;
        /*text-align: center;*/ 
    }
    .anulado{
        background-color: #f44336;
    }
    .pad{padding:10px;}

    .paginador{
        padding: 15px;
        list-style: none;
        background: #fff;
        margin-top: 15px;
        display:flex;
        justify-content: flex-end;
        }
    
    .paginador ul li{
        display: inline;
    }

    .paginador a{
        color: #428bca;
        border: 1px solid #ddd;
        padding: 5px;
        display: inline-block;
        font-size: 14px;
        text-align: center;
        width: 25px;
    }
    .paginador a:hover{
        background: #ddd;
    }

    .pageSelected{
        color: #fff;
        background: #428bca;
        border: 1px solid #428bca;
        padding: 5px;

    }
</style>
<body>
<?php include '../html/inicio.php' ?>
<div class="main-content">
    <main>
        <a class="button btn-new" href="nuevo-pedido"><span class="la la-plus"></span>Nuevo</a>

        <a class="button btn-neww" style="margin-left:50%" href="concreatada">Pagado</a>

        <a class="button btn-neww" href="anulada">Anulada</a>

        <a class="button btn-neww" href="pedidos">Todo</a>
        <br><br>
            <div class="card">
                <div class="card-header"> 
                    <h3>Listado Pedidos</h3>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead><tr><td>ID</td><td>Fecha</td><td>Cliente</td><td>Total Factura</td><td>Estado</td></tr></thead>
                                
                                <tbody>
                                    <?php foreach($this->pedido as $p) {?>
                                        <?php if( $p['estatus'] == 1) {
                                                $estado = '<td class="pagado">Pagado</td>';
                                            }else {
                                                $estado = '<td class="anulado">Anulada</td>';
                                            }?>
                                        <tr id="<?=$p['id_pedido']?>">
                                            <td><?=$p['id_pedido']?></td>
                                            <td><?=$p['fecha']?></td>
                                            <td><?=$p['cliente']?></td>
                                            <td><?=$p['factu_total']?>$</td>
                                            <?=$estado?>
                                            <td  marigin-left="20px"><a class="view_factura button btn-edit" p="<?=$p['id_pedido']?>" c="<?=$p['id_cliente']?>">Factura</a></td>
                                            <?php if($p['estatus'] == 1) {?>
                                                <td><a class="anular_factura button btn-delete" fac="<?=$p['id_pedido']?>">Anular</a></td>
                                            <?php } else { ?>
                                                <td><a class="btn_anular inactive button btn-delete disabled">Anular</a></td>
                                                <?php } ?> 
                                        </tr>
                                    <?php } ?>   
                                </tbody>
   
                            </table>
                            
                            <?php if($this->estado == 3) {?>
                            <table>
                                <div class="paginador">
                                    <ul>
                                        <li><a href="pedidos-1">|<</a></li>
                                        <li><a href="pedidos-<?= $this->pagina-1?>"><<</a></li>
                                        
                                        <?php for($i=1 ; $i <= $this->total_paginas ; $i++) {
                                            if($i == $this->pagina) { 
                                                echo '<li class="pageSelected">'.$i.'</li>';
                                             }else{
                                                echo '<li><a href="pedidos-'.$i.'">'.$i.'</a></li>';
                                            }
                                         }?>

                                        <li><a href="pedidos-<?= $this->pagina+1 ?>">>></a></li>
                                        <li><a href="pedidos-<?=$this->total_paginas ?>">>|</a></li>

                                    </ul>
                                </div>
                            </table>
                            <?php }?>

                            <?php if($this->estado == 1) {?>
                            <table>
                                <div class="paginador">
                                    <ul>
                                        <li><a href="concreatada-1">|<</a></li>
                                        <li><a href="concreatada-<?= $this->pagina-1?>"><<</a></li>
                                        
                                        <?php for($i=1 ; $i <= $this->total_paginas ; $i++) {
                                            if($i == $this->pagina) { 
                                                echo '<li class="pageSelected">'.$i.'</li>';
                                             }else{
                                                echo '<li><a href="concreatada-'.$i.'">'.$i.'</a></li>';
                                            }
                                         }?>

                                        <li><a href="concreatada-<?= $this->pagina+1 ?>">>></a></li>
                                        <li><a href="concreatada-<?=$this->total_paginas ?>">>|</a></li>

                                    </ul>
                                </div>
                            </table>
                            <?php }?>

                            <?php if($this->estado == 2) {?>
                            <table>
                                <div class="paginador">
                                    <ul>
                                        <li><a href="anulada-1">|<</a></li>
                                        <li><a href="anulada-<?= $this->pagina-1?>"><<</a></li>
                                        
                                        <?php for($i=1 ; $i <= $this->total_paginas ; $i++) {
                                            if($i == $this->pagina) { 
                                                echo '<li class="pageSelected">'.$i.'</li>';
                                             }else{
                                                echo '<li><a href="anulada-'.$i.'">'.$i.'</a></li>';
                                            }
                                         }?>

                                        <li><a href="anulada-<?= $this->pagina+1 ?>">>></a></li>
                                        <li><a href="anulada-<?=$this->total_paginas ?>">>|</a></li>

                                    </ul>
                                </div>
                            </table>
                            <?php }?>
                        
                        </div>
                    </div>
            </div>
    </main>
</div> 
    
    <script src="anular"></script>

</body>
</html>