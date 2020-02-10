<?php
  //conexao
include_once 'php_action/db_connect.php';

include_once 'inc/header.php';

  //verifica se pegou o id
if(isset($_GET['id'])):
  $id=mysqli_escape_string($connect, $_GET['id']);

    //seleciona o campo id da tabela cliente
  $sql="SELECT * FROM cliente WHERE id='$id'";
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

            <h1 class="m-0 text-dark"><b>Cadastrar/Editar</b></h1>
            <br>
            <br>
          </div>
          

          <form  action="php_action/<?= isset($_GET['id']) ? 'updateClientes?id='. $_GET['id'] : 'createClientes.php' ?>" method="POST">
            <h5><b>Campos com * são obrigatorios </b></h5>
            <div class="container">
             <div class="row justify-content-start">
             
              <label for="nome">Nome*</label>       
              <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome:" value="<?= isset($dados['nome']) ? $dados['nome'] : ""  ?>" required>

              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email:" value="<?= isset($dados['email']) ? $dados['email']:""  ?>">

              <label for="cep">CEP</label>
              <input type="text" name="cep" id="cep" class="form-control" placeholder="Digite seu cep:" value="<?= isset($dados['cep']) ? $dados['cep'] : ""  ?>">

              <label for="endereco">Endereço</label>
              <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Digite seu endereço:" value="<?= isset($dados['endereco']) ? $dados['endereco'] : ""  ?>">

              <label for="numero">Número do endereço</label>
              <input type="text" name="numero" id="numero"  class="form-control" placeholder="Digite o Numero:" value="<?= isset($dados['numero']) ? $dados['numero'] : ""  ?>">

              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" id="bairro"  class="form-control" placeholder="Digite seu bairro:" value="<?= isset($dados['bairro']) ? $dados['bairro'] : ""  ?>">

              <label for="cidade">Cidade</label>
              <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Digite sua cidade:" value="<?= isset($dados['cidade']) ? $dados['cidade'] : ""  ?>">

              <label for="uf">Estado</label>
              <select id="uf" name="uf" class="form-control" value="<?= isset($dados['uf']) ? $dados['uf'] : ""  ?>">
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
                <option value="EX">EX</option>
              </select>

              <label for="cpf">CPF*</label>
              <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite seu cpf:" value="<?= isset($dados['cpf']) ? $dados['cpf'] : ""  ?>" required >

              <label for="telefone">Telefone</label>
              <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Digite seu telefone:" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ""  ?>">

              <label for="site">Site</label>
              <input type="text" name="site" id="site" class="form-control" placeholder="Digite seu site" value="<?= isset($dados['site']) ? $dados['site'] : ""  ?>">

            </div>
            <br>
            <button type="submit" class="btn btn-success">cadastrar</button>
            <a href="clientes.php" class="btn btn-info">listar Clientes</a>


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
