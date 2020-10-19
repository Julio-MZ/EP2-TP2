<?php
	require("conexion.php");
	$con=conectar();
	$email=$_REQUEST["email"];
	$contrasena=$_REQUEST["contrasena"];

	$sql = "select * from usuarios where email='$email' and contrasena='$contrasena'";
	$result = mysqli_query($con, $sql);
	
	if(!mysqli_num_rows($result)==0){
		echo "<!doctype html>";
		echo "<html>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<title>Modificar Usuario</title>";
		echo "<link href='Diseño.css' rel='stylesheet' type='text/css'>";
		echo "</head>";
		echo "<body>";
		echo "<div id='divFormulario1'>";
		if($row=mysqli_fetch_array($result)){
			echo "<form id='formularioPrincipal' method='post' action='updateUsuario.php'>";
			echo "<fieldset>";
			echo "<legend><h2 id='tituloFormulario'>&nbsp Mis Datos &nbsp</h2></legend>";
			echo "<a href='Registro.html'><input type='button' value='Registrarse' id='botonRegistrarse'></a> &nbsp ";
			echo "<a href='Login.html'><input type='button' value='Inicio Sesión' id='botonInicioSesion'></a>";
			echo "<hr>";
			echo "<br>ID Usuario:<br>";
			echo "<input type='text' name='idUsuario' id='idUsuario' value='$row[IdUsuario]' readonly>";
			echo "<br><br>Nombre:";
			echo "<input type='text' name='nombre' id='nombre' value='$row[Nombre]' required>";
			echo "<br><br>E-mail:";
			echo "<input type='text' name='email' id='email' value='$row[Email]' required>";
			echo "<br><br>Contraseña:";
			echo "<input type='password' name='contrasena' id='contrasena' value='$row[Contrasena]' required>";
			echo "<p align='center'><input type='submit' value='Modificar' id='botonModificar'></p>";
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
		echo "No se encontró ningún usuario. Puede que el E-mail y/o la contraseña que ingresó estén incorrectos.";
		echo "<p><img src='Imagenes/Busqueda.png'></p>";
		echo "<a href='Modificar.html'><input type='button' value='Volver a intentar' id='botonVolverIntentar'></a>";
		echo "</fieldset>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}
	$con->close();
?>