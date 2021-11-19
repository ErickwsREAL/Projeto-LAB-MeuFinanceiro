<?php
    class BancoDAO{
        public static function inserirBanco(Banco $banco){
            include ("../Controladores/login_bd/login_banco.php");
            $nomeBanco = $banco->getNomeBanco(); 
            $agencia = $banco->getAgencia();
            $ativo = $banco->getAtivo();
            $idUsuario = $banco->getIdUsuario();

            //Validação variáveis nulas 
            if ($nomeBanco == null || $agencia == null){
                return $check = 2;
            }
            else{
                $sql = "INSERT INTO banco (nome, agencia, ativo, id_usuario) 
                SELECT '$nomeBanco', $agencia, $ativo, $idUsuario
                WHERE NOT EXISTS 
                ( SELECT  1
                    FROM  banco 
                    WHERE nome = '$nomeBanco' AND 
                          agencia = $agencia AND
                          id_usuario = '$idUsuario')";

                if ($conn->query($sql) === TRUE) {
                    $conn->close();
                    return $check = 1;
                } else {
                    $conn->close();
                    return $check = 2;
                }
            }
        }

        public function buscarBanco($idUsuario){
            include ("../Controladores/login_bd/login_banco.php");
            $rows = array();
            $sql = "SELECT * FROM banco WHERE id_usuario = $idUsuario ORDER BY id_banco DESC"; 
            $resultado = $conn->query($sql);

            while($row = $resultado->fetch_assoc()){
              $rows[] = $row;
            }
            $conn->close();
            return $rows;
        }

        public function deletarBanco(Banco $banco){
            include("../Controladores/login_bd/login_banco.php");
            $idBanco = $banco->getIdSubcategoria(); 
            $idUsuario = $banco->getIdUsuario();

            $sqlC ="SELECT 1
            FROM   caixa 
            WHERE  id_banco = $idBanco AND
                   id_usuario = $idUsuario";

            $resultadoC = $conn->query($sqlC);
            $rowC = $resultadoC->fetch_assoc();

            /*Banco está ligada a um caixa*/
            if ($rowC["1"] == 1) { 
                return $check = 2;
            }
            else{
                $sql = "DELETE FROM banco WHERE (id_banco = $idBanco)";
                $conn->query($sql);
                if ($conn->query($sql) === TRUE) {
                    $conn->close();
                    return $check = 1;
                } else {
                    $conn->close();
                    return $check = 2;
                }
            }
        }

        public function buscarBancoById($idBanco, $idUsuario){
            include ("../Controladores/login_bd/login_banco.php");
            $rows = array();
            $sql = "SELECT * FROM banco WHERE id_banco = $idBanco"; 
            $resultado = $conn->query($sql);
      
            while($row = $resultado->fetch_assoc()){
              $rows[] = $row;
            }
            $conn->close();
            return $rows;
        }

        public static function alterarBanco(Banco $banco){
            include ("../controller/login_control/logar_bd_empregadissimas.php");
            $nomeBanco = $banco->getNomeBanco(); 
            $agencia = $banco->getAgencia();
            $ativo = $banco->getAtivo();
            $idUsuario = $banco->getIdUsuario();
            $idBanco = $banco->getIdBanco();

            $sql = "UPDATE banco 
                    SET   nome = '$nomeBanco', agencia = '$agencia', ativo = '$ativo' 
                    WHERE id_banco   ='$idBanco' 
                    AND   id_usuario = '$idUsuario'";

            $conn->query($sql);

            $conn->close();
        }
    }
?>