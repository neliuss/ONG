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
                $nom = $_POST["nombre"];
                $apel = $_POST["apellidos"];
                $dni = $_POST["dni"];
                $dom = $_POST["domicilio"];
                $eda = $_POST["edad"];
                $tel = $_POST["telefono"];									
                $mail = $_POST["correo"];        
          
                $consulta="UPDATE socios SET nombre = '$nom', apellidos='$apel', dni='$dni', domicilio='$dom', edad='$eda', telefono='$tel', correo='$mail' WHERE dni = '$dni'"; 
                    
                $resultado=mysqli_query($conexion, $consulta);
                echo ($resultado);   
                    //para informar al usuario de si el registro se ha introducido o no:
                if ($resultado==false){

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

			?>

	</body>
</html>

