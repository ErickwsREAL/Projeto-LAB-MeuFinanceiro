<!DOCTYPE html>
<html>
	<head>
			<link rel="stylesheet" type="text/css" href="./CSS/jquery-ui.css">
			<link rel="stylesheet" type="text/css" href="./CSS/bootstrap.min.css">	
			<link rel="stylesheet" type="text/css" href="./css/cadastro.css">
			<script src="./JS/jquery-ui.js"></script>
			<script src="./JS/jquery-3.5.1.min.js"></script>
			<script src="./JS/popper.min.js"></script>
			<script src="./JS/bootstrap.min.js"></script>
			<title> Meu Financeiro | Cadastro </title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-3 col-lados">
			    </div>

				<div class="col-6" id="col-cadastro">
					<h1>Cadastro</h1>
					<form action="../Controladores/UsuarioControlador.php?metodo=Inserir" method="POST">
						<div class="form-group">
							<br><label for="CadastroNome">Nome</label>
							<input type="text" class="form-control cadastroinput" id="CadastroNome" name="nome" minlength="3" maxlength="50" placeholder="Apenas letras..." required>
			  			</div>

						<div class="form-group">
						    <label for="CadastroDataNasc">Data de nascimento</label>
						    <input type="date" class="form-control cadastroinput" id="CadastroDataNasc" name="data_nascimento" min="1930-01-01" required>
		 				</div>

						<div class="form-group" id="form-email">
					    	<label for="CadastroEmail">E-mail</label>
					    	<input type="email" class="form-control cadastroinput" id="CadastroEmail" name='email' placeholder="Escreva seu e-mail..." required> 
					  	</div>

					  	<div class="form-group " id="form-senha">
					    	<label for="CadastroSenha">Senha</label>
					    	<input type="password" class="form-control cadastroinput" id="CadastroSenha" name='senha' min="8" placeholder="Escreva seu senha..." required>
					  	</div>
					  	
					  	<button id="btsalvar" type="submit" class="btn btn-primary">Salvar</button>
					</form>
					<a href="index.php" id="link-login">Já possuí uma conta? Faça o login.</a>
			    </div>

				<div class="col-3 col-lados">	
			    </div>
			</div>
		</div>

	
	<script>
			$(document).ready(function(){
				
			});
		</script>		
	</body>
</html>


