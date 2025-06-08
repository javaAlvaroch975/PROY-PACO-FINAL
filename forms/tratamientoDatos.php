<?php
echo"<h2>Tratamiento de Datos del Formulario</h2>";


function recoge($var)
{
	$tmp = (isset($var))
	? trim(htmlspecialchars($var, ENT_QUOTES, "UTF-8"))
	: "";
	return $tmp;
}
var_dump($_REQUEST);

// EJEMPLO DE USO DE LA FUNCIÓN ANTERIOR
foreach($_REQUEST as $indice=>$valor) {
	if (is_array($valor)) { 					//Comprobamos si cada valor del array es otro array, tendremos entonces un array bidimensional con 	
		foreach($valor as $indiceY=>$valor2) {	//dos índices y un valor. Recorremos el array bidimensional con 2 foreach.
			$nombre = recoge($valor2);
			if ($nombre == "") {
				print "<p>No ha escrito ningún/a $indiceY</p>";
			} else {
				print "<p>Su $indice para el índice $indiceY es $nombre</p>\n";
			}
		}
	} else {
			$nombre = recoge($valor);
			if ($nombre == "") {
				print "<p>No ha escrito ningún/a $indice</p>";
			} else {
				print "<p>Su $indice es $nombre</p>\n";
			}
	}
}


echo"<h2>Comprobación existencia botones de radio y casillas de verificación</h2>";
echo"<h4>Se debe acceder a su variable name, por lo que debe ser personalizado.</h4>";

if (isset($_REQUEST["sexo"])) {
	print "<p>Se ha enviado el control de radio sexo</p>\n";
} else {
	print "<p>No se ha enviado el control de radio sexo</p>\n";
}

if (isset($_REQUEST["puesto_directivo"])) {
	print "<p>Se ha enviado el control de casilla de verificación puesto_direc</p>\n";
} else {
	print "<p>No se ha enviado el control de casilla de verificación puesto_direc</p>\n";
}

echo"<h2>Mostrar información de los ficheros a enviar</h2>";
foreach($_FILES as $ind1=>$arrayunid) {
			
		if ($_FILES["$ind1"]["error"]<>0) echo"El $ind1 no se ha enviado.<br/>";
				else 
					{echo"El $ind1 se ha enviado: <br/>";
					echo "<pre>";print_r($_FILES["$ind1"]);echo"</pre>\n";}
}


