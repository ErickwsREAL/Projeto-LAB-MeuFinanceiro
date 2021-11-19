<?php  
    include_once ("../DAO/SubcategoriaDAO.php");
    include_once ("../Modelos/Subcategoria.php");
//-----------------------------------------------------------
//Funções
function buscarSubcategorias($id_usuario){

    $subcategoriaBusca = new SubcategoriaDAO();
    $rows = $subcategoriaBusca->buscarSubcategorias($id_usuario);
    
    return $rows;
}
//-----------------------------------------------------------
//Switch - CRUD
if (isset($_GET['metodo'])) {
    switch($_GET['metodo']){
        case 'Inserir':
            $subcategoria = new Subcategoria();

            $subcategoria->setNomeSubcategoria($_POST['nomeSubcategoria']);
            $subcategoria->setIdCategoria($_POST['idCategoriaSub']);
            $subcategoria->setIdUsuario($_POST['idUsuarioSub']);

            $subcategoriaDAO = new SubcategoriaDAO();
            $check = $subcategoriaDAO->inserirSubcategoria($subcategoria);

            if ($check == 2 ){
                echo 'Seu cadastro não foi efetuado! Verifique se todos campos foram preenchidos ou se esta subcategoria já existe e tente novamente.';
            } else {
                echo 'Categoria inserida com sucesso!';
            }

            break;
        case 'Atualizar':
                echo '...';
            break;
        case 'Deletar':
            $subcategoria = new Subcategoria();

            $subcategoria->setIdSubcategoria($_POST['idSubcategoria']);
            $subcategoriaDAO = new SubcategoriaDAO();

            $check = $subcategoriaDAO->deletarSubcategoria($subcategoria);

            if ($check == 2 ) {
                echo 'Erro ao deletar subcategoria.';
            } else {
                echo 'Subcategoria deletada com sucesso!';
            }
            break;
        case 'BuscarPeloId':
            $subcategoria = new Subcategoria();

            $subcategoria->setIdSubcategoria($_POST['idSubcategoria']);
            $subcategoriaDAO = new SubcategoriaDAO();

            $subcategoria = $subcategoriaDAO->buscarSubcategoriaById($subcategoria);
            
            $nomeSubcategoria = $subcategoria->getNomeSubcategoria();
            $idCategoria = $subcategoria->getIdCategoria();
            $idSubcategoria = $subcategoria->getIdSubcategoria(); 
    
            echo $idSubcategoria.",".$idCategoria.",".$nomeSubcategoria;
            break;
    }
}