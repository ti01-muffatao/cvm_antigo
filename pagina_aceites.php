<?php include "administrar/conexao.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
    echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
?>
<!--
**********************************************
CONTEUDO VISIVEL SOMENTE PARA USUARIOS LOGADOS 
**********************************************
--->
<!doctype html>
<html lang="pt-BR">
<!--<![endif]-->

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="pt-BR">
    <title><?php echo $Titulo; ?></title>
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
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
    <!-- get jQuery from the google apis -->
    <script type="text/javascript" src="js/universal/jquery.js"></script>
    <!-- style switcher -->
    <script src="js/style-switcher/jquery-1.js"></script>
    <script src="js/style-switcher/styleselector.js"></script>
    <!-- mega menu -->
    <script src="js/mainmenu/bootstrap.min.js"></script>
    <script src="js/mainmenu/customeUI.js"></script>
    <!-- sticky menu -->
    <script type="text/javascript" src="js/mainmenu/sticky.js"></script>
    <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>
    <!-- scroll up -->
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>
    <!--- Tabs --->
    <script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
    <!-- Flexslider -->
    <script src="js/flexslider/jquery.flexslider.js"></script>
    <script src="js/flexslider/custom.js"></script>

    <style>
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
        }

        thead {
            background: #007BFF;
            color: #fff;
        }

        thead th {
            padding: 12px;
            text-align: left;
        }

        tbody td {
            padding: 10px;
        }

        tbody tr:hover {
            background: #f1f1f1;
        }

        .percentual {
            font-weight: bold;
            color: #28a745;
        }

    </style>

</head>

<body>

    <?php include "menu.php" ?>

    <div class="clearfix"></div>
    <div class="section_holdergrupos">

        <div class="container">


            <?php
            if (in_array($_SESSION['CD_PERFIL'], ['2', '3', '6'])) {
                $SQL = "SELECT  s.cd_codigo AS cd_supervisor,  COUNT(r.cd_codigo) AS total_representantes,  SUM(CASE WHEN r.cd_aceite = 1 THEN 1 ELSE 0 END) AS total_aceites,  ROUND( (SUM(CASE WHEN r.cd_aceite = 1 THEN 1 ELSE 0 END) / COUNT(r.cd_codigo)) * 100, 2 ) AS percentual_aceite  FROM usuarios s  LEFT JOIN usuarios r  ON r.cd_supervisor = s.cd_codigo  AND r.cd_perfil = 4  AND r.cd_ativo = 1  WHERE s.cd_perfil = 3  GROUP BY s.cd_codigo";
                $RSS2 = mysql_query($SQL, $conexao); ?>

                <h3 align="center">% de Aceites</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Supervisor</th>
                                <th>Total Representantes</th>
                                <th>Total Aceites</th>
                                <th>% Aceite</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($RS2 = mysql_fetch_array($RSS2)) { ?>
                                <tr>
                                    <td data-label="Supervisor"><?php echo buscaUsuario($RS2['cd_supervisor']) ?></td>
                                    <td data-label="Total Representantes"><?php echo $RS2['total_representantes'] ?></td>
                                    <td data-label="Total Aceites"><?php echo $RS2['total_aceites'] ?></td>
                                    <td data-label="% Aceite" class="percentual"><?php echo $RS2['percentual_aceite'] ?>%</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <br>
            <?php } ?>

            <h3 align="center">Aceites</h3>

            <?php
            if ($_SESSION['CD_PERFIL'] == 2) { // Gerente
                $SQL = "SELECT * FROM usuarios where cd_gestor = '" . $_SESSION['CD_CODIGO'] . "' order by cd_codigo asc";
            } else if ($_SESSION['CD_PERFIL'] == 3) { // Supervisor
                $SQL = "SELECT * FROM usuarios where cd_supervisor = '" . $_SESSION['CD_CODIGO'] . "' order by cd_codigo asc";
            } else if ($_SESSION['CD_PERFIL'] == 6) { // Diretor / Adm / GR
                $SQL = "SELECT * FROM usuarios where cd_perfil in ('2','3','4') order by cd_codigo asc";
            }

            // echo $SQL;

            $RSS = mysql_query($SQL, $conexao);

            ?>

            <table class="table-list2" style="width:100%;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Usuário</th>
                        <th>Grupo</th>
                        <th>Supervisor</th>
                        <th>Aceite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($RS = mysql_fetch_array($RSS)) {

                        if ($RS['cd_grupo'] == 21) {
                            $RS['cd_grupo'] = '1 - RS';
                        } else if ($RS['cd_grupo'] == 22) {
                            $RS['cd_grupo'] = '2 - RS';
                        }

                        echo "<tr>";
                        echo "<td style='padding: 3px;'>" . $RS['cd_codigo'] . "</td>";
                        echo "<td style='padding: 3px;'>" . $RS['ds_usuario'] . "</td>";
                        echo "<td style='padding: 3px;'>" . $RS['cd_grupo'] . "</td>";
                        echo "<td style='padding: 3px;'>" . BuscaUsuario($RS['cd_supervisor']) . "</td>";
                        echo $RS['cd_aceite'] == '1' ? "<td style='padding: 3px;'><img src='images/icone_sim.png' width='40px'></td>" : "<td style='padding: 3px;'><img src='images/icone_nao.png' width='40px'></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <?php include "footer.php" ?>

</body>

</html>