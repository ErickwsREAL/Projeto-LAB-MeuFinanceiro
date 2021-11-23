<?php
include_once ("../DAO/UsuarioDAO.php");
include_once ("../Modelos/Usuario.php");

$UsuarioDAO = new UsuarioDAO();
$Usuario    = new Usuario();


if (isset($_GET['metodo'])) {  
	switch($_GET['metodo']){
	
		case 'Inserir':
			$Usuario->setNome($_POST['nome']);
			$Usuario->setEmail($_POST['email']);
			$Usuario->setDataNascimento($_POST['data_nascimento']);
			$Usuario->setSenha($_POST['senha']);

			$status = $UsuarioDAO->inserirUsuarioDAO($Usuario);
			
			if ($status == 1){
				echo '<script>alert("Este e-email já foi utilizado, por favor, insira um e-mail diferente.")</script>';
				echo '<script>location.href="../Telas/cadastro.php"</script>';
			}
			if ($status == 'false'){
				echo '<script>alert("Não foi possível cadastrar seu usário, tente novamente mais tarde.")</script>';
				echo '<script>location.href="../Telas/cadastro.php"</script>';
			}

			if($status == 'true'){
				echo '<script>alert("Seu cadastro foi inserido com sucesso!")</script>';
				echo '<script>location.href="../Telas/index.php"</script>';
			}

			break;
	
		case 'Atualizar':
			break;

	}
}
