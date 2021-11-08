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
        <div class="d-flex wrapper wrapper-navbar-used wrapper-navbar-fixed">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Meu Financeiro</h3>
                </div>
                <ul class="list-unstyled components">
                    <p>Usuário: Blá</p>
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
                    <li><a href="" class="sair" id="sair-botao">Sair</a></li>
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
                            <h2 id="titulo-pag"> Movimentações </h2>   
                        </div>    
                    </div>

                    <div class="col">
                        <!--Abas-->
                        <div id="tabs">
                            <ul>
                                <li><a href="#aba-1">Entradas</a></li>
                                <li><a href="#aba-2">Saídas</a></li>
                                <li><a href="#aba-3">Transferência</a></li>
                            </ul>

                            <!--Abas 1 - Entradas-->
                            <div id="aba-1">

                                <div class="card">
                                    <div class="card-container">
                                      <h3 id="center"><b>Entradas</b></h3>
                                        <form id="form-entrada">
                                            <div class="form-mov-entrada">
                                                <div class="form-group row">
                                                    <label for="valor_entrada" class="col-sm-2 col-form-label">Valor: </label>
                                                    <input type="number" class="form-control" id="valor_entrada" name="valor_entrada" placeholder="Ex: 2500,00" size="10" 
                                                    value="" step="0.01" style="width:50%; display:inline" required> 
                                                    &nbsp; &nbsp;
                                                        <label for="id_movimentacao"> Id Movimentação: </label>
                                                        <input type="text" class="form-control" id="id_movimentacao" name="id_movimentacao" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group" style="display:inline">
                                                        <label for="tipo_conta" class="col-sm-2 col-form-label">Conta Bancária: </label>
                                                        <select class="form-control" id="tipo_conta" style="width:40%; display:inline">
                                                            <option value="x">Itaú, 74784-2 - Conta Salário</option>
                                                            <option value="y">Banco do Brasil, 12384-4 - Conta Corrente</option>    
                                                        </select>
                                                    </div>
                                                    <div class="form-check" style="display:inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                                        <label class="form-check-label" for="invalidCheck2">
                                                            Carteira
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group">
                                                        <label for="categoria_entrada" class="col-sm-2 col-form-label">Categoria / Subcategoria: </label>
                                                        <select class="form-control" id="categoria_entrada" style="width:30%; display:inline">
                                                            <option value="x">Salário</option>
                                                            <option value="y">Extra</option>    
                                                        </select>
                                                        <select class="form-control" id="subcategoria_entrada" style="width:30%; display:inline">
                                                            <option value="x">Extra A</option>
                                                            <option value="y">Extra B</option>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check" style="margin-left:15px">
                                                        <input class="form-check-input" type="checkbox" value="" id="entrada_ativa" required>
                                                        <label class="form-check-label " for="entrada_ativa">
                                                            Ativo (Caso a entrada ocorra em uma data futura)
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="form-check" style="margin-left:15px">
                                                        <input class="form-check-input" type="checkbox" value="" id="entrada_automatica" required>
                                                        <label class="form-check-label " for="entrada_automatica">
                                                            Repetir Entrada todo mês (Automatizar)
                                                        </label>
                                                        <button type="submit" class="btn btn-success bt-salvar" >Salvar</button>
                                                    </div>
                                                </div>     
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <h3>&nbsp;</h3>
                                
                                <div class="card inline-block" style="width: 46%; display:inline-block">
                                    <h3><b>Últimas Entradas: </b></h3>
                                </div>

                                <div class="card inline-block" style="width: 46%; display:inline-block;">
                                    <h3><b>Entradas Futuras: </b></h3>
                                </div>
                            </div>

                            <!--Abas 2 - Saídas-->
                            <div id="aba-2">
                            <p>teste 2</p>
                            </div>

                            <!--Abas 3 - Transferências-->
                            <div id="aba-3">
                            <p>teste 3</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });

    $(function() {
        $( "#tabs" ).tabs();
    });
</script>