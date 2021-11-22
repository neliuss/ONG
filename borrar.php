<!doctype html>
<html>
		<head>
			<meta charset="utf-8">
			<title> Documento</title>
		</head>

		<body>

				<?php	

				require("BDconexion.php");

					$conexion=conectar();
					//variable para almacenar el código del artículo
					$nom = $_POST["nombre"];
                    $apel = $_POST["apellidos"];
                    $dni = $_POST["dni"];
                    $dom = $_POST["domicilio"];
                    $eda = $_POST["edad"];
								
					$consulta="DELETE FROM socios WHERE dni='$dni'";
					
					$resultados=mysqli_query($conexion, $consulta);
					
					//para informar al usuario de si el registro se ha introducido o no:
					if ($resultados==false){

						echo "Error en la consulta";
						
					}else{
						
						echo "Registro eliminado";
						
						echo mysqli_affected_rows($conexion);

					} 
					mysqli_close($conexion);
				?>

		</body>
</html>
