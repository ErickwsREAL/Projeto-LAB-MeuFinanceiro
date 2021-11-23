<?php
include ("../Controladores/login_bd/login_banco.php");
include_once ("../Controladores/CaixaControlador.php");
include_once ("../Controladores/BancoControlador.php");
include_once ("../Controladores/login_usuario/verificar_login.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Meu Financeiro</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/estilo-navbar.css">
        <link rel="stylesheet" href="CSS/jquery-ui.css">        
        <link rel="stylesheet" href="CSS/tela-estilo.css">
        <script src="js/jquery-3.5.1.min.js"></script>
	    <script src="js/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
            $var_id = 1;
            $id_usu   = $_SESSION['usuario']['id_usuario'];
            $nome_usu = $_SESSION['usuario']['nome'];	
        ?>
        <div class="d-flex wrapper wrapper-navbar-used wrapper-navbar-fixed">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Meu Financeiro</h3>
                </div>
                <ul class="list-unstyled components">
                    <p>Usuário: <?php echo $nome_usu ?></p>
                    <li>
                        <a href="./categoria_subcategoria.php">Categorias e Subcategorias</a>
                    </li>
                    <li>
                        <a href="./manutencao_caixa.php">Bancos e Contas</a>
                    </li>                    
                    <li>
                        <a href="./movimentacoes.php">Movimentações</a>
                    </li>
                    <li>
                        <a href="#">Orçamentos</a>
                    </li>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Relatórios</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Entradas/Saídas</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Dados do Usuário</a>
                    </li>
                </ul>
                <ul class="list-unstyled CTAs">
                    <li><a href="../Controladores/login_usuario/sair.php" class="sair" id="sair-botao">Sair</a></li>
                </ul>
            </nav>
            <!-- Page Content Holder -->
            <div id="content">
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn" style="background:darkgreen">
                    <span>X</span>
                </button>
            </div>
            <!--Fim Navbar-->

            <div class="container-fluid" style="padding:0px; margin:0px; margin-right:30px; width:100%">
                <div class="row">
                    
                    <div class="col">
                        <div class="card-tit">
                            <h2 id="titulo-pag"> Manutenção de Saldos </h2>   
                        </div>    
                    </div>

                    <div class="col">
                        <!--Abas-->
                        <div id="tabs">
                            <ul>
                                <li><a href="#aba-1">Carteira</a></li>
                                <li><a href="#aba-2">Banco</a></li>
                                <li><a href="#aba-3">Conta</a></li>
                            </ul>
                            <!--Abas 1 - Carteira-->
                            <div id="aba-1">

                                <div class="card">
                                    <div class="card-container">
                                      <h3 id="center"><b>Carteira</b></h3>
                                        <form>
                                            <div class="form-carteira">
                                                <label for="saldo_carteira">Saldo Inicial:  (R$)</label>
                                                <input type="number" class="form-control" id="saldo_carteira" name="saldo_carteira" placeholder="Ex:200,00" size="10" 
											    value="" step="0.01" style="width:40%; display:inline" required> 
                                        
                                                <label for="id_caixa_carteira"> Id Caixa: </label>
                                                <input type="text" class="form-control" id="id_caixa_carteira" name="id_caixa_carteira" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                <input type="text" id="id_usuario_carteira" name="id_usuario_carteira" value="<?php echo $var_id?>" style="visibility:hidden;display:inline; width:1px">

                                                <button type="button" class="btn btn-success bt-salvar" onClick="salvarCaixa('A')">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <h3>&nbsp;</h3>
                                <h3><b>Minha Carteira: </b></h3>
                                <!--Carteira do usuário-->
                                <div class="card">
                                    <form name='form-carteira-c' id='form-carteira-c'>
                                        <?php
                                            $rows = buscarCaixa($var_id, 'A');
                                            foreach ($rows as $row){ 
                                        ?>
                                        <div class="card-container">
                                            <div class="form-group row">
                                                <label for="saldo-carteira-c" class="col-sm-2 col-form-label" id="label-saldo">Saldo: (R$) </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="saldo-carteira-c" value="<?php echo $row["saldo"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="id_carteira_c" class="col-sm-2 col-form-label">Id Caixa:  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="id_carteira_c" value="<?php echo $row["id_caixa"]; ?>">
                                                    <button type="submit" class="btn btn-secondary" style="display:inline; float:right; padding:9px">Alterar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>

                            <!--Abas 2 - Banco-->
                            <div id="aba-2">
                                <div class="card">
                                    <div class="card-container">
                                      <h3 id="center"><b>Banco</b></h3>
                                      <form id="forma">
                                            <div class="card-container">
                                                <div class="form-group row">
                                                    <label for="nome_banco" class="col-sm-1 col-form-label">Nome do Banco: </label>
                                                    <input type="text" class="form-control" id="nome_banco" name="nome_banco" size="10" 
                                                    value="" style="width:50%; display:inline" required> &nbsp; &nbsp; &nbsp;
                                                    <input type="text" id="id_usuario_banco" name="id_usuario_banco" value="<?php echo $var_id?>" style="visibility:hidden;display:inline; width:1px">
                                                    <label for="id_banco"> Id Banco: </label>
                                                    <input type="text" class="form-control" id="id_banco" name="id_banco" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                </div>
                                                <div class="form-group row">
                                                    <label for="num_agencia" class="col-sm-1 col-form-label"> Número da Agência: </label>
                                                    <input type="text" class="form-control" id="num_agencia" name="num_agencia" size="10" value="" step="1" style="width:20%; display:inline"> 
                                                    &nbsp; &nbsp; &nbsp;
                                                    <input class="form-check-input" type="checkbox" id="ativo_banco" name="ativo_banco" required checked>
                                                    <label class="form-check-label" for="ativo_banco">
                                                        Ativo
                                                    </label>
                                                    <button type="button" class="btn btn-success bt-salvar" id="salvarBanco">Salvar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <h3>&nbsp;</h3>
                                <h3><b>Meus Bancos: </b></h3>
                                <!--Bancos e Agências do usuário-->
                                <form id="form_banco">
                                    <?php
                                        $rows = buscarBancos($var_id);
                                        foreach ($rows as $row){ 
                                    ?>
                                    <div class="card">
                                        <div class="card-container">
                                            <div class="form-group row">
                                                <label for="nome_banco_c" class="col-sm-2 col-form-label" id="label_banco_c">Nome do Banco: </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="nome_banco_c" value="<?php echo $row["nome"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="num_agencia_c" class="col-sm-2 col-form-label">Número da Agência:  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="num_agencia_c" value="<?php echo $row["agencia"]; ?>">
                                                    
                                                    <input class="form-check-input" type="checkbox" id="ativo_banco_c" class="ativoBancoC" disabled>
                                                    <label class="form-check-label" for="ativo_banco_c">
                                                        Ativo
                                                    </label>
                                                    <button type="button" class="btn btn-danger" style="display:inline; float:right; padding:9px; margin-left:20px" onClick="excluirCaixa(<?php echo $row["id_banco"]; ?>)">Deletar</button>
                                                    <button type="button" class="btn btn-secondary" style="display:inline; float:right; padding:9px">Alterar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                    ?>
                                </form>
                            </div>
                            <!--Abas 3 - Conta-->
                            <div id="aba-3">
                                <div class="card">
                                    <div class="card-container">
                                      <h3 id="center"><b>Conta</b></h3>
                                      <form>
                                            <div class="form-carteira">
                                                <label for="num_conta" class="col-sm-1 col-form-label">Número da Conta: </label>
                                                <input type="text" class="form-control" id="num_conta" name="num_conta" size="10" 
											    value="" style="width:50%; display:inline" required> &nbsp; &nbsp; &nbsp;
                                                <input type="text" id="id_usuario_conta" name="id_usuario_conta" value="<?php echo $var_id?>" style="visibility:hidden;display:inline; width:1px">
                                                <label for="id_caixa_c"> Id Caixa: </label>
                                                <input type="text" class="form-control" id="id_caixa_c" name="id_caixa_c" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                <p> &nbsp; </p>
                                                <div class="form-group">
                                                    <label for="id_banco_conta" class="col-sm-1 col-form-label">Banco: </label>
                                                    <select class="form-control" id="id_banco_conta" name="id_banco_conta" style="width:86%; display:inline">
                                                            <?php
                                                                $rows = buscarBancos($var_id);
                                                                foreach ($rows as $row){  ?>
                                                                <option value="<?php echo $row["id_banco"]; ?>"><?php echo $row["nome"]; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tipo_conta" class="col-sm-1 col-form-label">Tipo de Conta: </label>
                                                    <select class="form-control" id="tipo_conta" style="width:86%; display:inline" checked>
                                                        <option value="S">Conta Salário</option>
                                                        <option value="C">Conta Corrente</option>
                                                        <option value="P">Conta Poupança</option>  
                                                        <option value="U">Conta Universitária</option>      
                                                    </select>
                                                </div>
                                                <label for="saldo_conta" class="col-sm-1 col-form-label"> Saldo Inicial: </label>
                                                <input type="number" class="form-control" id="saldo_conta" name="saldo_conta" size="10" value="" step="1" placeholder="1000,00" style="width:15%; display:inline"> 
                                                &nbsp; &nbsp; &nbsp;                                                
                                                <input class="form-check-input" type="checkbox" value="" id="conta-ativa" required checked>
                                                <label class="form-check-label" for="conta-ativa">
                                                    Ativo
                                                </label>

                                                <button type="button" class="btn btn-success bt-salvar" onClick="salvarCaixa('C')">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <h3><b>Minhas Contas: </b></h3>
                                <!--Contas do usuário-->
                                <form id="form-conta-c">
                                    <?php
                                        $rows = buscarContaBancaria($var_id);
                                        foreach ($rows as $row){ 
                                    ?>                                
                                    <div class="card">
                                        <div class="card-container">
                                            <div class="form-group row">
                                                <label for="num-conta-v" class="col-sm-2 col-form-label" id="label-num-conta">Número da Conta: </label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="num-conta-v" value="<?php echo $row["numeroconta"]; ?>">
                                                    
                                                    <label class="form-check-label" for="invalidCheck2">
                                                        Saldo Conta:
                                                    </label>
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="saldo-conta-v" value="<?php echo $row["saldo"]; ?>" style="display:inline">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tipo-conta-c" class="col-sm-2 col-form-label">Tipo de Conta:  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="tipo-conta-c" 
                                                    value="<?php echo $row["tipo_conta_d"];?>">
                                                    
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" disabled>
                                                    <label class="form-check-label" for="invalidCheck2">
                                                        Ativo
                                                    </label>
                                                    <button type="button" class="btn btn-danger" style="display:inline; float:right; padding:9px; margin-left:20px" onClick="excluirCaixa(<?php echo $row["id_caixa"]; ?>)">Deletar</button>
                                                    <button type="button" class="btn btn-secondary" style="display:inline; float:right; padding:9px">Alterar</button>
                                                </div>

                                                <label for="num-conta-v" class="col-sm-2 col-form-label" id="label-num-conta">Banco e Agência: </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="num-conta-v" value="<?php echo $row["nome"]; ?> - <?php echo $row["agencia"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            /* Salvar Banco */
            $('#salvarBanco').on('click', function(event){
                event.preventDefault();
                var nomeBanco = $('#nome_banco').val();
                var agenciaBanco = $('#num_agencia').val();
                var idUsuarioBanco = $('#id_usuario_banco').val();
                var ativoBanco = 0;
                if  ($('#ativo_banco').is(":checked") === true) ativoBanco = 1;
                
                $.ajax({
                    url: '../Controladores/BancoControlador.php?metodo=Inserir',
                    type: "POST",
                    dataType :"html",
                    data: { 'nomeBanco': nomeBanco, 'agenciaBanco': agenciaBanco, 'ativoBanco':ativoBanco, 'idUsuarioBanco': idUsuarioBanco},					
                    success: function(data) {
                        alert(data);
                        $('#nome_banco').val("");
                        $('#num_agencia').val("");
                        $( "#form_banco").load(window.location.href + " #form_banco");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            });


        });
        
        $(function() {
		    $( "#tabs" ).tabs();
	    });

        function salvarCaixa(tipoCaixa){
            if (tipoCaixa == 'A'){ //Tipo Carteira
                var saldo = $('#saldo_carteira').val(); 
                var idUsuario = $('#id_usuario_carteira').val();
                var tipoConta = null;
                var numeroConta = null;
                var idBanco = null;
                var ativo = 1;

            } else if (tipoCaixa == 'C'){ //Tipo Conta
                var saldo = $('#saldo_conta').val(); 
                var idUsuario = $('#id_usuario_conta').val();
                var tipoConta =  $('#tipo_conta').val();
                var numeroConta =  $('#num_conta').val();
                var idBanco =  $('#id_banco_conta').val();
                var ativo = 1;
            }
            event.preventDefault();        
            $.ajax({
                url: '../Controladores/CaixaControlador.php?metodo=Inserir',
                type: "POST",
                dataType :"html",
                data: { 'saldo': saldo, 
                        'idUsuario': idUsuario, 
                        'tipoConta': tipoConta, 
                        'numeroConta': numeroConta, 
                        'idBanco': idBanco,
                        'ativo': ativo,
                        'tipoCaixa': tipoCaixa},					
                success: function(data) {
                    alert(data);
                    $('#saldo_conta').val("");
                    $( "#form-carteira-c").load(window.location.href + " #form-carteira-c");
                    $( "#form-conta-c").load(window.location.href + " #form-conta-c");
                    $( "#id_banco_conta").load(window.location.href + " #id_banco_conta");
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        }

        function excluirCaixa(idCaixaP){
            if (!confirm("Deseja EXCLUIR este item?")) {
                return false;
            } else{
                event.preventDefault();        
                $.ajax({
                    url: '../Controladores/CaixaControlador.php?metodo=Deletar',
                    type: "POST",
                    dataType :"html",
                    data: { 'idCaixa': idCaixa},
                    success: function(data) {
                        alert(data);
                        $( "#form-categoria-alteracao").load(window.location.href + " #form-categoria-alteracao");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            }
        }


    </script>
</html>
