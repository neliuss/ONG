<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title> Documento</title>
        <?php

        $labusqueda = $_POST["busca"];
        echo '$mibusqueda';
        //con $_SERVER le indicamos a que pagina del servidor tiene que llamar, con php_self, se llama a sí misma
        $mipag = $_SERVER["PHP_SELF"];

        //si la variable mibusqueda  es diferente a nulo, que ejecute la consulta, sino, que me muestre el formulario en la propia página (con concatenaciones)
        if (isset($labusqueda)){
        ejecuta_consulta($labusqueda);
        } else {
            echo "Debe especificar una cadena a buscar";
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

                $conexion=conectar();
                //para filtrar en la bd, utilizaremos la cláusula where: elegimos nombre, pero podríamos elegir nif o cualquier parámetro				
                $consulta = "SELECT * FROM socios WHERE nombre LIKE'%$labusqueda%'"; //Ojo 

                $resultados = mysqli_query($conexion, $consulta);

                if ($row = mysqli_fetch_array($resultados)){

                echo "<table border = '1'> \n";

                //Mostramos los nombres de las tablas

                mysqli_field_seek($resultados,0);

                while ($field = mysqli_fetch_field($resultados)){

                    echo "<td><b>$field->nombre</b></td> \n";

                        }

                    echo "</tr> \n";

                do {

                    echo "<tr> \n";
                    echo "<td>".$row["nombre"]."</td> \n";
                    echo "<td>".$row["apellidos"]."</td> \n";
                    echo "<td>".$row["domicilio"]."</td> \n";
                    echo "</tr> \n";

                } while ($row = mysqli_fetch_array($resultados));

                    echo "<p><a href=modifica.php>Volver</p> \n";
                    echo "</table> \n";

                    echo "<p><a href=modificaDatos.php>Modifica tus datos</p> \n";
                    echo "</table> \n";

                } else {
                    echo "<p>¡No se ha encontrado ningún registro!</p>\n";
                    echo "<p><a href=modifica.php>Volver</p> \n";
                }
            }

        ?>

    </body>

</html>
