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
                        <a href="#">Categorias e Subcategorias</a>
                    </li>
                    <li>
                        <a href="#">Bancos e Contas</a>
                    </li>                    
                    <li>
                        <a href="#">Movimentações</a>
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
                                                <label for="saldo">Saldo:  (R$)</label>
                                                <input type="number" class="form-control" id="preco_servico" name="preco_servico" placeholder="Ex:200,00" size="10" 
											    value="" step="0.01" style="width:40%; display:inline" required> 

                                                <label for="saldo"> Id Caixa: </label>
                                                <input type="text" class="form-control" id="id_caixa" name="id_caixa" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:green; border: green; padding:9px; margin-bottom:15px">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <h3>&nbsp;</h3>
                                <h3><b>Minha Carteira: </b></h3>
                                <!--Carteira do usuário-->
                                <div class="card">
                                    <div class="card-container">
                                        
                                    <form>
                                        <div class="form-group row">
                                            <label for="saldo-carteira" class="col-sm-2 col-form-label" id="label-saldo">Saldo: (R$) </label>
                                            <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext readonlys" id="saldo-carteira" value="200,00">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_carteira" class="col-sm-2 col-form-label">Id Saldo:  </label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="id_carteira" value="1">
                                                <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:#5f725f; border: #5f725f; padding:9px">Alterar</button>
                                            </div>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                            </div>

                            <!--Abas 2 - Banco-->
                            <div id="aba-2">
                                <div class="card">
                                    <div class="card-container">
                                      <h3 id="center"><b>Banco</b></h3>
                                      <form>
                                            <div class="form-carteira">
                                                <label for="saldo">Nome do Banco: </label>
                                                <input type="text" class="form-control" id="preco_servico" name="preco_servico" size="10" 
											    value="" style="width:50%; display:inline" required> &nbsp; &nbsp; &nbsp;

                                                <label for="saldo"> Id Caixa: </label>
                                                <input type="text" class="form-control" id="id_caixa_b" name="id_caixa_b" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                <p> &nbsp; </p>
                                                <label for="saldo"> Número da Agência: </label>
                                                <input type="text" class="form-control" id="num_agencia" name="num_agencia" size="10" value="" step="1" style="width:20%; display:inline"> 
                                                 &nbsp; &nbsp; &nbsp;
                                                
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                                <label class="form-check-label" for="invalidCheck2">
                                                    Ativo
                                                </label>

                                                <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:green; border: green; padding:9px; margin-bottom:15px">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <h3>&nbsp;</h3>
                                <h3><b>Meus Bancos: </b></h3>
                                <!--Bancos e Agências do usuário-->
                                
                                <div class="card">
                                    <div class="card-container">
                                        <form>
                                            <div class="form-group row">
                                                <label for="saldo-carteira" class="col-sm-2 col-form-label" id="label-saldo">Nome do Banco: </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="saldo-carteira" value="Banco do Brasil">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="id_carteira" class="col-sm-2 col-form-label">Número da Agência:  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="id_carteira" value="12345-6">
                                                    
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" disabled>
                                                    <label class="form-check-label" for="invalidCheck2">
                                                        Ativo
                                                    </label>
                                                    <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:red; border: #5f725f; padding:9px; margin-left:20px">Deletar</button>
                                                    <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:#5f725f; border: #5f725f; padding:9px">Alterar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!--Abas 3 - Conta-->
                            <div id="aba-3">
                                <div class="card">
                                    <div class="card-container">
                                      <h3 id="center"><b>Conta</b></h3>

                                      <form>
                                            <div class="form-carteira">
                                                <label for="num_conta">Número da Conta: </label>
                                                <input type="text" class="form-control" id="num_conta" name="num_conta" size="10" 
											    value="" style="width:50%; display:inline" required> &nbsp; &nbsp; &nbsp;

                                                <label for="id_caixa_c"> Id Caixa: </label>
                                                <input type="text" class="form-control" id="id_caixa_c" name="id_caixa_c" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                <p> &nbsp; </p>
                                                <div class="form-group ">
                                                    <label for="exampleFormControlSelect1">Banco: </label>
                                                    <select class="form-control" id="exampleFormControlSelect1" style="width:90%; display:inline">
                                                        <option>Itau</option>
                                                        <option>Bradesco</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Tipo de Conta: </label>
                                                    <select class="form-control" id="exampleFormControlSelect2" style="width:86%; display:inline">
                                                        <option>Conta Salário</option>
                                                        <option>Conta Corrente</option>
                                                        <option>Conta Poupança</option>  
                                                        <option>Conta Universitária</option>      
                                                    </select>
                                                </div>
                                                <label for="saldo_conta"> Saldo: </label>
                                                <input type="number" class="form-control" id="saldo_conta" name="saldo_conta" size="10" value="" step="1" placeholder="1000,00" style="width:15%; display:inline"> 

                                                &nbsp; &nbsp; &nbsp;
                                                
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                                <label class="form-check-label" for="invalidCheck2">
                                                    Ativo
                                                </label>

                                                <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:green; border: green; padding:9px; margin-bottom:15px">Salvar</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                
                                <h3><b>Minhas Contas: </b></h3>
                                <!--Contas do usuário-->
                                
                                <div class="card">
                                    <div class="card-container">
                                        <form>
                                            <div class="form-group row">
                                                <label for="num-conta-v" class="col-sm-2 col-form-label" id="label-num-conta">Número da Conta: </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="num-conta-v" value="74784237">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tipo_conta" class="col-sm-2 col-form-label">Tipo de Conta:  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="tipo_conta" value="Conta Salário">
                                                    
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" disabled>
                                                    <label class="form-check-label" for="invalidCheck2">
                                                        Ativo
                                                    </label>
                                                    <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:red; border: #5f725f; padding:9px; margin-left:20px">Deletar</button>
                                                    <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:#5f725f; border: #5f725f; padding:9px">Alterar</button>
                                                </div>

                                                <label for="num-conta-v" class="col-sm-2 col-form-label" id="label-num-conta">Banco e Agência: </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="num-conta-v" value="Itaú - 12345-6">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!--Card replicado (apenas para verificar se a tela estava funcionando como esperado)--> 
                                <div class="card">
                                    <div class="card-container">
                                        <form>
                                            <div class="form-group row">
                                                <label for="num-conta-v" class="col-sm-2 col-form-label" id="label-num-conta">Número da Conta: </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="num-conta-v" value="74784237">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tipo_conta" class="col-sm-2 col-form-label">Tipo de Conta:  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="tipo_conta" value="Conta Salário">
                                                    
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" disabled>
                                                    <label class="form-check-label" for="invalidCheck2">
                                                        Ativo
                                                    </label>
                                                    <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:red; border: #5f725f; padding:9px; margin-left:20px">Deletar</button>
                                                    <button type="submit" class="btn btn-primary" style="display:inline; float:right; background:#5f725f; border: #5f725f; padding:9px">Alterar</button>
                                                </div>

                                                <label for="num-conta-v" class="col-sm-2 col-form-label" id="label-num-conta">Banco e Agência: </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext readonlys" id="num-conta-v" value="Itaú - 12345-6">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--Fim Card replicado--> 

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
        });

        $(function() {
		    $( "#tabs" ).tabs();
	    });
    </script>
</html>
