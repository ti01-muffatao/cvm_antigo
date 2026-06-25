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
</head>

<body style="margin-top:-25px;">
    <?php 
    
    include "loading.php";
     
    include "menu.php"; 

    $fornecedores = [];

    $SQL = "select * from clifor order by ds_razao asc";
    $RSS = mysql_query($SQL, $conexao);
    while ($RS = mysql_fetch_array($RSS)) {
        $fornecedores[$RS["cd_fornecedor"]] = $RS["ds_razao"];
    }

    $metas = [
        '1' => 500000,
        '2' => 600000,
        '3' => 700000,
        '4' => 800000,
        '5' => 1000000,
        'GDM' => 1300000,
        '1 - RS' => 250000,
        '2 - RS' => 300000,
    ]

    ?>

    <div class="clearfix"></div>
    <div class="section_holdergrupos">
        <div class="container">
            <div class="one_full">
                <h3 style="text-align: center;">Bingo Ouro</h3>
                <!-- Abas com os grupos -->
                <div class="tabs-content7">
                    <img class="img_banner" src="images/media/meta_grupo_rca.jpg" style="max-width: 90%" />
                    <br>
                    <br>
                    <br>
                    <div class="table-style">
                        <table class="table-list2">
                            <tr class="sticky">
                                <th>Ranking</th>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Sup.</th>
                                <th>Grupo</th>
                                <?php foreach($fornecedores as $codigo => $razao) { ?>
                                <th><?= $razao ?></th>
                                <?php } ?>
                                <th>Meta Geral</th>
                                <th>Realizado Total</th>
                                <th>Premiação</th>
                            </tr>
                            <?php 

                            $SQL = "select * from usuarios where cd_perfil = '4'";
                            // echo $SQL;
                            $RSS = mysql_query($SQL, $conexao);

                            $vendedores = [];

                            while($RS = mysql_fetch_array($RSS)){

                                $cd_codigo = $RS['cd_codigo'];
                                $pontuacao_panetone = $RS['pontuacao_panetone'];

                                $grupo = $RS['cd_grupo'];
                                if($RS['cd_grupo'] == '21'){
                                    $RS['cd_grupo'] = '1 - RS';
                                }else if($RS['cd_grupo'] == '22'){
                                    $RS['cd_grupo'] = '2 - RS';
                                }else if($RS['cd_grupo'] == '6'){
                                    $RS['cd_grupo'] = 'GDM';
                                }

                                $vendedores[$cd_codigo] = [
                                    'codigo' => $cd_codigo,
                                    'usuario' => $RS['ds_usuario'],
                                    'supervisor' => BuscaDSSupervisor($RS["cd_supervisor"]),
                                    'vendas' => ['F00003' => $pontuacao_panetone],
                                    'total' => $pontuacao_panetone,
                                    'grupo' => $RS['cd_grupo'],
                                ];

                                // Esses pontos são atualizados pela rotina "cron_server.php"
                                $SQL2 = " SELECT  cd_fornecedor, SUM(ptos) AS ptos, SUM(pontos_aceleradores) AS pontos_aceleradores FROM ( SELECT  p.cd_fornecedor, SUM(p.cd_pontos) AS ptos, 0 AS pontos_aceleradores FROM pontuacao_new p WHERE  CASE  WHEN p.cd_codigo IN ('0338', '0236') THEN '0236' ELSE p.cd_codigo END =  CASE  WHEN '$cd_codigo' IN ('0338', '0236') THEN '0236' ELSE '$cd_codigo' END GROUP BY p.cd_fornecedor UNION ALL SELECT  pa.cd_fornecedor, 0 AS ptos, SUM(pa.cd_pontos) AS pontos_aceleradores FROM pontuacao_aceleradores pa WHERE  CASE  WHEN pa.cd_codigo IN ('0338', '0236') THEN '0236' ELSE pa.cd_codigo END =  CASE  WHEN '$cd_codigo' IN ('0338', '0236') THEN '0236' ELSE '$cd_codigo' END GROUP BY pa.cd_fornecedor ) subquery GROUP BY cd_fornecedor ";
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
                            foreach($vendedores as $info) {
                                $x++;
                            ?>
                                <tr>
                                    <td><?= $x ?>º</td>
                                    <td><?= $info['codigo'] ?></td>
                                    <td><?= $info['usuario'] ?></td>
                                    <td><?= $info['supervisor'] ?></td>
                                    <td><?= $info['grupo'] ?></td>
                                    <?php foreach($fornecedores as $codigo_forn => $razao) {
                                        if (in_array($info['grupo'], ['1 - RS','2 - RS']) && in_array($codigo_forn, ['F00004', 'F00005'])) {
                                            echo "<td>-</td>";
                                            continue;
                                        }
                                        $venda = $info['vendas'][$codigo_forn];
                                    ?>
                                        <td><?= number_format($venda, 0, ',', '.'); ?></td>
                                    <?php } ?>
                                    <td><?= number_format($metas[$info['grupo']],0,',','.') ?></td>
                                    <td style="background-color: <?= $info['total'] >= $metas[$info['grupo']] ? '#61d661' : '#ff8069' ?>"><?= number_format($info['total'],0,',','.') ?></td>
                                    <td><?= $info['total'] >= $metas[$info['grupo']] ? '1 Cartela' : '-' ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DAS TABELAS GRUPOS -->
    </div>
    </div>

    <!--end section-->
    <?php include "footer.php"; ?>

    <script>
        window.onload = function() {
            var style = document.createElement('style');
            style.innerHTML = '.sticky th { position: sticky; top: 0px; }';
            document.head.appendChild(style);
        };
    </script>

</body>

</html>