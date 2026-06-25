<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
?>
<?php 
//conecta BD comentarios//
include "conexao2.php";
?>
 
<!--
***********************************************
CONTEUDO VISIVEL SOMENTE PARA USUARIOS LOGADOS 
***********************************************
--->
<!doctype html>
<html lang="pt-BR">
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="pt-BR">
<title>16ª Campanha de Verão Muffatão</title>

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
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs2.css">
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs10.css">

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

<!-- Flexslider --> 
<script  src="js/flexslider/jquery.flexslider.js"></script> 
<script  src="js/flexslider/custom.js"></script>
<!-- CONEXÃO DE USUARIO -->

</head>
<body>
<div class="site_wrapper">
  <header id="header"> 
    <!-- Top header bar -->
    <div id="topHeader">
      <div class="wrapper">
        <div class="top_nav two">
          <div class="container">
   			<a class="login_but" href="sair.php" onclick="return confirm('Deseja Realmente Sair?');">Sair</a> 
            <a class="login_but" style="width:auto">Bem vindo &nbsp;<?php echo $_SESSION["DS_USUARIO"];?></a><!---***MOSTRAR O NOME DO USUARIO LOGADO***--->
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
          <!-- Logo -->
          <div class="logo"><a href="index.php" id="logo"></a></div>
          <!-- Menu -->
          <div class="menu_main">
            <div class="navbar yamm navbar-default">
              <div class="container">
                <div class="navbar-header">
                  <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
                    <button type="button" ><i class="fa fa-bars"></i></button>
                  </div>
                </div>
                <div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">
                  <nav>
                  <ul class="nav navbar-nav">
                    <li class="dropdown"> <a href="index.php" class="dropdown-toggle"> Home</a></li>
                    <li class="dropdown"> <a class="dropdown-toggle"> Novidades</a><!--- LOGADO COMO "FORNECEDOR" NAO PODE VER ESTE MENU --->
                      <ul class="dropdown-menu" role="menu">
                      	<!--<li><a href="#">Catálogo</a></li>-->
                        <li><a href="galeria_de_fotos.php">Galeria de Fotos</a></li>
                        <li><a href="videos.php">Vídeos</a></li>
						<li><a href="comentarios.php">Comentários</a></li>
	                </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle"> Representantes</a>
                      <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-submenu mul"><a tabindex="-1" <i class="fa fa-coffee" style="font-size:16px">&nbsp; Alimentar</a>
                          <ul class="dropdown-menu">
                          <?php if( in_array($_SESSION['CD_PERFIL'], array('1','2','3','4','6')))
						  {?>
                            <li><a href="regulamento_geral.php">Regulamento</a> </li><!--- LOGADO COMO "FORNECEDOR" NAO PODE VER ESTE MENU --->
                            <?php }?>
                            <li><a href="grupos.php">Grupos</a> </li>
                            <li><a href="bingo_geral.php">Bingo</a> </li>
                            <li><a href="bingo_premium.php">Bingo Premium</a> </li>
                            <li><a href="itens_foco.php">Itens Foco</a></li>
                          </ul>
                        </li>
                        <li class="dropdown-submenu mul"><a tabindex="-1" <i class="fa fa-hospital-o" style="font-size:16px">&nbsp; Farma</a>
                          <ul class="dropdown-menu">
                          <?php if( in_array($_SESSION['CD_PERFIL'], array('1','2','3','4','6')))
						  {?>
                            <li><a href="regulamento_farma.php">Regulamento</a></li><!--- LOGADO COMO "FORNECEDOR" NAO PODE VER ESTE MENU --->
                            <?php }?>
                            <li><a href="grupos_farma.php">Grupos</a></li>
                            <li><a href="bingo_farma.php">Bingo</a></li>
                          </ul>
						  <li class="dropdown"><a href="parciais_alimentar_pr.php" style="font-size:14px;">&nbsp; Parciais PR<img src="images/icones/pr.png" style="float:left;-webkit-box-shadow: 1px 1px 4px 1px rgba(2, 2, 2, 0.48);"></a></li>
                          <li class="dropdown"><a href="parciais_alimentar_sc.php" style="font-size:14px;">&nbsp; Parciais SC<img src="images/icones/sc.png" style="float:left;-webkit-box-shadow: 1px 1px 4px 1px rgba(2, 2, 2, 0.48);"></a></li>
                          <li class="dropdown"><a href="parciais_alimentar_rs.php" style="font-size:14px;">&nbsp; Parciais RS<img src="images/icones/rs.png" style="float:left;-webkit-box-shadow: 1px 1px 4px 1px rgba(2, 2, 2, 0.48);"></a></li>
                          <li class="dropdown"><a href="parciais_farma.php" <i class="fa fa-file-text" style="font-size:16px;">&nbsp; Parciais Farma</a></li>
                        </li>
                      </ul>
                    </li>
          			<!---
                   	 *******************************************************************************************************************
                     MENU "GESTORES / SUPERVISORES" VISIVEL SOMENTE PARA USUARIO LOGADO COMO ADMINISTRADOR, GESTOR, SUPERVISOR E DIRETOR 
                     *******************************************************************************************************************
                    --->
					<?php if( in_array($_SESSION['CD_PERFIL'], array('1','2','3','6')))
					{?>
                    <li class="dropdown yamm-fw"> <a class="dropdown-toggle">Gestores / Supervisores</a>
                      <ul class="dropdown-menu">
                        <li>
                          <div class="yamm-content">
                            <div class="row">
                              <ul class="col-sm-6 col-md-3 list-unstyled ">
                                <li>
                                  <p> REPRESENTANTES </p>
                                </li>
                                <li><a href="regulamento_geral.php"><i class="fa fa-bars"></i> &nbsp; Regulamento</a> </li>
                                <li><a href="grupos.php"><i class="fa fa-group"></i> &nbsp; Grupos</a> </li>
                              </ul>
                              <ul class="col-sm-6 col-md-3 list-unstyled ">
                                <li>
                                  <p> REP. FARMA </p>
                                </li>
                                <li><a href="regulamento_farma.php"><i class="fa fa-bars"></i> &nbsp; Regulamento</a> </li>
                                <li><a href="grupos_farma.php"><i class="fa fa-group"></i> &nbsp; Grupos</a> </li>
                              </ul>
                              <ul class="col-sm-6 col-md-3 list-unstyled ">
                                <li>
                                  <p> SUPERVISORES </p>
                                </li>
                                <li><a href="regulamento_supervisor.php"><i class="fa fa-bars"></i> &nbsp; Regulamento</a> </li>
                                <li><a href="parciais_supervisor.php"><i class="fa fa-file-text"></i> &nbsp; Parciais Supervisores</a> </li>
	                            </ul>
                              <ul class="col-sm-6 col-md-3 list-unstyled ">
                                <li>
                                  <p> GESTORES </p>
                                </li>
                                <li><a href="regulamento_supervisor.php#section-3"><i class="fa fa-bars"></i> &nbsp; Regulamento</a> </li>
                                <li><a href="parciais_gestor.php"><i class="fa fa-file-text"></i> &nbsp; Parciais Gestores</a> </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>
                    <?php }?> 
                    <!---
                    **************************************************************************
                    FIM DO MENU "GESTOR / SUPERVISOR" A PARTIR DAQUI TODOS USUÁRIOS TEM ACESSO
                    **************************************************************************
                    --->
                    <?php if( in_array($_SESSION['CD_PERFIL'], array('5')))
					  {?>
                    <li class="dropdown"><a class="dropdown-toggle">Gestores / Supervisores</a><!-- MENU VISTO APENAS POR FORNECEDOR -->
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="parciais_supervisor.php">Parciais Supervisores</a></li>
                        <li><a href="parciais_gestor.php">Parciais Gestores</a></li>
	                </ul>
                    <?php }?>
                    </li>
                    <li class="dropdown"><a href="fornecedores.php" class="dropdown-toggle">Fornecedores</a></li>
                    <li class="dropdown"><a href="contato.php" class="dropdown-toggle">Contato</a></li>
                  </ul></nav>
                </div>
              </div>
            </div>
          </div>
         <!-- FIM DO MENU --> 
        </div>
      </div>
    </div>
  </header>
  <div class="clearfix"></div>
  <!--- INICIO BANNER --->
  <div class="section_holder19">
  <div class="container">
      <section class="slider">
        <div class="flexslider style2">
          <ul class="slides">
            <li>
              <div class="one_half">
                <div class="img"><img src="images/sliders/logo_slide1.png" alt="" class="img_size1"/></div>
                <div class="bottom_strip"></div>
                <div class="bottom_shape"></div>
              </div>
              <div class="one_half last"> <h6><strong>14ª Campanha de Verão Muffatão - Dominando Meu Setor!</strong></h6>
                <p>Em Desenvolvimento! </p>
              </div>
            </li>
            <!-- FINAL BANNER 1 -->
            <li>
              <div class="one_half">
                <div class="img"><img src="images/sliders/item_foco.png" alt="" class="img_size1"/></div>
                <div class="bottom_strip"></div>
                <div class="bottom_shape"></div>
              </div>
              <div class="one_half last"> <h6><strong>14ª Campanha de Verão Muffatão - Slider inicial 2</strong></h6>
                <p>Em Desenvolvimento! </p>
              </div>
            </li>
            <!-- FINAL BANNER 2 -->
            <li>
              <div class="one_half">
                <div class="img"><img src="http://placehold.it/570x310" alt="" class="img_size1"/></div>
                <div class="bottom_strip"></div>
                <div class="bottom_shape"></div>
              </div>
              <div class="one_half last"> <h6><strong>14ª Campanha de Verão Muffatão - Slider inicial 3</strong></h6>
                <p>Em Desenvolvimento! </p>
              </div>
            </li>
            <!-- FINAL BANNER 3-->
          </ul>
        </div>
      </section>
    </div>
  </div>
 <!--- FINAL DO BANNER --->
 <!--- LOGOTIPOS DOS FORNECEDORES --->
   <div class="clearfix"></div>
  <div class="section_holder37">
    <div class="container">
      <div class="section_title_line_full"></div>
      <div class="clearfix"></div>
      <section class="slider">
        <div class="flexslider style4 carousel">
          <ul class="slides">
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <!--<a href="#" target="_blank">--><img src="images/sliders/fornecedores/fornecedor1.jpg" title="Fornecedor 1" alt=""/><!--</a>--></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor2.jpg" title="Fornecedor 2" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor3.jpg" title="Fornecedor 3" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor4.jpg" title="Fornecedor 4" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor5.jpg" title="Fornecedor 5" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor6.jpg" title="Fornecedor 6" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor1.jpg" title="Fornecedor 1" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
               	<img src="images/sliders/fornecedores/fornecedor2.jpg" title="Fornecedor 2" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor3.jpg" title="Fornecedor 3" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor4.jpg" title="Fornecedor 4" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor5.jpg" title="Fornecedor 5" alt=""/></div>
            </li>
            <li>
              <div class="clint_logo">
                <div class="hover_line"></div>
                <img src="images/sliders/fornecedores/fornecedor6.jpg" title="Fornecedor 6" alt=""/></div>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </div>
