<?php
  session_start();

  if(isset($_GET['action'])){

    if($_GET['action'] == 1) {
      session_destroy();
      header('Location: telaLogin.php');
    }
  }

  if (!isset($_SESSION['idUsuario'])) {
      // Redireciona para a página de login ou exibe uma mensagem de erro
      header('Location: telaLogin.php?loged=false?error=3');
      exit;
  }

?>
