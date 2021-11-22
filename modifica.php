<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Documento</title>
<link id="tema" rel="stylesheet" type="text/css" href="./css/fondo1.css" />
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
	<h1>Búsqueda</h1>			
	<form action="buscaModif.php" method="POST">

		<table border="0" align="center">		<!--Definimos alineación y bordes de los datos en el formulario -->
			<tr>
				<td><label>DNI a buscar: <input type="text" id="busca" name="busca"></label>
				<td><input type="submit" name="enviando" value="Modifica"></td>
			</tr>
			<tr>
				<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
			</tr>
		</table>
	</form>
</body>
</html>