<!doctype html>
<html>
		<head>
			<meta charset="utf-8">
			<title> Baja</title>
		</head>

		<body>
 <?php

        $labusqueda = trim($_GET["dni"]);
        $labusqueda2 = trim($_GET["mail"]);
  //      print_r($labusqueda);print_r($labusqueda2);

        //si la variable mibusqueda  es diferente a nulo, que ejecute la consulta, sino, que me muestre el formulario en la propia página (con concatenaciones)
        if (isset($labusqueda)){
            if (isset($labusqueda2)){
            ejecuta_consulta($labusqueda,$labusqueda2);
        }} else {
            echo "Debe especificar una búsqueda";
            exit;
        }
        
        ?>
        
    </head>

    <body>

        <?php
            //Lo pegamos antes de head, para asegurarse que lo lee antes 
            function ejecuta_consulta($labusqueda,$labusqueda2){

                //llamamos a datosconex.php, así nos ahorramos insertar código cada página
                require("BDconexion.php");

                //Variable para el resultado de la búsqueda
                $texto = '';

                $conexion=conectar();

                $consulta = "SELECT * FROM socios WHERE dni LIKE'%$labusqueda%' ORDER BY dni"; 
                $resultado = mysqli_query($conexion, $consulta);
                    
                $fila = mysqli_fetch_assoc($resultado);
               
                 if($fila['correo'] == $labusqueda2)  {  

                            print_r($fila['nombre']); print_r($fila['apellidos']);
                            $dniborra=$fila['dni'];

                            $consultab="DELETE FROM socios WHERE dni = '$dniborra' ";
                            
                            $resultadosb=mysqli_query($conexion, $consultab);
                            
                            
                            //para informar al usuario de si el registro se ha introducido o no:
                            if ($resultadosb==false){
                                echo "Error en la consulta";
                                                     
                            }else{                                    
                                echo "Registro eliminado";
                                echo mysqli_affected_rows($conexion);
                                
                            } 
                            mysqli_close($conexion);

                    } else {
                            echo "<p>¡No se ha encontrado ningún registro!</p>\n";
                      
                            echo "<p><a href=principal.html>Volver</p> \n";
                    }
                    
                } 
            
        ?>

        <table border="0" align="center">		
			<tr>
				<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
			</tr>
		</table>

		</body>
</html>
