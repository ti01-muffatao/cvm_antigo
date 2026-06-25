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

	<style>
		.titulo-fase {
			background-color: #1c97fd;
			padding: 10px;
			font-size: 30px;
			color: white;
			border-radius: 5px;
			display: inline-block;
			text-align: center;
			word-wrap: break-word;
			white-space: normal;
			line-height: 1.3;
		}

		@media (max-width: 576px) {
			.titulo-fase {
				font-size: 18px;
				padding: 8px;
			}
		}
	</style>
</head>

<body style="margin-top:-25px;">
	<?php include "loading.php" ?>
	<?php include "menu.php"; ?>
	<div class="section_holdergrupos">
		<div class="container" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
			<img src="images/logo.png" style="width: 250px; height: auto;">
			<br>
			<h3 align="center">Regulamento 24ª Campanha de verão Muffatão - GERENTES<br> "Dom: Descobrir, focar e potencializar"</span></h3>
			<div class="lt_title_line"></div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="portfolio_four">
		<div class="container">
			<h3><span class="titulo-fase">Fase 01</span></h3>
			<p>Serão classificados os Gerentes que obtiverem o maior percentual acima da soma mensal das metas de TODOS OS FORNECEDORES <strong>ATÉ 28/02/2025</strong>.
				As TABELAS abaixo referem-se às metas por FORNECEDOR.</p>
			<p><span style="background-color: #fafa77; padding-bottom: 0px">Para ter direito a premiação, os gerentes de venda devem atingir as metas mínimas de todos os fornecedores participantes.</span></p>
			<br>
			<div class="tabs-content7">
				<div id="grupo-1" class="tabs-panel7">
					<h3>Metas Gerentes Ouro - FECHOU GANHOU!</h3>
					<div class="table-style">
						<table class="table-list2">
							<tr class="sticky">
								<th>GERENTE</th>
								<?php
								$query = mysql_query("select ds_razao from clifor order by ds_razao asc");
								while ($objeto = mysql_fetch_array($query)) { ?>
									<th><?php echo $objeto['ds_razao']; ?></th>
								<?php } ?>
								<th>TOTAL</th>
							</tr>
							<?php
							$gvs = array('9001', '9004', '9002');
							foreach ($gvs as $gv) { 
								$total = 0;
							?>
								<tr>
									<th><?php $nome_gerente = explode(" ", BuscaUsuario($gv));
										echo $nome_gerente[0]; ?></th>
									<?php
									$query = mysql_query("SELECT *  FROM metas_gerente m, clifor c  WHERE c.cd_fornecedor = m.cd_fornecedor  AND cd_codigo = '" . $gv . "'  ORDER BY c.ds_razao ASC");

									if (mysql_num_rows($query) > 0) {
										while ($objeto = mysql_fetch_array($query)) {
											$total += $objeto['vl_meta'];
											?>
											<td>
												<?php
												if ($objeto['vl_meta'] != 0) {
													echo "R$ " . number_format($objeto['vl_meta'], 0, '', '.');
												} else {
													echo "-";
												}
												?>
											</td>
											<?php
										}
									} else {
										echo "<td></td>";
									}
									?>
									<td>R$ <?php echo number_format($total, 0, '', '.'); ?></td>
								</tr>
							<?php } ?>
						</table>
						<img src="images/premios/premio_gv_fase01.png" width="1000" style="margin-left:20px; max-width: 100%" class="img_banner" class="animate__animated animate__backInLeft" />
					</div>
				</div>
			</div>
			<div class="section_title_line_full"></div>
			<div class="clearfix"></div>
			<div class="portfolio_four">
				<div class="container">
					<h3><span class="titulo-fase">Fase 02</span></h3>
					<p>
						Será premiado o Gerente que obtiver o maior percentual acima da soma mensal das metas de TODOS OS FORNECEDORES <b>ATÉ 28/02/2025.</b><br>
						As TABELAS abaixo referem-se às metas por FORNECEDOR. <br>
					</p>
					<ul>
						<li>Será disponibilizada <b>01 vaga para a viagem junto com os ganhadores do Moral em Casa.</b></li>
						<li><b>Observação:</b> Caso o gerente já tenha vencido na fase Moral em Casa,<b>não será </b> elegível para esta fase. <br></li>
					</ul>
					<div class="tabs-content7">
						<div id="grupo-1" class="tabs-panel7">
							<h3>Metas Gerentes Mix Estrela</h3>
							<div class="table-style">
								<table class="table-list2">
									<tr class="sticky">
										<th>GERENTE</th>
										<?php
										$query = mysql_query("select * from clifor_prata order by ds_razao asc");
										while ($objeto = mysql_fetch_array($query)) { ?>
											<th><?php echo $objeto['ds_razao']; ?></th>
										<?php } ?>
										<th>TOTAL</th>
									</tr>
									<?php
									$gvs = array('9001', '9004', '9002');
									foreach ($gvs as $gv) { ?>
										<tr>
											<th><?php $nome_gerente = explode(" ", BuscaUsuario($gv));
												echo $nome_gerente[0]; ?></th>
											<?php
											$total = 0;
											$query = mysql_query("select * from metas_gerente_prata m, clifor_prata c where c.cd_fornecedor = m.cd_fornecedor and cd_codigo = '" . $gv . "' order by c.ds_razao asc");
											while ($objeto = mysql_fetch_array($query)) {
												$total += $objeto['vl_meta'];
											?>
												<td><?php
													if ($objeto['vl_meta'] != 0) {
														echo "R$ " . number_format($objeto['vl_meta'], 0, '', '.');
													} else {
														echo "-";
													}
													?>
												</td>
											<?php } ?>
											<td>R$ <?php echo number_format($total, 0, '', '.'); ?></td>
										</tr>
									<?php } ?>
								</table>
								<img src="images/premios/premio_gv_fase02.jpg" width="1000" style="margin-left:20px; max-width: 100%" class="img_banner" class="animate__animated animate__backInLeft" />
							</div>
						</div>
					</div>
					<div class="section_title_line_full"></div>
					<div class="section_holdergrupos">
						<div class="container">
							<h3><span class="titulo-fase">FASE 03 (MORAL EM CASA - GERENTES)</span></h3>
							<ul>
								<li>O gerente que fizer o maior percentual de venda (nos fornecedores ouro - FASE 01) acima da meta na 24ª Campanha de Verão Muffatão - "Dom: Descobrir, focar e potencializar" vai ganhar uma viagem com acompanhante (Casal);</li>
								<li>Para a premiação ter validade, nenhum supervisor da sua equipe pode ficar de fora da 24ª Campanha de Verão Muffatão;</li>
								<li>A viagem será em grupo com todos os ganhadores dessa fase;</li>
								<li>A premiação será a hospedagem com hotel All inclusive;</li>
							</ul>
							<img src="images/media/moral_em_casa_gv.jpg" width="1000" style="margin-left:20px; max-width: 100%" class="img_banner" class="animate__animated animate__backInLeft" />
						</div>
					</div>
					<div class="section_holdergrupos">
						<div class="container">
							<div class="section_title_line_full"></div>
							<h5 class="uppercase">Observações Gerais</h5>
							<ul>
								<li>Para validar a participação na 24º CAMPANHA DE VERÃO MUFFATÃO, os participantes deverão aceitar os termos e regulamentos da mesma, até o dia 15/11/2025.</li>
								<li>Código dos fornecedores participantes:
									<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YPÊ - F00001 / UNILEVER BPC - F00005 / UNILEVER HF - F00004 / MEX - F00003 / SANTHER F00010 /<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SPECIAL NUTRI - F00002 / RECKITT - F00077 / HAVAIANAS - F00009 / FLORA - F00018 / COLGATE - F00097
								</li>
							</ul>
							<div style="width: 1200px; max-width: 100%">
								<img src="images/media/logo_fornecedores.png" width="100%" style="max-width: 100%" />
							</div>
							<div class=""></div>
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

		<script>
			window.onload = function() {
				var style = document.createElement('style');
				style.innerHTML = '.sticky th { position: sticky; top: 0px; }';
				document.head.appendChild(style);
			};
		</script>

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