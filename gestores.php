<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
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
<title><?php echo $Titulo;?></title>
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<!-- Meta -->
<meta charset="utf-8">
<meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
<meta http-equiv="content-language" content="pt" />
<meta itemprop="description" name="description" content="" />
<meta name="robots" content="no follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!---[if lt IE 9]
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
[endif]--->
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
</head>
<body style="margin-top:-25px;">
<?php include "menu.php";?>  <div class="clearfix"></div>
    <div class="container">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="section_holdergrupos">
    <div class="container">
        <h3 align="center">Regulamento 18ª Campanha de verão Muffatão - GERENTES<br> "NA MESMA DIREÇÃO, TODOS GANHAM."</span></h3>
         <div class="lt_title_line"></div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="portfolio_four">
  <div class="container">
      <p>Serão Ganhadores os Gerentes que CUMPRIREM AS METAS de cada FORNECEDOR <strong>ATÉ 28/02/2020</strong>.<br>
       As TABELAS abaixo se referem às metas por FORNECEDOR.</p><br>
	<div class="tabs-content7">
          <div id="grupo-1" class="tabs-panel7">
          
           	<h4>Metas Gerentes - FECHOU GANHOU!</h4>
                <div class="table-style">
              <table class="table-list2">
                <tr>
                    <th>SUPERVISOR</th>
                    <th>BETANIN</th>
                    <th>MATINSET</th>
                    <th>MEX</th>
                    <th>UNILEVER</th>
                </tr>
                <tr>
                    <th>AYRTON</th>
                    <td>R$ 415.000</td>
                    <td>R$ 1.800.000</td>
                    <td>R$ 920.000</td>
                    <td>R$ 5.700.000</td>
                </tr>
                <tr>
                    <th>JEFERSON</th>
                    <td>R$ 235.000</td>
                    <td>R$ 300.000</td>
                    <td>R$ 1.500.000</td>
                    <td>R$ 2.600.000</td>
                </tr>
                <tr>
                    <th>MAURICIO</th>
                    <td>R$ 730.000</td>
                    <td>R$ 1.620.000</td>
                    <td>R$ 1.550.000</td>
                    <td>R$ 9.000.000</td>
                </tr>
              
              </table>
              <img src="images/premios/premio_gv.png" class="pull-right" width="450" style="padding-bottom:10px;"/>
            </div>
          </div>
        </div>      
    </div>
  </div>
<!-- FINAL QUADRO DE FORNECEDORES -->
<div class="clearfix"></div>
<?php include "footer.php";?>
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
