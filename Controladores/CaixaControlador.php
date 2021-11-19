<?php  
    include_once ("../DAO/CaixaDAO.php");
    include_once ("../Modelos/Caixa.php");
//-----------------------------------------------------------
//Funções
function buscarCaixa($id_usuario, $tipoCaixa){

    $CaixaBusca = new CaixaDAO();
    $rows = $CaixaBusca->buscarCaixa($id_usuario, $tipoCaixa);
    return $rows;
}
function buscarContaBancaria($id_usuario){

    $CaixaBusca = new CaixaDAO();
    $rows = $CaixaBusca->buscarContaBancaria($id_usuario);
    return $rows;
}

//-----------------------------------------------------------
//Switch - CRUD
    if (isset($_GET['metodo'])) {
        switch($_GET['metodo']){
            case 'Inserir':
                $caixa = new Caixa();

                $caixa->setSaldo($_POST['saldo']);
                $caixa->setTipoConta($_POST['tipoConta']);
                $caixa->setIdUsuario($_POST['idUsuario']);
                $caixa->setNumeroConta($_POST['numeroConta']);
                $caixa->setAtivo($_POST['ativo']);
                $caixa->setIdBanco($_POST['idBanco']);
                $caixa->setTipoCaixa($_POST['tipoCaixa']);
                
                $caixaDAO = new CaixaDAO();
                $check = $caixaDAO->inserirCaixa($caixa);

                if ($check == 2 ) {
                    echo 'Seu cadastro não foi efetuado! Verifique se todos campos foram preenchidos e tente novamente.';
                } else {
                    echo 'Salvo com sucesso!';
                }
                break;
            case 'Atualizar':

                break;
            case 'Deletar':
                $caixa = new Caixa();
                $caixa->setIdCaixa($_POST['idCaixa']);

                $caixaDAO = new CaixaDAO();
                $check = $caixaDAO->deletarCaixa($caixa);

                if ($check == 2 ) {
                    echo 'Erro ao deletar.';
                } else {
                    echo 'Deletado com sucesso!';
                }
                break;
        }
    }
?>