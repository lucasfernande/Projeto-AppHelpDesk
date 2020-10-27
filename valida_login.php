<?php 
	
	# iniciando uma sessão
	session_start();

	# array de teste
	$users = array(
		array('email' => 'adm@teste.com.br', 'senha' => '123456'),
		array('email' => 'user@teste.com.br', 'senha' => '123456')
	);

	$usuarioAutenticado = false; # variável que checa se o usuário foi autenticado

	foreach ($users as $user) {

		if ($user['email'] == $_POST['email'] and $user['senha'] == $_POST['senha']) {
			$usuarioAutenticado = true;	
		}
			
	}

	if ($usuarioAutenticado) {
		$_SESSION['autenticado'] = 'sim';
		header('Location: home.php');
	}
	else {
		$_SESSION['autenticado'] = 'nao';
		header('Location: index.php?login=error'); # forçando o redirecionamento para a página inicial
		# enviando um parâmetro login = error para a index
	}
?>