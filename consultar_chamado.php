<? require_once "valida_acesso.php"; ?>

<?php 
    
    # array dos chamados
    $chamados = array();

    $arquivo = fopen('../../../AppHelpDesk/chamados.txt', 'r'); # r = somente leitura

    while (!feof($arquivo)) { # a função feof() retorna true apenas quando encontra o fim do arquivo, por isso o operador de negação (!)
      $registro = fgets($arquivo);
      
      $registroDetalhes = explode('#', $registro);

      if ($_SESSION['perfilId'] == 2) {
          if ($_SESSION['id'] != $registroDetalhes[0]) { # caso o id da sessão seja diferente do id do autor do chamado, ele não será exibido
            continue; 
          }
          else {
             $chamados[] = $registro;
          }
      }
      else {
           $chamados[] = $registro;
      }
    }

    fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link btn btn-light text-dark pl-3 pr-3 pb-1 pt-1">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <? foreach ($chamados as $chamado) { ?>

              <?php
                  $chamadoDados = explode('#', $chamado);

                  if (count($chamadoDados) <= 3) { # < 3 pois é a quantidade de campos preenchidos (título, categoria e descrição) evitando mostrar chamados vazios
                    continue;
                  }
              ?>
                
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamadoDados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamadoDados[2] ?></h6>
                  <p class="card-text"><?= $chamadoDados[3] ?></p>
                </div>
              </div>

              <? } ?>
                
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>