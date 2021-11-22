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
$nom = $_GET['nombreProyecto'];
$dni=$_GET['dni'];
$tipo=$_GET['tipo'];
$ayuda=$_GET['ayuda'];

//Registra los valores que introdujimos en las variables, en las BD ong de phpmyadmin
$consulta="INSERT INTO proyectos (nombreProyecto, tipo, ayuda, dni) VALUES ('$nom', '$tipo', '$ayuda', '$dni')";

$resultados=mysqli_query($conexion, $consulta);

//para informar al usuario de si el registro se ha introducido o no:
if ($resultados==false){

    echo "Error en la consulta";

}else{
    echo "Registro guardado<br><br>";
    echo "<table><tr><td>$nom</td></tr>";
    echo "<table><tr><td>$dni</td></tr>";
    echo "<table><tr><td>$tipo</td></tr>";
    echo "<table><tr><td>$ayuda</td></tr>";
}

mysqli_close($conexion);

//registo.php;

?>
</body>
</html>

