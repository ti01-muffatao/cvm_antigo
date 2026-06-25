<?php include "administrar/conexao.php";
if ($_SESSION["CD_USUARIO"] == "") {
	echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
if (in_array($_SESSION['CD_PERFIL'], array('1', '2', '3', '4', '5', '6', '7'))) {
?>

	<!doctype html>
	<html lang="pt-BR">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="content-language" content="pt-BR">
		<title><?= $Titulo; ?></title>
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
		<script src="js/flexslider/custom.js"></script>
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

			.TabelaMeses {
				display: none;
			}

			.TabelaMeses.active {
				display: block;
			}
		</style>

	</head>

	<body>
		<?php include "loading.php" ?>
		<?php include "menu.php"; ?>
		<div class="section_holdergrupos">
			<div class="container">
				<div style="text-align: center;">
					<img src="images/logo.png" style="width: 250px; height: auto;">
				</div>

				<br>
				<h3 align="center">Regulamento 24ª Campanha de verão Muffatão - Supervisor<br> "Dom: Descobrir, focar e potencializar"</h3>
				<div class="section_title_line_full"></div>
				<br>
				<br>
				<h3><span class="titulo-fase">FASE 01</span></h3>
				<p>Serão Ganhadores os Supervisores ou Consultores que Obtiverem o maior PERCENTUAL acima da sua META MÍNIMA de cada FORNECEDOR. Os PRÊMIOS serão por FORNECEDORES participantes da 24ª Campanha de Verão Muffatão – "Dom: Descobrir, focar e potencializar".</p>
				<p>As metas poderão sofrer alterações durante o período da campanha.</p>
				<p>No fornecedor Unilever participam apenas os Supervisores do estado do Paraná e Santa Catarina.</p>
				<p>As TABELAS abaixo referem-se às pontuações mínimas por FORNECEDOR e aos Prêmios de Supervisor. </p>
				<h5>Tabela Classificatória de Metas por Fornecedor - Supervisores ou Consultores</h5>
				<div class="table-style">
					<table class="table-list2">
						<tr class="sticky">
							<th>CÓDIGO</th>
							<th>SUPERVISOR</th>
							<?php $SQL = "SELECT * from clifor c order by c.ds_razao asc";
							$query = mysql_query($SQL);
							while ($objeto = mysql_fetch_array($query)) { ?>
								<th><?= $objeto['ds_razao'] ?></th>
							<?php } ?>
							<th>TOTAL</th>
						</tr>
						<?php
						$sups = array('8001', '8002', '8003', '8004', '8030', '8031', '8032', '8033', '8034', '8035',  '8020');
						foreach ($sups as $sup) { ?>
							<tr>
								<th><?= $sup; ?></th>
								<th><?php $nome_supervisor = explode(" ", BuscaUsuario($sup));
									echo $nome_supervisor[0]; ?></th>
								<?php
								$total = 0;
								$SQL = "SELECT * from meta_individual m, clifor c where m.cd_fornecedor = c.cd_fornecedor and m.cd_codigo = '$sup' group by m.cd_fornecedor order by c.ds_razao asc";
								// echo $SQL;
								$query = mysql_query($SQL);
								while ($objeto = mysql_fetch_array($query)) {
									$total += $objeto['vl_metam']; ?>
									<td><?php
										if ($objeto['vl_metam'] != 0) {
											echo number_format($objeto['vl_metam'], 0, '', '.');
										} else {
											echo "-";
										}
										?>
									</td>
								<?php } ?>
								<th><?= number_format($total, 0, '', '.'); ?></th>
							</tr>
						<?php } ?>
					</table>
				</div>
				<p>Apenas serão considerados na contagem os pontos dos Representantes Comerciais Autônomos que estiverem ativos e participando da 24ª Campanha de Verão Muffatão, aqueles contratados após 15/11/2025 não terão suas pontuações incluídas.</p>
				<p>Nessa fase, todos os estados participam juntos.</p>
				<div class=""></div>
				<div class="section_title_line_full"></div>
				<div>
					<h5>Tabela Classificatória de Premiações por Fornecedor - Supervisores ou Consultores</h5>
					<img style="float:right" src="images/premios/premio_super_fase01.png" width="450" />
				</div>
				<div id="section-1">
					<div class="table-style">
						<table class="table-list2">
							<tr class="sticky">
								<th width="127">CÓDIGO</th>
								<th width="135">FORNECEDOR</th>
								<th width="75">1º LUGAR</th>
								<th width="71">2º LUGAR</th>
								<th width="71">3º LUGAR</th>
								<th width="71">4º LUGAR</th>
								<th width="71">5º LUGAR</th>
								<th width="71">TOTAL</th>
							</tr>
							<tr>
								<th width="127">F00001</th>
								<th width="135">YPE</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">R$ 300,00</td>
								<th width="71">R$ 3.150,00</th>
							</tr>
							<tr>
								<th width="127">F00002</th>
								<th width="135">SPECIAL NUTRI</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">R$ 300,00</td>
								<th width="71">R$ 3.150,00</th>
							</tr>
							<tr>
								<th width="127">F00003</th>
								<th width="135">MEX</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">R$ 300,00</td>
								<th width="71">R$ 3.150,00</th>
							</tr>
							<tr>
								<th width="127">F00004</th>
								<th width="135">UNILEVER HF</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">-</td>
								<th width="71">R$ 2.850,00</th>
							</tr>
							<tr>
								<th width="127">F00005</th>
								<th width="135">UNILEVER BPC</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">-</td>
								<th width="71">R$ 2.850,00</th>
							</tr>
							<tr>
								<th width="127">F00077</th>
								<th width="135">RECKITT</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">R$ 300,00</td>
								<th width="71">R$ 3.150,00</th>
							</tr>
							<tr>
								<th width="127">F00009</th>
								<th width="135">HAVAIANAS</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">R$ 300,00</td>
								<th width="71">R$ 3.150,00</th>
							</tr>
							<tr>
								<th width="127">F00018</th>
								<th width="135">FLORA ASSIM + PERFURMARIA</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">R$ 300,00</td>
								<th width="71">R$ 3.150,00</th>
							</tr>
							<tr>
								<th width="127">F00097</th>
								<th width="135">COLGATE</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">R$ 300,00</td>
								<th width="71">R$ 3.150,00</th>
							</tr>
							<tr>
								<th width="127">F00010</th>
								<th width="135">SANTHER</th>
								<td width="75">R$ 1.000,00</td>
								<td width="71">R$ 800,00</td>
								<td width="71">R$ 600,00</td>
								<td width="71">R$ 450,00</td>
								<td width="71">R$ 300,00</td>
								<th width="71">R$ 3.150,00</th>
							</tr>
						</table>
					</div>
				</div>
				<div class="section_title_line_full"></div>
				<div class="section_holdergrupos">
					<div class="container">
						<h3><span class="titulo-fase">FASE 02 - MIX ESTRELA</span></h3>
						<div>
							<p><strong>Mix Estrela</strong> são produtos selecionados de todos os fornecedores participantes da 24ª Campanha de Verão Muffatão. Cada <strong>Mix Estrela</strong> terá metas mensais de venda.
								Para consultar os itens de cada fornecedores, é só ir no menu: Produtos participantes > Mix estrela</p>
							<h2><strong>Participação no BINGO dos Produtos Mix Estrela:</strong></h2>
							<p>Todos os supervisores ou consultores que cumprirem as metas mínimas mensais estipuladas por cada fornecedor estarão aptos a participar do <strong>BINGO</strong>.</p>
							<h2><strong>Cartelas do BINGO:</strong></h2>
							<ul>
								<li>Cartela Mensal: A cada 2 metas mínimas fechadas no mês, ganhe 01 cartela para participar do bingo mix estrela.</li>
								<li>Cartela Extra: Se, ao longo dos 4 meses da campanha, o supervisor atingir a meta de <strong>09 fornecedores no total (SC/PR)</strong> e <strong>07 fornecedores no total (RS)</strong> (considerando as metas mensais), ele ganhará uma cartela extra para o BINGO.</li>
								<li>Metas de Fornecedores: Os fornecedores participantes da campanha incluem UNILEVER HF, UNILEVER BPC, RECKITT, MEX, SPECIAL NUTRI - MOVI, HAVAIANAS, FLORA, COLGATE, SANTHER e YPÊ.</li>
								<li>Será disponibilizada <b>01 vaga para a viagem junto com os ganhadores do Moral em Casa.</b></li>
							</ul>

							<h2><strong>Exclusão da Participação no Mix Estrela:</strong></h2>
							<p>Caso um supervisor ou consultor vença na fase moral em casa, ele não será elegível para participar do Mix Estrela. Este regulamento esclarece as condições de participação e os critérios para a distribuição de cartelas para o BINGO dos produtos <strong>Mix Estrela</strong> na 24ª <strong>Campanha de Verão Muffatão.</strong></p>
							<p>Certifique-se de cumprir as metas mensais e acompanhar o desempenho da empresa para garantir sua elegibilidade no <strong>BINGO</strong>.</p>
							<p>Nessa fase, todos os estados participam juntos.</p>
						</div>
					</div>
					<br>
					<h5>Tabela Classificatória de Metas mensais de venda por Fornecedor - Supervisores ou Consultores</h5>
					<ul class="tabs7">
						<li><a href="#Mes11TabelaMeses" onclick="showTab(event, 'Mes11TabelaMeses')">Novembro</a></li>
						<li><a href="#Mes12TabelaMeses" onclick="showTab(event, 'Mes12TabelaMeses')">Dezembro</a></li>
						<li><a href="#Mes01TabelaMeses" onclick="showTab(event, 'Mes01TabelaMeses')">Janeiro</a></li>
						<li><a href="#Mes02TabelaMeses" onclick="showTab(event, 'Mes02TabelaMeses')">Fevereiro</a></li>
					</ul>
					<br>
					<?php foreach (['11', '12', '01', '02'] as $mes) { ?>
						<div class="table-style TabelaMeses <?= $mes == '11' ? 'active' : '' ?>" id="Mes<?= $mes ?>TabelaMeses">
							<table class="table-list2">
								<tr>
									<th colspan="13" align="center">
										META MENSAL - <?= $nomesMes[$mes] ?>
									</th>
								</tr>

								<tr class="sticky">
									<th>CÓD</th>
									<th>NOME</th>
									<?php foreach ($fornecedores_mix_estrela as $codigo_fornecedor => $nome) { ?>
										<th><?= htmlspecialchars($nome) ?></th>
									<?php } ?>
									<th>TOTAL</th>
								</tr>

								<?php foreach ($sups as $sup) { ?>
									<tr>
										<td><?= htmlspecialchars($sup) ?></td>
										<td> <?php $nome_supervisor = explode(" ", BuscaUsuario($sup));
											echo htmlspecialchars($nome_supervisor[0]);
											?>
										</td>

										<?php
										$total = 0;

										foreach ($fornecedores_mix_estrela as $codigo_fornecedor => $nome) {
											$SQL = " SELECT vl_meta  FROM metas_bingo_prata_sup  WHERE cd_codigo = '$sup'  AND cd_fornecedor = '$codigo_fornecedor'  AND cd_mes = $mes ORDER BY cd_fornecedor ";
											$query = mysql_query($SQL);

											if ($query && mysql_num_rows($query) > 0) {
												$vl_meta = 0;
												while ($objeto = mysql_fetch_array($query)) {
													$vl_meta += $objeto['vl_meta'];
												}
												$total += $vl_meta;
												echo "<td>R$ " . number_format($vl_meta, 0, '', '.') . "</td>";
											} else {
												echo "<td>-</td>";
											}
										}
										?>

										<th>R$ <?= number_format($total, 0, '', '.'); ?></th>
									</tr>
								<?php } ?>
							</table>
						</div>
					<?php } ?>
					<h4>Premiação Mix Estrela</h4>
					<div class="clearfix"></div>
					<img src="images/premios/premio_super_fase02.jpg" width="1000" style="max-width: 100%" class="img_banner" class="animate__animated animate__backInLeft" />
				</div>
				<div class="section_title_line_full"></div>
				<div class="section_holdergrupos">
					<div class="container">
						<h3><span class="titulo-fase">FASE 03 SUPERVISORES OU CONSULTORES - MORAL EM CASA</span></h3>
						<ul>
							<li>Os 03 melhores supervisores ou consultores que fizerem o maior percentual acima da meta geral de pontos (Fase 01) na 24ª Campanha de Verão Muffatão - "Dom: Descobrir, focar e potencializar" irão ganhar uma viagem com acompanhante (Casal);</li>
							<li><span style="background-color: #fafa77; padding-bottom: 0px; padding: 5px">Pedágio: Para participar da FASE 03, o supervisor precisa fechar a meta mínima em todos os fornecedores (Fase 01);</span></li>
							<li>A viagem será em grupo com todos os ganhadores dessa fase;</li>
							<li>A premiação será a hospedagem com hotel All inclusive;</li>
							<li>Nessa fase, todos os estados participam juntos.</li>
						</ul>
						<img src="images/media/moral_em_casa_sup.jpg" width="1000" style="max-width: 100%" class="img_banner" class="animate__animated animate__backInLeft" />
						<br><br><br><br>
						<div class="container">
							<h3><span class="titulo-fase">Pedágio</span></h3>
							Cada supervisor contará com uma meta mínima de representantes que deverão cumprir as metas estabelecidas nas Fases 01 e 02 da campanha. A meta definida no início da campanha será fixa, não sofrendo alterações em caso de desligamento ou substituição de representantes. <br>
							Após o dia <b>24/01/2026</b>, data em que todos os Representantes Comerciais Autônomos deverão estar com suas metas da <b>Fase 02</b> concluídas e após a apuração realizada no dia seguinte, caso algum RCA saia da campanha posteriormente, <b>o mesmo não acarretará penalização ao supervisor.</b> <br>
							Segue tabela para metas: <br><br>
							<table class="table-list2">
								<thead>
									<tr>
										<th>Supervisor</th>
										<th>Qtd.</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>TONINHO</td>
										<td>19 RCAS</td>
									</tr>
									<tr>
										<td>JEFERSON</td>
										<td>14 RCAS</td>
									</tr>
									<tr>
										<td>CTBA2</td>
										<td>5 RCAS</td>
									</tr>
									<tr>
										<td>LIZ</td>
										<td>17 RCAS</td>
									</tr>
									<tr>
										<td>MARCOS</td>
										<td>11 RCAS</td>
									</tr>
									<tr>
										<td>MARCELO</td>
										<td>12 RCAS</td>
									</tr>
									<tr>
										<td>THIAGO</td>
										<td>16 RCAS</td>
									</tr>
									<tr>
										<td>JULIANO</td>
										<td>16 RCAS</td>
									</tr>
									<tr>
										<td>INGO</td>
										<td>13 RCAS</td>
									</tr>
									<tr>
										<td>EMERSON</td>
										<td>11 RCAS</td>
									</tr>
									<tr>
										<td>IVAN</td>
										<td>25 RCAS</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="section_holdergrupos">
				<div class="container">
					<div class="section_title_line_full"></div>
					<h5 class="uppercase">Observações Gerais</h5>
					<ul>
						<li>Somente serão computados os pontos do RCA's Ativos e participantes da 24ª Campanha de Verão Muffatão - “Dom: Descobrir, focar e potencializar”.</li>
						<li>Somente receberão os PRÊMIOS os Supervisores ou Consultores que na data da entrega dos mesmos forem funcionários da Empresa e estiverem presentes no Evento de Encerramento da 24ª Campanha de Verão Muffatão – “Dom: Descobrir, focar e potencializar”.</li>
						<li>Se durante a 24ª Campanha de Verão Muffatão houver trocas de Equipe de Supervisão, o mesmo assumirá os pontos da sua Equipe Nova.</li>
						<li>Para validar a participação na 24ª Campanha de VERÃO MUFFATÃO, os participantes deverão aceitar os termos e regulamentos da mesma, até o dia <strong>15/11/2025</strong>.</li>
						<li>Bonificações não serão consideradas para fins de pontuação ou apuração de vendas em qualquer fase da campanha.</li>
						<li>Código dos fornecedores participantes:
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YPÊ - F00001 / UNILEVER BPC - F00005 / UNILEVER HF - F00004 / MEX - F00003 / SANTHER F00010 /<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SPECIAL NUTRI - F00002 / RECKITT - F00077 / HAVAIANAS - F00009 / FLORA - F00018 / COLGATE - F00097
						</li>
					</ul>
					<div>
						<img src="images/media/logo_fornecedores.png" width="100%" />
					</div>
					<div class=""></div>
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
						?>
						<?php if (strtotime(date('Y-m-d')) <= strtotime("2025-12-29")) { ?>
							<label><input type="checkbox" id="checkbox" <?= $checked . " " . $bloq; ?> onChange="confirmarAceite();"><b></b>
								<span>Declaro que li e aceito os termos e regulamento da 24ª Campanha de Verão Muffatão.</span>
							</label>
						<?php } else { ?>
							<span>O prazo para aceitar os termos e regulamentos da 24ª Campanha de Verão Muffatão se encerraram no dia 15/11/2025.</span>
						<?php } ?>
					</div>
					<br>
					<br>
				</div>
			</div>
		</div>
		</div>
		</div>
		<!--end section-->
		<?php include "footer.php"; ?>

		<script>
			window.onload = function() {
				var style = document.createElement('style');
				style.innerHTML = '.sticky th { position: sticky; top: 0px; }';
				document.head.appendChild(style);
			};

			function showTab(event, tabId) {
				event.preventDefault();

				// Esconde todas as tabelas
				document.querySelectorAll('.TabelaMeses').forEach(panel => {
					panel.classList.remove('active');
				});

				// Remove destaque dos botões
				document.querySelectorAll('.tabs7 a').forEach(tab => {
					tab.classList.remove('active');
				});

				// Mostra a tabela clicada
				document.getElementById(tabId).classList.add('active');

				// Destaca o botão ativo
				event.currentTarget.classList.add('active');
			}
		</script>

	</body>

	</html>
<?php } else {
	echo "<script language='javascript'>window.open('404.php', '_self');</script>";
} ?>