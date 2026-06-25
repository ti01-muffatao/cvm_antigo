<?php
include "administrar/ora_connect.php";
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["CD_USUARIO"] == "") {
    echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
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
    
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    <link href="js/mainmenu/sticky.css" rel="stylesheet">
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">

    <link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/stylesheets/theme-custom.css">
    <script src="http://portal.muffatao.com.br/pag/assets/vendor/modernizr/modernizr.js"></script>

    <link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="js/cubeportfolio/cubeportfolio.min.css">
    <link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />

    <style>
        .podium-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            clear: both;
            margin-top: 50px;
            margin-bottom: 50px;
            position: relative;
        }

        .podium-container {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            margin: 0 auto;
            margin-top: 40px;
            margin-bottom: 50px;
            text-align: center;
            max-width: 800px;
            font-family: 'Open Sans', sans-serif;
        }

        .podium-place {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 15px;
            position: relative;
            z-index: 1;
        }

        .podium-place img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 4px solid #fff;
            object-fit: cover;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            margin-bottom: -20px;
            z-index: 5;
            background-color: #fff;
            position: relative;
        }

        .podium-box {
            width: 180px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px 10px 0 0;
            padding-top: 25px;
            position: relative;
            z-index: 2;
        }

        .first .podium-box {
            height: 210px;
            background: linear-gradient(135deg, #FFD700 0%, #B8860B 100%);
        }

        .second .podium-box {
            height: 190px;
            background: linear-gradient(135deg, #C3C3C3 0%, #4C4C4C 100%);
        }

        .third .podium-box {
            height: 160px;
            background: linear-gradient(135deg, #F08243 0%, #673208 100%);
        }

        .first {
            order: 2;
            margin-bottom: 0;
        }
        .second {
            order: 1;
        }
        .third {
            order: 3;
        }

        .podium-name {
            font-weight: 800;
            font-size: 18px;
            margin-top: 5px;
            text-transform: uppercase;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .podium-perc {
            font-size: 20px;
            font-weight: bold;
            margin: 5px 0;
            background: rgba(0,0,0,0.1);
            padding: 2px 0;
        }

        .podium-rank {
            font-size: 50px;
            font-weight: 900;
            opacity: 0.4;
            line-height: 1;
            margin-top: auto;
            padding-bottom: 10px;
        }
    </style>
</head>

<body style="margin-top:-25px;">
    <?php include "loading.php" ?>
    <?php include "menu.php"; ?>
    <div class="container">
        <div style="display: flex; justify-content: center;">
            <img src="images/logo.png" style="width: 50%; max-width: 200px; height: auto;">
        </div>
        <div class="section_holdergrupos">
            <h3>Parciais Gerentes Mix Estrela até <?= date('d/m/Y') ?> </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="portfolio_four">
        <div class="container">
            <div class="tabs-content7">
                <div id="grupo-1" class="tabs-panel7">
                    <div class="table-style">
                        
                        <?php
                        $gerentes = [];
                        $sumPerce = [];
                        $sumVenda = [];
                        $sumMeta = [];
                        
                        $RSSG = mysql_query("select * from usuarios where cd_perfil = 2 and cd_codigo <> '9005' and cd_ativo = 1 ");
                        while ($RSG = mysql_fetch_array($RSSG)) {
                           $gerentes[] = $RSG["cd_codigo"];
                           $sumVenda[$RSG["cd_codigo"]] = 0; 
                           $sumMeta[$RSG["cd_codigo"]] = 0;
                        }
                        
                        $diasPassaramGeral = dias_passaram_geral();
                        $dias_realGeral = ($diasPassaramGeral / 79) * 100;
                        $data_min = "20251101";
                        $data_max = "20260228";

                        ob_start(); 
                        ?>
                            
                            <?php 
                            $RSS = mysql_query("select * from clifor_prata order by ds_razao asc", $conexao);
                            while ($RS = mysql_fetch_array($RSS)) { 
                                $fornecedor = $RS["cd_fornecedor"];
                            ?>
                                <tr>
                                    <td><?= $RS["cd_fornecedor"]; ?></td>
                                    <td><?= $RS["ds_razao"]; ?></td>

                                    <?php foreach ($gerentes as $gerente) {

                                        //CONSULTA META POR FORNECEDOR
                                        $SQL = "select * from metas_gerente_prata where cd_codigo = '$gerente' and cd_fornecedor = '" . $fornecedor . "' order by cd_codigo asc";
                                        $RSSMT = mysql_query($SQL, $conexao);
                                        $RSMT = mysql_fetch_array($RSSMT);

                                        // Não busca vendas UNILEVER para RS
                                        if ($gerente == '9004' && ($fornecedor == 'F00100' || $fornecedor == 'F00101')) {
                                            $RSVD['DEVOLUCAO'] = 0;
                                            $RS2['VENDA'] = 0;
                                        } else {

                                            //CONSULTA DEVOLUÇÃO
                                            $RSSD = oci_parse($oraconnect, "select SUM(d1.D1_TOTAL) AS DEVOLUCAO from SIGA.SF2010 f2, SIGA.SD1010 d1, SIGA.SA3010 a3, SIGA.SF4010 F4 where f2.F2_FILIAL = d1.D1_FILIAL and d1.D1_FILIAL = a3.A3_FILIAL and f2.F2_DOC = d1.D1_NFORI and f2.F2_SERIE = d1.D1_SERIORI and f2.F2_VEND1 = a3.A3_COD and d1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d1.D1_FILIAL AND A5_FORNECE = '" . $fornecedor . "' AND D_E_L_E_T_ = ' ') and d1.D1_TIPO = 'D' and a3.A3_GEREN = '" . $gerente . "' and d1.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and a3.D_E_L_E_T_= ' ' and d1.D1_FILIAL IN ('09','10') and f2.F2_VEND1 <>'000001' and d1.D1_EMISSAO >= '" . $data_min . "' and d1.D1_EMISSAO <= '" . $data_max . "' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = D1.D1_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ");
                                            oci_set_prefetch($RSSD, 300);
                                            oci_execute($RSSD, OCI_DEFAULT);
                                            $RSVD = oci_fetch_assoc($RSSD);

                                            ///CONSULTA VENDA FORNECEDOR///
                                            $SQL = "select SUM(d2.D2_VALBRUT) AS VENDA from SIGA.SF2010 f2, SIGA.SD2010 d2, SIGA.SA3010 u3, SIGA.SF4010 F4 where f2.F2_FILIAL = d2.D2_FILIAL and f2.F2_FILIAL = u3.A3_FILIAL and f2.F2_DOC = d2.D2_DOC and f2.F2_CLIENTE = d2.D2_CLIENTE and f2.F2_LOJA = d2.D2_LOJA and f2.F2_SERIE = d2.D2_SERIE and f2.F2_EMISSAO = d2.D2_EMISSAO and d2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d2.D2_FILIAL AND A5_FORNECE = '" . $fornecedor . "' AND D_E_L_E_T_ = ' ') and d2.D2_TIPO = 'N' and d2.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and u3.D_E_L_E_T_ = ' ' and f2.F2_VEND1 = u3.A3_COD and f2.F2_VEND1 <>'000001' and u3.A3_GEREN = '" . $gerente . "' and d2.D2_FILIAL IN ('09','10') and d2.D2_EMISSAO >= '" . $data_min . "' and d2.D2_EMISSAO <= '" . $data_max . "' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = d2.D2_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ";
                                            $RSSV = oci_parse($oraconnect, $SQL);
                                            oci_set_prefetch($RSSV, 300);
                                            oci_execute($RSSV, OCI_DEFAULT);
                                            $RS2 = oci_fetch_assoc($RSSV);
                                        }

                                        $meta = $RSMT['vl_meta'];
                                        $venda = ($RS2['VENDA'] - $RSVD['DEVOLUCAO']);

                                        if ($meta > 0) {
                                            $perce = ($venda / $meta) * 100;
                                        } else {
                                            $perce = 0;
                                        }

                                        if ($perce >= 100) {
                                            $cor = "#01ce24";
                                        } else {
                                            $cor = "#f3735e";
                                        }
                                        $sumMeta[$gerente]     += $meta;
                                        $sumVenda[$gerente] += $venda;

                                    ?>

                                        <td>R$ <?= number_format($meta, 2, ",", "."); ?></td>
                                        <td>R$ <?= number_format($venda, 2, ",", "."); ?></td>
                                        <td style="background-color:<?= $cor; ?>;"><?= number_format($perce, 2, ",", ""); ?>%</td>
                                        <td style="padding: 10px; border: none;"></td>

                                    <?php } ?>
                                </tr>

                            <?php } ?>
                        
                        <?php 
                        $html_corpo_tabela = ob_get_clean(); 
                        
                        foreach ($gerentes as $gerente) {
                            if ($sumMeta[$gerente] > 0) {
                                $sumPerce[$gerente] = ($sumVenda[$gerente] / $sumMeta[$gerente]) * 100;
                            } else {
                                $sumPerce[$gerente] = 0;
                            }
                        }
                        ?>

                        <table class="table-list2">
                            
                            <tr>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td colspan="3" style="border: none"><img src="images/bandeiras/09.png" style="width: 100px;"></td>
                                <td style="padding: 10px; border: none"></td>
                                <td colspan="3" style="border: none"><img src="images/bandeiras/10.png" style="width: 100px;"></td>
                                <td style="padding: 10px; border: none"></td>
                                <td colspan="3" style="border: none"><img src="images/bandeiras/27.png" style="width: 100px;"></td>
                            </tr>

                            <tr>
                                <td style="border: none"></td>
                                <td>PROGRESSO</td>
                                <?php foreach ($gerentes as $gerente) { ?>
                                    <td colspan="3" style="border: none; padding-bottom: 20px;">
                                        <div class="progress progress-md progress-half-rounded m-md">
                                            <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?= $sumPerce[$gerente]; ?>%;">
                                                <b class="textbarra" style="width: 100px;">Venda. <?= number_format("$sumPerce[$gerente]", 2, ",", "") . "%"; ?></b>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="progress progress-md progress-half-rounded m-md" style="margin-bottom:3px;">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" style="width: <?= $dias_realGeral; ?>%;">
                                                <b class="textbarra" style="width: 100px;">Período. <?= round($dias_realGeral) . "%"; ?></b>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 10px; border: none;"></td>
                                <?php } ?>
                            </tr>

                            <tr class="sticky">
                                <th rowspan="2">CÓDIGO FORNECEDOR</th>
                                <th rowspan="2">FORNECEDOR</th>
                                <?php foreach ($gerentes as $gerente) { ?>
                                    <th colspan="3"><?= BuscaGerente($gerente); ?></th>
                                    <td style="padding: 10px; border: none;"></td>
                                <?php } ?>
                            </tr>
                            
                            <tr>
                                <?php foreach ($gerentes as $gerente) { ?>
                                    <th>Meta</th>
                                    <th>Real</th>
                                    <th>%</th>
                                    <td style="padding: 10px; border: none;"></td>
                                <?php } ?>
                            </tr>

                            <?= $html_corpo_tabela; ?>

                            <tr>
                                <td></td>
                                <td style="background-color:yellow;">TOTAL</td>
                                <?php foreach ($gerentes as $gerente) { ?>
                                    <td style="background-color:yellow;">R$ <?= number_format($sumMeta[$gerente], 2, ',', '.') ?></td>
                                    <td style="background-color:yellow;">R$ <?= number_format($sumVenda[$gerente], 2, ',', '.') ?></td>
                                    <td style="<?= $sumPerce[$gerente] >= 100 ? 'background-color: #01ce24' : 'background-color: #f3735e' ?>"><?= number_format($sumPerce[$gerente], 2, ',', '.') ?> % </td>
                                    <td style="padding: 10px; border: none;"></td>
                                <?php } ?>
                            </tr>

                        </table>
                        
                        <div style="clear: both; width: 100%; height: 20px; display: block;"></div>

                        <?php
                        $config_gvs = [
                            '9001' => ['nome' => 'AYRTON',   'img' => 'images/gvs/GVAYRTON.jpg'],
                            '9002' => ['nome' => 'EDEVANIR', 'img' => 'images/gvs/GVEDEVANIR.jpg'],
                            '9004' => ['nome' => 'JEFERSON', 'img' => 'images/gvs/GVJEFERSON.jpg']
                        ];

                        $ranking_podium = [];
                        foreach ($gerentes as $g_code) {
                            if (isset($config_gvs[$g_code]) && isset($sumPerce[$g_code])) {
                                $ranking_podium[] = [
                                    'codigo' => $g_code,
                                    'nome'   => $config_gvs[$g_code]['nome'],
                                    'img'    => $config_gvs[$g_code]['img'],
                                    'perc'   => $sumPerce[$g_code]
                                ];
                            }
                        }

                        usort($ranking_podium, function($a, $b) {
                            if ($a['perc'] == $b['perc']) return 0;
                            return ($a['perc'] < $b['perc']) ? 1 : -1;
                        });

                        $primeiro = isset($ranking_podium[0]) ? $ranking_podium[0] : null;
                        $segundo  = isset($ranking_podium[1]) ? $ranking_podium[1] : null;
                        $terceiro = isset($ranking_podium[2]) ? $ranking_podium[2] : null;
                        ?>
                        
                        <?php if($primeiro): ?>
                        
                        <div class="podium-wrapper-full">
                            <div class="podium-container">
                                
                                <?php if($segundo): ?>
                                <div class="podium-place second">
                                    <img src="<?= $segundo['img'] ?>" alt="<?= $segundo['nome'] ?>">
                                    <div class="podium-box">
                                        <span class="podium-name"><?= $segundo['nome'] ?></span>
                                        <span class="podium-code"><?= $segundo['codigo'] ?></span>
                                        <span class="podium-perc"><?= number_format($segundo['perc'], 2, ',', '.') ?>%</span>
                                        <span class="podium-rank">2</span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="podium-place first">
                                    <img src="<?= $primeiro['img'] ?>" alt="<?= $primeiro['nome'] ?>">
                                    <div class="podium-box">
                                        <span class="podium-name"><?= $primeiro['nome'] ?></span>
                                        <span class="podium-code"><?= $primeiro['codigo'] ?></span>
                                        <span class="podium-perc"><?= number_format($primeiro['perc'], 2, ',', '.') ?>%</span>
                                        <span class="podium-rank">1</span>
                                    </div>
                                </div>

                                <?php if($terceiro): ?>
                                <div class="podium-place third">
                                    <img src="<?= $terceiro['img'] ?>" alt="<?= $terceiro['nome'] ?>">
                                    <div class="podium-box">
                                        <span class="podium-name"><?= $terceiro['nome'] ?></span>
                                        <span class="podium-code"><?= $terceiro['codigo'] ?></span>
                                        <span class="podium-perc"><?= number_format($terceiro['perc'], 2, ',', '.') ?>%</span>
                                        <span class="podium-rank">3</span>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="div_banner" style="width:1000px; margin: 0 auto 20px auto; max-width: 100%; clear:both; display:block;">
                            <img src="images/premios/premio_super_fase02.jpg" width="1000" style="margin-left:20px; max-width: 100%" class="img_banner" class="animate__animated animate__backInLeft" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php include "footer.php"; ?>
    <script type="text/javascript" src="js/universal/jquery.js"></script>
    <script src="js/style-switcher/jquery-1.js"></script>
    <script src="js/style-switcher/styleselector.js"></script>
    <script src="js/mainmenu/bootstrap.min.js"></script>
    <script src="js/mainmenu/customeUI.js"></script>
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/mainmenu/sticky.js"></script>
    <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/cubeportfolio/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="js/cubeportfolio/main-juicy.js"></script>
</body>
</html>