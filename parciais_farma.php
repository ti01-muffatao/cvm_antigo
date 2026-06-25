<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
?>
<?php include "conexao2.php";?>
<script language="javascript">
//setTimeout("document.location = 'index.php'",10);
</script>
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
      <!-- NOTIFICAÇÃO
              <div class="call_to_action" align="center">
               <div class="center"><span class="title_big three"><img style="width: 300px; height:auto" src="images/atencao.gif"><br><br></span>
                  <p>Os Representantes que não estão listados nas tabelas de pontuação não fecharam as metas mínimas até <b>31/01/2016</b>.  Portanto estão desclassificados da 14ª Campanha de Verão Muffatão, conforme estipulado no regulamento.</p>
                </div>
              </div>
		 NOTIFICAÇÃO -->
        <h3>Parciais Farma até 
        <?php $SQL = "select dt_data as data from pontuacao order by dt_data desc limit 1";
		  	  $RSS = mysql_query($SQL, $conexao);
		      while($RS = mysql_fetch_array($RSS))
		{?>
<font color="#C30009"><a onMouseOver="toolTip('<b>DATA DA ÚLTIMA PARCIAL')" onMouseOut="toolTip()" animatescroll();"><?php echo date("d-m-Y", strtotime($RS["data"])-1);}?></a></font></h3>
        <ul class="tabs7">
          <li><a href="#grupo-1" target="_self">GRUPO 01 FARMA</a></li>
          <li><a href="#grupo-2" target="_self">GRUPO 02 FARMA</a></li>
        </ul>
        <div class="tabs-content7">
        <!-- INICIO GRUPO 1 -->
          <div id="grupo-1" class="tabs-panel7">
            <p>
             <?php $RSS = mysql_query("select * from grupos where cd_grupo = 19 order by cd_grupo asc", $conexao);
		   while($RS = mysql_fetch_array($RSS)){?>
            <h3>Grupo 01</h3>
            <?php
			echo "<h5>Meta Mínima: ".$RS["vl_metam"]."</h5>";
			echo "<h5>Meta Geral: ".$RS["vl_metag"]."</h5>";
			$metageralgrupo19 = $RS["vl_metag"];
		   }?>
            <div class="table-style">
         <table class="table-list2">
            <tr>
              <th>Ranking</th>
              <th>Código</th>
              <th>Nome</th>
              <th>Sup.</th>
              <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
			  	$i = $i + 1;
			  	$forne[$i] = $RS["cd_fornecedor"];?>
              	<th><?php echo $RS["ds_razao"];?></th>
			  <?php }?>
              <th>Total</th>
            </tr>
			<?php $SQL = "select u.ds_usuario, p.cd_codigo, u.cd_grupo, sum(p.cd_pontos) as pontos from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 and u.cd_grupo = 19 and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
			$SQL .= " group by u.ds_usuario, p.cd_codigo order by pontos desc";
			$RSS = mysql_query($SQL, $conexao);
			while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$tt = $tt + $RS["pontos"];
				?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $x;?>º</td>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
				<td><?php echo BuscaDSSupervisor($RS["cd_codigo"]);?></td>
				<?php for($k = 1; $k <= $i; $k++){
				$SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' and u.cd_grupo =  '".$RS["cd_grupo"]."'";
					$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
					$RQQ = mysql_query($SQQ, $conexao);
					$RQ = mysql_fetch_assoc($RQQ);
					//TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
					$total = $RS["pontos"];
					$meta = $metageralgrupo19;
					//MENSAGEM SE ATINGIR META
					$mensagem = '';
					if($total >= $meta){
					$mensagem = '<img src="images/icones/verdadeiro.png">';
					} else {
					$mensagem = '<img src="images/icones/falso.png">';
					}
					?>
					<td><?php echo number_format(round($RQ["pt"]), 0, '', '.');?></td>
					<?php }?>
                    <td><?php echo number_format(round($RS["pontos"]), 0, '', '.');?> <?php echo $mensagem;?></td>
                    </tr>
			<?php }?>
            <tr>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <?php for($w = 1; $w <= $i; $w++){
				$SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
				$SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 19 and u.cd_ativo = 1 and u.cd_mostrar = 1 ";
				$RQW = mysql_query($SQW, $conexao);
				$RW = mysql_fetch_assoc($RQW);
				echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
			  }?>
              <th><?php echo number_format(round($tt), 0, '', '.');?></th>
              </tr>
          </table>
          <?php unset($tt, $w, $i, $mensagem, $meta, $x, $total);?>
        </div>
        </p>
          </div>
          <!-- FIM GRUPO 1 -->
         
          <!-- INICIO GRUPO 2 -->
          <div id="grupo-2" class="tabs-panel7">
            <p>
            <?php $RSS = mysql_query("select * from grupos where cd_grupo = 20 order by cd_grupo asc", $conexao);
		   while($RS = mysql_fetch_array($RSS)){?>
            <h3>Grupo 02</h3>
            <?php
			echo "<h5>Meta Mínima: ".$RS["vl_metam"]."</h5>";
			echo "<h5>Meta Geral: ".$RS["vl_metag"]."</h5>";
			$metageralgrupo20 = $RS["vl_metag"];
		   }?>
            <div class="table-style">
         <table class="table-list2">
            <tr>
              <th>Ranking</th>
              <th>Código</th>
              <th>Nome</th>
              <th>Sup.</th>
              <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
			  	$i = $i + 1;
			  	$forne[$i] = $RS["cd_fornecedor"];?>
              	<th><?php echo $RS["ds_razao"];?></th>
			  <?php }?>
              <th>Total</th>
            </tr>
			<?php $SQL = "select u.ds_usuario, p.cd_codigo, u.cd_grupo, sum(p.cd_pontos) as pontos from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.cd_mostrar = 1 and u.cd_grupo = 20 and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
			$SQL .= " group by u.ds_usuario, p.cd_codigo order by pontos desc";
			$RSS = mysql_query($SQL, $conexao);
			while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$tt = $tt + $RS["pontos"];
				?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $x;?>º</td>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
				<td><?php echo BuscaDSSupervisor($RS["cd_codigo"]);?></td>
				<?php for($k = 1; $k <= $i; $k++){
				$SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' and u.cd_grupo =  '".$RS["cd_grupo"]."'";
					$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
					$RQQ = mysql_query($SQQ, $conexao);
					$RQ = mysql_fetch_assoc($RQQ);
					//TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
					$total = $RS["pontos"];
					$meta = $metageralgrupo20;
					//MENSAGEM SE ATINGIR META
					$mensagem = '';
					if($total >= $meta){
					$mensagem = '<img src="images/icones/verdadeiro.png">';
					} else {
					$mensagem = '<img src="images/icones/falso.png">';
					}
					?>
					<td><?php echo number_format(round($RQ["pt"]), 0, '', '.');?></td>
					<?php }?>
                    <td><?php echo number_format(round($RS["pontos"]), 0, '', '.');?> <?php echo $mensagem;?></td>
                    </tr>
			<?php }?>
            <tr>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <?php for($w = 1; $w <= $i; $w++){
				$SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
				$SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 20 and u.cd_ativo = 1 and u.cd_mostrar = 1 ";
				$RQW = mysql_query($SQW, $conexao);
				$RW = mysql_fetch_assoc($RQW);
				echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
			  }?>
              <th><?php echo number_format(round($tt), 0, '', '.');?></th>
              </tr>
          </table>
          <?php unset($tt, $w, $i, $mensagem, $meta, $x, $total);?>
        </div>
        </p>
          </div>
          <!-- FIM GRUPO 2 -->
        </div>
      </div>
      </div>
      <!-- FIM DAS TABELAS GRUPOS --> 
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