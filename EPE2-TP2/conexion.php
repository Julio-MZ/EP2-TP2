<?php
	function conectar(){
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="epe2tp2";
		
		$con=new MySQLi($servername,$username,$password,$dbname);
		
		if($con->connect_error){
			die("Conexión Fallida: ".$con->connect_error);
		}
		return $con;
	}
?>