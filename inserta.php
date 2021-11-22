<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> Documento</title>
</head>

<body>
<?php

include("BDconexion.php");
//include("accesoBD.php");

$conexion= conectar();

echo 'conexión exitosa';

//variables para almacenar los datos
$nom = $_GET['nombre'];
$apel=$_GET["apellidos"];
$dni=$_GET["dni"];
$dom=$_GET["domicilio"];
$eda=$_GET["edad"];
$tel=$_GET["telefono"];									
$mail=$_GET["mail"];

//Registra los valores que introdujimos en las variables, en las BD ong de phpmyadmin
$consulta="INSERT INTO socios (nombre, apellidos, dni, domicilio, edad, telefono, correo) VALUES ('$nom', '$apel', '$dni', '$dom', '$eda', '$tel', '$mail')";

$resultados=mysqli_query($conexion, $consulta);

//para informar al usuario de si el registro se ha introducido o no:
if ($resultados==false){

    echo "Error en la consulta";

}else{
    echo "Registro guardado<br><br>";
    echo "<table><tr><td>$nom</td></tr>";
    echo "<table><tr><td>$apel</td></tr>";
    echo "<table><tr><td>$dni</td></tr>";
    echo "<table><tr><td>$dom</td></tr>";
    echo "<table><tr><td>$eda</td></tr>";
    echo "<table><tr><td>$tel</td></tr>";
    echo "<table><tr><td>$mail</td></tr>";
}

mysqli_close($conexion);

//registo.php;

?>
</body>
</html>

