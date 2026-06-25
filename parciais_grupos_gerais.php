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
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
    <meta http-equiv="content-language" content="pt" />
    <meta itemprop="description" name="description" content="" />
    <meta name="robots" content="no follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    <link href="js/mainmenu/sticky.css" rel="stylesheet">
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
    <link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/accordion/accordion.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs2.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs10.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
    <script type="text/javascript" src="js/universal/jquery.js"></script>
    <script src="js/style-switcher/jquery-1.js"></script>
    <script src="js/style-switcher/styleselector.js"></script>
    <script src="js/universal/tooltip.js"></script>
    <script src="js/mainmenu/bootstrap.min.js"></script>
    <script src="js/mainmenu/customeUI.js"></script>
    <script type="text/javascript" src="js/mainmenu/sticky.js"></script>
    <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>
    <script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
    <script src="js/flexslider/jquery.flexslider.js"></script>
    <script src="js/flexslider/custom.js"></script>

    <style>
        .tabs-panel7 {
            display: block !important;
            height: 0;
            overflow: hidden;
            visibility: hidden;
            opacity: 0;
            position: relative;
        }

        .tabs-panel7.active {
            height: auto;
            overflow: visible;
            visibility: visible;
            opacity: 1;
            transition: opacity 0.1s ease-in;
        }

        .tabs7 li a.active {
            font-weight: bold;
            color: #C30009;
        }

        .table-responsive-wrapper {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; 
            margin-bottom: 20px;
            background: #fff;
            
            transform: translateZ(0);
        }

        .sticky th { 
            position: sticky; 
            top: 0px; 
            z-index: 99;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }

        @media only screen and (max-width: 992px) {
            
            .sticky th { 
                position: static !important; 
                box-shadow: none !important;
            }

            .table-responsive-wrapper {
                overflow-y: hidden;
            }
            
            tr {
               transform: translate3d(0,0,0);
            }

            .table-list2 {
                min-width: 800px; 
            }
        }
    </style>

</head>

