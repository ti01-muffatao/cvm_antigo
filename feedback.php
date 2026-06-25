<?php include "administrar/ora_connect.php";
if($_SESSION["CD_USUARIO"] == "" || $_SESSION["CD_PERFIL"] != 6 && $_SESSION["CD_PERFIL"] != 2){echo "<script language='javascript'>window.open('sair.php', '_self');</script>";}

$getPergunta = $_GET['pergunta'];
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
<title>18ª Campanha de Verão Muffatão</title>
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

<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/stylesheets/theme-custom.css">
<script src="http://portal.muffatao.com.br/pag/assets/vendor/modernizr/modernizr.js"></script>


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
</head>
<body style="margin-top:-25px;">
<?php include "menu.php";?>
  <div class="clearfix"></div>
  <div class="section_holdergrupos">
    <div class="container">
      <div class="one_full">
        <h3>Feedback Muffatão</h3>
        
        <div class="tabs-content7">
            <h3>Peguntas e respostas</h3>
            <div class="divider"></div>
            <div class="table-style">
            <table class="table-list2">
              <tr>
                  <th>Nome</th>
                  <th>Filial</th>
                  <th>Pergunta</th>
                  <th>Resposta</th>
              </tr>
              <?php
                $SQL = "select * from cap_feedback";
                if(isset($getPergunta)){
                  $SQL .= " where cd_pergunta = '".$getPergunta."' " ;                      
                }
                $RSS = mysql_query($SQL,$conexao);
                while($RS = mysql_fetch_array($RSS)){?>
                <tr>
                    <td><?php echo $RS['ds_usuario'];?></td>
                    <td><?php echo BuscaFilial($RS['cd_filial']);?></td>
                    <td><?php echo $RS['ds_pergunta'];?></td>
                    <td><?php echo $RS['ds_resposta'];?></td>
                </tr>
              <?php }?>
           </table>
            <br>
            </div>
        </div>
      </div>
      </div>
      <!-- FIM DAS TABELAS GRUPOS --> 
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
<?php include "footer.php";?>
</body>
</html>