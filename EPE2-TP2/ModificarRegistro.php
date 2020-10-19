<?php
    require("Conexion.php");
    $con=conectar();

    $id=$_REQUEST["id"];
    $tabla=$_REQUEST["tabla"];

    $sql="select * from $tabla where Item=$id";
    $result=mysqli_query($con,$sql);

    if(!mysqli_num_rows($result)==0){
        if($row=mysqli_fetch_array($result)){
            echo "<!doctype html>
            <html>
            <head>
                <meta charset='utf-8'>
                <title>Utilidades - Modificar</title>
                <link href='Diseño.css' rel='stylesheet' type='text/css'>
            </head>
        
            <body>
				<div id='divMenu'>
				  <br><a href='productos.php'><button id='botonProductos'><b>Productos</b></button></a>
				  <br><br><a href='GananciasGastos.php'><button id='botonUtilidades'><b>Utilidades</b></button></a>
				  <br><br><a href=''><button id='botonContacto'><b>Contacto</b></button></a>
				  <br><br><a href='Login.html'><button id='botonSalir'><b>Salir</b></button></a>
				</div>
				
                <div id='divModificar'>
                    <form id='formularioModificar' method='post' action='updateModificar.php'>
                    <fieldset>
                    <legend><h2 id='tituloFormulario'>&nbsp Modificar &nbsp</h2></legend>
                    Item:
                    <br><input type='text' name='item' id='item' value='$row[Item]' readonly>
                    <br><br>Ingrese descripción:
                    <br><input type='text' name='descripcion' id='descripcion' value='$row[Descripcion]' required>
                    <br><br>Ingrese valor previsto:
                    <br><input type='number' name='previsto' id='previsto' value='$row[GPrevisto]' required>
                    <br><br>Ingrese valor real:
                    <br><input type='number' name='real' id='real' value='$row[GReal]' required>
                    <input type='text' name='tabla' id='tabla' value='$tabla' hidden>
                    <p align='center'><input type='submit' value='Modificar' id='botonModificar'></p>
                    </fieldset>
                    </form>
                </div>
            </body>
            </html>";
        }
    }else{
        echo "<!doctype html>
        <html>
        <head>
            <meta charset='utf-8'>
            <title>Registro de ganancias y gastos</title>
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
            No se encontró ningún registro. Puede que uno de los datos ingresados esté incorrecto.
            <p><img src='Imagenes/Busqueda.png'></p>
            <a href='GananciasGastos.php'><input type='button' value='Volver'></a>
            </fieldset>
            </form>
        </body>
        </html>";
    };
    $con->close();
?>