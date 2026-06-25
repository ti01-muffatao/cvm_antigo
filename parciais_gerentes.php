<?php
include "administrar/ora_connect.php";
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["CD_USUARIO"] == "") {
    echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}

// xdebug_start_trace (__FILE__);

?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="pt-BR">
    <title><?php echo $Titulo; ?></title>
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
            <h3 class="table-style">Parciais Gerentes até <?= date('d/m/Y') ?></h3>
        </div>
        <div class="clearfix"></div>
        <div class="portfolio_four">
            <div>
                <div class="tabs-content7">
                    <div id="grupo-1" class="tabs-panel7">
                        
                        <div class="table-style">

                            <table class="table-list2">

                                <tr>
                                    <td style="border: none"></td>
                                    <td colspan="3" style="border: none"><img src="images/bandeiras/09.png" style="width: 100px;"></td>
                                    <td style="padding: 10px; border: none"></td>
                                    <td colspan="3" style="border: none"><img src="images/bandeiras/10.png" style="width: 100px;"></td>
                                    <td style="padding: 10px; border: none"></td>
                                    <td colspan="3" style="border: none"><img src="images/bandeiras/27.png" style="width: 100px;"></td>
                                </tr>

                                <?php
                                $diasPassaramGeral  = dias_passaram_geral();
                                $dias_realGeral   = ($diasPassaramGeral / 79) * 100;
                                $data_min = "20251101";
                                $data_max = "20260228";
                                $gerentes = [];
                                $sumPerce = [];
                                $sumVenda = [];
                                $sumMeta = [];

                                $RSSG = mysql_query("select * from usuarios where cd_perfil = 2 and cd_codigo <> '9005' and cd_ativo = 1 ");
                                while ($RSG = mysql_fetch_array($RSSG)) {
                                    $gerentes[] = $RSG["cd_codigo"];
                                }
                                ?>

                                <tr id="linhaProgresso">
                                    <td>PROGRESSO</td>
                                    <?php foreach ($gerentes as $gerente) { ?>
                                        <td colspan="3">
                                            <div class="progress progress-md progress-half-rounded m-md">
                                                <div class="progress-bar progress-bar-success barraVenda" id="barra_<?= $gerente ?>" style="width: 0%;">
                                                    <b class="textbarra" id="texto_<?= $gerente ?>">Venda. 0%</b>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="progress progress-md progress-half-rounded m-md" style="margin-bottom:3px;">
                                                <div class="progress-bar progress-bar-primary" style="width: <?= $dias_realGeral ?>%;">
                                                    <b class="textbarra">Período. <?= round($dias_realGeral) ?>%</b>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding: 10px; border: none"></td>
                                    <?php } ?>
                                </tr>

                                <tr class="sticky">
                                    <th rowspan="2">FORNECEDOR</th>
                                    <?php foreach ($gerentes as $gerente) { ?>
                                        <th colspan="3"><?php echo BuscaGerente($gerente); ?></th>
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

                                <?php
                                $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
                                while ($RS = mysql_fetch_array($RSS)) { ?>
                                    <tr>
                                        <?php
                                        $fornecedor = $RS["cd_fornecedor"];
                                        ?>

                                        <td><?= $RS["ds_razao"] ?></td>

                                        <?php foreach ($gerentes as $gerente) {

                                            $cd_filial = ($gerente == '9001' || $gerente == '9004' ? '09' : '10');

                                            $RSSMT = mysql_query("select * from metas_gerente where cd_codigo='$gerente' and cd_fornecedor='$fornecedor'", $conexao);
                                            $RSMT = mysql_fetch_array($RSSMT);

                                            $SQL = "SELECT SUM(VALOR) AS VENDALIQUIDA FROM (
                                                
                                                SELECT SUM(D2.D2_VALBRUT) AS VALOR
                                                FROM SIGA.SA3010 a3, SIGA.SF2010 f2, SIGA.SD2010 D2
                                                WHERE D2.D2_FILIAL = '$cd_filial'
                                                AND F2.F2_X_TABEL <> '501'
                                                AND D2.D2_EMISSAO >= '$data_min' AND D2.D2_EMISSAO <= '$data_max'
                                                AND D2.D2_TIPO = 'N'
                                                AND D2.D_E_L_E_T_ <> '*'
                                                AND D2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D2.D2_FILIAL AND A5_FORNECE='$fornecedor' AND D_E_L_E_T_=' ')
                                                AND a3.A3_GEREN = '$gerente'
                                                AND F2.F2_FILIAL = D2.D2_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE 
                                                AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA
                                                AND F2.F2_EMPDEST = ' '
                                                AND F2.D_E_L_E_T_ <> '*'
                                                AND A3.A3_FILIAL = F2.F2_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND A3.D_E_L_E_T_ <> '*'
                                                AND F2.F2_DUPL <> '        '
                                                AND A3.A3_SUPER <> ' ' AND A3.A3_SUPER NOT IN ('9001','5001')

                                                UNION ALL

                                                SELECT SUM(D1.D1_TOTAL * -1) AS VALOR
                                                FROM SIGA.SD1010 D1, SIGA.SF2010 f2, SIGA.SA3010 a3
                                                WHERE f2.F2_FILIAL = '$cd_filial'
                                                AND f2.F2_FILIAL = a3.A3_FILIAL AND f2.F2_FILIAL = D1.D1_FILIAL
                                                AND D1.D1_EMISSAO >= '$data_min' AND D1.D1_EMISSAO <= '$data_max'
                                                AND D1.D1_TIPO = 'D' AND D1.D1_NFORI <> ' ' AND D1.D1_SERIORI <> ' '
                                                AND f2.F2_VEND1 <> '000001'
                                                AND D1.D_E_L_E_T_ = ' ' AND f2.D_E_L_E_T_ = ' ' AND a3.D_E_L_E_T_ = ' '
                                                AND f2.F2_VEND1 = a3.A3_COD
                                                AND f2.F2_DOC = D1.D1_NFORI AND f2.F2_SERIE = D1.D1_SERIORI
                                                AND f2.F2_DUPL <> '        '
                                                AND D1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL=D1.D1_FILIAL AND A5_FORNECE='$fornecedor' AND D_E_L_E_T_=' ')
                                                AND a3.A3_GEREN = '$gerente'
                                            )";

                                            $RSSV = oci_parse($oraconnect, $SQL);
                                            oci_execute($RSSV);
                                            $RS2 = oci_fetch_assoc($RSSV);

                                            $meta  = $RSMT['vl_meta'];

                                            $venda = $RS2['VENDALIQUIDA'];

                                            if ($meta > 0) {
                                                $perce = ($venda / $meta) * 100;
                                            } else {
                                                $perce = 0;
                                            }

                                            $cor = ($perce >= 100 ? "#01ce24" : "#f3735e");

                                            if (($fornecedor == 'F00004' || $fornecedor == 'F00005') && ($gerente == '9004' || $gerente == '9005')) {
                                                echo "<td colspan='3'></td>";
                                            } else {
                                                $sumMeta[$gerente]  += $meta;
                                                $sumVenda[$gerente] += $venda;

                                                if ($sumMeta[$gerente] > 0) {
                                                    $sumPerce[$gerente]  = ($sumVenda[$gerente] / $sumMeta[$gerente]) * 100;
                                                }
                                            ?>

                                                <td>R$ <?= number_format($meta, 2, ",", ".") ?></td>
                                                <td>R$ <?= number_format($venda, 2, ",", ".") ?></td>
                                                <td style="background-color:<?= $cor ?>"><?= number_format($perce, 2, ",", "") ?>%</td>
                                                <td style="padding: 10px; border: none;"></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <td style="background-color:yellow;">TOTAL</td>
                                    <?php foreach ($gerentes as $gerente) { ?>
                                        <td style="background-color:yellow;">R$ <?= number_format($sumMeta[$gerente], 2, ',', '.') ?></td>
                                        <td style="background-color:yellow;">R$ <?= number_format($sumVenda[$gerente], 2, ',', '.') ?></td>
                                        <td style="<?= $sumPerce[$gerente] >= 100 ? 'background-color:#01ce24' : 'background-color:#f3735e' ?>"><?= number_format($sumPerce[$gerente], 2, ',', '.') ?>%</td>
                                        <td style="padding: 10px; border: none;"></td>
                                    <?php } ?>
                                </tr>

                            </table>
                        
                        </div> <div class="clearfix" style="clear:both;"></div>

                        <?php
                        $config_gvs = [
                            '9001' => ['nome' => 'AYRTON',   'img' => 'images/gvs/GVAYRTON.jpg'],
                            '9002' => ['nome' => 'EDEVANIR', 'img' => 'images/gvs/GVEDEVANIR.jpg'],
                            '9004' => ['nome' => 'JEFERSON', 'img' => 'images/gvs/GVJEFERSON.jpg']
                        ];

                        $ranking = [];
                        foreach ($gerentes as $g_code) {
                            if (isset($config_gvs[$g_code]) && isset($sumPerce[$g_code])) {
                                $ranking[] = [
                                    'codigo' => $g_code,
                                    'nome'   => $config_gvs[$g_code]['nome'],
                                    'img'    => $config_gvs[$g_code]['img'],
                                    'perc'   => $sumPerce[$g_code]
                                ];
                            }
                        }

                        usort($ranking, function($a, $b) {
                            if ($a['perc'] == $b['perc']) return 0;
                            return ($a['perc'] < $b['perc']) ? 1 : -1;
                        });

                        $primeiro = isset($ranking[0]) ? $ranking[0] : null;
                        $segundo  = isset($ranking[1]) ? $ranking[1] : null;
                        $terceiro = isset($ranking[2]) ? $ranking[2] : null;
                        ?>
                        
                        <?php if($primeiro): ?>
                        
                        <div class="podium-wrapper">
                            <div class="podium-container">
                                
                                <?php if($segundo): ?>
                                <div class="podium-place second">
                                    <img src="<?= $segundo['img'] ?>" alt="<?= $segundo['nome'] ?>">
                                    <div class="podium-box">
                                        <span class="podium-name"><?= $segundo['nome'] ?></span>
                                        <small><?= $segundo['codigo'] ?></small>
                                        <span class="podium-perc"><?= number_format($segundo['perc'], 2, ',', '.') ?>%</span>
                                        <span class="podium-rank">2</span>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="podium-place first">
                                    <img src="<?= $primeiro['img'] ?>" alt="<?= $primeiro['nome'] ?>">
                                    <div class="podium-box">
                                        <span class="podium-name"><?= $primeiro['nome'] ?></span>
                                        <small><?= $primeiro['codigo'] ?></small>
                                        <span class="podium-perc"><?= number_format($primeiro['perc'], 2, ',', '.') ?>%</span>
                                        <span class="podium-rank">1</span>
                                    </div>
                                </div>

                                <?php if($terceiro): ?>
                                <div class="podium-place third">
                                    <img src="<?= $terceiro['img'] ?>" alt="<?= $terceiro['nome'] ?>">
                                    <div class="podium-box">
                                        <span class="podium-name"><?= $terceiro['nome'] ?></span>
                                        <small><?= $terceiro['codigo'] ?></small>
                                        <span class="podium-perc"><?= number_format($terceiro['perc'], 2, ',', '.') ?>%</span>
                                        <span class="podium-rank">3</span>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="div_banner" style="width:1000px; margin: 0 auto 20px auto;">
                            <img src="images/premios/premio_gv_fase01.png" width="1000" style="margin-left:20px; max-width: 100%" class="img_banner" class="animate__animated animate__backInLeft" />
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const valores = {
                <?php foreach ($gerentes as $gerente) { ?> "<?= $gerente ?>": <?= round($sumPerce[$gerente], 2) ?>,
                <?php } ?>
            };

            for (const gerente in valores) {
                const valor = valores[gerente];
                const barra = document.getElementById("barra_" + gerente);
                const texto = document.getElementById("texto_" + gerente);

                if (barra && texto) {
                    barra.style.width = valor + "%";
                    texto.innerHTML = "Venda. " + valor.toFixed(2).replace(".", ",") + "%";
                }
            }
        });
    </script>

    <script>
        window.onload = function() {
            var style = document.createElement('style');
            style.innerHTML = '.sticky th { position: sticky; top: 0px; }';
            document.head.appendChild(style);
        };
    </script>


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