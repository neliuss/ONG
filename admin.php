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
	<h1>Búsqueda Socios</h1>	
    
    <script type="text/javascript">
        function login(){

            if (document.formAdmin.password.value=='alex' && document.formAdmin.usuario.value=='alex'){ 
                    document.formAdmin.submit(); 
                } 
                else{ 
                    alert("Porfavor ingrese, nombre de usuario y contraseña correctos."); 
                } 
        }

		function loginP(){
            if (document.formAdminProyectos.passwordP.value=='alex' && document.formAdminProyectos.usuarioP.value=='alex'){ 
                    document.formAdminProyectos.submit(); 
                } 
                else{ 
                    alert("Porfavor ingrese, nombre de usuario y contraseña correctos."); 
                }
        }

</script> 

	<form action="listado.php" name="formAdmin" method="POST">
		<table border="0" align="center">		<!--Definimos alineación y bordes de los datos en el formulario -->
			<tr>
				<td><label>Introduce tu nombre: <input type="text" id="usuario" name="usuario"></label>
                <td><label>Introduce tu contraseña: <input type="password" id="password" name="password"></label>
				<td><input type="button" name="enviando" value="Acceder" onclick=login()></td>
			</tr>
			<tr>
				<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
			</tr>
		</table>
	</form>
	<br>
	<br>
	<h1>Búsqueda Proyectos</h1>
	<form action="listado_proyectos.php" name="formAdminProyectos" method="POST">
		<table border="0" align="center">		<!--Definimos alineación y bordes de los datos en el formulario -->
			<tr>
				<td><label>Introduce tu nombre: <input type="text" id="usuarioP" name="usuarioP"></label>
                <td><label>Introduce tu contraseña: <input type="password" id="passwordP" name="passwordP"></label>
				<td><input type="button" name="enviando" value="Acceder" onclick=loginP()></td>
			</tr>
			<tr>
				<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
			</tr>
		</table>
	</form>
</body>
</html>