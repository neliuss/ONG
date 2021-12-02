<?php
    // Incluimos contador de visitas
    include_once "contador.php";
?>
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

        //Comprobamos si existe dni en nuestra BD
        $comprueba = "SELECT * FROM socios WHERE dni ='".$dni."' ORDER BY dni"; 

            $resultadocom = mysqli_query($conexion, $comprueba);    
            if(!$resultadocom) {    //Comprobamos el tipo de error:
                var_dump(mysqli_error($conexion));
                exit;
            }

            $fila = mysqli_fetch_assoc($resultadocom);
 /*           while($fila = mysqli_fetch_assoc($resultadocom)) {  //los vemos en consola
                echo $fila['nombre']; 
                echo $fila['apellidos'];
               // echo $fila['dni']; 
            }
 */               //Si hay resultados   
                if(!empty($resultadocom) && mysqli_num_rows($resultadocom) > 0){

                    $compruebaproy = "SELECT * FROM proyectos WHERE nombreProyecto = '".$nom."' AND dni = '".$dni."'"; 

                    $resultadoproy = mysqli_query($conexion, $compruebaproy);    
                    if(!$resultadoproy) {    //Comprobamos el tipo de error:
                        var_dump(mysqli_error($conexion));
                         exit;
                    }
                    $fila2 = mysqli_fetch_assoc($resultadoproy);
  /*                  while($fila2 = mysqli_fetch_assoc($resultadoproy)) {  //los vemos en consola
                        echo $fila2['dni']; 
                    }
  */                  print_r($fila['dni']); print_r($fila2['dni']) ;   
                    if( $fila['dni'] != $fila2['dni']){
                
                     //Registra los valores que introdujimos en las variables, en nuestra BD ong de phpmyadmin
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
                            mysqli_close($conexion);
                        }
                    }else{
                        echo "El DNI ya está asociado a ese proyecto. Error en el proyecto";
                        mysqli_close($conexion);
                    }
                }else{
                    echo "El DNI no está registrado. Error en la consulta";
                    mysqli_close($conexion);
                }

    ?>
</body>
</html>

