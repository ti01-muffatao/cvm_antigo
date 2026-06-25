<?php include "administrar/ora_connect.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
    echo "<script language='javascript'>window.open('sair.php', '_self');</script>";
}


?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta http-equiv="content-type" content="text/html charset=utf-8">
    <meta http-equiv="content-language" content="pt-BR">
    <title><?= $Titulo; ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
    <meta http-equiv="content-language" content="pt" />
    <meta itemprop="description" name="description" content="" />
    <meta name="robots" content="no follow" />
    <!-- mobile  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <!-- ######### ESTILO CSS ######### -->
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!-- ESTILO RESPONSIVO -->
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    <!-- MEGA MENU -->
    <link href="js/mainmenu/sticky.css" rel="stylesheet">
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">
    <!-- SLIDER -->
    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/css/style.css" media="screen" />
    <!-- CONFIGURAÇÃO SLIDER -->
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/rs-plugin/css/settings.css" media="screen" />
    <!-- ICONES -->
    <link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
    <!-- flexslider -->
    <link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />
    <!-- Accordions -->
    <link rel="stylesheet" href="js/accordion/accordion.css" type="text/css" media="all">
    <!-- tabs -->
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs2.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs10.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
    <!-- ######### ARQUIVOS JS ######### -->
    <!-- get jQuery from the google apis -->
    <script type="text/javascript" src="js/universal/jquery.js"></script>
    <!-- style switcher -->
    <script src="js/style-switcher/jquery-1.js"></script>
    <script src="js/style-switcher/styleselector.js"></script>
    <script src="js/universal/tooltip.js"></script>
    <!-- mega menu -->
    <script src="js/mainmenu/bootstrap.min.js"></script>
    <script src="js/mainmenu/customeUI.js"></script>
    <!-- sticky menu -->
    <script type="text/javascript" src="js/mainmenu/sticky.js"></script>
    <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>
    <!-- scroll up -->
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>
    <script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
    <!-- Flexslider -->
    <script src="js/flexslider/jquery.flexslider.js"></script>
    <script src="js/flexslider/custom.js"></script>

    <style>
        .tabs-panel7 {
            display: none;
        }

        .tabs-panel7.active {
            display: block;
        }
    </style>

</head>

