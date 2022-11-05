<?php
// metodo definido del programa que almacena datos de un usuario en memoria cache
//localstore
session_start();
// $_SESSION es otro metodo de php, almacena datos
// en datos esta toda informacion de la tabla usuario
if ($_SESSION['login']) {
    // validacion de rol administrador
    if ($_SESSION['datos']['id_usuario']==1 || $_SESSION['datos']['rol_id']==1){
        header("Location: menuAdmin.php");
    // validacion tol empleado
    }elseif($_SESSION ['datos']['rol_id']== 2){
        header("Location: empleadoPlantilla.html");
    }else{
        header("Location: frutas.php");
    }    
} else {
    $_SESSION['login'] = false;
    //echo "<script>window.location.reload()</script>";
    if (empty($_GET['status'])) {
        header('Location:iniciosesion.php?status=1');
        exit;
    }
}
var_dump ($_SESSION);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruver Xpress</title>

    <!-- Conexión con boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Conexión con CSS -->
    <link rel="stylesheet" href="CSS/iniciosesion.css">

    <!-- Fuentes de Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300&family=Open+Sans&family=Oswald:wght@200;300;400;500;600;700&family=Roboto:ital,wght@0,100;1,100&display=swap" rel="stylesheet">

    <!-- Javascript Antes de cerrar el body-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Codigo para el header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-fruver">
            <div class="container">
                <a href="index.html"><img src="Multimedia/logo-carrito.png" alt="logo carrito"></a>
                <a href="index.html">
                    <h2>Fruver Xpress</h2>
                </a>
                <!-- Solo se muestra cuando es diseño Responsive -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse collapse-fruver" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <!-- Codigo para el main -->
    <?php

    if ($_POST) {
        $correo = $_POST['login'];
        $contrasena = $_POST['contrasena'];

        if ($correo == "" || $contrasena == "") {
            echo " <script>alert('llene los datos')</script>";
        } else {

            require_once("conexion.php");
            $sql = "SELECT * FROM usuarios WHERE correo_usuario = '{$correo}' AND contraseña_usuario = '{$contrasena}';";
            $leer = $conexion->prepare($sql);
            $leer->execute();
            $fila = $leer->fetch(PDO::FETCH_ASSOC);
            if (!empty($fila)) {
                //var_dump($fila);
                $correDb = $fila['correo_usuario'];
                $passDb = $fila['contraseña_usuario'];
                //echo $correDb." = ".$correo."\n".$passDb." = ".$contrasena;

                if ($correDb == $correo || $passDb == $contrasena) {
                    
                    $_SESSION['datos'] = $fila;
                    $_SESSION['login'] = true;
                    if ($_SESSION['datos']['rol_id']==1) {
                        echo "
                        <script>alert('Inicio Sesion ".$_SESSION['datos']['nombre_usuario']." ".$_SESSION['datos']['apellido_usuario']."');</script>
                        <script>window.location.replace('menuAdmin.php');</script>";
                    }elseif($_SESSION ['datos']['rol_id']== 2){
                        header("Location: empleadoPlantilla.html");
                    }else{
                        echo "
                        <script>alert('Inicio Sesion ".$_SESSION['datos']['nombre_usuario']." ".$_SESSION['datos']['apellido_usuario']."');</script>
                        <script>window.location.replace('frutas.php');</script>";
                    }
                } else {
                    echo "<script>alert('Correo o contraseña Incorrectos')</script>";
                }
            } else {
                echo "<script>alert('Correo o contraseña Incorrectos')</script>";
            }
        }
    }

    ?>
    <main>
        <div class="container">
            <div class="contenido">
                <form action="#" method="POST">
                    <legend class="text-aling">Inicio de sesión</legend>
                    <div class="mb-3">
                        <label class="form-label">Correo electronico:</label>
                        <input type="email" class="form-control" placeholder="" name="login" required>
                    </div>
                    <div class="mb-3" >
                        <label class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" placeholder="" name="contrasena" required>
                    </div>
                    <a href="restablecimiento.html">
                        <p>Olvidaste tu contraseña?</p>
                    </a>
                    <a href="registro.php">
                        <p>Registrarme</p>
                    </a>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label">
                            Acepto terminos y condiciones
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Inicio Sesión</button>
                    <a href="index.html" class="btn btn-danger">Volver</a>
                </form>
                <script>
                    if (form-check){
                        
                    }else{

                    }
                </script>
            </div>

        </div>
    </main>
    <!-- Codigo para el Footer -->
    <footer>
        <div class="container">
            <div id="contacts">
                <ul>
                    <h2>Categorias</h2>
                    <li><a href="#">
                            <p>Aseo</p>
                        </a></li>
                    <li><a href="frutas.html">
                            <p>Frutas y verduras</p>
                        </a></li>
                    <li><a href="#">
                            <p>Granos</p>
                        </a></li>
                    <li><a href="#">
                            <p>Huevos y lacteos</p>
                        </a></li>
                    <li><a href="#">
                            <p>Licores</p>
                        </a></li>
                    <li><a href="#">
                            <p>Mecato</p>
                        </a></li>
                </ul>
                <ul>
                    <li>
                        <h2>Contacto</h2>
                        <a href="#">
                            <p>darizaduarte@gmail.com</p>
                        </a>
                        <a href="#">
                            <p>calle 188 15a 47</p>
                        </a>
                        <a href="#">
                            <p> 2022 Derechos reservados</p>
                        </a>
                    <li>

                    </li>
                </ul>

                <ul>
                    <li>
                        <h2>Redes sociales</h2>
                        <div class="iconosimg">
                            <a href="https://www.whatsapp.com/?lang=es"><img src="Multimedia/whatsapp.png" alt=""></a>
                            <a href="https://www.instagram.com/"><img src="Multimedia/Instagram.png" alt=""></a>
                            <a href="https://es-la.facebook.com
                                "><img src="Multimedia/facebook.png" alt=""></a>
                        </div>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>
    </footer>


</body>

</html>