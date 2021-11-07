<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Documento</title>
	</head>

	<body>

			<?php	

                require("BDconexion.php");
                $conexion = conectar();

                //variable para almacenar el código del artículo
                $nom = $_GET['nombre'];
                $apel = $_GET["apellidos"];
                $dni = $_GET["dni"];
                $dom = $_GET["domicilio"];
                $eda = $_GET["edad"];
             
                    $consulta="UPDATE socios SET nombre = '$nom', apellidos='$apel', dni='$dni', domicilio='$dom', edad='$eda' WHERE nombre = '$nom', apellidos='$apel', dni='$dni', domicilio='$dom', edad='$eda'"; 
                    
                    $resultados=mysqli_query($conexion, $consulta);
                    
                    //para informar al usuario de si el registro se ha introducido o no:
                    if ($resultados==false){

                        echo "Error en la consulta";
                        
                    }else{
                            echo "Registro guardado<br><br>";
                            echo "<table><tr><td>$nom</td></tr>";
                            echo "<table><tr><td>$apel</td></tr>";
                            echo "<table><tr><td>$nif</td></tr>";
                            echo "<table><tr><td>$dom</td></tr>";
                            echo "<table><tr><td>$ida</td></tr>";	
                        }
                    
                    mysqli_close($conexion);

			?>

	</body>
</html>