<body>
    <?php include "loading.php" ?>
    <?php include "menu.php"; ?>

    <?php

    $premios = [
        '1' =>  [800, 700, 600, 550, 500, 400, 400, 400, 350, 300],
        '2' =>  [1000, 900, 800, 700, 650, 600, 500, 450, 400, 400, 400],
        '3' =>  [1200, 1100, 1000, 900, 800, 700, 600, 550, 500, 500, 450, 450, 450, 400, 400],
        '4' =>  [1400, 1300, 1200, 1100, 1000, 900, 800, 700, 650, 600, 550, 550, 550, 550, 550, 550],
        '5' =>  [2000, 1800, 1700, 1600, 1500, 1400, 1300, 1200, 1200, 1150, 1100, 1050, 1000, 1000],
        '6' => [2800, 2600, 2400, 2300, 2200, 2150, 2100, 2000, 1450, 1350],
        '21' =>  [800, 700, 600, 550, 500, 400, 400, 400, 350, 300],
        '22' =>  [900, 800, 700, 650, 650, 600, 500, 450, 450, 400, 300],
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
                <?php

                $SQL = "SELECT DATE_FORMAT(MAX(dt_data), '%d/%m/%Y') AS data_ultima_parcial from pontuacao_new";
                $RSS = mysql_query($SQL, $conexao);
                $RS = mysql_fetch_array($RSS);

                ?>
                <h3 style="text-align: center; margin-top: 80px">Parciais Grupos Gerais até <span style="color: red">( <?= $RS['data_ultima_parcial'] ?> )</span></h3>
                <ul class="tabs7">
                    <li><a href="#grupo-1" target="_self">Grupo 01 SC/PR</a></li>
                    <li><a href="#grupo-2" target="_self">Grupo 02 SC/PR</a></li>
                    <li><a href="#grupo-3" target="_self">Grupo 03 SC/PR</a></li>
                    <li><a href="#grupo-4" target="_self">Grupo 04 SC/PR</a></li>
                    <li><a href="#grupo-5" target="_self">Grupo 05 SC/PR</a></li>
                    <li><a href="#grupo-6" target="_self">GDM SC/PR</a></li>
                    <li><a href="#grupo-21" target="_self">Grupo 01 RS</a></li>
                    <li><a href="#grupo-22" target="_self">Grupo 02 RS</a></li>
                </ul>
                <div class="tabs-content7">
                    <?php foreach ($premios as $grupo => $metas) { ?>
                        <div id="grupo-<?= $grupo ?>" class="tabs-panel7">
                            <?php
                            $SQL = "SELECT * from grupos where cd_grupo = '$grupo' order by cd_grupo asc";
                            $RSS = mysql_query($SQL, $conexao);
                            while ($RS = mysql_fetch_array($RSS)) { ?>
                                <h3><?= $RS['ds_grupo'] ?> &nbsp;&nbsp;
                                <?php if(in_array($RS['cd_grupo'],['21','22'])) { ?>
                                    <img src="./images/bandeiras/27.png" style="width: 50px;">
                                <?php } else { ?>
                                    <img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
                                    <img src="./images/bandeiras/10.png" style="width: 50px;"></h3>
                                <?php } ?>
                            <?php
                                echo "<h5>Meta Mínima: " . number_format($RS["vl_metam"], 0, "", ".") . " (até 14/01/2026)</h5>";
                                echo "<h5>Meta Geral: " . number_format($RS["vl_metag"], 0, "", ".") . " (até 24/01/2026)</h5>";
                                $metageralgrupo = $RS["vl_metag"];
                                $metaminima     = $RS["vl_metam"];
                            }
                            ?>
                            
                            <div class="table-responsive-wrapper">
                                <table class="table-list2">
                                    <tr class="sticky">
                                        <th>Ranking</th>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Sup.</th>
                                        <?php foreach ($fornecedores as $codigo => $razao) {
                                            if (in_array($grupo, ['21', '22']) && in_array($codigo, ['F00004', 'F00005'])) {
                                                continue; 
                                            }
                                            ?>
                                            <th><?= $razao ?></th>
                                        <?php } ?>
                                        <th>Total</th>
                                        <th>Premiação</th>
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

                                       $SQL2 = " SELECT  cd_fornecedor, SUM(ptos) AS ptos, SUM(pontos_aceleradores) AS pontos_aceleradores FROM ( SELECT  p.cd_fornecedor, SUM(p.cd_pontos) AS ptos, 0 AS pontos_aceleradores FROM pontuacao_new p WHERE  CASE  WHEN p.cd_codigo IN ('0338','0236') THEN '0236' ELSE p.cd_codigo  END =  CASE  WHEN '$cd_codigo' IN ('0338','0236') THEN '0236' ELSE '$cd_codigo' END GROUP BY p.cd_fornecedor UNION ALL SELECT  pa.cd_fornecedor, 0 AS ptos, SUM(pa.cd_pontos) AS pontos_aceleradores FROM pontuacao_aceleradores pa WHERE  CASE  WHEN pa.cd_codigo IN ('0338','0236') THEN '0236' ELSE pa.cd_codigo  END =  CASE  WHEN '$cd_codigo' IN ('0338','0236') THEN '0236' ELSE '$cd_codigo' END GROUP BY pa.cd_fornecedor ) subquery GROUP BY cd_fornecedor ";

                                        $RSS2 = mysql_query($SQL2, $conexao);

                                        while ($RS2 = mysql_fetch_array($RSS2)) {
                                            $pontos = 0;
                                            $cd_fornecedor = $RS2['cd_fornecedor'];
                                            $pontos = $RS2['ptos'] + $RS2['pontos_aceleradores'];

                                            if (in_array($grupo, ['21', '22']) && in_array($cd_fornecedor, ['F00004', 'F00005'])) {
                                                continue;
                                            }

                                            $vendedores[$cd_codigo]['vendas'][$cd_fornecedor] += $pontos;
                                            $vendedores[$cd_codigo]['total'] += $pontos;
                                        }
                                    }

                                    usort($vendedores, function ($a, $b) {
                                        return $b['total'] - $a['total'];
                                    });

                                    $x = 0;
                                    foreach ($vendedores as $info) { ?>
                                        <tr>
                                            <td><?= $x + 1 ?>º</td>
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
                                            <td>R$ <?= $premios[$grupo][$x] ?></td>
                                        </tr>
                                    <?php
                                        $x++;
                                    } ?>
                                </table>
                            </div> 
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.tabs7 a');
            const tabPanels = document.querySelectorAll('.tabs-panel7');

            function hideAllPanels() {
                tabPanels.forEach(panel => panel.classList.remove('active'));
                tabLinks.forEach(link => link.classList.remove('active'));
            }

            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); 
                    hideAllPanels();
                    
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.classList.add('active');
                        this.classList.add('active');
                    }
                });
            });

            if (tabPanels.length > 0) {
                tabPanels[0].classList.add('active');
                tabLinks[0].classList.add('active');
            }
        });
    </script>
</body>
</html>