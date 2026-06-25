<?php include "administrar/ora_connect.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
    echo "<script language='javascript'>window.open('sair.php', '_self');</script>";
}

// ini_set('display_errors', 1); 
// ini_set('display_startup_errors', 1); 
// error_reporting(E_ALL);

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
        .table-list2 td {
            border: 1px solid gray;
        }
    </style>
</head>

<body style="margin-top:-25px;">
    <?php // include "loading.php" ?>
    <?php include "menu.php"; ?>

    <div class="clearfix"></div>
    <div class="section_holdergrupos">
        <div class="container">
            <div class="one_full">

                <?php
                $metas = [
                    'F00001' => [
                        '9001' => [
                            'Novembro' => 400000,
                            'Dezembro' => 350000,
                            'Janeiro' => 400000,
                            'Fevereiro' => 350000,
                        ],
                        '9002' => [
                            'Novembro' => 400000,
                            'Dezembro' => 350000,
                            'Janeiro' => 400000,
                            'Fevereiro' => 350000,
                        ],
                        '9004' => [
                            'Novembro' => 90000,
                            'Dezembro' => 90000,
                            'Janeiro' => 110000,
                            'Fevereiro' => 110000,
                        ],
                    ],
                    'F00002' => [
                        '9001' => [
                            'Novembro' => 130000,
                            'Dezembro' => 130000,
                            'Janeiro' => 150000,
                            'Fevereiro' => 130000,
                        ],
                        '9002' => [
                            'Novembro' => 160000,
                            'Dezembro' => 180000,
                            'Janeiro' => 180000,
                            'Fevereiro' => 140000,
                        ],
                        '9004' => [
                            'Novembro' => 30000,
                            'Dezembro' => 35000,
                            'Janeiro' => 30000,
                            'Fevereiro' => 30000,
                        ],
                    ],
                    'F00003' => [
                        '9001' => [
                            'Novembro' => 550000,
                            'Dezembro' => 550000,
                            'Janeiro' => 450000,
                            'Fevereiro' => 450000,
                        ],
                        '9002' => [
                            'Novembro' => 1150000,
                            'Dezembro' => 1000000,
                            'Janeiro' => 950000,
                            'Fevereiro' => 900000,
                        ],
                        '9004' => [
                            'Novembro' => 110000,
                            'Dezembro' => 120000,
                            'Janeiro' => 120000,
                            'Fevereiro' => 100000,
                        ],
                    ],
                    'F00004' => [
                        '9001' => [
                            'Novembro' => 2200000,
                            'Dezembro' => 1950000,
                            'Janeiro' => 2700000,
                            'Fevereiro' => 2200000,
                        ],
                        '9002' => [
                            'Novembro' => 2200000,
                            'Dezembro' => 2450000,
                            'Janeiro' => 2250000,
                            'Fevereiro' => 2500000,
                        ],
                        '9004' => [
                            'Novembro' => 0,
                            'Dezembro' => 0,
                            'Janeiro' => 0,
                            'Fevereiro' => 0,
                        ],
                    ],
                    'F00005' => [
                        '9001' => [
                            'Novembro' => 1300000,
                            'Dezembro' => 1350000,
                            'Janeiro' => 2150000,
                            'Fevereiro' => 1500000,
                        ],
                        '9002' => [
                            'Novembro' => 2950000,
                            'Dezembro' => 2000000,
                            'Janeiro' => 2800000,
                            'Fevereiro' => 2250000,
                        ],
                        '9004' => [
                            'Novembro' => 0,
                            'Dezembro' => 0,
                            'Janeiro' => 0,
                            'Fevereiro' => 0,
                        ],
                    ],
                    'F00077' => [
                        '9001' => [
                            'Novembro' => 330000,
                            'Dezembro' => 290000,
                            'Janeiro' => 350000,
                            'Fevereiro' => 300000,
                        ],
                        '9002' => [
                            'Novembro' => 370000,
                            'Dezembro' => 320000,
                            'Janeiro' => 330000,
                            'Fevereiro' => 400000,
                        ],
                        '9004' => [
                            'Novembro' => 100000,
                            'Dezembro' => 90000,
                            'Janeiro' => 120000,
                            'Fevereiro' => 170000,
                        ],
                    ],
                    'F00009' => [
                        '9001' => [
                            'Novembro' => 250000,
                            'Dezembro' => 300000,
                            'Janeiro' => 250000,
                            'Fevereiro' => 200000,
                        ],
                        '9002' => [
                            'Novembro' => 300000,
                            'Dezembro' => 520000,
                            'Janeiro' => 450000,
                            'Fevereiro' => 400000,
                        ],
                        '9004' => [
                            'Novembro' => 65000,
                            'Dezembro' => 70000,
                            'Janeiro' => 55000,
                            'Fevereiro' => 50000,
                        ],
                    ],
                    'F00018' => [
                        '9001' => [
                            'Novembro' => 200000,
                            'Dezembro' => 200000,
                            'Janeiro' => 250000,
                            'Fevereiro' => 200000,
                        ],
                        '9002' => [
                            'Novembro' => 350000,
                            'Dezembro' => 300000,
                            'Janeiro' => 250000,
                            'Fevereiro' => 300000,
                        ],
                        '9004' => [
                            'Novembro' => 25000,
                            'Dezembro' => 25000,
                            'Janeiro' => 45000,
                            'Fevereiro' => 45000,
                        ],
                    ],
                    'F00097' => [
                        '9001' => [
                            'Novembro' => 600000,
                            'Dezembro' => 550000,
                            'Janeiro' => 650000,
                            'Fevereiro' => 700000,
                        ],
                        '9002' => [
                            'Novembro' => 900000,
                            'Dezembro' => 850000,
                            'Janeiro' => 800000,
                            'Fevereiro' => 900000,
                        ],
                        '9004' => [
                            'Novembro' => 110000,
                            'Dezembro' => 110000,
                            'Janeiro' => 110000,
                            'Fevereiro' => 100000,
                        ],
                    ],
                    'F00010' => [
                        '9001' => [
                            'Novembro' => 750000,
                            'Dezembro' => 750000,
                            'Janeiro' => 750000,
                            'Fevereiro' => 650000,
                        ],
                        '9002' => [
                            'Novembro' => 1000000,
                            'Dezembro' => 950000,
                            'Janeiro' => 950000,
                            'Fevereiro' => 950000,
                        ],
                        '9004' => [
                            'Novembro' => 140000,
                            'Dezembro' => 200000,
                            'Janeiro' => 120000,
                            'Fevereiro' => 120000,
                        ],
                    ],
                ];

                $gerentes = [
                    '9001' => '09',
                    '9002' => '10',
                    '9004' => '09',
                ];

                $bandeiras = [
                    '9001' => "./images/bandeiras/09.png",
                    '9002' => "./images/bandeiras/10.png",
                    '9004' => "./images/bandeiras/27.png",
                    'Grupo' => "./images/bandeiras/logo-atacado.png",
                ];

                $fornecedores = [];

                $SQL = "SELECT * from clifor";
                $RSS = mysql_query($SQL, $conexao);
                while ($RS = mysql_fetch_array($RSS)) {
                    $fornecedores[$RS['cd_fornecedor']] = $RS['ds_razao'];
                }

                //totalizador de metas para todos os fornecedores dos 3 estados
                $total_metas = 0;
                foreach ($metas as $filial => $departamentos) {
                    foreach ($departamentos as $departamento => $meses) {
                        foreach ($meses as $mes => $valor) {
                            $total_metas += $valor;
                        }
                    }
                }
                //echo "O total das metas é: R$ " . number_format($total_metas, 2, ',', '.');
                ?>

                <h3>Acompanhamento Venda CVM</h3>
                <!-- Abas com os grupos -->
                <ul class="tabs7">
                    <?php 
                    // Itera pelos fornecedores ordenados
                    foreach ($fornecedores as $codigo_forn => $nome_forn) { ?>
                        <li class="<?= $activeClass ?>"><a href="?codigo_forn=<?= $codigo_forn ?>"><?= $nome_forn ?></a></li>
                    <?php } ?>
                    <li><a href="?codigo_forn=TOTAL">TOTAL</a></li>
                </ul>

                <div class="tabs-content7">
                    <?php if(isset($_GET['codigo_forn']) && $_GET['codigo_forn'] != 'TOTAL'){

                        $codigo_forn = $_GET['codigo_forn'];

                        // Busca o nome do fornecedor correspondente
                        $nome_forn_selecionado = isset($fornecedores[$codigo_forn]) ? $fornecedores[$codigo_forn] : 'Fornecedor não encontrado';

                        $venda_grupo = 0;
                        $venda_ano_anterior_grupo = 0;
                        $meta_grupo = 0;
                        $realXmeta_grupo = 0;
                        $realXAnoAnterior_grupo = 0;

                        $venda_total_geral = 0;
                        
                        ?>
                        <div id="<?= $codigo_forn ?>" class="tabs-panel7">
                            <br><br>
                            <!-- Paulo: 09/01/2025 -->
                            <h3><?= $nome_forn_selecionado ?> - <?= $codigo_forn ?></h3>
                            <?php foreach ($gerentes as $gerente => $filial) {

                                $venda = [];
                                $venda_ano_anterior = [];

                                if (in_array($codigo_forn, ['F00004', 'F00005']) && $gerente == '9004') {
                                    $venda = [
                                        '11' => 0,
                                        '12' => 0,
                                        '01' => 0,
                                        '02' => 0
                                    ];
                                    $venda_ano_anterior = [
                                        '11' => 0,
                                        '12' => 0,
                                        '01' => 0,
                                        '02' => 0
                                    ];
                                } else {
                                    
                                    $data_min_atual = '20251101';
                                    $data_max_atual = '20260228';

                                    $SQL = "SELECT SUM(VALOR) AS VENDALIQUIDA, MES_ANO FROM (
                                        
                                        SELECT SUM(D2.D2_VALBRUT) AS VALOR, TO_CHAR(TO_DATE(D2.D2_EMISSAO, 'YYYYMMDD'), 'MM') AS MES_ANO
                                        FROM SIGA.SA3010 a3, SIGA.SF2010 f2, SIGA.SD2010 D2
                                        WHERE D2.D2_FILIAL = '$filial'
                                        AND F2.F2_X_TABEL <> '501'
                                        AND D2.D2_EMISSAO >= '$data_min_atual' AND D2.D2_EMISSAO <= '$data_max_atual'
                                        AND D2.D2_TIPO = 'N'
                                        AND D2.D_E_L_E_T_ <> '*'
                                        AND D2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D2.D2_FILIAL AND A5_FORNECE='$codigo_forn' AND D_E_L_E_T_=' ')
                                        AND a3.A3_GEREN = '$gerente'
                                        AND F2.F2_FILIAL = D2.D2_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE 
                                        AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA
                                        AND F2.F2_EMPDEST = ' '
                                        AND F2.D_E_L_E_T_ <> '*'
                                        AND A3.A3_FILIAL = F2.F2_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND A3.D_E_L_E_T_ <> '*'
                                        AND F2.F2_DUPL <> '        '
                                        AND A3.A3_SUPER <> ' ' AND A3.A3_SUPER NOT IN ('9001','5001')
                                        GROUP BY TO_CHAR(TO_DATE(D2.D2_EMISSAO, 'YYYYMMDD'), 'MM')

                                        UNION ALL

                                        SELECT SUM(D1.D1_TOTAL * -1) AS VALOR, TO_CHAR(TO_DATE(D1.D1_EMISSAO, 'YYYYMMDD'), 'MM') AS MES_ANO
                                        FROM SIGA.SD1010 D1, SIGA.SF2010 f2, SIGA.SA3010 a3
                                        WHERE f2.F2_FILIAL = '$filial'
                                        AND f2.F2_FILIAL = a3.A3_FILIAL AND f2.F2_FILIAL = D1.D1_FILIAL
                                        AND D1.D1_EMISSAO >= '$data_min_atual' AND D1.D1_EMISSAO <= '$data_max_atual'
                                        AND D1.D1_TIPO = 'D' AND D1.D1_NFORI <> ' ' AND D1.D1_SERIORI <> ' '
                                        AND f2.F2_VEND1 <> '000001'
                                        AND D1.D_E_L_E_T_ = ' ' AND f2.D_E_L_E_T_ = ' ' AND a3.D_E_L_E_T_ = ' '
                                        AND f2.F2_VEND1 = a3.A3_COD
                                        AND f2.F2_DOC = D1.D1_NFORI AND f2.F2_SERIE = D1.D1_SERIORI
                                        AND f2.F2_DUPL <> '        '
                                        AND D1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D1.D1_FILIAL AND A5_FORNECE='$codigo_forn' AND D_E_L_E_T_=' ')
                                        AND a3.A3_GEREN = '$gerente'
                                        GROUP BY TO_CHAR(TO_DATE(D1.D1_EMISSAO, 'YYYYMMDD'), 'MM')
                                    ) GROUP BY MES_ANO";

                                    $RSSV = oci_parse($oraconnect, $SQL);
                                    oci_execute($RSSV, OCI_DEFAULT);
                                    while ($RSV = oci_fetch_assoc($RSSV)) {
                                        $venda[$RSV['MES_ANO']] = $RSV['VENDALIQUIDA'];
                                    }

                                    $data_min_ant = '20241101';
                                    $data_max_ant = '20250228';

                                    $SQL = "SELECT SUM(VALOR) AS VENDALIQUIDA, MES_ANO FROM (
                                        
                                        SELECT SUM(D2.D2_VALBRUT) AS VALOR, TO_CHAR(TO_DATE(D2.D2_EMISSAO, 'YYYYMMDD'), 'MM') AS MES_ANO
                                        FROM SIGA.SA3010 a3, SIGA.SF2010 f2, SIGA.SD2010 D2
                                        WHERE D2.D2_FILIAL = '$filial'
                                        AND F2.F2_X_TABEL <> '501'
                                        AND D2.D2_EMISSAO >= '$data_min_ant' AND D2.D2_EMISSAO <= '$data_max_ant'
                                        AND D2.D2_TIPO = 'N'
                                        AND D2.D_E_L_E_T_ <> '*'
                                        AND D2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D2.D2_FILIAL AND A5_FORNECE='$codigo_forn' AND D_E_L_E_T_=' ')
                                        AND a3.A3_GEREN = '$gerente'
                                        AND F2.F2_FILIAL = D2.D2_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE 
                                        AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA
                                        AND F2.F2_EMPDEST = ' '
                                        AND F2.D_E_L_E_T_ <> '*'
                                        AND A3.A3_FILIAL = F2.F2_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND A3.D_E_L_E_T_ <> '*'
                                        AND F2.F2_DUPL <> '        '
                                        AND A3.A3_SUPER <> ' ' AND A3.A3_SUPER NOT IN ('9001','5001')
                                        GROUP BY TO_CHAR(TO_DATE(D2.D2_EMISSAO, 'YYYYMMDD'), 'MM')

                                        UNION ALL

                                        SELECT SUM(D1.D1_TOTAL * -1) AS VALOR, TO_CHAR(TO_DATE(D1.D1_EMISSAO, 'YYYYMMDD'), 'MM') AS MES_ANO
                                        FROM SIGA.SD1010 D1, SIGA.SF2010 f2, SIGA.SA3010 a3
                                        WHERE f2.F2_FILIAL = '$filial'
                                        AND f2.F2_FILIAL = a3.A3_FILIAL AND f2.F2_FILIAL = D1.D1_FILIAL
                                        AND D1.D1_EMISSAO >= '$data_min_ant' AND D1.D1_EMISSAO <= '$data_max_ant'
                                        AND D1.D1_TIPO = 'D' AND D1.D1_NFORI <> ' ' AND D1.D1_SERIORI <> ' '
                                        AND f2.F2_VEND1 <> '000001'
                                        AND D1.D_E_L_E_T_ = ' ' AND f2.D_E_L_E_T_ = ' ' AND a3.D_E_L_E_T_ = ' '
                                        AND f2.F2_VEND1 = a3.A3_COD
                                        AND f2.F2_DOC = D1.D1_NFORI AND f2.F2_SERIE = D1.D1_SERIORI
                                        AND f2.F2_DUPL <> '        '
                                        AND D1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D1.D1_FILIAL AND A5_FORNECE='$codigo_forn' AND D_E_L_E_T_=' ')
                                        AND a3.A3_GEREN = '$gerente'
                                        GROUP BY TO_CHAR(TO_DATE(D1.D1_EMISSAO, 'YYYYMMDD'), 'MM')
                                    ) GROUP BY MES_ANO";

                                    $RSSV = oci_parse($oraconnect, $SQL);
                                    // echo $SQL;
                                    oci_execute($RSSV, OCI_DEFAULT);
                                    while ($RSV = oci_fetch_assoc($RSSV)) {
                                        $venda_ano_anterior[$RSV['MES_ANO']] = $RSV['VENDALIQUIDA'];
                                    }
                                    
                                    $meses = ['11','12','01','02'];
                                    foreach($meses as $m) {
                                        if(!isset($venda[$m])) $venda[$m] = 0;
                                        if(!isset($venda_ano_anterior[$m])) $venda_ano_anterior[$m] = 0;
                                    }
                                }
                                ?>

                                <img style="margin-top: 50px" width="100px" height="70px" src="<?= $bandeiras[$gerente] ?>">
                                <br>

                                <table class="table-list2">
                                    <tr class="sticky">
                                        <th colspan="2" rowspan="2" style="background-color: white"></th>
                                        <th rowspan="2"><?= $campanha - 1 ?>ª - Resultado</th>
                                        <th rowspan="2"><?= $campanha ?>ª - Meta</th>
                                        <th colspan="3"><?= $campanha ?>ª - Resultado</th>
                                    </tr>
                                    <tr>
                                        <th>Realizado</th>
                                        <th>REAL X META</th>
                                        <th>REAL X <?= $campanha - 1 ?>ª</th>
                                    </tr>
                                    <?php
                                    $realXMeta = ($metas[$codigo_forn][$gerente]['Novembro'] > 0) ? ($venda['11'] / $metas[$codigo_forn][$gerente]['Novembro']) * 100 : 0; 
                                    $realXAnoAnterior = ($venda_ano_anterior['11'] > 0) ? ($venda['11'] / $venda_ano_anterior['11'] - 1) * 100 : 0;
                                    ?>
                                    <tr>
                                        <td rowspan="4"> <?= $campanha - 1 ?>ª</td>
                                        <td>Novembro</td>
                                        <td>R$ <?= number_format($venda_ano_anterior['11'], 2, ',', '.') ?></td>

                                        <td>R$ <?= number_format($metas[$codigo_forn][$gerente]['Novembro'],2,',','.') ?></td>

                                        <td>R$ <?= number_format($venda['11'], 2, ',', '.') ?></td>
                                        <td style="background-color: <?= $realXMeta > 100 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXMeta, 2, ',', '.') ?>%</td>
                                        <td style="background-color: <?= $realXAnoAnterior > 0 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXAnoAnterior, 2, ',', '.') ?>%</td>
                                    </tr>
                                    <?php
                                    $realXMeta = ($metas[$codigo_forn][$gerente]['Dezembro'] > 0) ? ($venda['12'] / $metas[$codigo_forn][$gerente]['Dezembro']) * 100 : 0; 
                                    $realXAnoAnterior = ($venda_ano_anterior['12'] > 0) ? ($venda['12'] / $venda_ano_anterior['12'] - 1) * 100 : 0;
                                    ?>
                                    <tr>
                                        <td>Dezembro</td>
                                        <td>R$ <?= number_format($venda_ano_anterior['12'], 2, ',', '.') ?></td>
                                        <td>R$ <?= number_format($metas[$codigo_forn][$gerente]['Dezembro'],2,',','.') ?></td>
                                        <td>R$ <?= number_format($venda['12'], 2, ',', '.') ?></td>
                                        <td style="background-color: <?= $realXMeta > 100 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXMeta, 2, ',', '.') ?>%</td>
                                        <td style="background-color: <?= $realXAnoAnterior > 0 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXAnoAnterior, 2, ',', '.') ?>%</td>
                                    </tr>
                                    <?php
                                    $realXMeta = ($metas[$codigo_forn][$gerente]['Janeiro'] > 0) ? ($venda['01'] / $metas[$codigo_forn][$gerente]['Janeiro']) * 100 : 0;
                                    $realXAnoAnterior = ($venda_ano_anterior['01'] > 0) ? ($venda['01'] / $venda_ano_anterior['01'] - 1) * 100 : 0;
                                    ?>
                                    <tr>
                                        <td>Janeiro</td>
                                        <td>R$ <?= number_format($venda_ano_anterior['01'], 2, ',', '.') ?></td>
                                        <td>R$ <?= number_format($metas[$codigo_forn][$gerente]['Janeiro'],2,',','.') ?></td>
                                        <td>R$ <?= number_format($venda['01'], 2, ',', '.') ?></td>
                                        <td style="background-color: <?= $realXMeta > 100 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXMeta, 2, ',', '.') ?>%</td>
                                        <td style="background-color: <?= $realXAnoAnterior > 0 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXAnoAnterior, 2, ',', '.') ?>%</td>
                                    </tr>
                                    <?php
                                    $realXMeta = ($metas[$codigo_forn][$gerente]['Fevereiro'] > 0) ? ($venda['02'] / $metas[$codigo_forn][$gerente]['Fevereiro']) * 100 : 0; 
                                    $realXAnoAnterior = ($venda_ano_anterior['02'] > 0) ? ($venda['02'] / $venda_ano_anterior['02'] - 1) * 100 : 0;
                                    ?>
                                    <tr>
                                        <td>Fevereiro</td>
                                        <td>R$ <?= number_format($venda_ano_anterior['02'], 2, ',', '.') ?></td>
                                        <td>R$ <?= number_format($metas[$codigo_forn][$gerente]['Fevereiro'],2,',','.') ?></td>
                                        <td>R$ <?= number_format($venda['02'], 2, ',', '.') ?></td>
                                        <td style="background-color: <?= $realXMeta > 100 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXMeta, 2, ',', '.') ?>%</td>
                                        <td style="background-color: <?= $realXAnoAnterior > 0 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXAnoAnterior, 2, ',', '.') ?>%</td>
                                    </tr>
                                    <?php 
                                    $venda_gerente = $venda['11'] + $venda['12'] + $venda['01'] + $venda['02'];
                                    $meta_gerente = $metas[$codigo_forn][$gerente]['Novembro'] + $metas[$codigo_forn][$gerente]['Dezembro'] + $metas[$codigo_forn][$gerente]['Janeiro'] + $metas[$codigo_forn][$gerente]['Fevereiro'];
                                    $venda_ano_anterior_gerente = $venda_ano_anterior['11'] + $venda_ano_anterior['12'] + $venda_ano_anterior['01'] + $venda_ano_anterior['02'];
                                    
                                    $realXMeta_gerente = ($meta_gerente > 0) ? $venda_gerente / $meta_gerente * 100 : 0;
                                    $realXAnoAnterior_gerente = ($venda_ano_anterior_gerente > 0) ? ($venda_gerente / $venda_ano_anterior_gerente - 1) * 100 : 0;
                                    ?>
                                    <tr>
                                        <td colspan="2" style="border: 0"></td>
                                        <td>R$ <?= number_format($venda_ano_anterior_gerente,2,',','.') ?></td>
                                        <td>R$ <?= number_format($meta_gerente,2,',','.') ?></td>
                                        <td>R$ <?= number_format($venda_gerente,2,',','.') ?></td>
                                        <td style="background-color: <?= $realXMeta_gerente > 100 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXMeta_gerente,2,',','.') ?>%</td>
                                        <td style="background-color: <?= $realXAnoAnterior_gerente > 0 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXAnoAnterior_gerente,2,',','.') ?>%</td>
                                    </tr>
                                </table>

                            <?php 
                        
                            $venda_grupo += $venda_gerente;
                            $venda_ano_anterior_grupo += $venda_ano_anterior_gerente;
                            $meta_grupo += $meta_gerente ;
                            $realXmeta_grupo = ($meta_grupo > 0) ? $venda_grupo / $meta_grupo * 100 : 0;
                            $realXAnoAnterior_grupo = ($venda_ano_anterior_grupo > 0) ? ($venda_grupo / $venda_ano_anterior_grupo - 1) * 100 : 0;
                            
                            } ?>
                            <img style="margin: 50px 0px" width="100px" height="70px" src="<?= $bandeiras['Grupo'] ?>">
                            <table class="table-list2">
                                <tr class="sticky">
                                    <th colspan="2" rowspan="2" style="background-color: white"></th>
                                    <th rowspan="2"><?= $campanha - 1 ?>ª</th>
                                    <th style="background-color: white"></th>
                                    <th colspan="2" rowspan="2" style="background-color: white"></th>
                                    <th rowspan="2"><?= $campanha ?>ª</th>
                                    <th style="background-color: white"></th>
                                    <th colspan="2" style="background-color: white"></th>
                                    <th colspan="3"><?= $campanha ?>ª</th>
                                </tr>
                                <tr>
                                    <th style="background-color: white"></th>
                                    <th style="background-color: white"></th>
                                    <th colspan="2" style="background-color: white"></th>
                                    <th>Realizado</th>
                                    <th>REAL X META</th>
                                    <th>REAL X <?= $campanha - 1 ?>ª</th>
                                </tr>
                                <tr>
                                    <td colspan="2"><?= $campanha - 1 ?>ª</td>
                                    <td>R$ <?= number_format($venda_ano_anterior_grupo,2,',','.') ?></td>
                                    <td style="border: 0px;"></td>
                                    <td colspan="2"><?= $campanha ?>ª</td>
                                    <td>R$ <?= number_format($meta_grupo,2,',','.') ?></td>
                                    <td style="border: 0px;"></td>
                                    <td colspan="2"><?= $campanha ?>ª</td>
                                    <td>R$ <?= number_format($venda_grupo,2,',','.') ?></td>
                                    <td style="background-color: <?= $realXmeta_grupo > 100 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXmeta_grupo,2,',','.') ?>%</td>
                                    <td style="background-color: <?= $realXAnoAnterior_grupo > 0 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXAnoAnterior_grupo,2,',','.') ?>%</td>
                                </tr>
                            </table>
                        </div>
                    <?php } elseif($_GET['codigo_forn'] == 'TOTAL') { 
                        
                        $data_min_atual = '20251101';
                        $data_max_atual = '20260228';
                        $data_min_ant = '20241101';
                        $data_max_ant = '20250228';

                        // --- CONSULTA DE VENDA ATUAL ---
                        $SQL = "SELECT SUM(VALOR) AS VENDALIQUIDA FROM (
                            SELECT SUM(D2.D2_VALBRUT) AS VALOR
                            FROM SIGA.SA3010 a3, SIGA.SF2010 f2, SIGA.SD2010 D2
                            WHERE D2.D2_FILIAL IN ('09','10')
                            AND F2.F2_X_TABEL <> '501'
                            AND D2.D2_EMISSAO >= '$data_min_atual' AND D2.D2_EMISSAO <= '$data_max_atual'
                            AND D2.D2_TIPO = 'N'
                            AND D2.D_E_L_E_T_ <> '*'
                            AND D2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D2.D2_FILIAL AND A5_FORNECE IN ('F00001', 'F00002', 'F00003', 'F00004', 'F00005', 'F00077', 'F00009', 'F00018', 'F00097', 'F00010' ) AND D_E_L_E_T_=' ')
                            AND a3.A3_GEREN IN ('9001', '9002', '9004')
                            AND F2.F2_FILIAL = D2.D2_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE 
                            AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA
                            AND F2.F2_EMPDEST = ' '
                            AND F2.D_E_L_E_T_ <> '*'
                            AND A3.A3_FILIAL = F2.F2_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND A3.D_E_L_E_T_ <> '*'
                            AND F2.F2_DUPL <> '        '
                            AND A3.A3_SUPER <> ' ' AND A3.A3_SUPER NOT IN ('9001','5001')
                            AND NOT (a3.A3_GEREN = '9004' AND D2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D2.D2_FILIAL AND A5_FORNECE IN ('F00004', 'F00005') AND D_E_L_E_T_=' '))

                            UNION ALL

                            SELECT SUM(D1.D1_TOTAL * -1) AS VALOR
                            FROM SIGA.SD1010 D1, SIGA.SF2010 f2, SIGA.SA3010 a3
                            WHERE f2.F2_FILIAL IN ('09','10')
                            AND f2.F2_FILIAL = a3.A3_FILIAL AND f2.F2_FILIAL = D1.D1_FILIAL
                            AND D1.D1_EMISSAO >= '$data_min_atual' AND D1.D1_EMISSAO <= '$data_max_atual'
                            AND D1.D1_TIPO = 'D' AND D1.D1_NFORI <> ' ' AND D1.D1_SERIORI <> ' '
                            AND f2.F2_VEND1 <> '000001'
                            AND D1.D_E_L_E_T_ = ' ' AND f2.D_E_L_E_T_ = ' ' AND a3.D_E_L_E_T_ = ' '
                            AND f2.F2_VEND1 = a3.A3_COD
                            AND f2.F2_DOC = D1.D1_NFORI AND f2.F2_SERIE = D1.D1_SERIORI
                            AND f2.F2_DUPL <> '        '
                            AND D1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D1.D1_FILIAL AND A5_FORNECE IN ('F00001', 'F00002', 'F00003', 'F00004', 'F00005', 'F00077', 'F00009', 'F00018', 'F00097', 'F00010' ) AND D_E_L_E_T_=' ')
                            AND a3.A3_GEREN IN ('9001', '9002', '9004')
                            AND NOT (a3.A3_GEREN = '9004' AND D1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D1.D1_FILIAL AND A5_FORNECE IN ('F00004', 'F00005') AND D_E_L_E_T_=' '))
                        )";
                        $RSSVDG = oci_parse($oraconnect, $SQL);
                        oci_execute($RSSVDG, OCI_DEFAULT);
                        $row = oci_fetch_assoc($RSSVDG);
                        $venda_geral_grupo = $row['VENDALIQUIDA'];

                        // --- CONSULTA DE VENDA ANO ANTERIOR ---
                        $SQL = "SELECT SUM(VALOR) AS VENDALIQUIDA FROM (
                            SELECT SUM(D2.D2_VALBRUT) AS VALOR
                            FROM SIGA.SA3010 a3, SIGA.SF2010 f2, SIGA.SD2010 D2
                            WHERE D2.D2_FILIAL IN ('09','10')
                            AND F2.F2_X_TABEL <> '501'
                            AND D2.D2_EMISSAO >= '$data_min_ant' AND D2.D2_EMISSAO <= '$data_max_ant'
                            AND D2.D2_TIPO = 'N'
                            AND D2.D_E_L_E_T_ <> '*'
                            AND D2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D2.D2_FILIAL AND A5_FORNECE IN ('F00001', 'F00002', 'F00003', 'F00004', 'F00005', 'F00077', 'F00009', 'F00018', 'F00097', 'F00010' ) AND D_E_L_E_T_=' ')
                            AND a3.A3_GEREN IN ('9001', '9002', '9004')
                            AND F2.F2_FILIAL = D2.D2_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE 
                            AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA
                            AND F2.F2_EMPDEST = ' '
                            AND F2.D_E_L_E_T_ <> '*'
                            AND A3.A3_FILIAL = F2.F2_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND A3.D_E_L_E_T_ <> '*'
                            AND F2.F2_DUPL <> '        '
                            AND A3.A3_SUPER <> ' ' AND A3.A3_SUPER NOT IN ('9001','5001')

                            /* BLOCO ADICIONADO: Remove vendas se for Gerente 9004 E Fornecedor F00004 ou F00005 */
                            AND NOT (a3.A3_GEREN = '9004' AND D2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D2.D2_FILIAL AND A5_FORNECE IN ('F00004', 'F00005') AND D_E_L_E_T_=' '))

                            UNION ALL

                            SELECT SUM(D1.D1_TOTAL * -1) AS VALOR
                            FROM SIGA.SD1010 D1, SIGA.SF2010 f2, SIGA.SA3010 a3
                            WHERE f2.F2_FILIAL IN ('09','10')
                            AND f2.F2_FILIAL = a3.A3_FILIAL AND f2.F2_FILIAL = D1.D1_FILIAL
                            AND D1.D1_EMISSAO >= '$data_min_ant' AND D1.D1_EMISSAO <= '$data_max_ant'
                            AND D1.D1_TIPO = 'D' AND D1.D1_NFORI <> ' ' AND D1.D1_SERIORI <> ' '
                            AND f2.F2_VEND1 <> '000001'
                            AND D1.D_E_L_E_T_ = ' ' AND f2.D_E_L_E_T_ = ' ' AND a3.D_E_L_E_T_ = ' '
                            AND f2.F2_VEND1 = a3.A3_COD
                            AND f2.F2_DOC = D1.D1_NFORI AND f2.F2_SERIE = D1.D1_SERIORI
                            AND f2.F2_DUPL <> '        '
                            AND D1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D1.D1_FILIAL AND A5_FORNECE IN ('F00001', 'F00002', 'F00003', 'F00004', 'F00005', 'F00077', 'F00009', 'F00018', 'F00097', 'F00010' ) AND D_E_L_E_T_=' ')
                            AND a3.A3_GEREN IN ('9001', '9002', '9004')
                            AND NOT (a3.A3_GEREN = '9004' AND D1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D1.D1_FILIAL AND A5_FORNECE IN ('F00004', 'F00005') AND D_E_L_E_T_=' '))
                        )";
                        $RSSVDG = oci_parse($oraconnect, $SQL);
                        oci_execute($RSSVDG, OCI_DEFAULT);
                        $row = oci_fetch_assoc($RSSVDG);
                        $venda_ano_anterior_grupo_geral = $row['VENDALIQUIDA'];

                        $realXmeta_grupo = ($total_metas > 0) ? $venda_geral_grupo / $total_metas * 100 : 0;
                        $realXAnoAnterior_grupo = ($venda_ano_anterior_grupo_geral > 0) ? ($venda_geral_grupo / $venda_ano_anterior_grupo_geral - 1) * 100 : 0;
                        ?>
                            
                        <div id="Total" class="tabs-panel7">
                            <br><br>
                            <h3>TOTAL GERAL</h3>
                            <table class="table-list2">
                                <tr class="sticky">
                                    <th colspan="2" rowspan="2" style="background-color: white"></th>
                                    <th rowspan="2"><?= $campanha - 1 ?>ª</th>
                                    <th style="background-color: white"></th>
                                    <th colspan="2" rowspan="2" style="background-color: white"></th>
                                    <th rowspan="2"><?= $campanha ?>ª</th>
                                    <th style="background-color: white"></th>
                                    <th colspan="2" style="background-color: white"></th>
                                    <th colspan="3"><?= $campanha ?>ª</th>
                                </tr>
                                <tr>
                                    <th style="background-color: white"></th>
                                    <th style="background-color: white"></th>
                                    <th colspan="2" style="background-color: white"></th>
                                    <th>Realizado</th>
                                    <th>REAL X META</th>
                                    <th>REAL X <?= $campanha - 1 ?>ª</th>
                                </tr>
                                <tr>
                                    <td colspan="2"><?= $campanha - 1 ?>ª</td>
                                    <td>R$ <?= number_format($venda_ano_anterior_grupo_geral,2,',','.') ?></td>
                                    <td style="border: 0px;"></td>
                                    <td colspan="2"><?= $campanha ?>ª</td>
                                    <td>R$ <?= number_format($total_metas,2,',','.') ?></td>
                                    <td style="border: 0px;"></td>
                                    <td colspan="2"><?= $campanha ?>ª</td>
                                    <td>R$ <?= number_format($venda_geral_grupo,2,',','.') ?></td>
                                    <td style="background-color: <?= $realXmeta_grupo > 100 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXmeta_grupo,2,',','.') ?>%</td>
                                    <td style="background-color: <?= $realXAnoAnterior_grupo > 0 ? '#62d862' : '#ffacac' ?>"><?= number_format($realXAnoAnterior_grupo,2,',','.') ?>%</td>
                                </tr>
                            </table>
                        </div>
                        <?php 
                    } ?>
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