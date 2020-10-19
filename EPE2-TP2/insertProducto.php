<?php
	require("conexion.php");
	$con=conectar();
	$producto=$_REQUEST["producto"];
	$genero=$_REQUEST["genero"];
	$precio=$_REQUEST["precio"];
	$stock=$_REQUEST["stock"];

	$sql = "insert into productos(Producto, Genero, Precio, Stock) values('$producto', '$genero', '$precio', '$stock')";
	
	if($con->query($sql)===TRUE){
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Productos</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<div id='divMenu'>";
		echo "<br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>";
		echo "<br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>";
		echo "<br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>";
		echo "<br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>";
		echo "</div>";
		echo "<form id='formularioAvisoInicio'>";
		echo "<fieldset>";
		echo "Producto agregado con éxito.";
		echo "<p><img src='Imagenes/Confirmacion.png'></p>";
		echo "<a href='productos.php'><input type='button' value='Aceptar' id='botonAceptar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}else{
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Productos</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<div id='divMenu'>";
		echo "<br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>";
		echo "<br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>";
		echo "<br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>";
		echo "<br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>";
		echo "</div>";
		echo "<form id='formularioAvisoInicio'>";
		echo "<fieldset>";
		echo "El producto no ha podido ser ingresado. Intentelo nuevamente.";
		echo "<p><img src='Imagenes/Triste.png'></p>";
		echo "<a href='productos.php'><input type='button' value='Volver a intentar' id='botonVolverIntentar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}
	$con->close();
?>