<body style="margin-top:-25px;">
    <?php include "loading.php" ?>
    <?php include "menu.php"; ?>

    <?php

    $premios = [
        '1' =>  [5, 4, 3, 2, 2, 2, 2, 2, 2, 2],
        '2' =>  [10, 5, 5, 5, 5, 4, 4, 4, 4, 4, 3],
        '3' =>  [10, 5, 5, 5, 5, 4, 4, 4, 4, 4, 3, 3, 3, 3, 3],
        '4' =>  [10, 5, 5, 5, 5, 4, 4, 4, 4, 4, 3, 3, 3, 3, 3, 3],
        '5' =>  [10, 7, 6, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4],
        '6' =>  [10, 8, 7, 6, 6, 6, 5, 5, 5, 5],
        '21' => [5, 4, 3, 2, 2, 2, 2, 2, 2, 2],
        '22' => [10, 5, 5, 5, 5, 4, 4, 4, 4, 4, 3],
    ];

    $fornecedores = [];

    $SQL = "select * from clifor order by ds_razao asc";
    $RSS = mysql_query($SQL, $conexao);
    while ($RS = mysql_fetch_array($RSS)) {
        $fornecedores[$RS["cd_fornecedor"]] = $RS["ds_razao"];
    }

    ?>

    <div class="clearfix"></div>
    <div class="section_holdergrupos">
        <div class="container">
            <div class="one_full">
                <h3 style="text-align: center;">Bingo Grupos</h3>
                <!-- Abas com os grupos -->
                <ul class="tabs7">
                    <li><a href="#1" target="_self">Grupo 01</a></li>
                    <li><a href="#2" target="_self">Grupo 02</a></li>
                    <li><a href="#3" target="_self">Grupo 03</a></li>
                    <li><a href="#4" target="_self">Grupo 04</a></li>
                    <li><a href="#5" target="_self">Grupo 05</a></li>
                    <li><a href="#6" target="_self">GDM</a></li>
                    <li><a href="#21" target="_self">Grupo 01 RS</a></li>
                    <li><a href="#22" target="_self">Grupo 02 RS</a></li>
                </ul>
                <div class="tabs-content7">
                    <?php foreach ($premios as $grupo => $metas) { ?>
                        <div id="<?= $grupo ?>" class="tabs-panel7">
                            <?php
                            $SQL = "SELECT * from grupos where cd_grupo = '$grupo' order by cd_grupo asc";
                            $RSS = mysql_query($SQL, $conexao);
                            while ($RS = mysql_fetch_array($RSS)) { ?>
                                <h3><?= $RS['ds_grupo'] ?></h3>
                            <?php
                                echo "<h5>Meta Mínima: " . number_format($RS["vl_metam"], 0, "", ".") . "</h5>";
                                echo "<h5>Meta Geral: " . number_format($RS["vl_metag"], 0, "", ".") . "</h5>";
                                $metageralgrupo = $RS["vl_metag"];
                                $metaminima     = $RS["vl_metam"];
                            }
                            ?>
                            <div class="table-style">
                                <table class="table-list2">
                                    <tr class="sticky">
                                        <th>Ranking</th>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Sup.</th>
                                        <?php foreach ($fornecedores as $codigo_forn => $razao) { 
                                            if (in_array($grupo, ['21', '22']) && in_array($codigo_forn, ['F00004', 'F00005'])) {
                                                continue;
                                            } ?>
                                            <th><?= $razao ?></th>
                                        <?php } ?>
                                        <th>Total</th>
                                        <th>Cartelas</th>
                                    </tr>
                                    <?php

                                    $SQL = "select * from usuarios where cd_perfil = '4' and cd_grupo = '$grupo' order by pontuacao_panetone desc";
                                    $RSS = mysql_query($SQL, $conexao);

                                    $vendedores = [];

                                    while ($RS = mysql_fetch_array($RSS)) {

                                        $cd_codigo = $RS['cd_codigo'];
                                        $pontuacao_panetone = $RS['pontuacao_panetone'];

                                        $vendedores[$cd_codigo] = [
                                            'codigo' => $cd_codigo,
                                            'usuario' => $RS['ds_usuario'],
                                            'supervisor' => BuscaDSSupervisor($RS["cd_supervisor"]),
                                            'vendas' => ['F00003' => $pontuacao_panetone],
                                            'total' => $pontuacao_panetone
                                        ];

                                        // Esses pontos são atualizados pela rotina "cron_server.php"
                                        $SQL2 = " SELECT  SUM(p.cd_pontos) AS ptos,  p.cd_fornecedor,  ( SELECT SUM(pa.cd_pontos)  FROM pontuacao_aceleradores pa  WHERE  CASE  WHEN pa.cd_codigo IN ('0338','0236') THEN '0236'  ELSE pa.cd_codigo  END =  CASE  WHEN p.cd_codigo IN ('0338','0236') THEN '0236'  ELSE p.cd_codigo  END AND p.cd_fornecedor = pa.cd_fornecedor ) AS pontos_aceleradores FROM pontuacao_new p  WHERE  CASE  WHEN p.cd_codigo IN ('0338','0236') THEN '0236'  ELSE p.cd_codigo  END =  CASE  WHEN '$cd_codigo' IN ('0338','0236') THEN '0236'  ELSE '$cd_codigo'  END GROUP BY p.cd_fornecedor ";
                                        $RSS2 = mysql_query($SQL2, $conexao);

                                        while ($RS2 = mysql_fetch_array($RSS2)) {
                                            $pontos = 0;
                                            $cd_fornecedor = $RS2['cd_fornecedor'];
                                            $pontos = $RS2['ptos'] + $RS2['pontos_aceleradores'];

                                            // Não soma pontuação nesses fornecedores para o RS
                                            if (in_array($grupo, ['21', '22']) && in_array($cd_fornecedor, ['F00004', 'F00005'])) {
                                                continue;
                                            }

                                            $vendedores[$cd_codigo]['vendas'][$cd_fornecedor] += $pontos;

                                            $vendedores[$cd_codigo]['total'] += $pontos;
                                        }
                                    }

                                    // Ordena os vendedores
                                    usort($vendedores, function ($a, $b) {
                                        return $b['total'] - $a['total'];
                                    });

                                    $x = 0;
                                    foreach ($vendedores as $info) {

                                        $x++;

                                    ?>
                                        <tr>
                                            <td><?= $x ?>º</td>
                                            <td><?= $info['codigo'] ?></td>
                                            <td><?= $info['usuario'] ?></td>
                                            <td><?= $info['supervisor'] ?></td>
                                            <?php foreach ($fornecedores as $codigo_forn => $razao) {
                                                if (in_array($grupo, ['21', '22']) && in_array($codigo_forn, ['F00004', 'F00005'])) {
                                                    continue;
                                                }
                                                $venda = $info['vendas'][$codigo_forn];
                                                $bgcolor = $venda >= $metaminima ? "background-color: #61d661;" : "background-color: #ff8069;";
                                            ?>
                                                <td style="<?= $bgcolor ?>"><?= number_format($venda, 0, ',', '.'); ?></td>
                                            <?php }

                                            $bgcolor_total = $info['total'] >= $metageralgrupo ? "background-color: #61d661;" : "background-color: #ff8069;";

                                            ?>
                                            <td style="<?= $bgcolor_total ?>"><?= number_format($info['total'], 0, ',', '.') ?></td>
                                            <td><?= $premios[$grupo][$x - 1] ? $premios[$grupo][$x - 1] : '1' ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- FIM DAS TABELAS GRUPOS -->
    </div>
    </div>

    <!--end section-->
    <?php include "footer.php"; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".tabs-panel7");
            const links = document.querySelectorAll(".tabs7 li a");

            tabs.forEach(t => t.style.display = "none");

            const firstTab = document.querySelector(".tabs7 li:first-child a");
            const firstPanel = document.querySelector(".tabs-panel7");
            if (firstPanel) firstPanel.style.display = "block";

            links.forEach(link => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute("href").replace("#", "");

                    tabs.forEach(t => t.style.display = "none");

                    const panel = document.getElementById(targetId);
                    if (panel) panel.style.display = "block";

                    links.forEach(l => l.classList.remove("active"));
                    this.classList.add("active");
                });
            });

            if (firstTab) firstTab.classList.add("active");
        });
    </script>

    <script>
        window.onload = function() {
            var style = document.createElement('style');
            style.innerHTML = '.sticky th { position: sticky; top: 0px; }';
            document.head.appendChild(style);
        };
    </script>

</body>

</html>