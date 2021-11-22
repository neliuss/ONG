<?php

    function conectar(){
        $db_host="localhost";
        $db_nombre="ong";//Nombre de la BD en phpmyadmin
        $db_usuario="root";//usuario y contraseña       por defecto apache de xampp
        $db_contra="";

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre) or die("Error de conexion con MySQL Server");

    mysqli_set_charset($conexion, 'utf8');

      //  mysqli_select_db($db_nombre,$conexion);

        return $conexion;
    }
?>