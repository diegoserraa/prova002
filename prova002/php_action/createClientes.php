<?php
 //Conexão

require_once 'db_connect.php';


$nome=mysqli_escape_string($connect, $_POST['nome']);
$email=mysqli_escape_string($connect, $_POST['email']);
$cep=mysqli_escape_string($connect, $_POST['cep']);
$endereco=mysqli_escape_string($connect, $_POST['endereco']);
$numero=mysqli_escape_string($connect, $_POST['numero']);
$bairro=mysqli_escape_string($connect, $_POST['bairro']);
$cidade=mysqli_escape_string($connect, $_POST['cidade']);
$uf=mysqli_escape_string($connect, $_POST['uf']);
$cpf=mysqli_escape_string($connect, $_POST['cpf']);
$telefone=mysqli_escape_string($connect, $_POST['telefone']);
$site=mysqli_escape_string($connect, $_POST['site']);
$id=mysqli_escape_string($connect, $_POST['id']);


$sql="INSERT INTO cliente (nome, email, cep, endereco, numero, bairro, cidade, uf, cpf, telefone, site) VALUES ('$nome', '$email',  
'$cep', '$endereco', '$numero', '$bairro', '$cidade', '$uf', '$cpf', '$telefone', '$site')";

if(mysqli_query($connect, $sql)):
	header('Location: ../clientes.php?sucesso');
else:
	header('Location: ../clientes.php?error');
endif;

