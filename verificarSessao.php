<?php
  session_start();

  if (!isset($_SESSION['usuario_id'])) {
      // Redireciona para a página de login ou exibe uma mensagem de erro
      header('Location: telaLogin.php?loged=false?error=3');
      exit;
  }
?>