<!--- FIM LOGOTIPO FORNECEDORES --->        
<!--- CORPO PAGINAS --->

  <!--end pagenation-->
  <div class="section_holdergrupos">
    <div class="container">
      <div class="one_full">
      <div class="section_title_line_full"></div>
    	<h5 style="color: #000;">
	<script language=javascript type="text/javascript">
now = new Date
if (now.getHours () >= 0 && now.getHours () < 5)
{document.write ("Bom dia")}
        else if (now.getHours () >= 5 && now.getHours () < 12)
{document.write ("Bom dia") }
        else if (now.getHours () >= 12 && now.getHours () < 18)
{document.write ("Boa tarde") }
else
{document.write ("Boa noite") }
</script>
<?php echo "<font color='#BA0009'>".$_SESSION["DS_USUARIO"]."</font>";?>, o que deseja visualizar?</h5>
        <div class="clearfix"></div>
        <br/>
        <div class="one_fourth">
          <div class="img_ho_st_holder">
            <div class="img_ho_st4">
              <div class="text">
                <h3>Parciais</h3>
                <p>Escolha abaixo qual a parcial você deseja visualizar</p>
                <br/>
                <a href="parciais_alimentar_pr.php" class="readmore_small green">PR</a><a href="parciais_alimentar_sc.php" class="readmore_small">SC</a><a href="parciais_alimentar_rs.php" class="readmore_small red">RS</a><a href="parciais_farma.php" class="readmore_small yellow">FM</a> </div>
              <div class="imgbox"><img src="images/media/icone_parciais.jpg" alt=""/></div>
            </div>
          </div>
        </div>
        <!--end item-->
        
        <div class="one_fourth">
          <div class="img_ho_st_holder">
            <div class="img_ho_st4">
              <div class="text">
                <h3>Grupos</h3>
                <p>Escolha abaixo qual o grupo você deseja visualizar</p>
                <br/>
                <a href="grupos.php" class="readmore_small green">Grupos Varejo</a><a href="grupos_farma.php" class="readmore_small blue">Farma</a></div>
              <div class="imgbox"> <img src="images/media/icone_grupos.jpg" alt=""/></div>
            </div>
          </div>
        </div>
        <!--end item-->
        
        <div class="one_fourth">
          <div class="img_ho_st_holder">
            <div class="img_ho_st4">
              <div class="text">
                <h3>Galeria de Fotos</h3>
                <p>Clique no botão abaixo para ver as galerias de fotos</p>
                <br/>
                <a href="galeria_de_fotos.php" class="readmore_small green">Abertura Campanha de Verão</a> </div>
              <div class="imgbox"> <img src="images/media/icon_fotos.jpg" alt=""/></div>
            </div>
          </div>
        </div>
        <!--end item-->
        
        <div class="one_fourth last">
          <div class="img_ho_st_holder">
            <div class="img_ho_st4">
              <div class="text">
                <h3>Itens Foco</h3>
                <p>Clique abaixo para visualizar tabela de itens foco</p>
                <br/>
                <a href="itens_foco.php" class="readmore_small red">Itens Foco</a> </div>
              <div class="imgbox"> <img src="images/media/icone_item_foco.jpg" alt=""/></div>
           </div>
          </div>
        </div>
        <!--end item--> 
        
      </div>
      <!--end bloco--> 
    </div>
  </div>
  <div class="margin_top5"></div>
  <!--end image hovers-->
