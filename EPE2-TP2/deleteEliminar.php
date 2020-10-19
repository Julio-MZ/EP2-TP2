<?php
	require("conexion.php");
    $con=conectar();
    
	$item=$_REQUEST["id"];
    $tabla=$_REQUEST["tabla"];
	
    $delete = "delete from $tabla where (Item=$item)";
	
	if($con->query($delete)===TRUE){
        echo "<!doctype html>
        <html>
        <head>
            <meta charset='utf-8'>
            <title>Utilidades - Eliminar</title>
            <link href='Diseño.css' rel='stylesheet' type='text/css'>
        </head>
        
        <body>
			<div id='divMenu'>
				  <br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>
				  <br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>
				  <br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>
				  <br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>
			</div>
			
            <form id='formularioAvisoInicio'>
            <fieldset>
            Registro eliminado con éxito.
            <p><img src='Imagenes/Confirmacion.png'></p>
            <a href='GananciasGastos.php'><input type='button' value='Aceptar' id='botonAceptar'></a>
            </fieldset>
            </form>
        </body>
        </html>";
    }else{
        echo "<!doctype html>
        <html>
        <head>
            <meta charset='utf-8'>
            <title>Utilidades - Eliminar</title>
            <link href='Diseño.css' rel='stylesheet' type='text/css'>
        </head>
        
        <body>
			<div id='divMenu'>
				  <br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>
				  <br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>
				  <br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>
				  <br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>
			</div>
			
            <form id='formularioAvisoInicio'>
            <fieldset>
            Ha ocurrido un error al intentar eliminar el registro.
            <p><img src='Imagenes/Triste.png'></p>
            <a href='GananciasGastos.php'><input type='button' value='Volver a intentar' id='botonVolverIntentar'></a>
            </fieldset>
            </form>
        </body>
        </html>";
    }
	$con->close();
?>