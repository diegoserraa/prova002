
<?php
require_once 'php_action/db_connect.php';
//header

include_once 'inc/header.php';
?>

<?php
// Sessão
session_start();



//Verificação
if(!isset($_SESSION['logado'])):
  header('Location: index.php');
endif;


?>


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
          <a href="#" class="nav-link active">
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
          <a href="usuarios.php" class="nav-link ">
            <i class="nav-icon fas fa-users"></i>
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


  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b>Dashboard</b></h1>

          </div>




          <div class="col-sm-6">

          </div>
          <br>

        </div>

        <?php

        $sql="SELECT * FROM cliente";

        $resultadoT=mysqli_query($connect, $sql);


        $qtd_clientes=mysqli_num_rows($resultadoT);

        echo "<h3>Total de Clientes: ". $qtd_clientes."</h3>";
        ?>
        <br>
        <hr></br>
        <?php

        $sql="SELECT * FROM usuario";

        $resultadoT=mysqli_query($connect, $sql);


        $qtd_usuarios=mysqli_num_rows($resultadoT);

        echo "<h3> Total de Usuarios: ". $qtd_usuarios."</h3>";
        ?>
      </div>
    </div>
  </div>

  
  <?php
//Footer
  include_once 'inc/footer.php';
  ?>
