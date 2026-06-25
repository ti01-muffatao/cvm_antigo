<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
if( in_array($_SESSION['CD_PERFIL'], array('1','2','3','4','5','6'))){
//conecta BD comentarios//
include "conexao2.php";
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
<link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen"/>
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
<script  src="js/flexslider/jquery.flexslider.js"></script> 
<script  src="js/flexslider/custom.js"></script>
</head>
<body style="margin-top:-25px;">
<?php include "menu.php";?>
  <div class="clearfix"></div>
<!--- INICIO PAGINA --->
<!--- INICIO TABELA DE PONTOS *** OS DOIS GRUPOS CONCORREM ENTRE SI, NÃO HÁ DIVISÃO DE ESTADOS *** --->
  <div class="section_holdergrupos">
    <div class="container">
      <div class="one_full">
        <h3>Parciais Itens Foco Santa Catarina</h3>
        <ul class="tabs7">
          <li><a href="#novembro" target="_self">NOVEMBRO</a></li>
          <li><a href="#dezembro" target="_self">DEZEMBRO</a></li>
          <li><a href="#janeiro" target="_self">JANEIRO</a></li>
          <li><a href="#fevereiro" target="_self">FEVEREIRO</a></li>
        </ul>
        <div class="tabs-content7">
        <!-- INICIO NOVEMBRO -->
          <div id="novembro" class="tabs-panel7">
            <p>
            <div class="table-style">
          <table class="table-list2">
          <tr>
          	  <th></th>
              <th></th>
              <th></th>
              <th style="background-color: #139E0A;">CARGILL</th>
              <th style="background-color: #139E0A;">CARGILL</th>
              <th style="background-color: #000;">GE</th>
              <th style="background-color: #000;">GE</th>
              <th style="background-color: #5DEA54;">MAT INSET</th>
              <th style="background-color: #5DEA54;">MAT INSET</th>
              <th style="background-color: #570258;">MOND.</th>
              <th style="background-color: #570258;">MOND.</th>
              <th style="background-color: #3A75E0;">UNIL.</th>
              <th style="background-color: #3A75E0;">UNIL.</th>
              <th style="background-color: #012669;">YPÊ</th>
              <th style="background-color: #012669;">YPÊ</th>
            </tr>
            <tr>
              <th>Cód.</th>
              <th>Nome</th>
              <th>Grupo</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
            </tr>
			<?php $SQL = "select * from item_foco where cd_estado = 2 and cd_mes = 1 and cd_parcial = 1";
				  //$SQL .= " and cd_parcial = (select cd_parcial from item_foco order by cd_parcial desc limit 1)-1 ";
				  $SQL .= " order by ds_usuario asc";
				  $RSS = mysql_query($SQL, $conexao);
				  while($RS = mysql_fetch_array($RSS)){
			  
			?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
                <td><?php echo $RS["ds_grupo"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. CARGILL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f1"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA CARGILL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f1"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. GE')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f2"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA GE')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f2"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. MAT INSET')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f3"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA MAT INSET')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f3"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. MONDELEZ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f4"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA MONDELEZ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f4"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. UNILEVER')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f5"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA UNILEVER')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f5"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. YPÊ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f6"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA YPÊ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f6"];?></td>
				</tr>
			   <?php }?>
          </table>
          <h5>Parcial dos Itens Foco até 
          <?php $SQL = "select cd_parcial, DATE_FORMAT(dt_data, '%d/%m/%y') as data from item_foco order by cd_parcial desc limit 1";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS))
		  {?>
	<font color="#C30009"><a onMouseOver="toolTip('<b>DATA DA ÚLTIMA PARCIAL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["data"];}?></a></font></h5>
        </div>
        </p>
          </div>
          <!-- FIM NOVEMBRO -->
          
        <!-- INICIO DEZEMBRO -->
          <div id="dezembro" class="tabs-panel7">
            <p>
            <div class="table-style">
          <table class="table-list2">
          <tr>
          	  <th></th>
              <th></th>
              <th></th>
              <th style="background-color: #139E0A;">CARGILL</th>
              <th style="background-color: #139E0A;">CARGILL</th>
              <th style="background-color: #000;">GE</th>
              <th style="background-color: #000;">GE</th>
              <th style="background-color: #5DEA54;">MAT INSET</th>
              <th style="background-color: #5DEA54;">MAT INSET</th>
              <th style="background-color: #570258;">MOND.</th>
              <th style="background-color: #570258;">MOND.</th>
              <th style="background-color: #3A75E0;">UNIL.</th>
              <th style="background-color: #3A75E0;">UNIL.</th>
              <th style="background-color: #012669;">YPÊ</th>
              <th style="background-color: #012669;">YPÊ</th>
            </tr>
            <tr>
              <th>Cód.</th>
              <th>Nome</th>
              <th>Grupo</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
            </tr>
			<?php $SQL = "select * from item_foco where cd_estado = 2 and cd_mes = 2 and cd_parcial = 2";
		   //$SQL .= " and cd_parcial = (select cd_parcial from item_foco order by cd_parcial desc limit 1) ";
	       $SQL .= " order by ds_usuario asc";
		   $RSS = mysql_query($SQL, $conexao);
		   while($RS = mysql_fetch_array($RSS)){
			  
			?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
                <td><?php echo $RS["ds_grupo"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. CARGILL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f1"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA CARGILL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f1"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. GE')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f2"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA GE')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f2"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. MAT INSET')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f3"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA MAT INSET')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f3"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. MONDELEZ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f4"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA MONDELEZ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f4"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. UNILEVER')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f5"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA UNILEVER')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f5"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. YPÊ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f6"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA YPÊ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f6"];?></td>
				</tr>
			   <?php }?>
          </table>
          <h5>Parcial dos Itens Foco até 
          <?php $SQL = "select cd_parcial, DATE_FORMAT(dt_data, '%d/%m/%y') as data from item_foco order by cd_parcial desc limit 1";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS))
		  {?>
	<font color="#C30009"><a onMouseOver="toolTip('<b>DATA DA ÚLTIMA PARCIAL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["data"];}?></a></font></h5>
        </div>
        </p>
          </div>
          <!-- FIM DEZEMBRO -->
          
        <!-- INICIO JANEIRO -->
          <div id="janeiro" class="tabs-panel7">
            <p>
            <div class="table-style">
          <table class="table-list2">
          <tr>
          	  <th></th>
              <th></th>
              <th></th>
              <th style="background-color: #139E0A;">CARGILL</th>
              <th style="background-color: #139E0A;">CARGILL</th>
              <th style="background-color: #000;">GE</th>
              <th style="background-color: #000;">GE</th>
              <th style="background-color: #5DEA54;">MAT INSET</th>
              <th style="background-color: #5DEA54;">MAT INSET</th>
              <th style="background-color: #570258;">MOND.</th>
              <th style="background-color: #570258;">MOND.</th>
              <th style="background-color: #3A75E0;">UNIL.</th>
              <th style="background-color: #3A75E0;">UNIL.</th>
              <th style="background-color: #012669;">YPÊ</th>
              <th style="background-color: #012669;">YPÊ</th>
            </tr>
            <tr>
              <th>Cód.</th>
              <th>Nome</th>
              <th>Grupo</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
            </tr>
			<?php $SQL = "select * from item_foco where cd_estado = 2 and cd_mes = 3 and cd_parcial = 3";
		   //$SQL .= " and cd_parcial = (select cd_parcial from item_foco order by cd_parcial desc limit 1) ";
	       $SQL .= " order by ds_usuario asc";
		   $RSS = mysql_query($SQL, $conexao);
		   while($RS = mysql_fetch_array($RSS)){
			  
			?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
                <td><?php echo $RS["ds_grupo"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. CARGILL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f1"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA CARGILL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f1"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. GE')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f2"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA GE')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f2"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. MAT INSET')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f3"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA MAT INSET')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f3"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. MONDELEZ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f4"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA MONDELEZ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f4"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. UNILEVER')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f5"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA UNILEVER')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f5"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. YPÊ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f6"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA YPÊ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f6"];?></td>
				</tr>
			   <?php }?>
          </table>
          <h5>Parcial dos Itens Foco até 
          <?php $SQL = "select cd_parcial, DATE_FORMAT(dt_data, '%d/%m/%y') as data from item_foco order by cd_parcial desc limit 1";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS))
		  {?>
	<font color="#C30009"><a onMouseOver="toolTip('<b>DATA DA ÚLTIMA PARCIAL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["data"];}?></a></font></h5>
        </div>
        </p>
          </div>
          <!-- FIM JANEIRO -->
          
        <!-- INICIO FEVEREIRO -->
          <div id="fevereiro" class="tabs-panel7">
            <p>
            <div class="table-style">
          <table class="table-list2">
          <tr>
          	  <th></th>
              <th></th>
              <th></th>
              <th style="background-color: #139E0A;">CARGILL</th>
              <th style="background-color: #139E0A;">CARGILL</th>
              <th style="background-color: #000;">GE</th>
              <th style="background-color: #000;">GE</th>
              <th style="background-color: #5DEA54;">MAT INSET</th>
              <th style="background-color: #5DEA54;">MAT INSET</th>
              <th style="background-color: #570258;">MOND.</th>
              <th style="background-color: #570258;">MOND.</th>
              <th style="background-color: #3A75E0;">UNIL.</th>
              <th style="background-color: #3A75E0;">UNIL.</th>
              <th style="background-color: #012669;">YPÊ</th>
              <th style="background-color: #012669;">YPÊ</th>
            </tr>
            <tr>
              <th>Cód.</th>
              <th>Nome</th>
              <th>Grupo</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
              <th>Real.</th>
              <th>Faltam</th>
            </tr>
			<?php $SQL = "select * from item_foco where cd_estado = 2 and cd_mes = 4 and cd_parcial = 4";
		   //$SQL .= " and cd_parcial = (select cd_parcial from item_foco order by cd_parcial desc limit 1) ";
	       $SQL .= " order by ds_usuario asc";
		   $RSS = mysql_query($SQL, $conexao);
		   while($RS = mysql_fetch_array($RSS)){
			  
			?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
                <td><?php echo $RS["ds_grupo"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. CARGILL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f1"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA CARGILL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f1"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. GE')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f2"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA GE')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f2"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. MAT INSET')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f3"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA MAT INSET')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f3"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. MONDELEZ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f4"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA MONDELEZ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f4"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. UNILEVER')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f5"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA UNILEVER')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f5"];?></td>
                <td a onMouseOver="toolTip('<b>REAL. YPÊ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["real_f6"];?></td>
				<td a onMouseOver="toolTip('<b>FALTA YPÊ')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["falta_f6"];?></td>
				</tr>
			   <?php }?>
          </table>
          <h5>Parcial dos Itens Foco até 
          <?php $SQL = "select cd_parcial, DATE_FORMAT(dt_data, '%d/%m/%y') as data from item_foco order by cd_parcial desc limit 1";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS))
		  {?>
	<font color="#C30009"><a onMouseOver="toolTip('<b>DATA DA ÚLTIMA PARCIAL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["data"];}?></a></font></h5>
        </div>
        </p>
          </div>
          <!-- FIM FEVEREIRO -->
        </div>
      </div>
      </div>
  <!-- FIM DA PAGINA -->
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
<?php }else{
echo "<script language='javascript'>window.open('404.php', '_self');</script>";	
}?>