<?php
//controllers/logout.php

session_start();
unset($_SESSION['logueado']);
unset($_SESSION['rol']);
header("Location: login");

?>