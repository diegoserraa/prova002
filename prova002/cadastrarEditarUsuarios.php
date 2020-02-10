<?php



include_once 'php_action/db_connect.php';
session_start();
//header
include_once 'inc/header.php';

// Verificação
if(!isset($_SESSION['logado'])):
  header('Location: index.php');
endif;


if(isset($_GET['id'])):
  $id=mysqli_escape_string($connect, $_GET['id']);

    //seleciona o campo id da tabela cliente
  $sql="SELECT * FROM usuario WHERE id='$id'";
  $resultado=mysqli_query($connect, $sql);
  $dados=mysqli_fetch_array($resultado);
endif;
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Painel Administrativo</span>
      </a>

      <!-- Sidebar Menu -->
      <nav >
        <ul class="nav  nav-sidebar flex-column" data-widget="treeview"  data-accordion="false">
         <li class="nav-item has-treeview menu-op">
          <a href="index.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a> 
        </li>

        <li class="nav-item has-treeview menu-op">
          <a href="clientes.php" class="nav-link ">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Clientes
            </p>
          </a> 
        </li>


        <li class="nav-item has-treeview menu-op">
          <a href="usuarios.php" class="nav-link active">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Usuarios
            </p>
          </a> 
        </li>
        <li class="nav-item has-treeview menu-op">
          <a href="logout.php" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              sair
            </p>
          </a> 
        </li>
      </ul>
    </nav> 
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1 class="m-0 text-dark"><b>Cadastrar/Editar</b></h1>
            <br>
            <br>
          </div>

          

          <form  action="php_action/<?= isset($_GET['id']) ? 'updateUsuarios?id='. $_GET['id'] : 'createUsuarios.php' ?>" method="POST">
            <h5><b>Campos com * são obrigatorios </b></h5>
            <div class="container">
             <div class="row justify-content-start">

              <label for="nome">Nome*</label>       
              <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome:" value="<?= isset($dados['nome']) ? $dados['nome'] : ""  ?>" required>

              <label for="login">Login*</label>
              <input type="text" name="login" id="login" class="form-control" placeholder="Digite um login:" value="<?= isset($dados['login']) ? $dados['login'] : ""  ?>" required>

              <label for="senha">Senha*</label>
              <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite uma senha:" value="<?= isset($dados['senha']) ? $dados['senha'] : ""  ?>" required>


            </div>
            <br>
            <button type="submit" class="btn btn-success">cadastrar</button>
            <a href="usuarios.php" class="btn btn-info">listar Usuarios</a>


          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
//Footer
include_once 'inc/footer.php';
?>