<!--- FIM PÁGINAS --->
<!--- COMENTÁRIOS TRANSIÇÃO --->
        <div class="clearfix"></div>
  			<div class="section_holder36">
    			<div class="container">
      			<div class="section_title_line_full"></div>
      			<div class="clearfix"></div>
      			<section class="slider">
      			<div class="flexslider style6">
         	 	<ul class="slides">
                <?php $SQL = "select * from comments where is_approved='1'";
	      	 	 $SQL .= " order by dated desc limit 5 ";
		   	  	 $RSS = mysql_query($SQL, $conexao2);
		   	  	 while($RS = mysql_fetch_array($RSS))
			 	 {?>
            	<li>
              	<div class="">
                <div class="text_holder">
                  <p><b><?php echo $RS['name'];?> (<?php echo $RS['town'];?>) Diz...</b></p>
                  <p><?php $tamanho = strlen($RS["comment"]);
						if($tamanho < 50){
						echo $RS["comment"]."&nbsp;";
						}else{
						echo substr($RS["comment"],0,350)." ....";};
				 ?><a href="comentarios.php"><font color="#CC0000"> &nbsp; Ver Mais</a></font>
                 <?php }?>
                    </p>
                </div>
              </div>
            </li>
          </ul>
		 <!-- FIM COMENTÁRIOS TRANSIÇÃO -->
          </ul>
        </div>
      </section>
    </div>
  </div>
  </div>
  </div>
  </div>
