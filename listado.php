<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Documento</title>
	</head>
    <center>
	<body style = "margin-top:0; background-color:powderblue">
        <div class="content"> 
            <div class="container">
                <div class='wrap-table100'>  
                    <div class='table100 ver1 m-b-110'>    
                        <table data-vertable='ver1'>
                            <br>
                                <h2 >TABLA DE SOCIOS REGISTRADOS</h2>
                            <br>
                            <thead>
                                <tr class='row100 head'> 
                                    <th class='column100 column2' data-column='column2'><center>Nombre</center></th>
                                    <th class='column100 column3' data-column='column3'><center>Apellidos</center></th>
                                    <th class='column100 column4' data-column='column4'><center>DNI</center></th>
                                    <th class='column100 column4' data-column='column4'><center>Edad</center></th>
                                    <th class='column100 column4' data-column='column4'><center>Tel&eacute;fono</center></th>
                                    <th class='column100 column4' data-column='column4'><center>Correo</center></th>
                                </tr>
                            </thead>   
                            <tbody>

                                <?php                  
                                    require("BDconexion.php");
                                        
                                        $conexion=conectar();

                                        $consulta="SELECT * from socios order by nombre";
                                        
                                        $resultados=mysqli_query($conexion, $consulta);
                                        
                                        while($fila = mysqli_fetch_assoc($resultados)) {
                                ?>

                                <tr class='row100'>
                                    <td> <center><?php echo $fila['nombre']; ?>  </center> </td>
                                    <td> <center><?php echo $fila['apellidos']; ?></center></td>
                                    <td> <center><?php echo $fila['dni']; ?></center></td>
                                    <td> <center><?php echo $fila['edad']; ?></center></td>
                                    <td> <center><?php echo $fila['telefono']; ?></center></td>
                                    <td> <center><?php echo $fila['correo']; ?></center></td>
                                </tr>
                                <?php
                                            }	
                                        mysqli_close($conexion);     	
                                ?>
                            </tbody>
                        </table>                 
                    </div>
                </div>  
            </div>    
        </div>
	</body>
</html>