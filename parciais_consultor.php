<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
if( in_array($_SESSION['CD_PERFIL'], array('1','2','3','5','6'))){
//conecta BD comentarios//
include "conexao2.php";
?>
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
        <h3>Parciais Consultores</h3>
        <ul class="tabs7">
         <!-- <li><a href="#grupo-1" target="_self">ADRIANO</a></li>-->
          <li><a href="#grupo-2" target="_self">AUGUSTO</a></li>
          <li><a href="#grupo-3" target="_self">DEIVID</a></li>
          <!--<li><a href="#grupo-4" target="_self">WAGNER</a></li>-->
          <li><a href="#grupo-5" target="_self">WILLIAN</a></li>
        </ul>
        <div class="tabs-content7">
        <!-- INICIO GESTOR 1 -->
          <div id="grupo-1" class="tabs-panel7">
            <p>
            <?php $RSS = mysql_query("select count(cd_codigo) as rcatotal, consultor from usuarios where consultor = 141 ", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
				  $perceadriano = ($RS["rcatotal"] * 90)/100;
			  }?>
            <h3>Adriano</h3>
            <?php //$SQL = "select vl_metam from meta_individual where cd_usuario = 2";
		   	  //$RSS = mysql_query($SQL, $conexao);
		   	  //while($RS = mysql_fetch_array($RSS))
			  //$metagestor = $metagestor + $RS["vl_metam"];
			  $metaconsultor = 90;?>
              <h5>Meta: <font color="#C30009"><?php echo $metaconsultor;?>%</font> da equipe com as metas mínimas cumpridas de cada fornecedor</h5>
              <h5>90% equivale a <font color="#00a859"><?php echo ceil($perceadriano);?> RCA´s</font> do total da equipe.</h5>
            <div class="table-style">
          <table class="table-list2">
            <tr>
              <th>Rank.</th>
              <th>Código</th>
              <th>Nome</th>
              <th>M. Mínima</th>
              <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
			  	$i = $i + 1;
			  	$forne[$i] = $RS["cd_fornecedor"];?>
              	<th><?php echo $RS["ds_razao"];?></th>
			  <?php }?>
              <th>PONTOS</th>
            </tr>
			<?php $SQL = "select u.ds_usuario, u.consultor, u.cd_grupo, g.cd_grupo, g.vl_metam, p.cd_codigo, sum(p.cd_pontos) as pontos from pontuacao as p, usuarios as u, grupos as g where p.cd_codigo = u.cd_codigo and u.cd_grupo = g.cd_grupo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.consultor = 141 and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
			$SQL .= " group by u.ds_usuario, p.cd_codigo order by pontos desc";
			$RSS = mysql_query($SQL, $conexao);
			while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$tt = $tt + $RS["pontos"];
				$metaminima = $RS["vl_metam"];
				?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $x;?>º</td>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
				<td><strong><?php echo number_format(round($RS["vl_metam"]), 0, '', '.');?></strong></td>
				<?php for($k = 1; $k <= $i; $k++){
				$SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' ";
					$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
					$RQQ = mysql_query($SQQ, $conexao);
					$RQ = mysql_fetch_assoc($RQQ);
					//TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
					$total = $RS["pontos"];
					//MENSAGEM SE ATINGIR META
					$mensagem = '';
					if($RQ["pt"] >= $metaminima){
					$mensagem = '<img src="images/icones/verdadeiro.png">';
					} else {
					$mensagem = '<img src="images/icones/falso.png">';
					}
					?>
					<td><?php echo number_format(round($RQ["pt"]), 0, '', '.');?> <?php echo $mensagem;?></td>
					<?php }?>
                    <td><?php echo number_format(round($RS["pontos"]), 0, '', '.');?></td>
                    </tr>
			<?php }?>
            <tr>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <?php for($w = 1; $w <= $i; $w++){
				$SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
				$SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 1 and u.cd_ativo = 1 ";
				$RQW = mysql_query($SQW, $conexao);
				$RW = mysql_fetch_assoc($RQW);
				echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
			  }?>
              <th><?php echo number_format(round($tt), 0, '', '.');?></th>
              </tr>
          </table>
          <?php unset($tt, $w, $i, $mensagem, $metaminima, $x, $total);?>
        </div>
        </p>
          </div>
          <!-- FIM GESTOR 1 -->
          
          <!-- INICIO GESTOR 2 -->
          <div id="grupo-2" class="tabs-panel7">
          <p>
            <?php $RSS = mysql_query("select count(cd_codigo) as rcatotal, consultor from usuarios where consultor = 140 ", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
				  $perceaugusto = ($RS["rcatotal"] * 90)/100;
			  }?>
            <h3>Augusto</h3>
              <h5>Meta: <font color="#C30009"><?php echo $metaconsultor;?>%</font> da equipe com as metas mínimas cumpridas de cada fornecedor</h5>
              <h5>90% equivale a <font color="#00a859"><?php echo ceil($perceaugusto);?> RCA´s</font> do total da equipe.</h5>
            <div class="table-style">
          <table class="table-list2">
            <tr>
              <th>Rank.</th>
              <th>Código</th>
              <th>Nome</th>
              <th>M. Mínima</th>
              <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
			  	$i = $i + 1;
			  	$forne[$i] = $RS["cd_fornecedor"];?>
              	<th><?php echo $RS["ds_razao"];?></th>
			  <?php }?>
              <th>PONTOS</th>
            </tr>
			<?php $SQL = "select u.ds_usuario, u.consultor, u.cd_grupo, g.cd_grupo, g.vl_metam, p.cd_codigo, sum(p.cd_pontos) as pontos from pontuacao as p, usuarios as u, grupos as g where p.cd_codigo = u.cd_codigo and u.cd_grupo = g.cd_grupo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.consultor = 140 and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
			$SQL .= " group by u.ds_usuario, p.cd_codigo order by pontos desc";
			$RSS = mysql_query($SQL, $conexao);
			while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$tt = $tt + $RS["pontos"];
				$metaminima = $RS["vl_metam"];
				?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $x;?>º</td>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
				<td><strong><?php echo number_format(round($RS["vl_metam"]), 0, '', '.');?></strong></td>
				<?php for($k = 1; $k <= $i; $k++){
				$SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' ";
					$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
					$RQQ = mysql_query($SQQ, $conexao);
					$RQ = mysql_fetch_assoc($RQQ);
					//TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
					$total = $RS["pontos"];
					//MENSAGEM SE ATINGIR META
					$mensagem = '';
					if($RQ["pt"] >= $metaminima){
					$mensagem = '<img src="images/icones/verdadeiro.png">';
					} else {
					$mensagem = '<img src="images/icones/falso.png">';
					}
					?>
					<td><?php echo number_format(round($RQ["pt"]), 0, '', '.');?> <?php echo $mensagem;?></td>
					<?php }?>
                    <td><?php echo number_format(round($RS["pontos"]), 0, '', '.');?></td>
                    </tr>
			<?php }?>
            <tr>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <?php for($w = 1; $w <= $i; $w++){
				$SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
				$SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 1 and u.cd_ativo = 1 ";
				$RQW = mysql_query($SQW, $conexao);
				$RW = mysql_fetch_assoc($RQW);
				echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
			  }?>
              <th><?php echo number_format(round($tt), 0, '', '.');?></th>
              </tr>
          </table>
          <?php unset($tt, $w, $i, $mensagem, $metaminima, $x, $total);?>
        </div>
        </p>
          </div>
          <!-- FIM FORNECEDOR 2 -->
          <!-- INICIO FORNECEDOR 3 -->
          <div id="grupo-3" class="tabs-panel7">
            <p>
             <?php $RSS = mysql_query("select count(cd_codigo) as rcatotal, consultor from usuarios where consultor = 139 ", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
				  $percedeivid = ($RS["rcatotal"] * 90)/100;
			  }?>
            <h3>Deivid</h3>
              <h5>Meta: <font color="#C30009"><?php echo $metaconsultor;?>%</font> da equipe com as metas mínimas cumpridas de cada fornecedor</h5>
              <h5>90% equivale a <font color="#00a859"><?php echo ceil($percedeivid);?> RCA´s</font> do total da equipe.</h5>
            <div class="table-style">
          <table class="table-list2">
            <tr>
              <th>Rank.</th>
              <th>Código</th>
              <th>Nome</th>
              <th>M. Mínima</th>
              <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
			  	$i = $i + 1;
			  	$forne[$i] = $RS["cd_fornecedor"];?>
              	<th><?php echo $RS["ds_razao"];?></th>
			  <?php }?>
              <th>PONTOS</th>
            </tr>
			<?php $SQL = "select u.ds_usuario, u.consultor, u.cd_grupo, g.cd_grupo, g.vl_metam, p.cd_codigo, sum(p.cd_pontos) as pontos from pontuacao as p, usuarios as u, grupos as g where p.cd_codigo = u.cd_codigo and u.cd_grupo = g.cd_grupo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.consultor = 139 and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
			$SQL .= " group by u.ds_usuario, p.cd_codigo order by pontos desc";
			$RSS = mysql_query($SQL, $conexao);
			while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$tt = $tt + $RS["pontos"];
				$metaminima = $RS["vl_metam"];
				?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $x;?>º</td>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
				<td><strong><?php echo number_format(round($RS["vl_metam"]), 0, '', '.');?></strong></td>
				<?php for($k = 1; $k <= $i; $k++){
				$SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' ";
					$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
					$RQQ = mysql_query($SQQ, $conexao);
					$RQ = mysql_fetch_assoc($RQQ);
					//TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
					$total = $RS["pontos"];
					//MENSAGEM SE ATINGIR META
					$mensagem = '';
					if($RQ["pt"] >= $metaminima){
					$mensagem = '<img src="images/icones/verdadeiro.png">';
					} else {
					$mensagem = '<img src="images/icones/falso.png">';
					}
					?>
					<td><?php echo number_format(round($RQ["pt"]), 0, '', '.');?> <?php echo $mensagem;?></td>
					<?php }?>
                    <td><?php echo number_format(round($RS["pontos"]), 0, '', '.');?></td>
                    </tr>
			<?php }?>
            <tr>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <?php for($w = 1; $w <= $i; $w++){
				$SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
				$SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 1 and u.cd_ativo = 1 ";
				$RQW = mysql_query($SQW, $conexao);
				$RW = mysql_fetch_assoc($RQW);
				echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
			  }?>
              <th><?php echo number_format(round($tt), 0, '', '.');?></th>
              </tr>
          </table>
          <?php unset($tt, $w, $i, $mensagem, $metaminima, $x, $total);?>
        </div>
        </p>
          </div>
          <!-- FIM FORNCEDOR 3 -->
          
          <!-- INICIO FONRCEDOR 4 -->
          <div id="grupo-4" class="tabs-panel7">
            <p>
            <?php $RSS = mysql_query("select count(cd_codigo) as rcatotal, consultor from usuarios where consultor = 495 ", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
				  $percewagner = ($RS["rcatotal"] * 90)/100;
			  }?>
            <h3>Wagner</h3>
              <h5>Meta: <font color="#C30009"><?php echo $metaconsultor;?>%</font> da equipe com as metas mínimas cumpridas de cada fornecedor</h5>
              <h5>90% equivale a <font color="#00a859"><?php echo ceil($percewagner);?> RCA´s</font> do total da equipe.</h5>
            <div class="table-style">
          <table class="table-list2">
            <tr>
              <th>Rank.</th>
              <th>Código</th>
              <th>Nome</th>
              <th>M. Mínima</th>
              <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
			  	$i = $i + 1;
			  	$forne[$i] = $RS["cd_fornecedor"];?>
              	<th><?php echo $RS["ds_razao"];?></th>
			  <?php }?>
              <th>PONTOS</th>
            </tr>
			<?php $SQL = "select u.ds_usuario, u.consultor, u.cd_grupo, g.cd_grupo, g.vl_metam, p.cd_codigo, sum(p.cd_pontos) as pontos from pontuacao as p, usuarios as u, grupos as g where p.cd_codigo = u.cd_codigo and u.cd_grupo = g.cd_grupo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.consultor = 495 and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
			$SQL .= " group by u.ds_usuario, p.cd_codigo order by pontos desc";
			$RSS = mysql_query($SQL, $conexao);
			while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$tt = $tt + $RS["pontos"];
				$metaminima = $RS["vl_metam"];
				?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $x;?>º</td>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
				<td><strong><?php echo number_format(round($RS["vl_metam"]), 0, '', '.');?></strong></td>
				<?php for($k = 1; $k <= $i; $k++){
				$SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' ";
					$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
					$RQQ = mysql_query($SQQ, $conexao);
					$RQ = mysql_fetch_assoc($RQQ);
					//TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
					$total = $RS["pontos"];
					//MENSAGEM SE ATINGIR META
					$mensagem = '';
					if($RQ["pt"] >= $metaminima){
					$mensagem = '<img src="images/icones/verdadeiro.png">';
					} else {
					$mensagem = '<img src="images/icones/falso.png">';
					}
					?>
					<td><?php echo number_format(round($RQ["pt"]), 0, '', '.');?> <?php echo $mensagem;?></td>
					<?php }?>
                    <td><?php echo number_format(round($RS["pontos"]), 0, '', '.');?></td>
                    </tr>
			<?php }?>
            <tr>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <?php for($w = 1; $w <= $i; $w++){
				$SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
				$SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 1 and u.cd_ativo = 1 ";
				$RQW = mysql_query($SQW, $conexao);
				$RW = mysql_fetch_assoc($RQW);
				echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
			  }?>
              <th><?php echo number_format(round($tt), 0, '', '.');?></th>
              </tr>
          </table>
          <?php unset($tt, $w, $i, $mensagem, $metaminima, $x, $total);?>
        </div>
        </p>
          </div>
          <!-- FIM FORNCEDOR 4 -->
          
          <!-- INICIO FONRCEDOR 5 -->
          <div id="grupo-5" class="tabs-panel7">
            <p>
            <?php $RSS = mysql_query("select count(cd_codigo) as rcatotal, consultor from usuarios where consultor = 496 ", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
				  $percewillian = ($RS["rcatotal"] * 90)/100;
			  }?>
            <h3>Willian</h3>
              <h5>Meta: <font color="#C30009"><?php echo $metaconsultor;?>%</font> da equipe com as metas mínimas cumpridas de cada fornecedor</h5>
              <h5>90% equivale a <font color="#00a859"><?php echo ceil($percewillian);?> RCA´s</font> do total da equipe.</h5>
            <div class="table-style">
          <table class="table-list2">
            <tr>
              <th>Rank.</th>
              <th>Código</th>
              <th>Nome</th>
              <th>M. Mínima</th>
              <?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
		   	  while($RS = mysql_fetch_array($RSS)){
			  	$i = $i + 1;
			  	$forne[$i] = $RS["cd_fornecedor"];?>
              	<th><?php echo $RS["ds_razao"];?></th>
			  <?php }?>
              <th>PONTOS</th>
            </tr>
			<?php $SQL = "select u.ds_usuario, u.consultor, u.cd_grupo, g.cd_grupo, g.vl_metam, p.cd_codigo, sum(p.cd_pontos) as pontos from pontuacao as p, usuarios as u, grupos as g where p.cd_codigo = u.cd_codigo and u.cd_grupo = g.cd_grupo and u.cd_perfil = 4 and u.cd_ativo = 1 and u.consultor = 496 and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
			$SQL .= " group by u.ds_usuario, p.cd_codigo order by pontos desc";
			$RSS = mysql_query($SQL, $conexao);
			while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$tt = $tt + $RS["pontos"];
				$metaminima = $RS["vl_metam"];
				?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $x;?>º</td>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
				<td><strong><?php echo number_format(round($RS["vl_metam"]), 0, '', '.');?></strong></td>
				<?php for($k = 1; $k <= $i; $k++){
				$SQQ = "select sum(p.cd_pontos) as pt, u.cd_codigo from pontuacao as p, usuarios as u where u.cd_codigo = p.cd_codigo and p.cd_codigo = '".$RS["cd_codigo"]."' and p.cd_fornecedor = '".$forne[$k]."' ";
					$SQQ .= " and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
					$RQQ = mysql_query($SQQ, $conexao);
					$RQ = mysql_fetch_assoc($RQQ);
					//TOTAL DE PONTOS POR FORNEC X META FORNEC POR GRUPO
					$total = $RS["pontos"];
					//MENSAGEM SE ATINGIR META
					$mensagem = '';
					if($RQ["pt"] >= $metaminima){
					$mensagem = '<img src="images/icones/verdadeiro.png">';
					} else {
					$mensagem = '<img src="images/icones/falso.png">';
					}
					?>
					<td><?php echo number_format(round($RQ["pt"]), 0, '', '.');?> <?php echo $mensagem;?></td>
					<?php }?>
                    <td><?php echo number_format(round($RS["pontos"]), 0, '', '.');?></td>
                    </tr>
			<?php }?>
            <tr>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <?php for($w = 1; $w <= $i; $w++){
				$SQW = "select sum(p.cd_pontos) as pts, u.cd_codigo from pontuacao as p, usuarios as u where p.cd_codigo = u.cd_codigo and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1) ";
				$SQW .= " and p.cd_fornecedor = '".$forne[$w]."' and u.cd_grupo = 1 and u.cd_ativo = 1 ";
				$RQW = mysql_query($SQW, $conexao);
				$RW = mysql_fetch_assoc($RQW);
				echo "<th>".number_format(round($RW["pts"]), 0, '', '.')."</th>";
			  }?>
              <th><?php echo number_format(round($tt), 0, '', '.');?></th>
              </tr>
          </table>
          <?php unset($tt, $w, $i, $mensagem, $metaminima, $x, $total);?>
        </div>
        </p>
          </div>
          <!-- FIM FORNCEDOR 5 -->
          
          <!-- INICIO GERAL -->
          <div id="grupo-6" class="tabs-panel7">
            <p><h4>Ranking Geral Estado / Gestor até 
            <?php $SQL = "select cd_parcial, DATE_FORMAT(dt_data, '%d/%m/%y') as data from parcial order by cd_parcial desc limit 1";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS))
		  {?>
<font color="#C30009"><a onMouseOver="toolTip('<b>DATA DA ÚLTIMA PARCIAL')" onMouseOut="toolTip()" animatescroll();"><?php echo $RS["data"];}?></a></font>
            </h4>
            <?php
			$premio = array(3000);
			?>
            <div class="table-style">
          <table class="table-list2">
            <tr>
              <th>Ranking</th>
              <th>Cód.</th>
              <th>Gestor</th>
              <th>Estado</th>
              <th>Meta</th>
              <th>Total Pontos</th>
              <th>%</th>
              <th>Prêmio</th>
            </tr>
             <?php 
			   $SQL = " select u.cd_codigo, u.ds_usuario, m.vl_metam, e.ds_uf, sum(p.cd_pontos) as pts, ((sum(p.cd_pontos)*100)/m.vl_metam) as perce";
			   $SQL .= " from usuarios as u, estados as e, pontuacao as p, meta_individual as m";
			   $SQL .= " where u.cd_usuario = p.cd_gerente and u.cd_usuario = m.cd_usuario and u.cd_estado = e.cd_estado and p.cd_campanha = 1 and p.cd_parcial = (select cd_parcial from parcial order by cd_parcial desc limit 1)";
			   $SQL .= " and u.cd_cargo = 2 group by u.cd_codigo, u.ds_usuario";
			   $SQL .= " order by perce desc ";
			   $RSS = mysql_query($SQL, $conexao);
			   while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$pontos5 = $pontos5 + $RS["pts"];
				//PORCENTAGEM DE PONTOS
				$resultado5 = ($pontos5 / $metagestor5) * 100;
				//FIM PORCENTAGEM?>
				<tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
				<td><?php echo $x;?>º</td>
				<td><?php echo $RS["cd_codigo"];?></td>
				<td><?php echo $RS["ds_usuario"];?></td>
                <td><?php echo $RS["ds_uf"];?></td>
				<td><?php echo $RS["vl_metam"];?></td>
				<td><?php echo $RS["pts"];?></td>
                <td><?php echo number_format($RS["perce"],2,",","")."%";?></td>
                <td><p style="color:#0ED438; font-weight: bold;">R$ <?php if(isset($premio[$p-0])){ echo $premio[$p-0]; };?></p></td>
				</tr>
			   <?php $p++;} $x=0;?>
            <tr>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th><?php echo $pontos5;?></th>
              <th></th>
              <th></th>
              </tr>
          </table>
        </div>
        </p>
          </div>
          <!-- GERAL -->
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