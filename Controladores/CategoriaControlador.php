<?php  
    include_once ("../DAO/CategoriaDAO.php");
    include_once ("../Modelos/Categoria.php");
//-----------------------------------------------------------
//Funções
function buscarCategorias($id_usuario){

    $categoriaBusca = new CategoriaDAO();
    $rows = $categoriaBusca->buscarCategorias($id_usuario);
    
    return $rows;
}
//-----------------------------------------------------------
//Switch - CRUD
    if (isset($_GET['metodo'])) {
        switch($_GET['metodo']){
            case 'Inserir':
                $categoria = new Categoria();

                $categoria->setNomeCategoria($_POST['nomeCategoria']);
                $categoria->setTipoDeCategoria($_POST['tipoCategoria']);
                $categoria->setIdUsuario($_POST['idUsuario']);

                $categoriaDAO = new CategoriaDAO();
                $check = $categoriaDAO->inserirCategoria($categoria);

                if ($check == 2 ) {
                    echo 'Seu cadastro não foi efetuado! Verifique se todos campos foram preenchidos ou se esta categoria já existe e tente novamente.';
                } else {
                    echo 'Categoria inserida com sucesso!';
                }
                break;
            case 'Atualizar':

                break;
            case 'Deletar':
                $categoria = new Categoria();

                $categoria->setIdCategoria($_POST['idCategoria']);
                $categoriaDAO = new CategoriaDAO();

                $check = $categoriaDAO->deletarCategoria($categoria);

                if ($check == 2 ) {
                    echo 'Erro ao deletar categoria.';
                } else {
                    echo 'Categoria deletada com sucesso!';
                }
                break;
            }
    }
?>