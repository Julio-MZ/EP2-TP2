<?php
	require("conexion.php");
	$con=conectar();

	$sql = "select * from productos";
	$result = mysqli_query($con, $sql);
	
	if(!mysqli_num_rows($result)==0){
		echo "<!doctype html>
			  <html>
			  <head>
			  <meta charset='utf-8'>
			  <title>Productos</title>
			  <link href='Diseño.css' rel='stylesheet' type='text/css'>
			  </head>
			  <body>
			  <div id='divMenu'>
			  <br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>
			  <br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>
			  <br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>
			  <br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>
			  </div>
			  <div id='divProducto'>
			  <form id='formularioProducto'>
			  <fieldset>
			  <legend><h2 id='tituloFormulario'>&nbsp Lista de Productos &nbsp</h2></legend>
			  <table align='center' border cellpadding=10 cellspacing=0>
			  <tr id='encabezado'><td><b>ID</b></td><td><b>Producto</b></td><td><b>Género</b></td><td><b>Precio</b></td><td><b>Stock</b></td></tr>";
			  while($row = mysqli_fetch_array($result)){
				  echo "<tr><td>$row[IdProducto]</td><td>$row[Producto]</td><td>$row[Genero]</td><td>$row[Precio]</td><td>$row[Stock]</td></tr>";
			  }
		echo "</table>
			  <p align='center'><a href='Agregar-Producto.html'><img src='Imagenes/Agregar.png'></a><br><b>Agregar</b></p>
			  </fieldset>
			  </form>
			  </div>
			  </body>
			  </html>";
	}else{
		echo "<!doctype html>
		 	  <html>
			  <head>
		 	  <meta charset='utf-8'>
			  <title>Productos</title>
		      <link href='Diseño.css' rel='stylesheet' type='text/css'>
			  </head>
			  <body>
			  <div id='divMenu'>
			  <br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>
			  <br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>
			  <br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>
			  <br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>
			  </div>
			  <div id='divProducto'>
			  <form id='formularioProducto'>
			  <fieldset>
			  <legend><h2 id='tituloFormulario'>&nbsp Lista de Productos &nbsp</h2></legend>
			  <table align='center' border cellpadding=10 cellspacing=0>
			  <tr><td><b>¡Aún no hay productos registrados!</b><p><img src='Imagenes/Sorprendido.png'></p></td></tr>
			  </table>
			  <p align='center'><a href='Agregar-Producto.html'><img src='Imagenes/Agregar.png'></a><br><b>Agregar</b></p>
			  </fieldset>
			  </form>
			  </div>
			  </body>
			  </html>";
	}
	$con->close();
?>