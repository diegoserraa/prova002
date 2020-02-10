 <?php
 //Conexão

 require_once 'db_connect.php';



 $nome=mysqli_escape_string($connect, $_POST['nome']);
 $login=mysqli_escape_string($connect, $_POST['login']);
 $senha=mysqli_escape_string($connect, $_POST['senha']);
 $id=mysqli_escape_string($connect, $_POST['id']);
 
 $sql="INSERT INTO usuario (nome, login, senha) VALUES ('$nome', '$login',  
 '$senha')";

 if(mysqli_query($connect, $sql)):
 	header('Location: ../usuarios.php?sucesso');
 else:
 	header('Location: ../usuarios.php?error');
 endif;
 
