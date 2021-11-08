<?php
  class CategoriaDAO{
    public static function inserirCategoria(Categoria $categoria){
      include ("../Controladores/login_bd/login_banco.php");

      $nomeCategoria = $categoria->getNomeCategoria(); 
      $tipoCategoria = $categoria->getTipoDeCategoria();
      $idUsuario = $categoria->getIdUsuario();
      $ativo = 1;

      //Validação variaveis nulas 
      if ($nomeCategoria == null || $tipoCategoria == null ){
          return $check = 2;
      } 
      else{
        $sql = "INSERT INTO categoria (nomecategoria, tipo_categoria, ativo, id_usuario) 
        SELECT '$nomeCategoria', '$tipoCategoria', $ativo, $idUsuario
        WHERE NOT EXISTS 
          ( SELECT  1
            FROM  categoria 
            WHERE nomecategoria  = '$nomeCategoria' AND 
                  tipo_categoria = '$tipoCategoria' AND 
                  id_usuario     = '$idUsuario')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return $check = 1;
        } else {
            $conn->close();
            return $check = 2;
        }
      }
    }

    public function buscarCategorias($idUsuario){
      include ("../Controladores/login_bd/login_banco.php");

      $rows = array();
      $sql = "SELECT * FROM categoria WHERE id_usuario = $idUsuario ORDER BY id_categoria DESC"; 
      $resultado = $conn->query($sql);

      while($row = $resultado->fetch_assoc()){
        $rows[] = $row;
      }
      $conn->close();
      return $rows;
    }

    public static function deletarCategoria(Categoria $categoria){
      include("../Controladores/login_bd/login_banco.php");

      $idCategoria = $categoria->getIdCategoria(); 

      $sqlC ="SELECT 1
              FROM   sub_categoria 
              WHERE  id_categoria = $idCategoria";
      $resultadoC = $conn->query($sqlC);
      $rowC = $resultadoC->fetch_assoc();

      /*Categoria está ligada a uma subcategoria (Não pode ser)*/
      if ($rowC["1"] == 1) { 
        return $check = 2;
      }
      else{
        $sql = "DELETE FROM categoria WHERE (id_categoria = $idCategoria)";
      
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

    public static function alterarCategoria(Categoria $categoria){
      include ("../Controladores/login_bd/login_banco.php");

      $nomeCategoria = $categoria->getNomeCategoria(); 
      $tipoCategoria = $categoria->getTipoDeCategoria();
      $idUsuario = $categoria->getIdUsuario();

      $sql = "UPDATE categoria 
              SET nomecategoria = '$data_servico', 
                  tipo_categoria  = $id_endereco, 
              WHERE id_categoria = $id_servico";

      $conn->query($sql);

      $conn->close();
    }
  }
?>