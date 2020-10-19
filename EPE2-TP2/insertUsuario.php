<?php
	require("conexion.php");
	$con=conectar();
	$nombre=$_REQUEST["nombre"];
	$email=$_REQUEST["email"];
	$contrasena=$_REQUEST["contrasena"];

	$sql = "insert into usuarios(Email, Contrasena, Nombre) values('$email', '$contrasena', '$nombre')";
	
	if($con->query($sql)===TRUE){
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Registro</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<form id='formularioAviso'>";
		echo "<fieldset>";
		echo "Usuario creado con éxito.";
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
		echo "<title>Registro</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<form id='formularioAviso'>";
		echo "<fieldset>";
		echo "El E-mail ingresado ya está en uso.";
		echo "<p><img src='Imagenes/Triste.png'></p>";
		echo "<a href='Registro.html'><input type='button' value='Volver a intentar' id='botonVolverIntentar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}
	$con->close();
?>