<?php 

	session_start();

	unset($_SESSION['autenticado']); # remove o índice apenas se ele existir
	header('Location: index.php');

?>