<!--end section-->
<!--- INÍCIO FOOTER --->   
<!--- 
*************************************************************************
LOGADO COMO "FORNECEDOR" SOMENTE PODE VER OS ITENS "PARCIAIS" "FORNECEDORES" E "CONTATO" 
*************************************************************************
--->
  <div class="footer1 two">
    <div class="container">
      <div class="one_fourth">
        <h4 class="white">Alimentar</h4>
        <div class="footer_title_line"></div>
        <ul class="quick_links">
          <li><a href="itens_foco.php">Itens Foco</a></li>
          <li><a href="grupos.php">Grupos</a></li>
        </ul>
        <!---NEWSLETTER
        <div class="newsletter">
          <p class="padd_bot1 margin_top1"> Fique por dentro das novidades!</p>
          <form method="get" action="envia_cadastro_newsletter.php">
            <input class="email_input" name="email" id="email" value="Digite seu e-mail" onFocus="if(this.value == 'Digite seu e-mail') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Digite seu e-mail';}" type="text">
            <input name="" value="Enviar" class="email_submit two" type="submit">
          </form>
        </div>
        --->
      </div>
      <!--FIM BLOCO 1-->
      <div class="one_fourth">
        <h4 class="white">Farma</h4>
        <div class="footer_title_line"></div>
        <ul class="quick_links">
          <li><a href="bingo_farma.php">Bingo</a></li>
          <li><a href="grupos_farma.php">Grupos</a></li>
        </ul>
        </div> 
      <!--FIM BLOCO 2-->
      <div class="one_fourth">
        <h4 class="white">Novidades</h4>
        <div class="footer_title_line"></div>
        <ul class="quick_links">
          <li><a href="galeria_de_fotos.php">Galeria de fotos</a></li>
          <li><a href="videos.php">Vídeos</a></li>
        </ul>
      </div>
      <!--FIM BLOCO 3--> 
      <div class="one_fourth last">
        <h4 class="white">Links úteis</h4>
        <div class="footer_title_line"></div>
        <ul class="quick_links">
          <li><a href="contato.php">Contato</a></li>
          <li><a href="fornecedores.php">Fornecedores</a></li>          
        </ul>
      </div>
      <!--FIM BLOCO 4--> 
    </div>
  </div>
  <!--- COPYRIGHT --->
