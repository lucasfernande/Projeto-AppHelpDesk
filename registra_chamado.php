<?php 
	
	session_start();

	# tirando qualquer cerquilha dos textos para não perder a sequência
	foreach ($_POST as $indice => $campos) {
		$_POST[$indice] = str_replace('#', ' ', $_POST[$indice]);
	}

	# o parâmetro 'a' quer dizer que vamos abrir um arquivo apenas para escrita
	$arquivo = fopen('chamados.txt', 'a+'); 

	# juntando o conteúdo dos campos em uma string separados por uma cerquilha
	$texto = $_SESSION['id'] . '#' . implode('#', $_POST) . PHP_EOL; # o PHP_EOL quebra uma linha, evitando que todos os chamados fiquem numa linha só 
	
	# escrevendo o conteúdo dos campos no arquivo
	fwrite($arquivo, $texto);

	# fechando o arquivo
	fclose($arquivo);

	header('Location: abrir_chamado.php');

?>