<?php
include "administrar/conexao.php";
if ($_SESSION["CD_USUARIO"] == "") {
    echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
?>

<!doctype html>
<html lang="pt-BR">

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- ######### CSS ESTILOS ######### -->
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!-- MOBILE -->
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    <!-- mega menu -->
    <link href="js/mainmenu/sticky.css" rel="stylesheet">
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">
    <!-- ICONES -->
    <link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
    <!-- FONECEDORES -->
    <link rel="stylesheet" type="text/css" href="js/cubeportfolio/cubeportfolio.min.css">
    <!-- flexslider -->
    <link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script>
        function confirmarAceite() {
            if (confirm("Confirmar participação na campanha?") == true) {
                $.ajax({
                    type: 'post',
                    url: 'aceite.php',
                    data: {
                        cd_aceite: "1"
                    },
                    success: function(msg) {
                        location.reload();
                    }
                });
            } else {
                document.getElementById("checkbox").checked = false;
            }
        }
    </script>

</head>

<body style="margin-top:-25px;">
    <?php include "loading.php" ?>
    <?php include "menu.php"; ?>
    <div class="clearfix"></div>
    <div class="section_holdergrupos">
        <div class="container" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <img src="images/logo.png" style="width: 250px; height: auto;">
            <br>
            <h3 align="center">Regulamento 24ª Campanha de verão Muffatão - GERENTE REGIONAL<br> "Dom: Descobrir, focar e potencializar"</span></h3>
            <div class="lt_title_line"></div>
        </div>
    </div>
    <div class="section_holdergrupos">
        <div class="container">
            <h3><span style="background-color: #1c97fd; padding: 10px; font-size: 30px; color: white; border-radius: 5px">Fase 01</span></h3>
            <br>
            <h3>Fechou Ganhou</h3>
            <ul>
                <li>Se todos os gerentes de venda fecharem as metas por fornecedor da fase 01 e fase 02 na 24ª Campanha de Verão Muffatão - "Dom: Descobrir, focar e potencializar" vai ganhar uma vaga para a viagem com acompanhante (Casal);</li>
                <li>Para a premiação ter validade, nenhum gerente de vendas da sua equipe pode ficar de fora da 24ª Campanha de Verão Muffatão;</li>
                <li>A viagem será em grupo com todos os ganhadores dessa fase;</li>
                <li>A premiação será a hospedagem com hotel All inclusive;</li>
                <li>Caso feche apenas uma das fases, será premiado em R$ 2.000,00</li>
            </ul>
            <img src="images/media/moral_em_casa_gr.jpg" class="img_banner" class="animate__animated animate__backInLeft" style="max-width: 100%;"/>
        </div>
    </div>
    <div class="section_holdergrupos">
        <div class="container">
            <div class="section_title_line_full"></div>
            <br>
            <h5 class="uppercase">Observações Gerais</h5>
            <ul>
                <li>Para validar a participação na 24º CAMPANHA DE VERÃO MUFFATÃO, os participantes deverão aceitar os termos e regulamentos da mesma, até o dia 15/11/2025.</li>
                <li>Código dos fornecedores participantes:
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YPÊ - F00001 / UNILEVER BPC - F00005 / UNILEVER HF - F00004 / MEX - F00003 / SANTHER F00010 /<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SPECIAL NUTRI - F00002 / RECKITT - F00077 / HAVAIANAS - F00009 / FLORA - F00018 / COLGATE - F00097
                </li>
                </li>
            </ul>
            <div style="max-width: 100%">
                <img src="images/media/logo_fornecedores.png" width="100%" style="max-width: 100%" />
            </div>
            <div class="section_title_line_full"></div>
            <div class="checkbox-custom">
                <?php
                $checked = "";
                $RSSC = mysql_query("select cd_aceite from usuarios where cd_usuario = '" . $_SESSION['CD_USUARIO'] . "' and cd_ativo = 1 ");
                $RSC = mysql_fetch_assoc($RSSC);
                if ($RSC['cd_aceite'] == "1") {
                    $checked   = "checked";
                    $bloq    = "disabled";
                }
                ?>
                <?php if (strtotime(date('Y-m-d')) <= strtotime("2025-12-29")) { ?>
                    <label><input type="checkbox" id="checkbox" <?php echo $checked . " " . $bloq; ?> onChange="confirmarAceite();"><b></b>
                        <span>Declaro que li e aceito os termos e regulamento da 24ª Campanha de Verão Muffatão.</span>
                    </label>
                <?php } else { ?>
                    <span>O prazo para aceitar os termos e regulamentos da 24ª Campanha de Verão Muffatão se encerraram no dia 22/11/2025.</span>
                <?php } ?>
            </div>
            <br>
            <br>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- FINAL QUADRO DE FORNECEDORES -->
    <div class="clearfix"></div>
    <?php include "footer.php"; ?>
    <!-- ######### ARQUIVOS JS ######### -->
    <script type="text/javascript" src="js/universal/jquery.js"></script>
    <!-- style switcher -->
    <script src="js/style-switcher/jquery-1.js"></script>
    <script src="js/style-switcher/styleselector.js"></script>
    <!-- mega menu -->
    <script src="js/mainmenu/bootstrap.min.js"></script>
    <script src="js/mainmenu/customeUI.js"></script>
    <!-- scroll up -->
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>
    <!-- sticky menu -->
    <script type="text/javascript" src="js/mainmenu/sticky.js"></script>
    <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>
    <!-- scroll up -->
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>
    <!-- cubeportfolio -->
    <script type="text/javascript" src="js/cubeportfolio/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="js/cubeportfolio/main-juicy.js"></script>
</body>

</html>