<?php

// Conexão
require_once 'db_connect.php';
if(isset($_GET['id'])):
	$id=$_GET['id'];
	$nome=mysqli_escape_string($connect, $_POST['nome']);
	$login=mysqli_escape_string($connect, $_POST['login']);
	$senha=mysqli_escape_string($connect, $_POST['senha']);


	
	$sql=" UPDATE usuario SET nome='$nome', login='$login', senha='$senha' WHERE id='$id'" ;

	if(mysqli_query($connect, $sql)):
		
		header('Location: ../usuarios.php?sucesso');
	else:
		
		header('Location: ../usuarios.php?error');
	endif;

endif; 