<div class="copyrights">
    <div align="center" class="container">
    <div class="one_half" style="width:100%;"><span>© 2015 Grupo Pedro Muffato. Todos os direitos reservados.</span></div>
</div>
<!--- FIM COPYRIGHT --->
<!--- FIM DO FOOTER --->      
<!--- BOTAO VOLTAR AO TOPO --->
<a href="#" class="scrollup" title="Ir ao Topo"></a>
<!--- BOTÃO FLUTUANTE --->
<style type='text/css'>
@import url(http://weloveiconfonts.com/api/?family=entypo);
[class*="entypo-"]:before {
font-family: 'entypo', sans-serif;
}
/* ---------- GERAL ---------- */
#social-sidebar a { text-decoration: none; }
#social-sidebar ul {
list-style: none;
margin: 0;
padding: 0;
}
/* ---------- Sidebar ---------- */
#social-sidebar {
left: 0;
margin-top: -75px; /* (li * a:width) / -2 */
position: fixed;
top: 50%;
}
#social-sidebar ul li:first-child a { border-radius: 0 5px 0 0; }
#social-sidebar ul li:last-child a { border-radius: 0 0 5px 0; }
#social-sidebar ul li a {
background: #121212;
color: #fff;
display: block;
height: 50px;
font-size: 18px;
line-height: 50px;
position: relative;
text-align: center;
width: 50px;
}
#social-sidebar ul li a:hover span {
left: 130%;
opacity: 1;
}
#social-sidebar ul li a span {
border-radius: 3px;
line-height: 24px;
left: -100%;
margin-top: -16px;
-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
filter: alpha(opacity=0);
opacity: 0;
padding: 4px 8px;
position: absolute;
-webkit-transition: opacity .3s, left .4s;
-moz-transition: opacity .3s, left .4s;
-ms-transition: opacity .3s, left .4s;
-o-transition: opacity .3s, left .4s;
transition: opacity .3s, left .4s;
top: 50%;
z-index: -1;
}
#social-sidebar ul li a span:before {
content: "";
display: block;
height: 8px;
left: -4px;
margin-top: -4px;
position: absolute;
top: 50%;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
width: 8px;
z-index: -2;
}
#social-sidebar ul li a[class*="linkedin"]:hover,
#social-sidebar ul li a[class*="linkedin"] span,
#social-sidebar ul li a[class*="linkedin"] span:before { background: #06C; }
#social-sidebar ul li a[class*="comment"]:hover,
#social-sidebar ul li a[class*="comment"] span,
#social-sidebar ul li a[class*="comment"] span:before { background: #E34429; }
#social-sidebar ul li a[class*="tumblr"]:hover,
#social-sidebar ul li a[class*="tumblr"] span,
#social-sidebar ul li a[class*="tumblr"] span:before { background: #1769ff; }
#social-sidebar ul li a[class*="download"]:hover,
#social-sidebar ul li a[class*="download"] span,
#social-sidebar ul li a[class*="download"] span:before { background: #00A859; }
#social-sidebar ul li a[class*="calendar"]:hover,
#social-sidebar ul li a[class*="calendar"] span,
#social-sidebar ul li a[class*="calendar"] span:before { background: #f57b05; }
</style>
<div id='social-sidebar'>
<ul>
<li>
<a class='entypo-linkedin' href='https://www.linkedin.com/company/muffat%C3%A3o-atacado-distribuidor' target='_blank'>
<span>Muffatão no LinkedIn</span>
</a>
</li>
<li>
<a class='entypo-comment' href='comentarios.php'>
<span>Deixe seu comentário</span>
</a>
</li>
<li>
<a class='entypo-calendar' href="#login-box">
<span>Calendário Parciais</span>
</a>
</li>
<li>
<a class='entypo-download' href='download/pontuacao.xlsx' target='_blank'>
<span>Download Pontos</span>
</a>
</li><!--
<li>
<a class='entypo-rss' href='#' target='_blank'>
<span>feedburner</span>
</a>
</li>--->
</ul>
</div>
<div id="login-box" class="login-popup">
<a href="" class="close"><img src="images/login/close_pop.png" class="btn_close" title="Fechar" alt="Close" /></a>
	<p align="center" style="color:#FF0"><strong>14ª CAMPANHA DE VERÃO MUFFATÃO <br>01/11/2015 à 28/02/2016</strong></p>
    <div class="divider_dashed4"></div>
 		<li><strong>1ª Parcial 21/11/2015 – Período de 01/11/2015 à 18/11/2015</strong></li>
		<li><strong>2ª Parcial 05/12/2015 – Período de 01/11/2015 à 02/12/2015</strong></li>
		<li><strong>3ª Parcial 19/12/2015 – Período de 01/11/2015 à 16/12/2015</strong></li>
		<li><strong>4ª Parcial 09/01/2016 – Período de 01/11/2015 à 06/01/2016</strong></li>
		<li><strong>5ª Parcial 23/01/2016 – Período de 01/11/2015 à 20/01/2016</strong></li>
		<li><strong>6ª Parcial 06/02/2016 – Período de 01/11/2015 à 03/02/2016</strong></li>
		<li><strong>7ª Parcial 20/02/2016 – Período de 01/11/2015 à 17/02/2016</strong></li>      
