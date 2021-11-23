<?php 
include_once ("../Modelos/Usuario.php");


	class UsuarioDAO {

		public function inserirUsuarioDAO(Usuario $usuario){
            include ("../Controladores/login_bd/login_banco.php");
			$Nome           = $usuario->getNome();
			$DataNascimento = $usuario->getDataNascimento();
			$Email          = $usuario->getEmail();
			$Senha          = $usuario->getSenha();

			if (preg_match('~[0-9]+~', $Nome)) {
            	return "0";
            }


            $sql1 = "SELECT id_usuario FROM usuario WHERE email = '$Email'";
                  
            $resultado = $conn->query($sql1);
            $row_count = mysqli_num_rows($resultado);
                  
            if ($row_count > 0) {
                $conn->close();
                return "1";
            }

            $sql = "INSERT INTO usuario(nome, datanascimento, email, senha) VALUES ('$Nome', '$DataNascimento','$Email', MD5('$Senha'))";

            $checkB = $conn->query($sql);

            if ($checkB == false) {
                $conn->close();
                return "false";
            }
            
            $conn->close();

           	return "true";
		}

		public function alterarUsuarioDAO(Usuario $usuario){
			
		}



	}





?>