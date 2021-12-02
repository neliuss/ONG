<!doctype html>
<html>
	<head>

	<meta charset="utf-8">
	<title> Documento</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>	<!-- para jquery -->

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

	<script type="text/javascript">

		window.onload = function () {
			document.form.busca.focus();
			document.form.addEventListener('submit', validarFormulario);
		}

		function validarFormulario(ev) {

			ev.preventDefault();

			var correcto = true;
			var formulario = document.form;

			if($("#busca").val().trim() == ""){
				var dniError = "Campo DNI debe rellenarse.";
				document.getElementById("dni_error").innerHTML = dniError;
				correcto= false;
    		}

			//Comprobamos dni
			var dni = $("#busca").val();
			var numero
			var letr
			var letra
			var expresion_regular_dni
			var dniError = "";
			document.getElementById("dni_error").innerHTML = dniError;
			expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

			if(expresion_regular_dni.test (dni) == true){
				numero = dni.substr(0,dni.length-1);
				letr = dni.substr(dni.length-1,1);
				numero = numero % 23;
				letra='TRWAGMYFPDXBNJZSQVHLCKET';
				letra=letra.substring(numero,numero+1);
				if (letra!=letr.toUpperCase()) {
					var dniError = 'Dni erroneo, la letra del NIF no se corresponde';
					document.getElementById("dni_error").innerHTML = dniError;
					correcto=false;
				}else{	
					console.log('Dni correcto');
				}
			}else{
				var dniError = 'Dni erroneo, formato no válido';
				document.getElementById("dni_error").innerHTML = dniError;
				correcto= false;
			}
			if (correcto ==true) {formulario.submit();}
		}
	</script>			
	</head>

	<body>
		<h1>MODIFICA TUS DATOS</h1>			
		<form action="buscaModif.php" name="form" method="POST">

			<table border="0" align="center">		<!--Definimos alineación y bordes de los datos en el formulario -->
				<tr>
					<td><label>DNI/NIE a buscar: <input type="text" id="busca" name="busca"></label></td>
					<td><span style="color:#FF0000" class="error"><p id="dni_error"></p></span></td>
				</tr>
					<td align="center"><input type="submit" name="enviando" value="Modifica" id="buscar"></td>
				
					<td align="left"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html'" ></td>
				</tr>
			</table>
		</form>
<script>
		function quitaerrores() {
			document.getElementById("dni_error").innerHTML = ""; 
			}

    	document.getElementById("busca").onkeyup = quitaerrores;
		</script>
	</body>
</html>

