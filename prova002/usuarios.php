
<?php
//conexao
include_once 'php_action/db_connect.php';
//header
include_once 'inc/header.php';
// Sessão
session_start();

// Verificação
if(!isset($_SESSION['logado'])):
  header('Location: index.php');
endif;


?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">



    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <a href="index3.html" class="brand-link">
       
        <span class="brand-text font-weight-light">Painel Administrativo</span>
      </a>


      <!--  Menu -->
      <nav >
        <ul class="nav  nav-sidebar flex-column" data-widget="treeview"  data-accordion="false">
         <li class="nav-item has-treeview menu-op">
          <a href="home.php" class="nav-link ">
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
          <a href="#" class="nav-link active">
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
            <h1 class="m-0 text-dark"><b>Usuarios</b></h1>
            <br>
            <br>
          </div><!-- /.col -->

          <div class="container">
           <div class="row justify-content-start">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NOME</th>
                  <th scope="col">LOGIN</th>
                  

                </tr>
              </thead>
              <tbody>
               <?php

               $sql="SELECT * FROM usuario";

               $resultado=mysqli_query($connect, $sql);
               while($dados=mysqli_fetch_array($resultado)):
                ?>
                <tr>
                  <tr>

                    <td class="table-secondary"><?php echo$dados['id'];?></td>
                    <td class="table-secondary"><?php echo$dados['nome'];?></td>
                    <td class="table-secondary"><?php echo$dados['login'];?></td>



                    <td class="table-secondary"><a href="cadastrarEditarUsuarios.php?id=<?php echo $dados['id']; ?>" class="btn btn-primary btn-sn active">editar</a>

                      <a href=/prova002/php_action/deleteUsuarios.php?id=<?php echo $dados['id']; ?> class="btn btn-danger btn-sn active">deletar</a></td>
                    </tr>
                    <?php 
                  endwhile;


                  ?>   
                </tbody>
              </table>
              <a href="cadastrarEditarUsuarios.php" class="btn btn-dark btn-sn active">Cadastrar </a>
            </div>
          </div>

          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  //Footer
  include_once 'inc/footer.php';
  ?>
