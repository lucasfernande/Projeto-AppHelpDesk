<?php 

  session_start();
  # testando se o usuário está logado, caso não esteja, volta para index.php
  # impede que o usuário faça uma requisição direta para home.php, abrir_chamado.php ou consultar_chamado.php
  if (!isset($_SESSION['autenticado']) or $_SESSION['autenticado'] != 'sim') {
    header('Location: index.php?login=error2'); 
  }

?>