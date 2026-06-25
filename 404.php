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
<title>14ª Campanha de Verão Muffatão</title>
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
<!--- IFRAME ALBUM FOTOS --->
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<!--- FINAL IFRAME ALBUM DE FOTOS --->
</head>
<body>
<div class="site_wrapper">
  <header id="header">
  
  <!-- Top header bar -->
  
  <div id="topHeader">
    <div class="wrapper">
      <div class="top_nav two">
        <div class="container"> <a class="login_but" href="sair.php" onclick="return confirm('Deseja Realmente Sair?');">Sair</a> <a class="login_but" style="width:auto">Bem vindo &nbsp;<?php echo $_SESSION["DS_USUARIO"];?>&nbsp;&nbsp;<?php echo "<font color='#F92236'>".$_SESSION["DS_GRUPO"]."</font>";?></a><!---***MOSTRAR O NOME DO USUARIO LOGADO***---> 
          
          <!--- DATA ---> 
          
          <span> 
          <script language="JavaScript">
	document.write("<font color='#FFFFFF' size='3' face='arial'>")
	var mydate=new Date()
	var year=mydate.getYear()
	if (year<2000)
	year += (year < 1900) ? 1900 : 0
	var day=mydate.getDay()
	var month=mydate.getMonth()
	var daym=mydate.getDate()
	if (daym<10)
	daym="0"+daym
	var dayarray=new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado")
	var montharray=new Array("de Janeiro de ","de Fevereiro de ","de Março de ","de Abril de ","de Maio de ","de Junho de ","de Julho de ","de Agosto de ","de Setembro de ","de Outubro de ","de Novembro de ","de Dezembro de ")
	document.write("   "+dayarray[day]+", "+daym+" "+montharray[month]+year+" ")
	document.write("</b></i></font>")
	</script> 
          </span> 
          
          <!-- END DATA --> 
          
        </div>
      </div>
    </div>
  </div>
  
  <!-- end top navigation -->
  
  <div id="trueHeader">
    <div class="wrapper">
      <div class="container">
        <div class="clearfix"></div>
        <div class="section_holder26">
          <div class="container"> <img src="images/erro.png"><br>
            <h1>Oops... Algo está errado!</h1>
            <h5>Desculpe, você não tem permissão para acessar este endereço...</h5>
            <p><a href="index.php"><strong>Voltar ao Início</strong></a></p>
          </div>
        </div>
        
        <!-- FIM DA PAGINA DE ERRO --> 
        
      </div>
    </div>
  </div>
</div>
</div>
<!--end section--> 
<!--- COPYRIGHT --->
<div class="copyrights">
<div align="center" class="container">
  <div class="one_half" style="width:100%;"><span>© 2015 Grupo Pedro Muffato. Todos os direitos reservados.</span></div>
</div>
<!--- FIM COPYRIGHT ---> 
<!--- FIM DO FOOTER ---> 
<!--- BOTAO VOLTAR AO TOPO ---> 
<a href="#" class="scrollup" title="Ir ao Topo"></a>
</body>
</html>