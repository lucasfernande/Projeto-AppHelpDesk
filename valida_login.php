<?php 
	
	# array de teste
	$users = array(
		array('email' => 'adm@teste.com.br', 'senha' => '123456'),
		array('email' => 'user@teste.com.br', 'senha' => '123456')
	);

	$usuarioAutenticado = false;

	foreach ($users as $user) {

		if ($user['email'] == $_POST['email'] and $user['senha'] == $_POST['senha']) {
			$usuarioAutenticado = true;	
		}
			
	}

	if ($usuarioAutenticado) {
		echo 'Usuário válido!';
	}
	else {
		header('Location: index.php?login=error'); # forçando o redirecionamento para a página inicial
		# enviando um parâmetro login = error para a index
	}


	$_POST['email'];
	$_POST['senha'];
?>