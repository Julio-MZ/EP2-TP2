<?php
    require("Conexion.php");
    $con=conectar();

    #--------------------------------SENTENCIAS SELECT--------------------------------#
    $selectGastos="select * from gastos";
    $selectGanancia="select * from ganancias";
    
    #--------------------------------SENTENCIAS PARA SUMAR CAMPOS--------------------------------#
    $totalGastos="select sum(GPrevisto) as GPrevisto, sum(GReal) as GReal from gastos";
    $totalGanancias="select sum(GPrevisto) as GPrevisto, sum(GReal) as GReal from ganancias";

    #--------------------------------EJECUTAR SENTENCIAS--------------------------------#
    $sqlGastos=mysqli_query($con,$selectGastos);
    $sqlGanancia=mysqli_query($con,$selectGanancia);
    $sqlGastoTotal=mysqli_query($con,$totalGastos);
    $sqlGananciaTotal=mysqli_query($con,$totalGanancias);

    #--------------------------------GUARDAR SUMAS RECIBIDAS DE LAS SENTENCIAS--------------------------------#
    $resultGastoTotal=mysqli_fetch_array($sqlGastoTotal);
    $resultGananciaTotal=mysqli_fetch_array($sqlGananciaTotal);
    
    #--------------------------------CODIGO HTML--------------------------------#
    
	if(!mysqli_num_rows($sqlGastos)==0){
		echo "<!DOCTYPE html>
		<html lang='es'>
		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<link href='Diseño.css' rel='stylesheet' type='text/css'>
			<title>Utilidades</title>
		</head>

		<body>
			<div id='divMenu'>
				  <br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>
				  <br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>
				  <br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>
				  <br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>
			</div>

			<div id='gastos'>
				<form>
				<fieldset>
				<legend><h2 id='tituloFormulario'>&nbsp Gastos &nbsp</h2></legend>
				<strong>Previsto: ".$resultGastoTotal['GPrevisto']."</strong>
				<br><strong>Real: ".$resultGastoTotal['GReal']."</strong>
				<br><br><table border cellpadding=10 cellspacing=0>
					<tr id='encabezado'>
						<td><strong>Item</strong></td>
						<td><strong>Descripción</strong></td>
						<td><strong>Previsto</strong></td>
						<td><strong>Real</strong></td>
						<td><strong>Diferencia</strong></td>
					</tr>";
					while($gasto=mysqli_fetch_array($sqlGastos)){
						echo "<tr>
							<td>".$gasto['Item']."</td>
							<td>".$gasto['Descripcion']."</td>
							<td>".$gasto['GPrevisto']."</td>
							<td>".$gasto['GReal']."</td>
							<td>".$gasto['Diferencia']."</td>
						</tr>";
					}
				echo "</table>
				</fieldset>
				</form>
			</div>";
    }else{
		echo "<!doctype html>
		 	  <html>
			  <head>
				  <meta charset='utf-8'>
				  <title>Utilidades</title>
				  <link href='Diseño.css' rel='stylesheet' type='text/css'>
			  </head>
			  	<body>
				  	<div id='divMenu'>
					  <br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>
					  <br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>
					  <br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>
					  <br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>
				  	</div>
				  	<div id='gastosVacio'>
					  <form id='formularioGastos'>
						  <fieldset>
							  <legend><h2 id='tituloFormulario'>&nbsp Gastos &nbsp</h2></legend>
							  <table align='center' border cellpadding=10 cellspacing=0>
							  <tr><td><b>¡Aún no hay registros!</b><p><img src='Imagenes/Sorprendido.png'></p></td></tr>
							  </table>
						  </fieldset>
					  </form>
					  </div>
				  </body>
			  </html>";
	}

	if(!mysqli_num_rows($sqlGanancia)==0){
        echo "<div id='ganancias'>
				<form>
					<fieldset>
						<legend><h2 id='tituloFormulario'>&nbsp Ganancias &nbsp</h2></legend>
						<strong>Previsto: ".$resultGananciaTotal['GPrevisto']."</strong>
						<br><strong>Real: ".$resultGananciaTotal['GReal']."</strong>
						<br><br><table border cellpadding=10 cellspacing=0>
							<tr id='encabezado'>
								<td><strong>Item</strong></td>
								<td><strong>Descripción</strong></td>
								<td><strong>Previsto</strong></td>
								<td><strong>Real</strong></td>
								<td><strong>Diferencia</strong></td>
							</tr>";
							while($ganancia=mysqli_fetch_array($sqlGanancia)){
								echo "<tr>
										<td>".$ganancia['Item']."</td>
										<td>".$ganancia['Descripcion']."</td>
										<td>".$ganancia['GPrevisto']."</td>
										<td>".$ganancia['GReal']."</td>
										<td>".$ganancia['Diferencia']."</td>
									</tr>";
							}
							echo "</table>
            			</fieldset>
            		</form>
				</div>";
	}else{
		echo  "<html>
				<body>
					<div id='gananciasVacio'>
						  <form id='formularioGanancias'>
							  <fieldset>
								  <legend><h2 id='tituloFormulario'>&nbsp Ganancias &nbsp</h2></legend>
								  <table align='center' border cellpadding=10 cellspacing=0>
								  <tr><td><b>¡Aún no hay registros!</b><p><img src='Imagenes/Sorprendido.png'></p></td></tr>
								  </table>
							  </fieldset>
						  </form>
					  </div>
				  </body>
			  </html>";
	}
		echo "<div id='opciones'>
					<form>
						<fieldset>
								<a href='NuevoRegistro.html'><input type='button' value='Nuevo' id='botonNuevo'></a>
								<a href='ModificarRegistro.html'><input type='button' value='Modificar' id='botonModificar'></a>
								<a href='EliminarRegistro.html'><input type='button' value='Eliminar' id='botonEliminar'></a>
							</fieldset>
            			</form>
					</div>
				</body>
			</html>";

    $con->close();
?>