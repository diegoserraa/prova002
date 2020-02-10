<?php
// Conexão
require_once 'db_connect.php';

if(isset($_GET["id"])):
	
	$id=$_GET['id'];

	$sql="DELETE FROM cliente WHERE id='$id'";
	

	if(mysqli_query($connect, $sql)):
		
		header('Location: ../clientes.php');
	else:
		
		header('Location: ../clientes.php');
	endif;
endif;