</div>
</div>

<style type="text/css">

#content2 {	float: left; width: 100%;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }

.btn-sign {
	width:150px;
	margin-bottom:20px;
	margin:0 auto;
	padding:5px;
	border-radius:0px;
	background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
	background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
	text-align:center;
	font-size:12px;
	color:#fff;
	text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

#mask {
	display: none;
	background: #000; 
	position: fixed; left: 0; top: 0; 
	z-index: 10;
	width: 100%; height: 100%;
	opacity: 0.8;
	z-index: 999;
}

.login-popup{
	display:none;
	background: rgba(3, 0, 0, 0.87);
	padding: 10px; 	
	border: 2px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	box-shadow: 0px 0px 20px #999;
	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
	border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}

img.btn_close {
	float: right; 
	margin: -28px -28px 0 0;
}

fieldset { 
	border:none; 
}

form.signin .textbox label { 
	display:block; 
	padding-bottom:7px; 
}

form.signin .textbox span { 
	display:block;
}

form.signin p, form.signin span { 
	color:#999; 
	font-size:11px; 
	line-height:18px;
} 

form.signin .textbox input { 
	background:#666666; 
	border-bottom:1px solid #333;
	border-left:1px solid #000;
	border-right:1px solid #333;
	border-top:1px solid #000;
	color:#fff; 
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px;
    -webkit-border-radius: 3px;
	font:13px Arial, Helvetica, sans-serif;
	padding:6px 6px 4px;
	width:200px;
}

.button:hover { background:#ddd; }

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('a.entypo-calendar').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return true;
	});
});
</script>
</body>
</html>