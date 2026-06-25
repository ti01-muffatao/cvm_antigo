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
    <?php include "loading.php" ?>
    <?php include "menu.php"; ?>

    <?php 
    
    $premios = [
        1 => 'Viagem',
        2 => 'Viagem',
        3 => 'Viagem',
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
                <h3>Parciais Supervisores Moral em Casa</h3>
                <!-- Abas com os grupos -->
                <div class="tabs-content7">
                    <div id="<?= $codigo ?>" class="tabs-panel7">
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

                            $SQL = "select u.cd_codigo, u.ds_usuario, sum(mi.vl_metam) vl_metam, mi.cd_fornecedor  from usuarios u inner join meta_individual mi on mi.cd_codigo = u.cd_codigo where u.cd_perfil = '3' and u.cd_ativo = '1' group by cd_codigo order by u.cd_codigo asc";
                            // echo $SQL;
                            $RSS = mysql_query($SQL, $conexao);

                            $vendedores = [];

                            while($RS = mysql_fetch_array($RSS)){

                                $cd_codigo = $RS['cd_codigo'];
                                $cd_fornecedor = $RS['cd_fornecedor'];

                                $vendedores[$cd_codigo] = [
                                    'codigo' => $cd_codigo,
                                    'usuario' => $RS['ds_usuario'],
                                    'meta' => $RS['vl_metam'],
                                    'vendas' => [],
                                    'porcentagem' => 0
                                ];

                                // Esses pontos são atualizados pela rotina "cron_server.php"
                                $SQL2 = " SELECT  cd_codigo,  ds_usuario,  cd_fornecedor,  vl_metam, SUM(pts + COALESCE(pontos_aceleradores, 0)) AS pts, SUM((((pts + COALESCE(pontos_aceleradores, 0)) / vl_metam) * 100)) AS perce FROM ( SELECT  u.cd_codigo,  u.ds_usuario,  m.cd_fornecedor,  m.vl_metam,  SUM(p.cd_pontos) AS pts, ((SUM(p.cd_pontos) * 100) / m.vl_metam) AS perce, ( SELECT SUM(pa.cd_pontos)  FROM pontuacao_aceleradores pa  WHERE  CASE  WHEN pa.cd_supervisor IN ('0338','0236') THEN '0236' ELSE pa.cd_supervisor END =  CASE  WHEN u.cd_codigo IN ('0338','0236') THEN '0236' ELSE u.cd_codigo END AND p.cd_fornecedor = pa.cd_fornecedor ) AS pontos_aceleradores FROM usuarios AS u JOIN meta_individual AS m ON u.cd_codigo = m.cd_codigo JOIN pontuacao_new AS p ON  CASE  WHEN p.cd_supervisor IN ('0338','0236') THEN '0236' ELSE p.cd_supervisor END =  CASE  WHEN u.cd_codigo IN ('0338','0236') THEN '0236' ELSE u.cd_codigo END AND m.cd_fornecedor = p.cd_fornecedor WHERE  u.cd_perfil = 3 AND u.cd_ativo = 1 AND ( CASE  WHEN u.cd_codigo IN ('0338','0236') THEN '0236' ELSE u.cd_codigo END =  CASE  WHEN '$cd_codigo' IN ('0338','0236') THEN '0236' ELSE '$cd_codigo' END ) GROUP BY  u.cd_codigo,  u.ds_usuario,  m.cd_fornecedor ORDER BY perce DESC ) t1 ORDER BY perce DESC ";
                                $RSS2 = mysql_query($SQL2, $conexao);
                                
                                while ($RS2 = mysql_fetch_array($RSS2)) {
                                    $pontos = $RS2['pts'] + $RS2['pontos_aceleradores'];

                                    $vendedores[$cd_codigo]['vendas'] = $pontos;

                                    $porcentagem = $pontos / $vendedores[$cd_codigo]['meta'] * 100;

                                    $vendedores[$cd_codigo]['porcentagem'] += $porcentagem;
                                }

                            }

                            // Ordena os vendedores
                            function comparar_porcentagem($a, $b) {
                                if ($a['porcentagem'] == $b['porcentagem']) {
                                    return 0;
                                }
                                return ($a['porcentagem'] > $b['porcentagem']) ? -1 : 1;
                            }
                            
                            // Ordena os vendedores
                            uasort($vendedores, 'comparar_porcentagem');

                            $x = 0;

                            foreach($vendedores as $info) {
                            
                            $x++;
   
                            ?>
                                <tr>
                                    <td><?= $x ?>º</td>
                                    <td><?= $info['codigo'] ?></td>
                                    <td><?= $info['usuario'] ?></td>
                                    <td><?= number_format($info['meta'],2,',','.') ?></td>
                                    <td><?= number_format($info['vendas'], 0, ',', '.'); ?></td>
                                    <td><?= number_format($info['porcentagem'], 2, ',', '.'); ?> % </td>
                                    <td><?= $premios[$x] ?></td>
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