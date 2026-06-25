<?php
//este programa tem como objetivo escolher o bingo a participar
include "../administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){
	echo "<script language='javascript'>window.open('../sair.php', '_self');</script>";
}

//busca quantidade de cartelas
$RSSC = mysql_query("select cd_codigo, ds_usuario, cd_cartela_geral as GERAL, cd_cartela_ouro as OURO, SUM(cd_cartela_prata_nov + cd_cartela_prata_dez + cd_cartela_prata_jan + cd_cartela_prata_fev) as PRATA FROM usuarios where cd_perfil = '4' and cd_ativo = 1 and cd_codigo = '".$_SESSION["CD_CODIGO"]."' ", $conexao);
while ($RSC = mysql_fetch_array($RSSC)) {
	$geral = $RSC['GERAL'];
	$ouro = $RSC['OURO'];
	$prata = $RSC['PRATA'];
}

?>

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

<meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
<meta http-equiv="content-language" content="pt" />
<meta itemprop="description" name="description" content="" />
<meta name="robots" content="no follow" />
<!-- mobile  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
 
<style>
	body {
	  font-family: Arial, sans-serif;
	  text-align: center;
	}

	.vertical-center {
		margin: 0;
		width: 100%;
		position: absolute;
		top: 50%;
		left: 50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
	}

.column {
  float: left;
  width: 33.33%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

</head>

<body>    

   <div align="center" class="container">

   	<h3 style="padding-top: 40px; font-size: 25px;">Selecione o bingo que deseja participar!</h3>



		<div align="center" class="row" style="font-size: 18px; font-family:cursive; margin-top: 60px;">
			
			<div class="column">
				<p><?php echo $geral." CARTELAS";?></p>
			</div>
			<div class="column">
				<p><?php echo $ouro." CARTELAS";?></p>	
			</div>
			<div class="column">
				<p><?php echo $prata." CARTELAS";?></p>
			</div>
		</div>

		<div class="vertical-center">
			<a href="sorteio/index.php?cd_bingo=3">
				<img class="center" src="../images/bingo_geral.jpg"/>
			</a>

			<a href="sorteio/index.php?cd_bingo=1">
				<img class="center" src="../images/bingo_ouro.jpg"/>
			</a>
			
			<a href="sorteio/index.php?cd_bingo=2">
				<img class="center" src="../images/bingo_prata.jpg"/>
			</a>		
			
		</div>


	</div>

</body>
</html>