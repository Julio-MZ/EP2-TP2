<?php
	require("conexion.php");
	$con=conectar();

	$sql = "select * from usuarios";
	$result = mysqli_query($con, $sql);
	
	if(!mysqli_num_rows($result)==0){
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Lista de Usuarios</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<div id='divFormulario1'>";
		echo "<form id='formularioPrincipal'>";
		echo "<fieldset>";
		echo "<legend><h2 id='tituloFormulario'>&nbsp Lista &nbsp</h2></legend>";
		echo "<a href='Registro.html'><input type='button' value='Registrarse' id='botonRegistrarse'></a> &nbsp ";
		echo "<a href='Login.html'><input type='button' value='Inicio Sesión' id='botonInicioSesion'></a>";
		echo "<hr>";
		echo "<table align='center' border cellpadding=10 cellspacing=0>";
		echo "<tr id='encabezado'><td><b>ID</b></td><td><b>Usuario</b></td></tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr><td>$row[IdUsuario]</td><td>$row[Nombre]</td></tr>";
		}
		echo "</table>";
		echo "</fieldset>";
		echo "</form>";
		echo "</div>";
		echo "<div id='divFormulario2'>";
		echo "<form id='formularioSecundario'>";
		echo "<fieldset>";
		echo "<a href='Modificar.html'><input type='button' value='Modificar' id='botonModificar'></a><br><br>";
		echo "<a href='selectUsuario.php'><input type='button' value='Listar' id='botonListar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</div>";
		echo "</body>";
		echo "</html>";
	}else{
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Lista de Usuarios</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<div id='divFormulario1'>";
		echo "<form id='formularioPrincipal'>";
		echo "<fieldset>";
		echo "<legend><h2 id='tituloFormulario'>&nbsp Lista &nbsp</h2></legend>";
		echo "<a href='Registro.html'><input type='button' value='Registrarse' id='botonRegistrarse'></a> &nbsp ";
		echo "<a href='Login.html'><input type='button' value='Inicio Sesión' id='botonInicioSesion'></a>";
		echo "<hr>";
		echo "<table align='center' border cellpadding=10 cellspacing=0>";
		echo "<tr><td><b>¡Aún no hay usuarios registrados!</b><p><img src='Imagenes/Sorprendido.png'></p></td></tr>";
		echo "</table>";
		echo "</fieldset>";
		echo "</form>";
		echo "</div>";
		echo "<div id='divFormulario2'>";
		echo "<form id='formularioSecundario'>";
		echo "<fieldset>";
		echo "<a href='Modificar.html'><input type='button' value='Modificar' id='botonModificar'></a><br><br>";
		echo "<a href='selectUsuario.php'><input type='button' value='Listar' id='botonListar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</div>";
		echo "</body>";
		echo "</html>";
	}
	$con->close();
?>