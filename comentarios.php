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


<!-- mobile  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

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
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">

<!-- ######### ARQUIVOS JS ######### --> 

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
<script  src="js/flexslider/jquery.flexslider.js"></script> 
<script  src="js/flexslider/custom.js"></script>
<!--- IFRAME TABELA COMENTARIOS --->

<!--- FINAL IFRAME COMENTARIOS --->

</head>
<body style="margin-top:-25px;">
<?php include "menu.php";?>
  <div class="clearfix"></div>
  <div class="section_holdergrupos" align="center">
   <div class="container">
      <div class="one_full">
      	<h5 style="color: #000;">
		Participe <?php echo "<font color='#BA0009'>".$_SESSION["DS_USUARIO"]."</font>";?>, deixe seu comentário...
        </h5>
      <div class="section_title_line_full"></div>
<div align="center" style="width:950px; height:795px;">
<iframe id="form-iframe" src="http://campanhadeverao.portalmuffatao.com.br/comentar/example.php" style="margin:0; width:100%; height:100%; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>

<script type="text/javascript">
function AdjustIframeHeightOnLoad() { document.getElementById("form-iframe").style.height = document.getElementById("form-iframe").contentWindow.document.body.scrollHeight + "px"; }
function AdjustIframeHeight(i) { document.getElementById("form-iframe").style.height = parseInt(i) + "px"; }
</script>
</div>
</div>
        </div>
        </ul>
        </div>
      </section>
    </div>
  </div>
  </div>
  </div>
  </div>
<!--end section-->
<?php include "footer.php";?>
</body>
</html>