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
			<h1>Proyectos</h1>
			<div id="formulario">
				<form name="formProyectos" method="get" action="inserta_proyectos.php">	<!-- Nombramos, definimos método get, e indicamos mediante action, la localización(una URL) donde la información recolectada por el formulario debe enviarse -->
					<table border="0" align="center">		<!-- Definimos alineación y bordes de los datos en el formulario -->
					
                        <tr>
                            
                            <div class="form-group">
                                <td><span style="color:#FF0000">*</span><label>Busca donde ayudar</label></td>
                                <td><select type="text" class="form-control" id="nombreProyecto" name="nombreProyecto" placeholder="Selecciona">
                                    <option value="0" selected>Seleccionar Proyecto</option>
                                    <option text="ecoaldea" value="1">Ecoaldea</option>
                                    <option text="maltrato" value="2">Víctimas maltrato</option>
									<option text="maltrato" value="2">Cuidado mayores</option>
                                   <!--         <option value="3"></option>
                                            <option value="4"></option>     -->
                                </select></td>
                                <td><span style="color:#FF0000" class="error">
                                    <p id="nom_error"></p>
                                </span></td>
                            </td>
                            </div>
                        </tr>				
						<tr>
							  <td><span style="color:#FF0000">*</span>Tipo</td>
							  <td>
							  <select name="tipo" id="tipo">
                                  <option id="sem">Semanal</option>
                                  <option id="mens">Mensual</option>
                                  <option id="esp">Espontáneo</option>
                                </select></td>
							  <td><span style="color:#FF0000" class="error">
                                    <p id="tipo_error"></p>
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
							  <td><span style="color:#FF0000">*</span>Ayuda</td>
							  <td>   <!--   <label for="tipo"></label>  -->
                                    <input type="checkbox" name="ayuda" id="econ" value="1" checked>Económica
                                    <br>
                                    <input type="checkbox" name="ayuda"  id="voluntariado" value="2">Voluntariado
							  <td><span style="color:#FF0000" class="error"><p id="ayuda_error"></p></span></td>
						</tr>
						<tr>
							  <td align="center"><button type="button" name="enviar" id="enviar" >Colabora</button></td>
							  <td align="center"><input type="reset" name="borrar" id="borrar" value="Borrar"></td>
							  <td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
						</tr>
					</table>
				</form>
			</div>
			<div id="exito" style="display:none">
				<table border="0" align="center">	
					<tr>
						<td>
							</span>Sus datos han sido recibidos con éxito.</td>
						</td>
					</tr>
					<tr>
						<td align="center"><input type="button" name="volver" id="volver" value="Menú inicio" onclick="location.href='principal.html';" ></td>
					</tr>
				</table>	
			</div>
			<div id="proy" style="display:none">
				<table border="0" align="center">	
					<tr>
						<td>
							</span>Se ha producido un error durante el envío de datos. Compruebe que no está asociado a ese proyecto.</td>
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
	   
	   console.log('valor: ', document.getElementById('tipo').options[document.getElementById('tipo').selectedIndex].text);

	//Campos obligatorios, no pueden estar vacíos o sólo con espacios en blanco
    var nombreP = document.getElementById("nombreProyecto"); //El <select>
    var indice = document.getElementById('nombreProyecto').selectedIndex;
    var nomProyecto = document.getElementById('nombreProyecto').options[indice].text;
        console.log(nomProyecto);
   
   
    if($("#nombreProyecto").val() == "0"){
        var nomError = "Debe elegir un proyecto.";
		document.getElementById("nom_error").innerHTML = nomError;
        $("#nombreProyecto").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    
    if($("#dni").val().trim() == ""){     
        var dniError = "Campo dni debe rellenarse.";
		document.getElementById("dni_error").innerHTML = dniError;
        $("#dni").focus();
        return false;
    }


	//Comprobamos dni
	var dni = $("#dni").val().trim();
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
			return false;
		}else{	
			console.log('Dni correcto');
		}
	}else{
		var dniError = 'Dni erróneo, formato no válido';
		document.getElementById("dni_error").innerHTML = dniError;
		return false;
	}
		
	//Recogemos la información del campo ayuda:
	var econ=document.getElementById("econ");
	var voluntariado=document.getElementById("voluntariado");

	if (econ.checked || voluntariado.checked) {
		console.log('tipo ayuda checkado');	}else{
    	var ayudaError = "Campo ayuda debe marcarse.";
		document.getElementById("ayuda_error").innerHTML = ayudaError;
        $("#ayuda").focus();
        return false;
	}
    return true; // Si todo está correcto
}




$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#enviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        
		if(validaForm()){                               // Primero validará el formulario.
			var nombreP = document.getElementById("nombreProyecto"); //El <select>
			var indice = document.getElementById('nombreProyecto').selectedIndex;
			var nomProyecto = document.getElementById('nombreProyecto').options[indice].text;
			
			var dni = $("#dni").val().toUpperCase();
			var tipo= document.getElementById('tipo').options[document.getElementById('tipo').selectedIndex].text;
			
			
			var econ=document.getElementById("econ");
			var voluntariado=document.getElementById("voluntariado");

			if (econ.checked && voluntariado.checked === false) {
				var ayuda= "economica";
			}
			if(voluntariado.checked  && econ.checked === false ){
				var ayuda="voluntariado";
			}
			if(voluntariado.checked  && econ.checked){
				var ayuda="voluntariado, economica";
			}
			  console.log(ayuda); console.log(tipo); console.log(nomProyecto); console.log(dni);
			
			$.ajax({
				method: "GET",
				url: "insertaProyectos.php",
				data: {
					nombreProyecto:nomProyecto,
					dni:dni,
					tipo:tipo,
					ayuda:ayuda,
				},
			})

			.done(function (res) {
				console.log('res', res.split('body'));
				var com=res.split('body');
			//	var com2=com.split('<body>');console.log('res2', com2);
			
					if(com[1].includes('Registro guardado')){

						$("#formulario").fadeOut("slow");			// Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
						$("#exito").delay(500).fadeIn("slow");      // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
					
					}
					if(com[1].includes('no está registrado')){

						$("#formulario").fadeOut("slow");
						$("#fracaso").delay(500).fadeIn("slow");

					}
					if(com[1].includes('proyecto')){

						$("#formulario").fadeOut("slow");			
						$("#proy").delay(500).fadeIn("slow");      

					}
					
			})

			.fail(function (res) {
                console.log(res.split(','));
				if(res.indexOf('Error')){
                alert("Error en la llamada");
				}
            });    
        }
    });
});
//Para eliminar los mensajes de error mostrados:
    function quitaerrores() {
        document.getElementById("nom_error").innerHTML = "";
        document.getElementById("dni_error").innerHTML = "";
        document.getElementById("ayuda_error").innerHTML = "";
        document.getElementById("tipo_error").innerHTML = "";   
    }

    document.getElementById("nombreProyecto").onkeyup = quitaerrores;
    document.getElementById("dni").onkeyup = quitaerrores;
    document.getElementsByName("ayuda").onkeyup = quitaerrores;
    document.getElementById("sem").onkeyup = quitaerrores; 
	document.getElementById("mens").onkeyup = quitaerrores; 
	document.getElementById("esp").onkeyup = quitaerrores; 
</script>

				
				
		</body>
</html>