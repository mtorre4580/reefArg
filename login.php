<?php

include('conexion.php');

//recopilo la info del formulario del login
$user=$_POST['user'];
$pass=$_POST['pass'];
//armo la consulta sql para buscar si existe ese usuario
$query="SELECT FROM usuarios WHERE usuario='$user' AND contrasenia='$pass'";
//hago la consulta
$comprobacion=mysqli_query($conexion,$query);
if($comprobacion == false)
{
		echo "Error en SQL";
} 
else 
{
		if(mysqli_num_rows($comprobacion) == 0 )
		{
			echo "Datos Incorrectos";
		}
		else 
		{
		}
}

?>