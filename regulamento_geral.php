<!-- Conexão com banco de dados-->
<?php
include "administrar/conexao.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
	echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
if (in_array($_SESSION['CD_PERFIL'], array('1', '2', '3', '4', '5', '6'))) { ?>

	<!-- Conteudo visivel somente para usuarios logados -->
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
		<!-- mobile  -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
		<!-- CSS -->
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
		<!-- toogle menu -->
		<link rel="stylesheet" href="js/Toggle-Menu/menu.css" type="text/css" />
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
		<script src="js/universal/tooltip.js"></script>
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
		<script src="js/flexslider/jquery.flexslider.js"></script>
		</script>
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
			.tabs-panel7 {
				display: none;
			}

			.tabs-panel7.active {
				display: block;
			}

			.tabela-fornecedores {
				width: 350px !important;
			}

			@media(max-width: 992px) {
				.tabela-fornecedores {
					width: 150px !important;
				}
			}

			@media (min-width: 992px) {
				.imagem_acelerador {
					margin-left: 45px;
				}
			}
		</style>
	</head>

	<body>
		<?php include "loading.php" ?>
		<?php include "menu.php"; ?>
		<div class="clearfix"></div>
		<!-- Corpo Página -->
		<div class="section_holderGrupos">
			<div class="container" style="padding: 10px;">
				<br>
				<div style="display: flex; justify-content: center;">
					<img src="images/logo.png" style="width: 50%; max-width: 300px; height: auto;">
				</div>
				<h3 align="center" style="margin-top: 35px;">Regulamento 24ª Campanha de verão Muffatão - RCA'S<br> "Dom: Descobrir, focar e potencializar"</span></h3>
				<div class="lt_title_line"></div>
				<!-- Fase 01 -->
				<div class="container">
					<h5>
						<span style="background-color: #1c97fd; padding: 7px; font-size: 25px; color: white; border-radius: 5px">Fase 01</span>
						<br><br>PEDÁGIO - META MÍNIMA
					</h5>
					<p>Para Participar da 24ª Campanha de Verão Muffatão - FASE 01 - Os Representantes Comerciais Autônomos denominados RCA'S, deverão atingir as pontuações mínimas por fornecedor do seu Grupo.</p>
					<h4><strong>Este objetivo deverá ser CUMPRIDO ATÉ 09/01/2026.</strong></h4>
					<p>Nesta fase, os estados de Santa Catarina e Paraná participarão juntos, enquanto Rio Grande do Sul participará sozinho, nos grupos 1 e 2, conforme tabelas abaixo.
						Os produtos participantes de cada fornecedor estarão listados no menu: Produtos participantes > Pontuações.</p>
					<p>No fornecedor Unilever participam apenas os representantes comerciais autônomos do estado do Paraná e Santa Catarina.</p>
					<br>
					<div id="section-1">
						<div class="table-style">
							<h4>Pontuações Mínimas por Fornecedor SC/PR&nbsp;&nbsp;
								<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
								<img src="./images/bandeiras/10.png" style="width: 50px;">
							</h4>
							<table class="table-list2">
								<tr class="sticky">
									<th width="330">FORNECEDORES</th>
									<th>Grupo 01</th>
									<th>Grupo 02</th>
									<th>Grupo 03</th>
									<th>Grupo 04</th>
									<th>Grupo 05</th>
									<th>GDM</th>
								</tr>
								<?php foreach ($fornecedores as $codigo_fornecedor => $nome) { ?>
									<tr>
										<th><?= $codigo_fornecedor . ' - ' . $nome ?></th>
										<td>8.000</td>
										<td>12.000</td>
										<td>16.000</td>
										<td>20.000</td>
										<td>25.000</td>
										<td>35.000</td>
									</tr>
								<?php } ?>
							</table>
							<h4>Pontuações Mínimas por Fornecedor RS&nbsp;&nbsp;
								<img src="./images/bandeiras/27.png" style="width: 50px;">&nbsp;&nbsp;
							</h4>
							<table class="table-list2">
								<tr class="sticky">
									<th class="tabela-fornecedores">FORNECEDORES</th>
									<th>Grupo 01</th>
									<th>Grupo 02</th>
								</tr>
								<?php foreach ($fornecedores as $codigo_fornecedor => $nome) {
									if (!in_array($codigo_fornecedor, ['F00005', 'F00004'])) { ?>
										<tr>
											<th><?= $codigo_fornecedor . ' - ' . $nome ?></th>
											<td>4.000</td>
											<td>6.000</td>
										</tr>
								<?php }
								} ?>
							</table>
							<p>Caso não atinjam as pontuações mínimas por fornecedor até a data estipulada, estarão fora da 24ª Campanha de Verão Muffatão.</p>
							<div class="section_title_line_full"></div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="section_holderGrupos">
					<div class="container">
						<div class="section_title_line_full"></div>
						<div class="one_full">
							<div class="div_banner">
								<img style="float:right; max-width: 100%; position: relative; z-index: 6;" src="images/premios/SC-PR - TOTAL.png" width=450 class="border-0" />
							</div>
							<h3>Tabela Classificatória de Premiações &nbsp;&nbsp;
								<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
								<img src="./images/bandeiras/10.png" style="width: 50px;">
							</h3>
							<ul class="tabs7">
								<li><a href="#Grupo-1.SCePR" onclick="showTabSCePR(event, 'Grupo-1.SCePR')">Grupo 01</a></li>
								<li><a href="#Grupo-2.SCePR" onclick="showTabSCePR(event, 'Grupo-2.SCePR')">Grupo 02</a></li>
								<li><a href="#Grupo-3.SCePR" onclick="showTabSCePR(event, 'Grupo-3.SCePR')">Grupo 03</a></li>
								<li><a href="#Grupo-4.SCePR" onclick="showTabSCePR(event, 'Grupo-4.SCePR')">Grupo 04</a></li>
								<li><a href="#Grupo-5.SCePR" onclick="showTabSCePR(event, 'Grupo-5.SCePR')">Grupo 05</a></li>
								<li><a href="#Grupo-6.SCePR" onclick="showTabSCePR(event, 'Grupo-6.SCePR')">GDM</a></li>
							</ul>
							<div class="tabs-content7">
								<div id="Grupo-1.SCePR" class="tabs-panel7 SCePR active">
									<p>
									<h5>Grupo 01</h5>
									<div class="table-style">
										<table class="table-list2">
											<tr class="sticky">
												<th width="81">RANKING</th>
												<th width="81">PREMIAÇÃO</th>
												<th width="90">Nº CARTELAS</th>
											</tr>
											<tr>
												<th width="81">1º </th>
												<td width="81">R$ 800,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">2º </th>
												<td width="81">R$ 700,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">3º </th>
												<td width="81">R$ 600,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">4º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">5º </th>
												<td width="81">R$ 500,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">6º </th>
												<td width="81">R$ 400,00 </td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">7º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">8º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">9º </th>
												<td width="81">R$ 350,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">10º </th>
												<td width="81">R$ 300,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th colspan="3">
													<strong>
														Quem não se classificar, mas fechar as metas das fases 01 e 02, terá direito a uma cartela para participar do Bingo em grupos.
													</strong>
												</th>
											</tr>
										</table>
										<div class="div_banner">
											<img style="float:right; max-width: 100%" src="images/premios/SC-PR-RS-SP - GRUPO-1.png" width=450 class="border-0" />
										</div>
									</div>
									</p>
								</div>
								<!-- FIM Grupo 1 -->
								<div id="Grupo-2.SCePR" class="tabs-panel7 SCePR">
									<p>
									<h5>Grupo 02</h5>
									<div class="table-style">
										<table class="table-list2">
											<tr class="sticky">
												<th width="81">RANKING</th>
												<th width="81">PREMIAÇÃO</th>
												<th width="90">Nº CARTELAS</th>
											</tr>
											<tr>
												<th width="81">1º </th>
												<td width="81">R$ 1.000,00</td>
												<td width="81">10</td>
											</tr>
											<tr>
												<th width="81">2º </th>
												<td width="81">R$ 900,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">3º </th>
												<td width="81">R$ 800,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">4º </th>
												<td width="81">R$ 700,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">5º </th>
												<td width="81">R$ 650,00</td>
												<td width="88">05</td>
											</tr>
											<tr>
												<th width="81">6º </th>
												<td width="81">R$ 600,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">7º </th>
												<td width="81">R$ 500,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">8º </th>
												<td width="81">R$ 450,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">9º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">10º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">11º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th colspan="3">
													<strong>
														Quem não se classificar, mas fechar as metas das fases 01 e 02, terá direito a uma cartela para participar do Bingo em grupos.
													</strong>
												</th>
											</tr>
										</table>
										<img style="float:right; max-width: 100%" src="images/premios/SC-PR - GRUPO-2.png" width="450" />
									</div>
									</p>
								</div>
								<!-- FIM Grupo 2 -->
								<div id="Grupo-3.SCePR" class="tabs-panel7 SCePR">
									<p>
									<h5>Grupo 03</h5>
									<div class="table-style">
										<table class="table-list2">
											<tr class="sticky">
												<th width="81">RANKING</th>
												<th width="81">PREMIAÇÃO</th>
												<th width="90">Nº CARTELAS</th>
											</tr>
											<tr>
												<th width="81">1º </th>
												<td width="81">R$ 1.200,00</td>
												<td width="81">10</td>
											</tr>
											<tr>
												<th width="81">2º </th>
												<td width="81">R$ 1.100,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">3º </th>
												<td width="81">R$ 1.000,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">4º </th>
												<td width="81">R$ 900,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">5º </th>
												<td width="81">R$ 800,00</td>
												<td width="88">05</td>
											</tr>
											<tr>
												<th width="81">6º </th>
												<td width="81">R$ 700,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">7º </th>
												<td width="81">R$ 600,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">8º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">9º </th>
												<td width="81">R$ 500,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">10º </th>
												<td width="81">R$ 500,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">11º </th>
												<td width="81">R$ 450,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">12º </th>
												<td width="81">R$ 450,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">13º </th>
												<td width="81">R$ 450,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">14º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">15º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th colspan="3">
													<strong>
														Quem não se classificar, mas fechar as metas das fases 01 e 02, terá direito a uma cartela para participar do Bingo em grupos.
													</strong>
												</th>
											</tr>
										</table>
										<img style="float:right; max-width: 100%" src="images/premios/SC-PR - GRUPO-3.png" width="450" />
									</div>
									</p>
								</div>
								<!-- FIM Grupo 3 -->
								<div id="Grupo-4.SCePR" class="tabs-panel7 SCePR">
									<p>
									<h5>Grupo 04</h5>
									<div class="table-style">
										<table class="table-list2">
											<tr class="sticky">
												<th width="81">RANKING</th>
												<th width="81">PREMIAÇÃO</th>
												<th width="90">Nº CARTELAS</th>
											</tr>
											<tr>
												<th width="81">1º </th>
												<td width="81">R$ 1.400,00</td>
												<td width="81">10</td>
											</tr>
											<tr>
												<th width="81">2º </th>
												<td width="81">R$ 1.300,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">3º </th>
												<td width="81">R$ 1.200,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">4º </th>
												<td width="81">R$ 1.100,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">5º </th>
												<td width="81">R$ 1.000,00</td>
												<td width="88">05</td>
											</tr>
											<tr>
												<th width="81">6º </th>
												<td width="81">R$ 900,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">7º </th>
												<td width="81">R$ 800,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">8º </th>
												<td width="81">R$ 700,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">9º </th>
												<td width="81">R$ 650,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">10º </th>
												<td width="81">R$ 600,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">11º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">12º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">13º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">14º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">15º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">16º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th colspan="3">
													<strong>
														Quem não se classificar, mas fechar as metas das fases 01 e 02, terá direito a uma cartela para participar do Bingo em grupos.
													</strong>
												</th>
											</tr>
										</table>
										<img style="float:right; max-width: 100%" src="images/premios/SC-PR - GRUPO-4.png" width="450" />
									</div>
									</p>
								</div>
								<!-- FIM Grupo 4 -->
								<div id="Grupo-5.SCePR" class="tabs-panel7 SCePR">
									<p>
									<h5>Grupo 05</h5>
									<div class="table-style">
										<table class="table-list2">
											<tr class="sticky">
												<th width="81">RANKING</th>
												<th width="81">PREMIAÇÃO</th>
												<th width="90">Nº CARTELAS</th>
											</tr>
											<tr>
												<th width="81">1º </th>
												<td width="81">R$ 2.000,00</td>
												<td width="81">10</td>
											</tr>
											<tr>
												<th width="81">2º </th>
												<td width="81">R$ 1.800,00</td>
												<td width="81">07</td>
											</tr>
											<tr>
												<th width="81">3º </th>
												<td width="81">R$ 1.700,00</td>
												<td width="81">06</td>
											</tr>
											<tr>
												<th width="81">4º </th>
												<td width="81">R$ 1.600,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">5º </th>
												<td width="81">R$ 1.500,00</td>
												<td width="88">05</td>
											</tr>
											<tr>
												<th width="81">6º </th>
												<td width="81">R$ 1.400,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">7º </th>
												<td width="81">R$ 1.300,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">8º </th>
												<td width="81">R$ 1.200,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">9º </th>
												<td width="81">R$ 1.200,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">10º </th>
												<td width="81">R$ 1.150,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">11º </th>
												<td width="81">R$ 1.100,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">12º </th>
												<td width="81">R$ 1.050,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">13º </th>
												<td width="81">R$ 1.000,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">14º </th>
												<td width="81">R$ 1.000,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th colspan="3">
													<strong>
														Quem não se classificar, mas fechar as metas das fases 01 e 02, terá direito a uma cartela para participar do Bingo em grupos.
													</strong>
												</th>
											</tr>
										</table>
										<img style="float:right; max-width: 100%" src="images/premios/SC-PR - GRUPO-5.png" width="450" />
									</div>
									</p>
								</div>
								<!-- FIM Grupo 5 -->
								<div id="Grupo-6.SCePR" class="tabs-panel7 SCePR">
									<p>
									<h5>GDM</h5>
									<div class="table-style">
										<table class="table-list2">
											<tr class="sticky">
												<th width="81">RANKING</th>
												<th width="81">PREMIAÇÃO</th>
												<th width="90">Nº CARTELAS</th>
											</tr>
											<tr>
												<th width="81">1º </th>
												<td width="81">R$ 2.800,00</td>
												<td width="81">10</td>
											</tr>
											<tr>
												<th width="81">2º </th>
												<td width="81">R$ 2.600,00</td>
												<td width="81">08</td>
											</tr>
											<tr>
												<th width="81">3º </th>
												<td width="81">R$ 2.400,00</td>
												<td width="81">07</td>
											</tr>
											<tr>
												<th width="81">4º </th>
												<td width="81">R$ 2.300,00</td>
												<td width="81">06</td>
											</tr>
											<tr>
												<th width="81">5º </th>
												<td width="81">R$ 2.200,00</td>
												<td width="88">06</td>
											</tr>
											<tr>
												<th width="81">6º </th>
												<td width="81">R$ 2.150,00</td>
												<td width="81">06</td>
											</tr>
											<tr>
												<th width="81">7º </th>
												<td width="81">R$ 2.100,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">8º </th>
												<td width="81">R$ 2.000,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">9º </th>
												<td width="81">R$ 1.450,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">10º </th>
												<td width="81">R$ 1.350,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th colspan="3">
													<strong>
														Quem não se classificar, mas fechar as metas das fases 01 e 02, terá direito a uma cartela para participar do Bingo em grupos.
													</strong>
												</th>
											</tr>
										</table>
										<img style="float:right; max-width: 100%" src="images/premios/SC-PR - GRUPO-GDM.png" width="450" />
									</div>
									</p>
								</div>
								<!-- FIM Grupo 6 -->
							</div>
						</div>
					</div>
				</div>
				<div class="section_holderGrupos">
					<div class="container">
						<div class="section_title_line_full"></div>
						<div class="one_full">
							<div class="div_banner">
								<img style="float:right; max-width: 100%; position: relative; z-index: 6;" src="images/premios/RS-SP---TOTAL.png" width=450 class="border-0" />
							</div>
							<h3>Tabela Classificatória de Premiações RS&nbsp;&nbsp;
								<img src="./images/bandeiras/27.png" style="width: 50px;">&nbsp;&nbsp;
							</h3>
							<ul class="tabs7">
								<li><a href="#Grupo-1.RS" onclick="showTabRS(event, 'Grupo-1.RS')">Grupo 01</a></li>
								<li><a href="#Grupo-2.RS" onclick="showTabRS(event, 'Grupo-2.RS')">Grupo 02</a></li>
							</ul>
							<div class="tabs-content7">
								<div id="Grupo-1.RS" class="tabs-panel7 RS active">
									<p>
									<h5>Grupo 01</h5>
									<div class="table-style">
										<table class="table-list2">
											<tr class="sticky">
												<th width="81">RANKING</th>
												<th width="81">PREMIAÇÃO</th>
												<th width="90">Nº CARTELAS</th>
											</tr>
											<tr>
												<th width="81">1º </th>
												<td width="81">R$ 800,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">2º </th>
												<td width="81">R$ 700,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">3º </th>
												<td width="81">R$ 600,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th width="81">4º </th>
												<td width="81">R$ 550,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">5º </th>
												<td width="81">R$ 500,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">6º </th>
												<td width="81">R$ 400,00 </td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">7º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">8º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">9º </th>
												<td width="81">R$ 350,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th width="81">10º </th>
												<td width="81">R$ 300,00</td>
												<td width="81">02</td>
											</tr>
											<tr>
												<th colspan="3">
													<strong>
														Quem não se classificar, mas fechar as metas das fases 01 e 02, terá direito a uma cartela para participar do Bingo em grupos.
													</strong>
												</th>
											</tr>
										</table>
										<div class="div_banner">
											<img style="float:right; max-width: 100%" src="images/premios/SC-PR-RS-SP - GRUPO-1.png" width=450 class="border-0" />
										</div>
									</div>
									</p>
								</div>
								<!-- FIM Grupo 1 -->
								<div id="Grupo-2.RS" class="tabs-panel7 RS">
									<p>
									<h5>Grupo 02</h5>
									<div class="table-style">
										<table class="table-list2">
											<tr class="sticky">
												<th width="81">RANKING</th>
												<th width="81">PREMIAÇÃO</th>
												<th width="90">Nº CARTELAS</th>
											</tr>
											<tr>
												<th width="81">1º </th>
												<td width="81">R$ 900,00</td>
												<td width="81">10</td>
											</tr>
											<tr>
												<th width="81">2º </th>
												<td width="81">R$ 800,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">3º </th>
												<td width="81">R$ 700,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">4º </th>
												<td width="81">R$ 650,00</td>
												<td width="81">05</td>
											</tr>
											<tr>
												<th width="81">5º </th>
												<td width="81">R$ 650,00</td>
												<td width="88">05</td>
											</tr>
											<tr>
												<th width="81">6º </th>
												<td width="81">R$ 600,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">7º </th>
												<td width="81">R$ 500,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">8º </th>
												<td width="81">R$ 450,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">9º </th>
												<td width="81">R$ 450,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">10º </th>
												<td width="81">R$ 400,00</td>
												<td width="81">04</td>
											</tr>
											<tr>
												<th width="81">11º </th>
												<td width="81">R$ 300,00</td>
												<td width="81">03</td>
											</tr>
											<tr>
												<th colspan="3">
													<strong>
														Quem não se classificar, mas fechar as metas das fases 01 e 02, terá direito a uma cartela para participar do Bingo em grupos.
													</strong>
												</th>
											</tr>
										</table>
										<img style="float:right; max-width: 100%" src="images/premios/RS-SP---GRUPO-2.png" width="450" />
									</div>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- FIM DAS TABELAS GrupoS -->
				<div class="clearfix"></div>
				<div id="section-2">
					<div class="section_holderGrupos">
						<div class="container">
							<div>
								<br>
								<h5>
									<span style="background-color: #1c97fd; padding: 7px; font-size: 25px; color: white; border-radius: 5px">Fase 02</span>
									<br><br>PEDÁGIO - META GERAL E BINGO GRUPOS
								</h5>
								<br>
								<p>Os RCA's também deverão fechar suas respectivas Metas Gerais por Grupo (conforme quadro abaixo) para validar sua participação na 24ª Campanha de Verão Muffatão FASE 02.</p>
								<p>O realizado será a soma geral de pontos e aceleradores de todos os fornecedores</p>
								<h4><strong>Este objetivo deverá ser CUMPRIDO ATÉ 24/01/2026.</strong></h4>
								<p>Participarão do BINGO GRUPO todos os RCA's que CUMPRIREM as metas gerais de seus Grupos, até a data estipulada.</p>
								<p>Os RCA's receberão as cartelas de acordo com sua classificação no grupo, conforme o desempenho e a pontuação alcançada nas Metas Gerais. A quantidade de cartelas que cada RCA receberá estará especificada na Tabela Classificatória de Premiações.</p>
							</div>
							<div style="clear: both;"></div>
							<h4>Quadro De Metas Gerais Por Grupos SC/PR&nbsp;&nbsp;
								<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
								<img src="./images/bandeiras/10.png" style="width: 50px;">
							</h4>
							<div class="table-style">
								<table class="table-list2">
									<tr>
										<th width="59">&nbsp;</th>
										<th width="66">Grupo 01</th>
										<th width="66">Grupo 02</th>
										<th width="66">Grupo 03</th>
										<th width="66">Grupo 04</th>
										<th width="76">Grupo 05</th>
										<th width="76">GDM</th>
									</tr>
									<tr>
										<th width="59">Mínimo</th>
										<td width="66">100.000</td>
										<td width="66">130.000</td>
										<td width="66">200.000</td>
										<td width="66">250.000</td>
										<td width="76">300.000</td>
										<td width="76">400.000</td>
									</tr>

								</table>
								<img src="images/premios/premio_rca_bingo_ouro.jpg" style="max-width: 100%" />
								<br>
								<br>
								<img src="images/premios/faixa_premio_rca_bingo_ouro.jpg" style="max-width: 100%" />
								<br><br><br><br>
							</div>
							<h4>Quadro De Metas Gerais Por Grupos RS&nbsp;&nbsp;
								<img src="./images/bandeiras/27.png" style="width: 50px;">&nbsp;&nbsp;</table>
							</h4>
							<div class="table-style" style="width: 60%;">
								<table class="table-list2">
									<tr>
										<th width="30">&nbsp;</th>
										<th width="35">Grupo 01</th>
										<th width="35">Grupo 02</th>
									</tr>
									<tr>
										<th width="30">Mínimo</th>
										<td width="35">50.000</td>
										<td width="35">65.000</td>
									</tr>

								</table>
								<img src="images/premios/premio_rca_bingo_ouro2.jpg" style="max-width: 100%" />
								<br>
								<br>
								<img src="images/premios/faixa_premio_rca_bingo_ouro2.jpg" style="max-width: 100%" />
								<br><br><br><br>
							</div>
						</div>
					</div>
				</div>
				<!-- FIM SESSION 2 -->
				<div class="section_holderGrupos">
					<div class="container">
						<div class="clearfix"></div>
						<!-- FIM SESSION 3 -->
						<div class="clearfix"></div>
						<div id="section-4">
							<div class="section_holderGrupos">
								<div class="container">
									<div class="section_title_line_full"></div>
									<h3><span style="background-color: #1c97fd; padding: 7px; font-size: 25px; color: white; border-radius: 5px">Fase 03 - MORAL EM CASA</span></h3>
									<ul>
										<li>Os 10 melhores rca's que fizerem acima de 1 milhão e 500 mil pontos na 24ª Campanha de Verão Muffatão - "Dom: Descobrir, focar e potencializar" irão ganhar uma viagem com acompanhante (Casal);</li>
										<li>A viagem será em grupo com todos os ganhadores dessa fase;</li>
										<li>A premiação será a hospedagem com hotel All inclusive;</li>
										<li>Nesta fase, os estados serão unificados para participação Moral em Casa;</li>
									</ul>
									<img src="images/media/moral_em_casa_rca.jpg" style="max-width: 100%" class="img_banner" class="animate__animated animate__backInLeft" />
									<!-- metas bingo prata -->
									<br>
									<br>
								</div>
							</div>
						</div>

						<div id="section-3">
							<div class="section_holderGrupos">
								<div class="container">
									<div class="section_title_line_full"></div>
									<h3>
										<span style="background-color: #1c97fd; padding: 7px; font-size: 25px; color: white; border-radius: 5px">FASE 04 - BINGO OURO</span>
										<img src="images/media/novidade.png" width="200px" style="margin-bottom: 15px;">
									</h3>
									<ul>
										<li>Os <b>RCAs que atingirem a pontuação mínima estabelecida para o seu grupo</b> (conforme tabela abaixo) estarão automaticamente habilitados a participar do Bingo Ouro</li>
										<li>Serão disponibilizadas <b>03 vagas para a viagem (com acompanhante) junto com os ganhadores do Moral em Casa.</b></li>
										<li><b>Observação: </b> Caso um RCA já tenha vencido na fase Moral em Casa, <b>não será</b> elegível para esta fase do bingo Ouro.</li>
										<li>Cada RCA terá <b>apenas 01 cartela no bingo</b>, independentemente de ultrapassar a pontuação mínima estabelecida.</li>
										<li>Nesta fase, os estados serão unificados para participação no bingo Ouro.</li>
										<br>
									</ul>
									<img class="img_banner" src="images/media/meta_grupo_rca.jpg" style="max-width: 100%" />
									<br>
									<br>
									<br>
									<h4>Premiação Bingo Ouro</h4>
									<img class="img_banner" src="images/media/bingo_ouro.jpg" style="max-width: 100%" />
									<!-- metas bingo ouro -->
									<br>
									<br>
									<div class=""></div>
								</div>
							</div>
						</div>
						<!-- FIM SESSION 5 -->
						<div class="clearfix"></div>
						<div id="section-5">
							<div class="section_holderGrupos">
								<div class="container">
									<div class="section_title_line_full"></div>
									<h3><span style="background-color: #1c97fd; padding: 7px; font-size: 25px; color: white; border-radius: 5px">Fase 05 - MIX ESTRELA</span></h3>
									<ul>
										<p><strong>Mix Estrela</strong> são produtos selecionados de todos os fornecedores participantes da 24ª Campanha de Verão Muffatão. Cada <strong>Mix Estrela</strong> terá metas mensais de venda. Para consultar os itens de cada fornecedores, é só ir no menu: Produtos participantes > Mix estrela</p>
										<h2><strong>Participação no BINGO dos Produtos Mix Estrela:</strong></h2>
										<p>Todos os Representantes Comerciais Autônomos (RCA's) que cumprirem as metas mínimas mensais estipuladas por cada fornecedor estarão aptos a participar do <strong>BINGO</strong>.</p>
										<p>Nesta fase, os estados serão unificados para participação do Mix Estrela;</p>
										<br>
									</ul>

									<div id="section-1">
										<div class="table-style">
											<h4>SC/PR&nbsp;&nbsp;
												<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
												<img src="./images/bandeiras/10.png" style="width: 50px;">
											</h4>
											<table class="table-list2">
												<tr>
													<th colspan="7">META MENSAL</th>
												</tr>
												<tr class="sticky">
													<th width="330">FORNECEDORES</th>
													<th>Grupo 01</th>
													<th>Grupo 02</th>
													<th>Grupo 03</th>
													<th>Grupo 04</th>
													<th>Grupo 05</th>
													<th>GDM</th>
												</tr>
												<tr>
													<th>COLGATE</th>
													<td>R$ 5.000</td>
													<td>R$ 30.000</td>
													<td>R$ 35.000</td>
													<td>R$ 60.000</td>
													<td>R$ 65.000</td>
													<td>R$ 70.000</td>
												</tr>
												<tr>
													<th>FLORA ASSIM + PERFUMARIA</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
													<td>R$ 3.500</td>
													<td>R$ 5.000</td>
													<td>R$ 6.000</td>
													<td>R$ 8.000</td>
												</tr>
												<tr>
													<th>HAVAIANAS</th>
													<td>R$ 2.500</td>
													<td>R$ 6.000</td>
													<td>R$ 15.000</td>
													<td>R$ 20.000</td>
													<td>R$ 30.000</td>
													<td>R$ 35.000</td>
												</tr>
												<tr>
													<th>MEX</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
													<td>R$ 3.500</td>
													<td>R$ 5.000</td>
													<td>R$ 6.000</td>
													<td>R$ 8.000</td>
												</tr>
												<tr>
													<th>RECKITT</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
													<td>R$ 3.500</td>
													<td>R$ 5.000</td>
													<td>R$ 6.000</td>
													<td>R$ 8.000</td>
												</tr>
												<tr>
													<th>SPECIAL NUTRI</th>
													<td>R$ 400</td>
													<td>R$ 500</td>
													<td>R$ 700</td>
													<td>R$ 800</td>
													<td>R$ 900</td>
													<td>R$ 1.000</td>
												</tr>
												<tr>
													<th>UNILEVER HF</th>
													<td>R$ 2.500</td>
													<td>R$ 4.000</td>
													<td>R$ 6.000</td>
													<td>R$ 9.000</td>
													<td>R$ 12.000</td>
													<td>R$ 18.000</td>
												</tr>
												<tr>
													<th>UNILEVER BPC</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
													<td>R$ 3.500</td>
													<td>R$ 5.000</td>
													<td>R$ 6.000</td>
													<td>R$ 8.000</td>
												</tr>
												<tr>
													<th>YPE</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
													<td>R$ 3.500</td>
													<td>R$ 5.000</td>
													<td>R$ 6.000</td>
													<td>R$ 8.000</td>
												</tr>
												<tr>
													<th>SANTHER</th>
													<td>R$ 5.000</td>
													<td>R$ 20.000</td>
													<td>R$ 25.000</td>
													<td>R$ 40.000</td>
													<td>R$ 45.000</td>
													<td>R$ 50.000</td>
												</tr>
											</table>
											<h4>RS&nbsp;&nbsp;
												<img src="./images/bandeiras/27.png" style="width: 50px;">&nbsp;&nbsp;
											</h4>
											<p>Nesta fase, os estados serão unificados para participação do Mix Estrela;</p>
											<table class="table-list2">
												<tr>
													<th colspan="7">META MENSAL</th>
												</tr>
												<tr class="sticky">
													<th width="330">FORNECEDORES</th>
													<th>Grupo 01</th>
													<th>Grupo 02</th>
												</tr>
												<tr>
													<th>COLGATE</th>
													<td>R$ 5.000</td>
													<td>R$ 15.000</td>
												</tr>
												<tr>
													<th>FLORA ASSIM + PERFUMARIA</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
												</tr>
												<tr>
													<th>HAVAIANAS</th>
													<td>R$ 2.500</td>
													<td>R$ 6.000</td>
												</tr>
												<tr>
													<th>MEX</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
												</tr>
												<tr>
													<th>RECKITT</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
												</tr>
												<tr>
													<th>SPECIAL NUTRI</th>
													<td>R$ 200</td>
													<td>R$ 250</td>
												</tr>
												<tr>
													<th>YPE</th>
													<td>R$ 1.500</td>
													<td>R$ 2.500</td>
												</tr>
												<tr>
													<th>SANTHER</th>
													<td>R$ 5.000</td>
													<td>R$ 15.000</td>
												</tr>
											</table>
											<div class="section_title_line_full"></div>
											<div class="clearfix"></div>
										</div>
									</div>

									<h2><strong>Cartelas do BINGO:</strong></h2>
									<li><strong>Cartela Mensal:</strong> A cada 2 metas mínimas fechadas no mês, ganhe 01 cartela para participar do bingo mix estrela.</li>
									<li><strong>Cartela Extra:</strong> Se, ao longo dos <strong>4 meses da campanha</strong>, o RCA atingir a meta de <strong>09 fornecedores no total (SC/PR)</strong> e <strong>07 fornecedores no total (RS)</strong> (considerando as metas mensais), ele <strong>ganhará uma cartela extra</strong> para o BINGO.</li>
									<li><strong>Metas de Fornecedores:</strong> Os fornecedores participantes da campanha incluem UNILEVER HF, UNILEVER BPC, RECKITT, MEX, SPECIAL NUTRI - MOVI, HAVAIANAS, FLORA, COLGATE, SANTHER e YPÊ.</li>
									<br>
									<h2><strong>Exclusão da Participação no Mix Estrela:</strong></h2>
									<p> Caso um RCA vença na fase moral em casa, ele não será elegível para participar do Mix Estrela. Este regulamento esclarece as condições de participação e os critérios para a distribuição de cartelas para o BINGO dos produtos <strong>Mix Estrela</strong> na 24ª <strong>Campanha de Verão Muffatão.</strong><br>
										Certifique-se de cumprir as metas mensais e acompanhar o desempenho da empresa para garantir sua elegibilidade no <strong>BINGO</strong>.</p>
									</ul>
									<h4>Premiação Bingo Mix Estrela</h4>
									<img src="images/media/mix_estrela.jpg" style="max-width: 100%;" class="img_banner" class="animate__animated animate__backInLeft" />
									<!-- metas bingo prata -->
									<br>
									<br>
									<div class="section_title_line_full"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- FIM SESSION 4 -->

					<div id="section-2">
						<div class="section_holderGrupos">
							<div class="container" style="display: flex; align-items: flex-start; flex-wrap: wrap;">

								<!-- Texto -->
								<div style="flex: 1; min-width: 300px; max-width: 700px;">
									<h3>Aceleradores</h3>
									<ul style="border:1px solid #fff; list-style-position: inside; padding: 10px;">
										<li>Os "Produtos Aceleradores" são produtos selecionados com pontuações extras durante um período específico que oferecem pontos adicionais nos fornecedores.</li>
										<li>Os pedidos relacionados aos Produtos Aceleradores serão contabilizados com base no dia da venda, e não do faturamento. Isso significa que a data da venda, ou seja, o dia em que o pedido é efetivamente registrado e confirmado pelo sistema, será a data utilizada para calcular as vantagens extras associadas aos Produtos Aceleradores.</li>
										<li>Para consultar os produtos participantes e suas pontuações, acesse o menu: ACELERADORES.</li>
										<li>As pontuações dos aceleradores serão creditadas automaticamente no painel de parciais grupos gerais.</li>
										<li>Bonificações não serão contabilizadas.</li>
										<li>Devoluções e cancelamentos: Pedidos que houverem qualquer tipo de exclusão/cancelamento perderão automaticamente os pontos na campanha.</li>
										<li style="background-color: #ffff0070;">Em caso de troca de notas fiscais referentes a produtos aceleradores, estas não serão reconsideradas para fins de pontuação na campanha. O representante perderá automaticamente a pontuação anteriormente atribuída a tais notas.</li>
									</ul>
								</div>

								<!-- Imagem à direita -->
								<div style="flex-shrink: 0;">
									<img src="images/premios/aceleradores.png" class="imagem_acelerador" style="width: 100%; max-width: 350px;" />
								</div>

							</div>
						</div>
					</div>
				</div>
				<h3>Observações Gerais</h3>
				<ul>
					<li>Somente participarão da 24ª Campanha de Verão Muffatão os RCA's que iniciarem a prestação de serviços até o dia 15/11/2025.</li>
					<li>Somente receberão os prêmios os RCA's que na data da entrega dos mesmos estiverem prestando serviços para a empresa, e estiverem presentes no Evento de Encerramento da 24ª Campanha de Verão Muffatão - “Dom: Descobrir, focar e potencializar”.</li>
					<li>Se não houver ganhador nas premiações por Grupo, conforme Tabela Classificatória de Premiação, os valores sobrantes <strong style="color: #fc4242;">NÃO</strong> serão rateados entre os ganhadores do Grupo.</li>
					<li>Serão Ganhadores os RCA's, conforme a Tabela Classificatória de Premiação, que obtiverem os maiores percentuais acima da Meta Geral de seu Grupo.</li>
					<li>Somente participarão do evento de encerramento os RCA's, que fecharem as metas das fases 01 e 02.</li>
					<li>Para validar a participação na 24ª Campanha de VERÃO MUFFATÃO, os participantes deverão aceitar os termos e regulamentos da mesma, até o dia <strong>15/11/2025</strong>.</li>
					<li>As pontuações serão atualizadas toda sexta-feira e as vendas nos bingos Ouro e Mix Estrela atualizam diariamente conforme faturamento.</li>
					<li>Bonificações não serão consideradas para fins de pontuação ou apuração de vendas em qualquer fase da campanha.</li>
					<li style="background-color: #ffff0070;">Para participar das fases 03, 04 e 05 é necessário cumprir as metas das fases 01 e 02 nas datas estipuladas.</li>
				</ul>

				<div style="max-width: 100%">
					<img src="images/media/logo_fornecedores.png" width="100%" style="max-width: 100%" />
				</div>
				<div class="section_title_line_full"></div>
				<div class="checkbox-custom">
					<?php
					$checked = "";
					$RSSC = mysql_query("select cd_aceite from usuarios where cd_usuario = '" . $_SESSION['CD_USUARIO'] . "' and cd_ativo = 1 ");
					$RSC = mysql_fetch_assoc($RSSC);
					if ($RSC['cd_aceite'] == "1") {
						$checked 	= "checked";
						$bloq		= "disabled";
					}

					if (strtotime(date('Y-m-d')) <= strtotime("2025-12-29")) { ?>
						<label><input type="checkbox" id="checkbox" <?php echo $checked . " " . $bloq; ?> onChange="confirmarAceite();"><b></b>
							<span>Declaro que li e aceito os termos e regulamento da 24ª Campanha de Verão Muffatão.</span>
						</label>
					<?php } else { ?>
						<span>O prazo para aceitar os termos e regulamentos da 24ª Campanha de Verão Muffatão se encerraram no dia 05/12/2025.</span>
					<?php } ?>
				</div>
				<br>
			</div>
		</div>
		</section>
		</div>
		<!--end section-->
		<?php include "footer.php"; ?>

		<script>
			window.onload = function() {
				var style = document.createElement('style');
				style.innerHTML = '.sticky th { position: sticky; top: 0px; }';
				document.head.appendChild(style);
			};
		</script>
		<script>
			function showTabSCePR(event, tabId) {
				event.preventDefault();

				// Esconde apenas os painéis SC e PR
				document.querySelectorAll('.tabs-panel7.SCePR').forEach(panel => {
					panel.classList.remove('active');
				});

				// Remove destaque apenas das abas SC e PR
				document.querySelectorAll('.tabs7 li a.SCePR').forEach(tab => {
					tab.classList.remove('active');
				});

				document.getElementById(tabId).classList.add('active');
				event.currentTarget.classList.add('active');
			}

			function showTabRS(event, tabId) {
				event.preventDefault();

				// Esconde apenas os painéis RS e SP
				document.querySelectorAll('.tabs-panel7.RS').forEach(panel => {
					panel.classList.remove('active');
				});

				// Remove destaque apenas das abas RS e SP
				document.querySelectorAll('.tabs7 li a.RS').forEach(tab => {
					tab.classList.remove('active');
				});

				document.getElementById(tabId).classList.add('active');
				event.currentTarget.classList.add('active');
			}
		</script>

	</body>

	</html>
<?php
} else {
	echo "<script language='javascript'>window.open('404.php', '_self');</script>";
}
?>