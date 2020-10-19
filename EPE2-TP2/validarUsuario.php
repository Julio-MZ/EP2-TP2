<?php
	require("conexion.php");
	$con=conectar();
	$email=$_REQUEST["email"];
	$contrasena=$_REQUEST["contrasena"];

	$sql = "select * from usuarios where email='$email' and contrasena='$contrasena'";
	$result = mysqli_query($con, $sql);
	
	if(!mysqli_num_rows($result)==0){
		header("Status: 301 Moved Permanently");
		header("Location: Inicio.html");
		exit;
	}else{
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Inicio de Sesión</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<form id='formularioAviso'>";
		echo "<fieldset>";
		echo "E-mail y/o contraseña incorrectas.";
		echo "<p><img src='Imagenes/DatosIncorrectos.png'></p>";
		echo "<a href='Login.html'><input type='button' value='Volver a intentar' id='botonVolverIntentar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}
	$con->close();
?>