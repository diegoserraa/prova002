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
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          
        <span class="brand-text font-weight-light">Painel Administrativo</span>
      </a>

      <!-- Sidebar Menu -->
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
          <a href="clientes.php" class="nav-link active">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Clientes
            </p>
          </a> 
        </li>


        <li class="nav-item has-treeview menu-op">
          <a href="usuarios.php" class="nav-link ">
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

            <h1 class="m-0 text-dark"><b>Clientes</b></h1>
            <br>
            <br>
          </div>
          

          <div class="container">
           <div class="row justify-content-start">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NOME</th>
                  <th scope="col">CIDADE</th>
                  <th scope="col">UF</th>
                  <th scope="col">EMAIL</th>

                </tr>
              </thead>
              <tbody>
                <?php

                $sql="SELECT * FROM cliente";

                $resultado=mysqli_query($connect, $sql);
                while($dados=mysqli_fetch_array($resultado)):
                  ?>
                  <tr>

                    <td class="table-secondary"><?php echo$dados['id'];?></td>
                    <td class="table-secondary"><?php echo$dados['nome'];?></td>
                    <td class="table-secondary"><?php echo$dados['cidade'];?></td>
                    <td class="table-secondary"><?php echo$dados['uf'];?></td>
                    <td class="table-secondary"><?php echo$dados['email'];?></td>


                    <td class="table-secondary"><a href="cadastrarEditarClientes.php?id=<?php echo $dados['id']; ?>" class="btn btn-primary btn-sn active">editar</a>

                      <a href=/prova002/php_action/deleteCliente.php?id=<?php echo $dados['id']; ?> class="btn btn-danger btn-sn active">deletar</a></td>
                    </tr>
                    <?php 
                  endwhile;


                  ?>    
                </tbody>
              </table>
              <a href="cadastrarEditarClientes.php" class="btn btn-dark btn-sn active">Cadastrar </a>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

  <?php
//Footer
  include_once 'inc/footer.php';
  ?>

