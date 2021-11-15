<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title> Documento</title>
        <?php

        $labusqueda = trim($_POST["busca"]);
    //    echo '$labusqueda';
        //con $_SERVER le indicamos a que pagina del servidor tiene que llamar, con php_self, se llama a sí misma
    //    $mipag = $_SERVER["PHP_SELF"];

        //si la variable mibusqueda  es diferente a nulo, que ejecute la consulta, sino, que me muestre el formulario en la propia página (con concatenaciones)
        if (isset($labusqueda)){
        ejecuta_consulta($labusqueda);
        } else {
            echo "Debe especificar un nombre a buscar";
            exit;
        }
        ?>
        
    </head>

    <body>

        <?php
            //Lo pegamos antes de head, para asegurarse que lo lee antes 
            function ejecuta_consulta($labusqueda){

                //llamamos a datosconex.php, así nos ahorramos insertar código cada página
                require("BDconexion.php");

//                $conexion=conectar();

                //Variable para el resultado de la búsqueda
                $texto = '';
                //Variable para el número de registros encontrados
                $registro = '';  

                //para filtrar en la bd, utilizaremos la cláusula where: elegimos nombre, pero podríamos elegir nif o cualquier parámetro				
 //               $consulta = "SELECT * FROM socios WHERE nombre LIKE'%$labusqueda%'"; //Ojo 

//                $resultados = mysqli_query($conexion, $consulta);

                $entero = 0;

                // Si hay información para buscar, se abre la conexión
                $conexion=conectar();

                //Consulta la base de datos, se utiliza un comparador LIKE
                $consulta = "SELECT * FROM socios WHERE nombre LIKE'%$labusqueda%' ORDER BY nombre"; //Ojo 

                $resultado = mysqli_query($conexion, $consulta); // Consulta
                //Si hay resultados
                if (mysqli_num_rows($resultado) > 0){
                // Registra el número de resultados
                    $registro = '<p>Se han encontrado ' . mysqli_num_rows($resultado) . ' registros </p>';
                    // Se almacenan las cadenas de resultado
                    if($fila = mysqli_fetch_assoc($resultado)) {
                        
                        echo "<div align='center'>
                            <table border='0' width='600' style='font-family: Verdana; font-size: 8pt' id='table1'>
                                <tr>
                                    <td colspan='2'><h3 align='center'>Actualice los datos que considere</h3></td>
                                </tr>
                                <tr>
                                    <td colspan='2'>En los campos del formulario puede ver los valores actuales, 
                                    si no se cambian los valores se mantienen iguales.</td>
                                </tr>
                                <form method='POST' action='modificaDatosBD.php'>
                                <tr>
                                    <td width='50%'>&nbsp;</td>
                                    <td width='50%'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width='50%'><p align='center'><b>Nombre: </b></td>
                                    <td width='50%'><p align='center'><input type='text' name='nombre' size='20' value='".$fila['nombre']."'></td>
                                </tr>
                                <tr>
                                    <td width='50%'><p align='center'><b>Apellidos: </b></td>
                                    <td width='50%'><p align='center'><input type='text' name='apellidos' size='20' value='".$fila['apellidos']."'></td>
                                </tr>
                                <tr>
                                    <td width='50%'><p align='center'><b>DNI:</b></td>
                                    <td width='50%'><p align='center'><input type='text' name='dni' size='20' value='".$fila['dni']."'></td>
                                </tr>
                                <tr>
                                    <td width='50%'><p align='center'><b>Domicilio:</b></td>
                                    <td width='50%'><p align='center'><input type='text' name='domicilio' size='20' value='".$fila['domicilio']."'></td>
                                </tr>
                                <tr>
                                    <td width='50%'><p align='center'><b>Edad:</b></td>
                                    <td width='50%'><p align='center'><input type='text' name='edad' size='20' value='".$fila['edad']."'></td>
                                </tr>
                                <tr>
                                    <td width='50%'>&nbsp;</td>
                                    <td width='50%'>&nbsp;</td>
                                </tr>
                                <input type='text' name='busca' value='$labusqueda'>
                                <tr>
                                    <td width='100%' colspan='2'>
                                    <p align='center'>
                                    <input type='submit' value='Actualiza datos' name='actualiza'></td>
                                    <button type='submit' formaction='borrar.php'>Borra registro</button>
                                </tr>
                                </form>
                            </table>
                        </div>";

                    }else {
                        echo "<p>¡No se ha encontrado ningún registro!</p>\n";
                        echo "<p><a href=modifica.php>Volver</p> \n";
                    }
                    // Cerramos conexiones abiertas)
                    mysqli_close($conexion);
                }
            }   
        ?>

    </body>

</html>
