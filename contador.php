<?php
    
    //contador de visitas 
    $contador = "contador.txt";

    //Si no existe, lo creamos
    if (!file_exists($contador)) {
        touch($contador); // booleano,  establece el tiempo de acceso y modificación de un archivo específico
    }

    // Obtenemos su contenido
    $contenido = trim(file_get_contents($contador));

    // Si está vacío, lo igualamos a cero
    if ($contenido == "") {
        $visitas = 0;
    } else {
        // Si no, las visitas son lo que tenga el archivo
        $visitas = intval($contenido);
    }

   // Las aumentamos
    $visitas++;

    // Reescribimos 
    file_put_contents($contador, $visitas);
?>