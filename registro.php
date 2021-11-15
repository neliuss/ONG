<!doctype html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Benvido</title>
			<!-- Definimos el estilo--> 
			<style>

				h1{
					text-align:center;
					color:#00F;
					border-bottom:dotted #0000FF;
					width:50%;
					margin:auto;
					}

				table{
					border:1px solid #F00;
					padding:20px 50px;
					margin-top:50px;
				}

			body{
				background-color:#FFC;
			}


			</style>
		</head>

		<body>
			<h1>Registro</h1>
				<form name="form1" method="get" action="inserta.php">	<!-- Nombramos, definimos método get, e indicamos mediante action, la localización(una URL) donde la información recolectada por el formulario debe enviarse -->
					<table border="0" align="center">		<!--Definimos alineación y bordes de los datos en el formulario -->
						<tr>
							  <td>Nombre</td>
							  <td><label for="nombre"></label>
							  <input type="text" name="nombre" id="nombre"></td>
						</tr>
						<tr>
							  <td>Apellidos</td>
							  <td><label for="apellidos"></label>
							  <input type="text" name="apellidos" id="apellidos"></td>
						</tr>
						<tr>
							  <td>DNI/NIF</td>              <!--Pensar en meterle un select -->
							  <td><label for="dni"></label>
							  <input type="text" name="dni" id="dni"></td>
						</tr>
						<tr>
							  <td>Domicilio</td>
							  <td><label for="domicilio"></label>
							  <input type="text" name="domicilio" id="domicilio"></td>
						</tr>
						<tr>
							  <td>Edad</td>
							  <td><label for="edad"></label>
							  <input type="text" name="edad" id="edad"></td>
						</tr>

                                    <!--Meterle más campos -->           <!--pensar campo oculto por si se necesita un codsocio o cualquier otro código q genere mysqli -->
						<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
						</tr>
						<tr>
							  <td align="center"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
							  <td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
						</tr>
					</table>
				</form>
		</body>
</html>
