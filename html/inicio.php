<!--html//inicio.php-->
<?php 
    /*if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!$_SESSION['logueado']){
        header("Location:login");
    }*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/Proyecto/html/css/style.css?ts=<?=time()?>" >
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="la la-bank"></span> <span>Info Ventas</span></h2>
        </div>
        <!--Menu-->
        <div class="sidebar-menu">
            <ul>
                <?php if($this->rol == 1) {?>       
                    <li>
                        <a href="inicio" class="active"><span class="las la-home"></span>
                        <span>Inicio</span></a>
                    </li>
                    <li>
                        <a href="clientes"><span class="la la-users"></span>
                        <span>Clientes</span></a>
                    </li>
                    <li>
                        <a href="proveedores"><span class="la la-building"></span>
                        <span>Proveedores</span></a>
                    </li>
                    <li>
                        <a href="productos"><span class="la la-cube"></span>
                        <span>Productos</span></a>
                    </li>
                    <li>
                        <a href="compras"><span class="la la-shopping-cart"></span>
                        <span>Compras</span></a>
                    </li>
                    <li>
                        <a href="pedidos"><span class="la la-money"></span>
                        <span>Ventas</span></a>
                    </li>
                    <li>
                        <a href="usuarios"><span class="la la-user"></span>
                        <span>Usuarios</span></a>
                    </li>
                    <li>
                        <a href="logout"><span class="la la-sign-out"></span>
                        <span>Cerrar Sesion</span></a>
                    </li>
                <?php } ?>
                <?php if($this->rol  == 2) {?>       
                    <li>
                        <a href="inicio" class="active"><span class="las la-home"></span>
                        <span>Inicio</span></a>
                    </li>
                    <li>
                        <a href="clientes"><span class="la la-users"></span>
                        <span>Clientes</span></a>
                    </li>
                    <li>
                        <a href="productos"><span class="la la-cube"></span>
                        <span>Productos</span></a>
                    </li>
                    <li>
                        <a href="pedidos"><span class="la la-money"></span>
                        <span>Ventas</span></a>
                    </li>
                    <li>
                        <a href="usuarios"><span class="la la-user"></span>
                        <span>Usuarios</span></a>
                    </li>
                    <li>
                        <a href="logout"><span class="la la-sign-out"></span>
                        <span>Cerrar Sesion</span></a>
                    </li>
                <?php } ?>
                <?php if($this->rol  == 3) {?>       
                    <li>
                        <a href="inicio" class="active"><span class="las la-home"></span>
                        <span>Inicio</span></a>
                    </li>
                    <li>
                        <a href="proveedores"><span class="la la-building"></span>
                        <span>Proveedores</span></a>
                    </li>
                    <li>
                        <a href="productos"><span class="la la-cube"></span>
                        <span>Productos</span></a>
                    </li>
                    <li>
                        <a href="compras"><span class="la la-shopping-cart"></span>
                        <span>Compras</span></a>
                    </li>
                    <li>
                        <a href="usuarios"><span class="la la-user"></span>
                        <span>Usuarios</span></a>
                    </li>
                    <li>
                        <a href="logout"><span class="la la-sign-out"></span>
                        <span>Cerrar Sesion</span></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
            </h2>

            <div class="user-wrapper">
                <div>
                    <?php if($this->rol == 1){?>
                        <h4>Administrador</h4>
                    <?php }?>
                    <?php if($this->rol  == 2){?>
                        <h4>Vendedor</h4>
                    <?php }?>
                    <?php if($this->rol  == 3){?>
                        <h4>Alamacen</h4>
                    <?php }?>
                    
                </div>
            </div>
        </header>
    </div>

</body>

</html>