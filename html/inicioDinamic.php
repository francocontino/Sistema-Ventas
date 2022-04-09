<!--/html/inicioDinamic.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include '../html/inicio.php' ?>
    <div class="main-content">
        <main>
            <div class="cards">
            <?php if($this->rol == 1) {?>
            <a href="clientes"><div class="card-single">
                    <div>
                        <?php foreach($this->clicant as $c) {?>
                            <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Clientes</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div></a>

                <a href="proveedores"><div class="card-single">
                    <div>
                        <?php foreach($this->provcant as $c) {?>
                            <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Proveedores</span>
                    </div>
                    <div>
                        <span class="la la-building"></span>
                    </div>
                </div></a>

                <a href="productos"><div class="card-single">
                    <div>
                    <?php foreach($this->prodcant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Productos</span>
                    </div>
                    <div>
                        <span class="la la-cube"></span>
                    </div>
                </div></a>

                <a href="compras"><div class="card-single">
                    <div>
                    <?php foreach($this->comcant as $c) {?>
                        <h1><?=$c['total']-1?></h1>
                        <?php } ?>
                        <span>Compras</span>
                    </div>
                    <div>
                        <span class="la la-shopping-cart"></span>
                    </div>
                </div></a>

                <a href="concreatada"><div class="card-single">
                    <div>
                    <?php foreach($this->pedcant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Ventas</span>
                    </div>
                    <div>
                        <span class="la la-money"></span>
                    </div>
                </div></a>
                <a href="reposicion"><div class="card-single">
                    <div>
                    <?php foreach($this->repcant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Reposicion</span>
                    </div>
                    <div>
                        <span class="la la-cube"></span>
                    </div>
                </div></a>

                <a href="usuarios"><div class="card-single">
                    <div>
                    <?php foreach($this->usucant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Usuarios</span>
                    </div>
                    <div>
                        <span class="la la-user"></span>
                    </div>
                </div></a>
            </div>
            <a href="pedidos"><div class="card-single-ventas">
                    <div>
                    <?php foreach($this->pedtot as $c) {?>
                        <h1><?=$c['total']?>$</h1>
                        <?php } ?>
                        <span>Total Ventas</span>
                    </div>
                    <div>
                        <span class="la la-usd"></span>
                    </div>
                </div></a>
        <?php } ?>

        <?php if($this->rol == 2) {?>
            <a href="clientes"><div class="card-single">
                    <div>
                        <?php foreach($this->clicant as $c) {?>
                            <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Clientes</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div></a>

                <a href="productos"><div class="card-single">
                    <div>
                    <?php foreach($this->prodcant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Productos</span>
                    </div>
                    <div>
                        <span class="la la-cube"></span>
                    </div>
                </div></a>


                <a href="pedidos"><div class="card-single">
                    <div>
                    <?php foreach($this->pedcant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Ventas</span>
                    </div>
                    <div>
                        <span class="la la-money"></span>
                    </div>
                </div></a>

                <a href="usuarios"><div class="card-single">
                    <div>
                    <?php foreach($this->usucant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Usuarios</span>
                    </div>
                    <div>
                        <span class="la la-user"></span>
                    </div>
                </div></a>
            </div>
        <?php } ?>

        <?php if($this->rol == 3) {?>

                <a href="proveedores"><div class="card-single">
                    <div>
                        <?php foreach($this->provcant as $c) {?>
                            <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Proveedores</span>
                    </div>
                    <div>
                        <span class="la la-building"></span>
                    </div>
                </div></a>

                <a href="productos"><div class="card-single">
                    <div>
                    <?php foreach($this->prodcant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Productos</span>
                    </div>
                    <div>
                        <span class="la la-cube"></span>
                    </div>
                </div></a>

                <a href="compras"><div class="card-single">
                    <div>
                    <?php foreach($this->comcant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Compras</span>
                    </div>
                    <div>
                        <span class="la la-shopping-cart"></span>
                    </div>
                </div></a>

                <a href="reposicion"><div class="card-single">
                    <div>
                    <?php foreach($this->repcant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Reposicion</span>
                    </div>
                    <div>
                        <span class="la la-cube"></span>
                    </div>
                </div></a>

                <a href="usuarios"><div class="card-single">
                    <div>
                    <?php foreach($this->usucant as $c) {?>
                        <h1><?=$c['total']?></h1>
                        <?php } ?>
                        <span>Usuarios</span>
                    </div>
                    <div>
                        <span class="la la-user"></span>
                    </div>
                </div></a>
            </div>

        <?php } ?>
        </main>
    </div>
</body>
</html>