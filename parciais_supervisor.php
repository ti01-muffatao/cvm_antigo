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
    function comparar_porcentagem($a, $b)
    {
        $porcA = 0;
        $porcB = 0;

        if ($a['meta'] > 0) {
            $porcA = ($a['vendas'] / $a['meta']) * 100;
        }

        if ($b['meta'] > 0) {
            $porcB = ($b['vendas'] / $b['meta']) * 100;
        }

        if ($porcA == $porcB) {
            return 0;
        }

        // Ordena em ordem decrescente (maior % primeiro)
        return ($porcA > $porcB) ? -1 : 1;
    }

    $premios = [
        'F00001' =>  [1000, 800, 600, 450, 300],
        'F00002' =>  [1000, 800, 600, 450, 300],
        'F00003' =>  [1000, 800, 600, 450, 300],
        'F00004' =>  [1000, 800, 600, 450],
        'F00005' =>  [1000, 800, 600, 450],
        'F00077' =>  [1000, 800, 600, 450, 300],
        'F00009' =>  [1000, 800, 600, 450, 300],
        'F00018' =>  [1000, 800, 600, 450, 300],
        'F00097' =>  [1000, 800, 600, 450, 300],
        'F00010' =>  [1000, 800, 600, 450, 300],
    ];

    $fornecedores = [];

    $SQL = "select * from clifor order by ds_razao asc";
    $RSS = mysql_query($SQL, $conexao);
    while ($RS = mysql_fetch_array($RSS)) {
        $fornecedores[$RS["cd_fornecedor"]] = $RS["ds_razao"];
    }

    $diasPassaramGeral 	= dias_passaram_geral();
    $dias_realGeral   = ($diasPassaramGeral / 79) * 100;

    ?>

    <div class="clearfix"></div>
    <div class="section_holdergrupos">
        <div class="container">
            <div class="one_full">
                <h3>Parciais Supervisor</h3>
                <!-- Abas com os grupos -->
                <ul class="tabs7">
                    <?php foreach ($fornecedores as $codigo => $nome) { ?>
                        <li><a href="#<?= $codigo ?>" target="_self"><?= $nome ?></a></li>
                    <?php } ?>
                </ul>
                <div class="tabs-content7">
                    <?php foreach ($fornecedores as $codigo => $nome) { ?>
                        <div id="<?= $codigo ?>" class="tabs-panel7">
                            <h3><?= $nome ?></h3>

                            <div class="table-style">
                                <table class="table-list2">
                                    <tr class="sticky">
                                        <th>Ranking</th>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Meta</th>
                                        <th>Pontos</th>
                                        <th>% Meta</th>
                                        <th>Prêmio</th>
                                    </tr>
                                    <?php

                                    $SQL = "select u.cd_codigo, u.ds_usuario, mi.vl_metam, mi.cd_fornecedor  from usuarios u inner join meta_individual mi on mi.cd_codigo = u.cd_codigo where u.cd_perfil = '3' and u.cd_ativo = '1' and mi.cd_fornecedor = '$codigo' order by u.cd_codigo asc ";
                                    // echo $SQL;
                                    $RSS = mysql_query($SQL, $conexao);

                                    $vendedores = [];
                                    $totalMetaFornecedor = 0;
                                    $totalVendasFornecedor = 0;

                                    while ($RS = mysql_fetch_array($RSS)) {

                                        // echo $RS['cd_codigo'] . '<br>';

                                        $cd_codigo = $RS['cd_codigo'];
                                        $cd_fornecedor = $RS['cd_fornecedor'];
                                        $pontuacao_panetone = 0; 
                                        
                                        if ($cd_fornecedor == 'F00003') {
                                            $SQL3 = "select sum(pontuacao_panetone) as pontuacao_panetone from usuarios where cd_supervisor  = '$cd_codigo'";
                                            $RSS3 = mysql_query($SQL3, $conexao);
                                            $RS3 = mysql_fetch_array($RSS3);
                                            $pontuacao_panetone = $RS3['pontuacao_panetone'];
                                            // echo $pontuacao_panetone . '<br>';
                                            // echo $SQL3;
                                        }

                                        $vendedores[$cd_codigo] = [
                                            'codigo' => $cd_codigo,
                                            'usuario' => $RS['ds_usuario'],
                                            'meta' => $RS['vl_metam'],
                                            'pontuacao_panetone' => $pontuacao_panetone,
                                            'vendas' => 0,
                                            'porcentagem' => 0
                                        ];

                                        if (!($cd_codigo == '8020' && in_array($codigo, ['F00004', 'F00005']))) {
                                            $totalMetaFornecedor += $RS['vl_metam'];
                                        }

                                        // Esses pontos são atualizados pela rotina "cron_server.php"
                                        $SQL2 = " SELECT   cd_codigo,  ds_usuario,  cd_fornecedor,  vl_metam,  (pts + COALESCE(pontos_aceleradores, 0)) AS pts,  (((pts + COALESCE(pontos_aceleradores, 0)) / vl_metam) * 100) AS perce FROM ( SELECT  u.cd_codigo,  u.ds_usuario,  m.cd_fornecedor,  m.vl_metam,  SUM(p.cd_pontos) AS pts, ((SUM(p.cd_pontos) * 100) / m.vl_metam) AS perce, ( SELECT SUM(pa.cd_pontos)  FROM pontuacao_aceleradores pa  WHERE  CASE  WHEN pa.cd_supervisor IN ('0338','0236') THEN '0236' ELSE pa.cd_supervisor END =  CASE  WHEN u.cd_codigo IN ('0338','0236') THEN '0236' ELSE u.cd_codigo END AND p.cd_fornecedor = pa.cd_fornecedor ) AS pontos_aceleradores FROM  usuarios AS u JOIN meta_individual AS m ON u.cd_codigo = m.cd_codigo JOIN pontuacao_new AS p ON  CASE  WHEN p.cd_supervisor IN ('0338','0236') THEN '0236' ELSE p.cd_supervisor END =  CASE  WHEN u.cd_codigo IN ('0338','0236') THEN '0236' ELSE u.cd_codigo END AND m.cd_fornecedor = p.cd_fornecedor WHERE  p.cd_fornecedor = '$codigo' AND u.cd_perfil = 3 AND u.cd_ativo = 1 AND ( CASE  WHEN u.cd_codigo IN ('0338','0236') THEN '0236' ELSE u.cd_codigo END =  CASE  WHEN '$cd_codigo' IN ('0338','0236') THEN '0236' ELSE '$cd_codigo' END ) GROUP BY  u.cd_codigo,  u.ds_usuario,  m.vl_metam,  m.cd_fornecedor ORDER BY perce DESC ) t1 ORDER BY perce DESC ";
                                        // echo $SQL2;
                                        $RSS2 = mysql_query($SQL2, $conexao);

                                        while ($RS2 = mysql_fetch_array($RSS2)) {
                                            $pontos = $RS2['pts'];
                                            $vendedores[$cd_codigo]['vendas'] = $pontos;
                                            
                                            // Acumula as vendas totais (antes do ajuste panetone, se for o caso, ou depois)
                                            // Nota: A soma aqui pode duplicar se o while rodar mais de uma vez para o mesmo vendedor (o que não deve acontecer pelo group by)
                                            // Melhor somar no final
                                        }
                                    }

                                    if ($codigo == 'F00003') {
                                        foreach ($vendedores as &$info) {
                                            $info['vendas'] += $info['pontuacao_panetone'];
                                        }
                                        unset($info);
                                    }
                                    
                                    $totalVendasFornecedor = 0;
                                    foreach($vendedores as $vend){
                                        if ($vend['codigo'] == '8020' && in_array($codigo, ['F00004', 'F00005'])) {
                                            continue;
                                        }
                                        
                                        $totalVendasFornecedor += $vend['vendas'];
                                    }

                                    // Ordena os vendedores
                                    uasort($vendedores, 'comparar_porcentagem');

                                    $x = 0;

                                    foreach ($vendedores as $info) {
                                        if (!($info['codigo'] == '8020' && in_array($codigo, ['F00004', 'F00005']))) {
                                            $x++;
                                    ?>
                                            <tr>
                                                <td><?= $x ?>º</td>
                                                <td><?= $info['codigo'] ?></td>
                                                <td><?= $info['usuario'] ?></td>
                                                <td><?= number_format($info['meta']) ?></td>
                                                <td><?= number_format($info['vendas'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <div class="progress progress-md progress-half-rounded m-md">
                                                        <div class="progress-bar progress-bar-success"
                                                            style="width: <?= $info['vendas'] / $info['meta'] * 100 ?>%;">
                                                            <?= number_format($info['vendas'] / $info['meta'] * 100, 1, ',', '.') ?>%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>R$ <?= isset($premios[$codigo][$x - 1]) ? $premios[$codigo][$x - 1] : 0 ?></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                    
                                    <tr style="background-color: #e3f2fd; font-weight: bold;">
                                        <td colspan="3" style="text-align: right;">TOTAIS:</td>
                                        <td><?= number_format($totalMetaFornecedor) ?></td>
                                        <td><?= number_format($totalVendasFornecedor, 0, ',', '.') ?></td>
                                        <td>
                                            <?php 
                                            $porcentagemTotal = ($totalMetaFornecedor > 0) ? ($totalVendasFornecedor / $totalMetaFornecedor) * 100 : 0;
                                            ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="7">
                                            <div class="progress progress-md progress-half-rounded m-md" style="margin-bottom:3px;">
                                                <div class="progress-bar progress-bar-success" style="width: <?= $porcentagemTotal ?>%;">
                                                    <b class="textbarra">Realizado: <?= number_format($porcentagemTotal, 1, ',', '.') ?>%</b>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="7">
                                            <div class="progress progress-md progress-half-rounded m-md" style="margin-bottom:3px;">
                                                <div class="progress-bar progress-bar-primary" style="width: <?= $dias_realGeral ?>%;">
                                                    <b class="textbarra">Período: <?= round($dias_realGeral) ?>%</b>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
            // garante que exista apenas um handler
            const tabs = Array.from(document.querySelectorAll(".tabs-panel7"));
            const links = Array.from(document.querySelectorAll(".tabs7 li a"));

            if (tabs.length === 0 || links.length === 0) return;

            function hideAll() {
                tabs.forEach(t => {
                    t.classList.remove("show");
                    setTimeout(() => {
                        if (!t.classList.contains("show")) t.style.display = "none";
                    }, 0);
                });
                links.forEach(l => l.classList.remove("active"));
            }

            function showPanel(id, linkEl) {
                const panel = document.getElementById(id);
                if (!panel) return;
                panel.style.display = "block";
                void panel.offsetWidth;
                panel.classList.add("show");
                if (linkEl) linkEl.classList.add("active");
            }

            hideAll();
            const firstLink = links[0];
            const firstId = firstLink.getAttribute("href").replace("#", "");
            showPanel(firstId, firstLink);

            links.forEach(link => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute("href").replace("#", "");
                    if (!targetId) return;

                    if (this.classList.contains("active")) return;

                    hideAll();
                    showPanel(targetId, this);

                    if (history && history.replaceState) {
                        history.replaceState(null, null, "#" + targetId);
                    }
                });
            });

            const urlHash = window.location.hash.replace("#", "");
            if (urlHash) {
                const hashLink = links.find(l => l.getAttribute("href").replace("#", "") === urlHash);
                if (hashLink) {
                    hideAll();
                    showPanel(urlHash, hashLink);
                }
            }
        });
    </script>

</body>

</html>