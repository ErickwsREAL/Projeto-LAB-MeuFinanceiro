<?php
    class SubcategoriaDAO{  
        public static function inserirSubcategoria(Subcategoria $subcategoria){
            include ("../Controladores/login_bd/login_banco.php");

            $nomeSubcategoria = $subcategoria->getNomeSubcategoria(); 
            $idCategoria = $subcategoria->getIdCategoria();
            $idUsuario = $subcategoria->getIdUsuario();
            $ativo = 1;

            //Validação variáveis nulas 
            if ($nomeSubcategoria == null || $idCategoria == null){
                return $check = 2;
            } 
            else{
                $sql = "INSERT INTO sub_categoria (nome_sub_categoria, id_categoria, ativo, id_usuario) 
                SELECT '$nomeSubcategoria', $idCategoria, $ativo, $idUsuario
                WHERE NOT EXISTS 
                ( SELECT  1
                    FROM  sub_categoria 
                    WHERE nome_sub_categoria = '$nomeSubcategoria' AND 
                          id_categoria = $idCategoria AND
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

        public static function deletarSubcategoria(Subcategoria $subcategoria){
            include ("../Controladores/login_bd/login_banco.php");
      
            $idSubcategoria = $subcategoria->getIdSubcategoria(); 

            $sql = "DELETE FROM sub_categoria WHERE (id_sub_categoria = $idSubcategoria)";
        
            $conn->query($sql);
            
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                return $check = 1;
            } else {
                $conn->close();
                return $check = 2;
            }
          }

        public function buscarSubcategorias($idUsuario){
            include ("../Controladores/login_bd/login_banco.php");
        
            $rows = array();
            $sql = "SELECT * FROM sub_categoria WHERE id_usuario = $idUsuario ORDER BY id_sub_categoria DESC"; 
            $resultado = $conn->query($sql);

            while($row = $resultado->fetch_assoc()){
                $rows[] = $row;
            }
            $conn->close();
            return $rows;
        }          
    }
?>