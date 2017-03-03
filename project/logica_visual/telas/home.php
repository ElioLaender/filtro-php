<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Filtro dinâmico com PHP e Mysql</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="project/logica_visual/telas/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="project/logica_visual/telas/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="project/logica_visual/telas/assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .preload {
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 1;
            background-color: #fff;
            background-image: url("project/logica_visual/telas/assets/img/plus-loader.gif");
            background-size: 200px 125px;
            background-position: center;
            background-repeat: no-repeat;
        }

        h1{
            font-size: 25px;
        }

    </style>
</head>
<body>
<div id="preload" class="preload"></div>

    <header>

    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <h1 style="color:white">Gerando SQL dinamicamente para fitro de dados - PHP e MySql</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="" href="index.html">Ver Tutorial</a></li>
                            <li><a href="ui.html">Download</a></li>
                            <li><a href="table.html">Contato</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Exemplo de uso</h4>

                </div>

                <!--tabela inicio-->
                <!--    Hover Rows  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Retorno da consulta - Veículos Disponíveis
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Modelo</th>
                                            <th>Marca</th>
                                            <th>Cor</th>
                                            <th>Cilindrada</th>
                                            <th>Qts Portas</th>
                                            <th>Ano</th>
                                            <th>Documentação</th>
                                            <th>Valor</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <?php echo $dados; ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End  Hover Rows  -->
                <!--tabela fim-->

                <!--form inicio-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Filtro de Consulta - Pesquisa por veículos
                            </div>
                            <div class="panel-body">
                                <form action="testadora.php" method="post">
                                    <div class="form-group">
                                        <label>Informe o modelo:</label>
                                        <input type="text" class="form-control" id="veiculo-modelo" name="modelo" placeholder="Ex: Palio weekend" />
                                    </div>
                                    <div class="form-group">
                                        <label>Marca:</label>
                                        <input type="text" class="form-control" id="veiculo-marca" name="marca" placeholder="Ex: Fiat" />
                                    </div>
                                    <div class="form-group">
                                        <label>Cor:</label>
                                        <input type="text" class="form-control" id="veiculo-cor" name="cor" placeholder="Ex: Azul metálico" />
                                    </div>

                                    <div class="form-group">
                                        <label>Opcionais:</label>
                                        <div >
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" name="dir_hid">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        Direção Hidráulica
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" name="ar_cond">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        Ar Condicionado
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" name="vid_ele">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        Vidro Elétrico
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" name="teto_sol">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        Teto Solar
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" name="trav_ele">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        Trava Elétrica
                                                    </label>
                                                </div>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" name="alarme">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        Alarme
                                                    </label>
                                                </div>

                                            </div>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-default">Filtrar Busca</button>
                                    <button type="reset" class="btn btn-default">Limpar</button>

                                </form>
                            </div>


                        </div>
                    </div>

                </div>

                <!--form fim-->

            </div>




    </div>
    </div>


    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="http://eliolaender.com.br" target="_blank"> © 2017  | Desenvolvido por : Élio Laender</a>
                </div>

            </div>
        </div>
    </footer>
    <!--&lt;!&ndash; FOOTER SECTION END&ndash;&gt;-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="project/logica_visual/telas/assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="project/logica_visual/telas/assets/js/bootstrap.js"></script>
    <script>
            jQuery(window).load(function() {
            jQuery("#preload").delay(1200).fadeOut("slow");
        });
    </script>

</body>
</html>
