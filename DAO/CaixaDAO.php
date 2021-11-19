<?php
    class CaixaDAO{
        public static function inserirCaixa(Caixa $caixa){
            include ("../Controladores/login_bd/login_banco.php");
      
            $saldo = $caixa->getSaldo(); 
            $idUsuario = $caixa->getIdUsuario();
            $tipoConta = $caixa->getTipoConta();
            $numeroConta = $caixa->getNumeroConta();
            $ativo = $caixa->getAtivo();
            $idBanco = $caixa->getIdBanco();
            $tipoCaixa = $caixa->getTipoCaixa();

           if ($tipoCaixa == 'A'){//Carteira
                $sqlC ="SELECT 1
                FROM   caixa 
                WHERE  tipocaixa  = 'A' AND
                       id_usuario = '$idUsuario' ";

                $resultadoC = $conn->query($sqlC);
                $rowC = $resultadoC->fetch_assoc();
                
                /*Carteira já está cadastrada*/
              if ($rowC["1"] == 1) { 
                    echo "Carteira já cadastrada. ";
                    return $check = 2;
                }
            }  
            //Se tipo de caixa for Conta Bancária, o usuário precisa preencher tipoConta, numeroConta, ativo e idBanco
            //Validação variaveis nulas 
            if ($saldo == null || $idUsuario == null || $tipoCaixa == null){
                return $check = 2;
            }
            else if ($tipoCaixa == 'C' && $tipoConta == null && $numeroConta == null && $ativo == null && $idBanco == null){
                return $check = 2;
            }            
            else{
                $sql = "INSERT INTO caixa (saldo, id_usuario, tipoconta, numeroconta, ativo, id_banco, tipocaixa) 
                        SELECT $saldo, '$idUsuario', '$tipoConta', '$numeroConta', $ativo, '$idBanco', '$tipoCaixa'
                        WHERE NOT EXISTS 
                            ( SELECT  1
                            FROM  caixa 
                            WHERE numeroconta = '$numeroConta' AND 
                                  id_banco    = '$idBanco'   AND 
                                  tipoconta   = '$tipoConta' AND 
                                  id_usuario  = '$idUsuario' AND
                                  tipocaixa   = '$tipoCaixa')";
                    
                if ($conn->query($sql) === TRUE) {
                    $conn->close();
                    return $check = 1;
                } else {
                    echo("Error description: " . $conn -> error);
                    $conn->close();
                    return $check = 2;
                }
            }
        }

        public function buscarCaixa($idUsuario, $tipoCaixa){
            include ("../Controladores/login_bd/login_banco.php");
            
            $rows = array();
            $sql = "SELECT * FROM caixa 
                    WHERE id_usuario = $idUsuario 
                    AND   tipocaixa = '$tipoCaixa'
                    ORDER BY id_caixa DESC"; 

            $resultado = $conn->query($sql);
            while($row = $resultado->fetch_assoc()){
                $rows[] = $row;
            }
            $conn->close();
            return $rows;
            
        }

        public function buscarContaBancaria($idUsuario){
            include ("../Controladores/login_bd/login_banco.php");
            
            $rows = array();
            $sql = "SELECT * FROM vconta_banco 
                    WHERE id_usuario = $idUsuario
                    ORDER BY id_caixa DESC"; 

            $resultado = $conn->query($sql);
            while($row = $resultado->fetch_assoc()){
                $rows[] = $row;
            }
            $conn->close();
            return $rows;
            
        }

        public function deletarCaixa(Caixa $caixa){
            include("../Controladores/login_bd/login_banco.php");
      
            $idCaixa = $caixa->getIdSubcategoria(); 

            $sql = "DELETE FROM caixa WHERE (id_caixa = $idCaixa)";
        
            $conn->query($sql);
            
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                return $check = 1;
            } else {
                $conn->close();
                return $check = 2;
            }       
        }
        public static function alterarCaixa(Caixa $caixa){
            include ("../controller/login_control/logar_bd_empregadissimas.php");
            $saldo = $caixa->getSaldo(); 
            $idUsuario = $caixa->getIdUsuario();
            $tipoConta = $caixa->getTipoConta();
            $numeroConta = $caixa->getNumeroConta();
            $ativo = $caixa->getAtivo();
            $idBanco = $caixa->getIdBanco();
            $tipoCaixa = $caixa->getTipoCaixa();
            $idCaixa = $caixa->getIdCaixa();

            $sql = "UPDATE caixa 
                    SET   saldo = '$saldo', tipoconta = '$tipoConta', numeroconta = '$numeroConta', ativo = '$ativo', id_banco='$idBanco, tipocaixa= '$tipoCaixa'
                    WHERE id_caixa  ='$idBanco' 
                    AND   id_usuario = '$idUsuario'";

            $conn->query($sql);

            $conn->close();
        }        
    }
?>