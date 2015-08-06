<?php

//llamo al archivo conexion.php
include('conexion.php');

//recopilo la info del formulario
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$usuario=$_POST['usuario'];

// codifico la password
$contrasenia=md5($_POST['contrasenia']);

//hago una sentencia para ver si hay otro usuario con el mismo nombre
$query_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' ");

//condicional para verificar si hay algun registro, si hay alguno entonces ya hay un user con ese nombre				
if(mysqli_num_rows($query_usuario)>0)
{
	echo "Este usuario ya existe,Por favor elija otro nombre de usuario";
} 
else 
{			
// hago la sentencia insert asi lo agrego a la tabla usuarios	
$query = "INSERT INTO usuarios VALUES(null,'$nombre','$apellido','$email','$usuario','$contrasenia')";
						
// ejecuto la sentencia
$ingresar = mysqli_query($conexion, $query);		

// compruebo si se ejecuto bien
	if($ingresar==true)
	{
		echo  "<script>alert('Registro Exitoso');</script>";
		header('refresh:2; url=http://www.reefarg.com.ar');
	} 
	else 
	{
		echo "No se pudo registrar su usuario";
	}
}
?>