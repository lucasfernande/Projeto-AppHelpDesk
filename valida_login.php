<?php 
	
	# iniciando uma sessão
	session_start();

	# array de teste
	$users = array(
		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfilId' => 1),
		array('id' => 2,'email' => 'user@teste.com.br', 'senha' => '1234', 'perfilId' => 1),
		array('id' => 3,'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfilId' => 2),
		array('id' => 4,'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfilId' => 2)
	);

	$usuarioAutenticado = false; # variável que checa se o usuário foi autenticado
	$usuarioId = null;
	$perfis = array(1 => 'Admin', 2 => 'User');
	$usuarioPerfilId = null;

	foreach ($users as $user) {

		if ($user['email'] == $_POST['email'] and $user['senha'] == $_POST['senha']) {
			$usuarioAutenticado = true;	
			$usuarioId = $user['id'];
			$usuarioPerfilId = $user['perfilId'];
		}
			
	}

	if ($usuarioAutenticado) {
		$_SESSION['autenticado'] = 'sim';
		$_SESSION['id'] = $usuarioId;
		$_SESSION['perfilId'] = $usuarioPerfilId;
		header('Location: home.php');
	}
	else {
		$_SESSION['autenticado'] = 'nao';
		header('Location: index.php?login=error'); # forçando o redirecionamento para a página inicial
		# enviando um parâmetro login = error para a index
	}
?>