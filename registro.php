<?php
    // Incluimos contador de visitas
    include_once "contador.php";
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>Benvido</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>	<!-- para jquery -->
			<!-- Definimos el estilo--> 
			
		<!--		<link rel="stylesheet" type="text/css" href="./css/estilo.css" />	--> 
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
					border:3px solid #F00;
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
			<div id="formulario">
				<form name="form1" method="get" action="inserta.php">	<!-- Nombramos, definimos método get, e indicamos mediante action, la localización(una URL) donde la información recolectada por el formulario debe enviarse -->
					<table border="0" align="center">		<!--Definimos alineación y bordes de los datos en el formulario -->
					
						<tr>
							  <td><span style="color:#FF0000">*</span>Nombre</td>
							  <td><label for="nombre"></label>
							  <input type="text" name="nombre" id="nombre" placeholder="Nombre"></td>
							 <td><span style="color:#FF0000" class="error">
                                    <p id="nom_error"></p>
                                </span></td>
						</tr>
						<tr>
							  <td><span style="color:#FF0000">*</span>Apellidos</td>
							  <td><label for="apellidos"></label>
							  <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"></td>
							  <td><span style="color:#FF0000" class="error">
                                    <p id="apel_error"></p>
                                </span></td>
						</tr>
						<tr>
							  <td><span style="color:#FF0000">*</span>DNI/NIF</td>
							  <td><label for="dni"></label>
							  <input type="text" name="dni" id="dni" placeholder="DNI/NIF"></td>
							 <td><span style="color:#FF0000" class="error">
                                    <p id="dni_error"></p>
                                </span></td>
						</tr>
						<tr>
							  <td></span>Domicilio</td>
							  <td><label for="domicilio"></label>
							  <input type="text" name="domicilio" id="domicilio" placeholder="Domicilio"></td>
						</tr>
						<tr>
							  <td></span>Edad</td>
							  <td><label for="edad"></label>
							  <input type="text" name="edad" id="edad" placeholder="Edad"></td>
						</tr>
						<tr>
							  <td></span>Tel&eacute;fono</td>
							  <td><label for="telef"></label>
							  <input type="text" name="telef" id="telef" placeholder="Tel&eacute;fono"></td>
						</tr>
						<tr>
							  <td><span style="color:#FF0000">*</span>Correo</td>
							  <td><label for="edad"></label>
							  <input type="text" name="mail" id="mail" placeholder="email"></td>
							 <td><span style="color:#FF0000" class="error">
                                    <p id="mail_error"></p>
                                </span></td>
						</tr>
						
				
						<tr>
							  <td align="center"><button type="button" name="enviar" id="enviar" >Registrar</button></td>
							  <td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
							  <td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html'" ></td>
						</tr>
					</table>
				</form>
			</div>

			<div id="exito" style="display:none">
				<table border="0" align="center">	
					<tr>
						<td>
							</span>Sus datos han sido registrados con éxito.</td>
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
							</span>Se ha producido un error durante el envío de datos.</td>
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

			<div id="bd" style="display:none">
				<table border="0" align="center">	
					<tr>
						<td>
							</span> Se ha producido un error durante el envío de datos. Compruebe si ya figura entre nuestros socios.</td>
						</td>
						<td>
							</span>  <h4><a href="registro.php">Regístrate</a></h4></td>
						</td>
					</tr>
					<tr>
						<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
					</tr>
				</table>	
			</div>

			

<script type="text/javascript">

