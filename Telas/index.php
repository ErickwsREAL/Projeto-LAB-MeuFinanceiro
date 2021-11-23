<!-- <?php //require_once ("../Controladores/login_bd/login_banco.php")?> -->

<!DOCTYPE html>
<html>
	<head>
			<link rel="stylesheet" type="text/css" href="./CSS/jquery-ui.css">
			<link rel="stylesheet" type="text/css" href="./CSS/bootstrap.min.css">	
			<link rel="stylesheet" type="text/css" href="./CSS/login.css">
			<script src="./JS/jquery-ui.js"></script>
			<script src="./JS/jquery-3.5.1.min.js"></script>
			<script src="./JS/popper.min.js"></script>
			<script src="./JS/bootstrap.min.js"></script>
			<title> Meu Financeiro | Home Page </title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-4" id="col-login">
					<h3>Log in</h3>
					<form action="../Controladores/login_usuario/logar_sistema.php" method="POST">
						<div class="form-group form-login-label" id="form-email">
					    	<label for="EmailUsuario">E-mail</label>
					    	<input type="email" class="form-control" id="EmailUsuario" name="email" placeholder="Escreva seu e-mail..."required>
					  	</div>
					  	
					  	<div class="form-group form-login-label teste" id="form-senha">
					    	<label for="SenhaUsuario">Senha</label>
					    	<input type="password" class="form-control" id="SenhaUsuario" name="senha" placeholder="Escreva seu senha..." required>
					  	</div>
					  	<button id="btentrar" type="submit" class="btn btn-primary">Entrar</button>
					</form>
					<a href="cadastro.php" id="link-cadastro">Não possui uma conta? Clique aqui para se registrar.</a>
			    </div>
			    
			    <div class="col-8" id="col-carrousel">
			    	<h1 class='titulo'>Meu Financeiro</h1>
			    	<h3 class='titulo'>Gerencie seu dinheiro sem o trabalho do papel e caneta</h3>
			    	<div id="carouselimg" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
						   	<div class="carousel-item active">
						      	<img class="d-block img-fluid imgslide" src="./Imagens/imagem1.jpg" alt="Imagem 1">
								<p class='timg'><b>Gerencie entradas e saídas de dinheiro.</b></p>	
							</div>

						    <div class="carousel-item">
						      	<img class="d-block img-fluid imgslide" src="./Imagens/imagem2.jpeg" alt="Imagem 2">
						      	<p class='timg'><b>Retire relatórios e faça orçamentos.</b></p>  
						    </div>

						    <div class="carousel-item">
						      	<img class="d-block img-fluid imgslide" src="./Imagens/imagem3.png" alt="Imagem 3">
						    	<p class='timg'><b>Otimize seu tempo. Comece agora mesmo a usar.</b></p>								    
						    </div>

						</div>
					</div>			    
				</div>
			</div>
		</div>




		<script>
			$(document).ready(function(){
				$('.carouselimg').carousel();
			});
		</script>	
	</body>
</html>