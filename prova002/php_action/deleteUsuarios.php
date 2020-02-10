<?php
// Conexão
require_once 'db_connect.php';

if(isset($_GET["id"])):
	
	$id=$_GET['id'];

	$sql="DELETE FROM usuario WHERE id='$id'";
	

	if(mysqli_query($connect, $sql)):
		
		header('Location: ../usuarios.php');
	else:
		
		header('Location: ../usuarios.php');
	endif;
endif;
