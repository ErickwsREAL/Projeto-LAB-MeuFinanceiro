<?php
require_once ("../Controladores/login_bd/login_banco.php");
require_once ("../Controladores/CategoriaControlador.php");
require_once ("../Controladores/SubcategoriaControlador.php");
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
	    <script src="js/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            $var_id = 1;	
        ?>
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
                            <h2 id="titulo-pag"> Categoria e Subcategoria (Gastos e Entradas) </h2>   
                        </div>    
                    </div>

                    <div class="col">
                        <!--Abas-->
                        <div id="tabs">
                            <ul>
                                <li><a href="#aba-1">Categoria</a></li>
                                <li><a href="#aba-2">Subcategoria</a></li>
                            </ul>
                            <!--Abas 1 - Categoria-->
                            <div id="aba-1">
                                <div class="card">
                                    <div class="card-container">
                                      <h3 id="center"><b>Categoria</b></h3>
                                        <form name="form-categoria" id="form-categoria">
                                            <div class="form-carteira">
                                                <div class="form-group row">
                                                    <label for="nome_categoria" class="col-sm-1 col-form-label">Nome da Categoria: </label>
                                                    <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" placeholder="Ex: Alimentação" size="10" 
                                                    value="" step="0.01" style="width:80%; display:inline" required> 
                                                    <input type="text" id="id_usuario" name="id_usuario" value="<?php echo $var_id?>" style="visibility:hidden;display:inline; width:1px">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group" >
                                                        <label for="tipo_categoria" class="col-sm-1 col-form-label">Tipo: </label>
                                                        <select class="form-control" id="tipo_categoria" name="tipo_categoria" style="width:50%; display:inline">
                                                            <option value="A">Ambos</option>
                                                            <option value="E">Entrada</option>
                                                            <option value="S">Despesa</option>    
                                                        </select>
                                                        &nbsp; &nbsp;
                                                        <label for="id_categoria"> Id Categoria: </label>
                                                        <input type="text" class="form-control" id="id_categoria" name="id_categoria" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                        <button type="button" class="btn btn-success bt-salvar" id="salvarCateg">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <h3>&nbsp;</h3>
                                <h3><b>Minhas Categorias: </b> 
                                <button type="button" id="atualizaCategoriasTela" onclick="refreshDivCategorias();" class="btn btn-info navbar-btn" style="background:#3ca76b; font-size:0px">  
                                    <img src="./Imagens/refresh.png" class="rounded" style="width:25px">
                                </button></h3>
                                <!--Categorias do usuário-->
                                <div id="cards-categorias">
                                    <form name="form-categoria-alteracao" id="form-categoria-alteracao">
                                        <?php
                                            $rows = buscarCategorias($var_id);
                                            foreach ($rows as $row){ 
                                        ?>
                                        <div class="card">
                                            <div class="card-container">
                                                <div class="form-group row">
                                                    <label for="nome_categoria_c" class="col-sm-2 col-form-label" id="label-nome_categoria">Nome da Categoria: </label>
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="nome_categoria_c" value="<?php echo $row["nomecategoria"]; ?>">

                                                    <label for="id_categoria_c_"> Id Categoria: </label>
                                                    <input type="text" class="form-control-plaintext readonlys" id="id_categoria_c" name="id_categoria_c" size="10" value="<?php echo $row["id_categoria"]; ?>" step="1" style="width:5%; display:inline" readonly> 
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tipo_categoria_c" class="col-sm-2 col-form-label">Tipo:  </label>
                                                    <input type="text" readonly class="form-control-plaintext readonlys" id="tipo_categoria_c" value="<?php if ($row["tipo_categoria"] == "E") echo "Entrada"; else echo "Despesa";?>">
                                                
                                                    <button type="button" class="btn btn-danger bt-deletar-s" id="deletarCategoria-<?php echo $row["id_categoria"];?>" onClick="excluirCategoria(this.id)">Deletar</button>
                                                    <button type="button" class="btn btn-secondary bt-alterar-s" id="alterarCategoria" onClick="buscarCategoriaPeloId(<?php echo $row["id_categoria"];?>)">Alterar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>

                            <!--Abas 2 - Subcategoria-->
                            <div id="aba-2">
                                <div class="card">
                                        <div class="card-container">
                                        <h3 id="center"><b>Subcategoria</b></h3>
                                            <form name="form-subcategoria" id="form-subcategoria">
                                                <div class="form-carteira">
                                                    <div class="form-group row">
                                                        <label for="nome_subcategoria" class="col-sm-1 col-form-label">Nome da Subcategoria: </label>
                                                        <input type="text" class="form-control" id="nome_subcategoria" name="nome_subcategoria" placeholder="Ex: Restaurantes" size="10" 
                                                        value="" step="0.01" style="width:80%; display:inline" required>
                                                        <input type="text" id="id_usuario_sub" name="id_usuario_sub" value="<?php echo $var_id?>" style="visibility:hidden;display:inline; width:1px">
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="form-group">
                                                            <label for="id_categoria_sub" class="col-sm-1 col-form-label">Categoria: </label>
                                                            <select class="form-control" id="id_categoria_sub" name="id_categoria_sub" style="width:50%; display:inline">
                                                            <?php
                                                                $rows = buscarCategorias($var_id);
                                                                foreach ($rows as $row){  ?>
                                                                <option value="<?php echo $row["id_categoria"]; ?>"><?php echo $row["nomecategoria"]; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                            </select>
                                                            &nbsp; &nbsp;
                                                            <label for="id_subcategoria"> Id Subcategoria: </label>
                                                            <input type="text" class="form-control" id="id_subcategoria" name="id_subcategoria" size="10" value="" step="1" style="width:5%; display:inline" readonly> 
                                                            <button type="button" class="btn btn-success bt-salvar" id="salvarSubcateg">Salvar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <h3>&nbsp;</h3>
                                    <div id="cards-subcategorias">
                                        <h3><b>Minhas Subcategorias: </b>
                                            <button type="button" onclick="refreshDivSubCategorias();" class="btn btn-info navbar-btn" style="background:#3ca76b; font-size:0px; display:inline; " >  
                                                <img src="./Imagens/refresh.png" class="rounded" style="width:25px">
                                            </button>
                                        </h3>
                                        <!--Subcategorias do usuário-->
                                        <form id="form-subcategorias-c">
                                        <?php
                                            $rows = buscarSubcategorias($var_id);
                                            foreach ($rows as $row){ 
                                        ?>
                                            <div class="card">
                                                <div class="card-container">
                                                    <div class="form-group row">
                                                        <label for="nome_subcategoria_c" class="col-sm-2 col-form-label" id="label-nome_subcategoria">Nome da Subcategoria: </label>
                                                        <input type="text" readonly class="form-control-plaintext readonlys" id="nome_subcategoria_c" value="<?php echo $row["nome_sub_categoria"]; ?>">

                                                        <label for="id_subcategoria_c"> Id Subcategoria: </label>
                                                        <input type="text" class="form-control-plaintext readonlys" id="id_subcategoria_c" name="id_subcategoria_c" size="10" value="<?php echo $row["id_sub_categoria"]; ?>" step="1" style="width:5%; display:inline" readonly> 
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="categoria_sub_c" class="col-sm-2 col-form-label">Categoria:  </label>
                                                        <input type="text" readonly class="form-control-plaintext readonlys" id="categoria_sub_c" value="<?php echo $row["id_categoria"]; ?>">
                                                    
                                                        <button type="button" class="btn btn-danger bt-deletar-s" id="deletarSubcategoria-<?php echo $row["id_sub_categoria"];?>" onclick="excluirSubcategoria(this.id)">Deletar</button>
                                                        <button type="button" class="btn btn-secondary bt-alterar-s" onClick="buscarSubcategoriaPeloId(<?php echo $row["id_sub_categoria"];?>)">Alterar</button>
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
            </div>

        </div>
    </body>
</html>  

<script type="text/javascript">
    $(document).ready(function () {
        /*Funcionamento Menu vertical */
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        /* Salvar Categorias */
        $('#salvarCateg').on('click', function(event){
            event.preventDefault();
            var nomeCategoria = $('#nome_categoria').val();
            var tipoCategoria = $('#tipo_categoria').val();
            var idUsuario = $('#id_usuario').val();
             $.ajax({
                url: '../Controladores/CategoriaControlador.php?metodo=Inserir',
                type: "POST",
                dataType :"html",
                data: { 'nomeCategoria': nomeCategoria, 'tipoCategoria': tipoCategoria, 'idUsuario': idUsuario},					
                success: function(data) {
                    alert(data);
                    $('#nome_categoria').val("");
                    $( "#form-categoria-alteracao").load(window.location.href + " #form-categoria-alteracao");
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        });

        /* Salvar Subcategorias */
        $('#salvarSubcateg').on('click', function(event){
            event.preventDefault();
            var nomeSubcategoria = $('#nome_subcategoria').val();
            var idCategoriaSub = $('#id_categoria_sub').val();
            var idUsuarioSub = $('#id_usuario_sub').val();
            $.ajax({
                url: '../Controladores/SubcategoriaControlador.php?metodo=Inserir',
                type: "POST",
                dataType :"html",
                data: { 'nomeSubcategoria': nomeSubcategoria, 'idCategoriaSub': idCategoriaSub, 'idUsuarioSub': idUsuarioSub },					
                success: function(data) {
                    alert(data);
                    $('#nome_subcategoria').val("");
                    $( "#form-subcategorias-c").load(window.location.href + " #form-subcategorias-c");
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        });
    });

    function excluirCategoria(idCategoriaP){
        var idCategoria = idCategoriaP.substring(17);

        if (!confirm("Deseja EXCLUIR esta categoria?")) {
			return false;
		} else{
            event.preventDefault();        
            $.ajax({
                url: '../Controladores/CategoriaControlador.php?metodo=Deletar',
                type: "POST",
                dataType :"html",
                data: { 'idCategoria': idCategoria},					
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

    function excluirSubcategoria(idSubcategoriaP){
        var idSubcategoria = idSubcategoriaP.substring(20);

        if (!confirm("Deseja EXCLUIR esta subcategoria?")) {
			return false;
		} else{
            event.preventDefault();        
            $.ajax({
                url: '../Controladores/SubcategoriaControlador.php?metodo=Deletar',
                type: "POST",
                dataType :"html",
                data: { 'idSubcategoria': idSubcategoria},					
                success: function(data) {
                    alert(data);
                    $( "#form-subcategorias-c").load(window.location.href + " #form-subcategorias-c");
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        }
    }

    function buscarCategoriaPeloId(idCategoria){
        event.preventDefault();
        $.ajax({
            url: '../Controladores/CategoriaControlador.php?metodo=BuscarPeloId',
            type: "POST",
            dataType :"html",
            data: {'idCategoria': idCategoria},
            
            success: function(value){
                var data = value.split(",");
                $('#id_categoria').val(data[0]);
                $('#tipo_categoria').val(data[1]);
                $('#nome_categoria').val(data[2]);
            }
        });
    }

    function buscarSubcategoriaPeloId(idSubcategoria){
        alert(idSubcategoria);
        event.preventDefault();
        $.ajax({
            url: '../Controladores/SubcategoriaControlador.php?metodo=BuscarPeloId',
            type: "POST",
            dataType :"html",
            data: {'idSubcategoria': idSubcategoria},
            
            success: function(value){
                var data = value.split(",");
                $('#id_subcategoria').val(data[0]);
                $('#id_categoria_sub').val(data[1]);
                $('#nome_subcategoria').val(data[2]);
            }
        });
    }

    /*Funcionamento Abas */
    $(function() {
        $( "#tabs" ).tabs();
    });

    /*Recarrega div com as subcategorias cadatradas pelo usuário*/
    function refreshDivSubCategorias() {
        $( "#form-subcategorias-c").load(window.location.href + " #form-subcategorias-c");
    }

    /*Recarrega div com as categorias cadatradas pelo usuário*/
    function refreshDivCategorias() {
        $( "#form-categoria-alteracao").load(window.location.href + " #form-categoria-alteracao");
    }
</script> 