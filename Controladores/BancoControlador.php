<?php  
    include_once ("../DAO/BancoDAO.php");
    include_once ("../Modelos/Banco.php");
//-----------------------------------------------------------
//Funções
function buscarBancos($idUsuario){
    $BancoBusca = new BancoDAO();
    $rows = $BancoBusca->buscarBanco($idUsuario);
    return $rows;
}
function buscarBancoById($idBanco, $id_usuario){
    $BancoBusca = new BancoDAO();
    $rows = $BancoBusca->buscarBancoById($idBanco, $id_usuario);
    return $rows;
}//-----------------------------------------------------------
//Switch - CRUD
    if (isset($_GET['metodo'])) {
        switch($_GET['metodo']){
            case 'Inserir':
                $banco = new Banco();

                $banco->setNomeBanco($_POST['nomeBanco']);
                $banco->setAgencia($_POST['agenciaBanco']);
                $banco->setAtivo($_POST['ativoBanco']);
                $banco->setIdUsuario($_POST['idUsuarioBanco']);
                
                $bancoDAO = new BancoDAO();
                $check = $bancoDAO->inserirBanco($banco);

                if ($check == 2 ) {
                    echo 'Seu cadastro não foi efetuado! Verifique se todos campos foram preenchidos e tente novamente.';
                } else {
                    echo 'Salvo com sucesso!';
                }
                break;
            case 'Atualizar':

                break;
            case 'Deletar':
                $banco = new Banco();
                $banco->setIdBanco($_POST['idBanco']);

                $bancoDAO = new BancoDAO();
                $check = $bancoDAO->deletarBanco($banco);

                if ($check == 2 ) {
                    echo 'Erro ao deletar.';
                } else {
                    echo 'Deletado com sucesso!';
                }
                break;
        }
    }
?>