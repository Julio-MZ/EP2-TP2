<?php
	require("conexion.php");
	$con=conectar();
	$idUsuario=$_REQUEST["idUsuario"];
	$nombre=$_REQUEST["nombre"];
	$email=$_REQUEST["email"];
	$contrasena=$_REQUEST["contrasena"];
	
	$sql = "update usuarios set Nombre='$nombre', Email='$email', Contrasena='$contrasena' where IdUsuario='$idUsuario'";
	
	if($con->query($sql)===TRUE){
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Modificar Usuario</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<form id='formularioAviso'>";
		echo "<fieldset>";
		echo "Sus datos han sido modificados con éxito.";
		echo "<p><img src='Imagenes/Confirmacion.png'></p>";
		echo "<a href='Login.html'><input type='button' value='Aceptar' id='botonAceptar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}else{
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Modificar Usuario</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<form id='formularioAviso'>";
		echo "<fieldset>";
		echo "Ha ocurrido un error al momento de modificar sus datos. Intentelo nuevamente.";
		echo "<p><img src='Imagenes/Triste.png'></p>";
		echo "<a href='Modificar.html'><input type='button' value='Volver a intentar' id='botonVolverIntentar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}
	$con->close();
?>