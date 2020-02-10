 <?php
// Conexão
 require_once 'php_action/db_connect.php';

//header
 include_once 'inc/header.php';

// Iniciando a Sessão
 session_start();
//sessao tentativa
 if (!isset($_SESSION['tentativa'])): 
  $_SESSION['tentativa'] = 0;
endif;
if (isset($_POST['g-recaptcha-response'])): 
  $recaptcha = $_POST['g-recaptcha-response'];
endif;

//  enviando
if(isset($_POST['btn-entrar'])):
  $erros = array();
  $tratamento = mysqli_escape_string($connect, $_POST['login']);
  $login = preg_replace('/[^a-zA-Z0-9\']/', '', $tratamento);
  $senha = mysqli_escape_string($connect, $_POST['senha']);

  if (empty($login) or empty($senha)): 
    $erros[] = "<p class='login-box-msg text-danger '><strong> Login e senha precisam ser preenchidas! </strong></p>";
    //Quantidade de tentativa
  $_SESSION['tentativa']++;

else:
  $sql = "SELECT login FROM usuario WHERE login = '$login'";
  $dado = mysqli_query($connect, $sql);

  if (mysqli_num_rows($dado) > 0): 
    $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
    $dado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($dado) == 1 && $_SESSION['tentativa'] < 5): 
      $dados = mysqli_fetch_array($dado);
      $_SESSION['id_logado'] = $dados['id'];
      $_SESSION['logado'] = true;
      header('Location: home.php');

    elseif (mysqli_num_rows($dado) == 1 && $_SESSION['tentativa'] >= 5): 
      if ($recaptcha <> 0): 
        $dados = mysqli_fetch_array($dado);
        $_SESSION['id_logado'] = $dados['id'];
        $_SESSION['logado'] = true;
        header('Location: home.php');
      else: 
        $erros[] = "<p class='login-box-msg text-danger '><strong> Confirme o reCAPTCHA! </strong></p>";
          //Quantidade ...
        $_SESSION['tentativa']++;
      endif;

    else: 
      $erros[] = "<p class='login-box-msg text-danger '><strong> Usuário e senha não conferem! </strong></p>";
        //Quantidade ...
      $_SESSION['tentativa']++;
    endif;

    else: $erros[] = "<p class='login-box-msg text-danger '><strong> Usuário não existe! </strong></p>";
      //Quantidade ...
      $_SESSION['tentativa']++;
    endif;
  endif;
endif;
?>

<h1> Logar no Sistema </h1>
<?php 
if(!empty($erros)):
  foreach($erros as $erro):
    echo $erro;
  endforeach;
endif;

?>
<hr>
<body class="hold-transition login-page">
 <div class="card">
  <div class="card-body login-card-body">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      Login: <input type="text" name="login" class="form-control" required value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>"><br>
      Senha: <input type="password" name="senha" class="form-control" required value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>"><br>
      <?php if ($_SESSION['tentativa'] >= 5): ?>
        <div class="row">
          <div style="margin: 0px 15px 15px 25px">
            <div class="g-recaptcha" data-sitekey="6LflT9cUAAAAAPz_ES2jRbTI9KIHg518EIMzt3xU"></div>
          </div>
        </div>
      <?php endif; ?>
 
      <button type="submit" name="btn-entrar" class="btn btn-success"> Entrar </button>
    </form>
  </div>
</div>

  <?php
//Footer
  include_once 'inc/footer.php';
  ?>