function validaForm(){
    
	//Nombre, apellidos, dni y correo son campos obligatorios, no pueden estar vacíos o sólo con espacios en blanco
    if($("#nombre").val().trim() == ""){
        var nomError = "Campo nombre debe rellenarse.";
		document.getElementById("nom_error").innerHTML = nomError;
        $("#nombre").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }

    if($("#apellidos").val().trim() == ""){
        var apelError = "Campo apellidos debe rellenarse.";
		document.getElementById("apel_error").innerHTML = apelError;
        $("#apellidos").focus();
        return false;
    }

    if($("#dni").val().trim() == ""){
        var dniError = "Campo DNI debe rellenarse.";
		document.getElementById("dni_error").innerHTML = dniError;
        return false;
    }

	var comminus = $("#dni").val().slice(-1); //Comprobamos última letra con slice(-1)
	if(comminus == comminus.toLowerCase()){
        var dniError = "Letra del DNI debe ser mayúscula.";
		document.getElementById("dni_error").innerHTML = dniError;
        return false;
    }

	if($("#mail").val().trim() == ""){
        var mailError = "Campo email debe rellenarse.";
		document.getElementById("mail_error").innerHTML = mailError;;
        $("#mail").focus();
        return false;
    }

	//Comprobamos dni
	var dni = $("#dni").val();
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
			var dniError = 'Dni erróneo, la letra del NIF no se corresponde';
			document.getElementById("dni_error").innerHTML = dniError;
			return false;
		}else{	
			console.log('Dni correcto');
		}
	}else{
		var dniError = 'Dni erróneo, formato no válido';
		document.getElementById("dni_error").innerHTML = dniError;
		return false;
	}

		// Comprobamos mail.		
	// ^ ::: Coincide con el inicio del texto		\w+ ::: \w es lo mismo que [a-zA-Z_0-9] (un caracter alfanumérico)
    // El + lo repite 1 o más veces, coincide con 1 o más caracteres alfanuméricos.		([.-]\w+)* ::: Es un grupo, repetido * (0 o más veces) Coincide con:[.-] ::: un punto o un guión
    //	\w+  ::: 1 o más caracteres alfanuméricos, permite puntos o guiones que no estén ni al principio ni al final del usuario.
	// @ ::: una arroba 		\w+ ::: 1 o más caracteres alfanuméricos		([.-]\w+)* ::: un punto o guión intermedio con más alfanuméricos,de nuevo, repetido 0 o más veces
	// \.\w{2,4} ::: un punto seguido de 2 a 4 alfanuméricos. Esto es para el TLD (la extensión), aunque podría ser un error limitarla a 2-4		$ ::: Coincide con el final del texto
	let expMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    if (!expMail.test($("#mail").val().trim())) {
        var mailError2 = "Rellene bien el mail.";
		document.getElementById("mail_error").innerHTML = mailError2;
		return false;
    }
		

    return true; // Si todo está correcto
}




$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#enviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        
		if(validaForm()){                               // Primero validará el formulario.

			var nombre = $("#nombre").val();
			var apellidos = $("#apellidos").val();
			var dni = $("#dni").val().toUpperCase();		//lo guardamos en la BD con la última mayúscula, en caso que no lo escribiera el o la socia
			var domicilio= $("#domicilio").val();
			var edad= $("#edad").val();
			var telefono = $("#telef").val();
			var mail = $("#mail").val();

			$.ajax({
				method: "GET",
				url: "inserta.php",
				data: {
					nombre:nombre,
					apellidos:apellidos,
					dni:dni,
					domicilio:domicilio,
					edad:edad,
					telefono:telefono,
					mail:mail,
				},
			})

			.done(function (res) {
				console.log('res', res.split('<body>'));
				var com=res.split('body');

				if(com[1].includes('Registro guardado')){

					$("#formulario").fadeOut("slow");			// Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
					$("#exito").delay(500).fadeIn("slow");      // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
					$("#bd").hide();
				}
				
				if(com[1].includes('figura en nuestra base de datos')){

					$("#formulario").fadeOut("slow");			
					$("#bd").delay(500).fadeIn("slow");      

				}

				if(com[1].includes('Eror')){

					$("#formulario").fadeOut("slow");
					$("#fracaso").delay(500).fadeIn("slow");

				}
			})

			.fail(function (res) {
                console.log(msg);
                alert("Error en la llamada");
            });    
        }
    });
});
//Para eliminar los mensajes de error mostrados:
    function quitaerrores() {
        document.getElementById("nom_error").innerHTML = "";
        document.getElementById("apel_error").innerHTML = "";
        document.getElementById("mail_error").innerHTML = "";
        document.getElementById("dni_error").innerHTML = "";
    }

    document.getElementById("nombre").onkeyup = quitaerrores;
    document.getElementById("apellidos").onkeyup = quitaerrores;
    document.getElementById("mail").onkeyup = quitaerrores;
    document.getElementById("dni").onkeyup = quitaerrores;
</script>

				
				
		</body>
</html>