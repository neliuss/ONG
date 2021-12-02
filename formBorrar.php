<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>	
<title> Darse de baja</title>
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

	<div name="fb">
		<form name="f2" method="POST">
			<table border="0" align="center">		<!--Definimos alineación y bordes de los datos en el formulario -->
				<tr>
					<td><label>Escriba su DNI/NIE: </label>
				</tr>
				<tr>
					<td>
						<input type="text" id="d" name="d">
					</td>
					<td>
						<span style="color:#FF0000" class="error"><p id="d_error"></p> </span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Escriba su correo: </label>
					</td>
				</tr>
				<tr>
					<td><input type="text" id="cor" name="cor">
					<td><span style="color:#FF0000" class="error">
						<p id="cor_error"></p></span></td>
					
				</tr>
				<tr>
					<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html'" ></td>
					<td align="center"><button type="button" name="borrar" id="borrar"  >Borrar</button></td>
				</tr>
			</table>
		</form>
	</div>


			<div id="exito" style="display:none">
				<table border="0" align="center">	
					<tr>
						<td>
							</span>Sus datos han sido borrados con éxito de nuestra base.</td>
						</td>
					</tr>
					<tr>
						<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
					</tr>
				</table>	
			</div>
			<div id="regis" style="display:none">
				<table border="0" align="center">	
					<tr>
						<td>
							</span>No se ha encontrado ningún registro.</td>
						</td>
						<td>
							</span>  <h4><a href="mailto:alexpernas@gmail.com" style="background-color: limegreen; color: whitesmoke">Escríbenos si tienes alguna duda</a></h4></td>
						</td>
					</tr>
					<tr>
						<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
					</tr>
				</table>	
			</div>
			<div id="fracaso" style="display:none">
				<table border="0" align="center">	
					<tr>
						<td>
							</span> Se ha producido un error durante el envío de datos.</td>
						</td>
					</tr>
					<tr>
						<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
					</tr>
				</table>	
			</div>

   <script type="text/javascript">

    function validaFormborrar(){
    
	//dni y correo son campos obligatorios, no pueden estar vacíos o sólo con espacios en blanco
    if(document.getElementById('d').value.trim() == "" ){
        var dniError = "Campo DNI debe rellenarse.";
		document.getElementById("d_error").innerHTML = dniError;
        return false;
    }

	if(document.getElementById('cor').value.trim() == ""){
        var mailError = "Campo email debe rellenarse.";
		document.getElementById("cor_error").innerHTML = mailError;;
        document.getElementById('cor').focus();
        return false;
    }

	//Comprobamos dni
	var dni = document.getElementById('d').value;
	var numero
	var letr
	var letra
	var expresion_regular_dni
	var dniError = "";
	document.getElementById("d_error").innerHTML = dniError;
	expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

	if(expresion_regular_dni.test (dni) == true){
		numero = dni.substr(0,dni.length-1);
		letr = dni.substr(dni.length-1,1);
		numero = numero % 23;
		letra='TRWAGMYFPDXBNJZSQVHLCKET';
		letra=letra.substring(numero,numero+1);
		if (letra!=letr.toUpperCase()) {
			var dniError = 'Dni erróneo, la letra del NIF no se corresponde';
			document.getElementById("d_error").innerHTML = dniError;
			return false;
		}else{	
			console.log('Dni correcto');
		}
	}else{
		var dniError = 'Dni erróneo, formato no válido';
		document.getElementById("d_error").innerHTML = dniError;
		return false;
	}

		// Comprobamos mail.		
	// ^ ::: Coincide con el inicio del texto		\w+ ::: \w es lo mismo que [a-zA-Z_0-9] (un caracter alfanumérico)
    // El + lo repite 1 o más veces, coincide con 1 o más caracteres alfanuméricos.		([.-]\w+)* ::: Es un grupo, repetido * (0 o más veces) Coincide con:[.-] ::: un punto o un guión
    //	\w+  ::: 1 o más caracteres alfanuméricos, permite puntos o guiones que no estén ni al principio ni al final del usuario.
	// @ ::: una arroba 		\w+ ::: 1 o más caracteres alfanuméricos		([.-]\w+)* ::: un punto o guión intermedio con más alfanuméricos,de nuevo, repetido 0 o más veces
	// \.\w{2,4} ::: un punto seguido de 2 a 4 alfanuméricos. Esto es para el TLD (la extensión), aunque podría ser un error limitarla a 2-4		$ ::: Coincide con el final del texto
	let expMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    if (!expMail.test(document.getElementById('cor').value.trim())) {
        var mailError2 = "Rellene bien el mail.";
		document.getElementById("cor_error").innerHTML = mailError2;
		return false;
    }		
    return true; // Si todo está correcto
}

	$(document).ready(function() {

 // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#borrar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        
		if(validaFormborrar()){                               // Primero validará el formulario.
		console.log('Formato correcto');
			var dni = $("#d").val().toUpperCase();
			var mail = $("#cor").val();

			$.ajax({
				method: "GET",
				url: "buscaborrar.php",
				data: {
					dni:dni,
					mail:mail,
				},
			})

			.done(function (res) {
				var corta=res.split('<body>');
				console.log('resultado: ', corta);

					if(corta[1].includes('Registro eliminado1')){
						$("#fb").fadeOut("slow");			
						$("#exito").delay(500).fadeIn("slow");
						$("#regis").hide();
						
					}	
					if(corta[1].includes('No se ha encontrado ningún registro')){
						$("#fb").fadeOut("slow");			
						$("#regis").delay(500).fadeIn("slow");
						
					}
					
					if(corta[1].includes('Error en la consulta')){
						alert('error en la consulta');
						
					}
			})
			.fail(function (res) {				
				$("#fracaso").delay(500).fadeIn("slow");  
            });    
        }
    });
});

//Para eliminar los mensajes de error mostrados:
    function quitaerrores() {
        document.getElementById("cor_error").innerHTML = "";
        document.getElementById("d_error").innerHTML = "";
    }

    document.getElementById("cor").onkeyup = quitaerrores;
    document.getElementById("d").onkeyup = quitaerrores;
</script>
</body>
</html>