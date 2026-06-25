<?php include "administrar/ora_connect.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
	echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
?>
<!doctype html>
<html lang="pt-BR">
<!--<![endif]-->

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="content-language" content="pt-BR">
	<title>24ª Campanha de Verão Muffatão</title>
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

	<!--barras-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
	<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/stylesheets/theme-custom.css">
	<script src="http://portal.muffatao.com.br/pag/assets/vendor/modernizr/modernizr.js"></script>
	<!-- end barras -->

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
	<script src="js/flexslider/jquery.flexslider.js"></script>
	<script src="js/flexslider/custom.js"></script>
</head>

<body>
	<?php include "menu.php"; ?>

	<div class="clearfix"></div>
	<div class="section_holdergrupos">
		<div class="one_full">
			<div style="padding-left: 5%">
				<h3>Bingo Mix Estrela</h3>
				<span><b>Cartela Mensal:</b> A cada 2 metas mínimas fechadas no mês, ganhe 01 cartela para participar do bingo</span>
				<h6>Selecione um mês abaixo &#8595;</h6>
				<ul class="tabs7">
					<?php

					// Geração dinâmica dos links
					$grupo_num = 1;
					foreach ($datas as $mes => $data) {
						echo "<li><a href='?grupo-$grupo_num' target=''>$mes</a></li>";
						$grupo_num++;
					}
					?>

				</ul>
			</div>
			<div class="tabs-content7">
				<?php
				// Início da verificação de qual grupo foi selecionado
				foreach ($datas as $mes => $data) {

					$grupo_id = array_search($mes, array_keys($datas)) + 1; // id do grupo dinâmico	

					if (isset($_GET["grupo-$grupo_id"])) {
						$data_min = $data['data_inicial'];
						$data_max = $data['data_final'];
				?>
						<div id="grupo-<?= $grupo_id ?>" class="tabs-panel7">
							<h3>Acompanhamento - <?= $mes ?></h3>
							<div class="table-style">
								<table class="table-list2">
									<tr class="sticky">
										<th>COD</th>
										<th>NOME</th>
										<?php
										$dias_uteis 	= dias_uteis(substr($data_min, 4, 2), substr($data_min, 0, 4));
										$dias_passaram = dias_passaram(substr($data_min, 4, 2), substr($data_min, 0, 4));
										$dias_real 		= ($dias_passaram / $dias_uteis) * 100;

										foreach ($fornecedores_mix_estrela as $fornecedor => $nome) { ?>
											<th><?= $nome; ?></th>
										<?php } ?>
										<th>CARTELAS</th>
									</tr>
									<tr>
										<?php
										$SQLG = "select * from usuarios where cd_perfil = 4 and cd_ativo = 1 ";
										if ($_SESSION['CD_PERFIL'] == 4) {
											$SQLG .= " and cd_codigo = '" . $_SESSION['CD_CODIGO'] . "' ";
										}
										if ($_SESSION['CD_PERFIL'] == 3) {
											$SQLG .= " and cd_supervisor = '" . $_SESSION['CD_CODIGO'] . "' ";
										}
										if ($_SESSION['CD_PERFIL'] == 2) {
											$SQLG .= " and cd_gestor = '" . $_SESSION['CD_CODIGO'] . "' ";
										}
										$SQLG .= " order by cd_codigo asc ";
										// echo $SQLG;
										$RSSG = mysql_query($SQLG, $conexao);
										while ($RSG = mysql_fetch_array($RSSG)) {

											$contadorDeMetasFechadas = 0;

										?>
											<th><?= $RSG["cd_codigo"]; ?></th>
											<th><?= BuscaUsuario($RSG["cd_codigo"]); ?></th>

											<?php foreach ($fornecedores_mix_estrela as $fornecedor => $nome) {

												$SQL = "select * from metas_bingo_prata where cd_grupo = '" . $RSG['cd_grupo'] . "' and cd_fornecedor = '" . $fornecedor . "'";
												$RSS = mysql_query($SQL, $conexao);
												// echo $SQL;
												if (mysql_num_rows($RSS) > 0) {
													while ($RS = mysql_fetch_array($RSS)) {
														$cd_codigo = $RSG['cd_codigo'];

														//CONSULTA DEVOLUCAO FONECEDOR	
														$SQLD = "select SUM(d1.D1_TOTAL) AS DEVOLUCAO from SIGA.SF2010 f2, SIGA.SD1010 d1, SIGA.SA3010 a3, SIGA.SF4010 F4 where f2.F2_FILIAL = d1.D1_FILIAL and d1.D1_FILIAL = a3.A3_FILIAL and f2.F2_DOC = d1.D1_NFORI and f2.F2_SERIE = d1.D1_SERIORI and f2.F2_VEND1 = a3.A3_COD and d1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d1.D1_FILIAL AND A5_FORNECE = '" . $fornecedor . "' AND D_E_L_E_T_ = ' ') and d1.D1_TIPO = 'D' ";
														if ($_SESSION['CD_PERFIL'] == 4) {
															$SQLD .= " AND A3.A3_COD = '" . $_SESSION['CD_CODIGO'] . "' ";
														} else if ($_SESSION['CD_PERFIL'] == 3) {
															$SQLD .= " AND A3.A3_SUPER = '" . $_SESSION['CD_CODIGO'] . "' ";
														} else if ($_SESSION['CD_PERFIL'] == 2) {
															$SQLD .= " AND A3.A3_GEREN = '" . $_SESSION['CD_CODIGO'] . "' ";
														}
														if ($cd_codigo == '0236') {
															$SQLD .= " AND f2.F2_VEND1 IN ('0236', '0338') and d1.D1_FILIAL IN ('09','10')";
														} else {
															$SQLD .= " AND f2.F2_VEND1 = '" . $cd_codigo . "' and d1.D1_FILIAL = '" . $RSG["cd_filial"] . "'";
														}
														$SQLD .= " and d1.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and a3.D_E_L_E_T_= ' ' and f2.F2_VEND1 <>'000001' and d1.D1_EMISSAO >= '" . $data_min . "' and d1.D1_EMISSAO <= '" . $data_max . "' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = D1.D1_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ";
														$RSSVD = oci_parse($oraconnect, $SQLD);
														oci_execute($RSSVD, OCI_DEFAULT);
														$RSVD = oci_fetch_assoc($RSSVD);

														///CONSULTA VENDA FORNECEDOR///
														$SQLV = "select SUM(d2.D2_VALBRUT) AS VENDA from SIGA.SF2010 f2, SIGA.SD2010 d2, SIGA.SA3010 u3, SIGA.SF4010 F4 where f2.F2_FILIAL = d2.D2_FILIAL and f2.F2_FILIAL = u3.A3_FILIAL and f2.F2_DOC = d2.D2_DOC and f2.F2_CLIENTE = d2.D2_CLIENTE and f2.F2_LOJA = d2.D2_LOJA and f2.F2_SERIE = d2.D2_SERIE and f2.F2_EMISSAO = d2.D2_EMISSAO and d2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d2.D2_FILIAL AND A5_FORNECE = '" . $fornecedor . "' AND D_E_L_E_T_ = ' ') and d2.D2_TIPO = 'N' and d2.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and u3.D_E_L_E_T_ = ' ' and f2.F2_VEND1 = u3.A3_COD and f2.F2_VEND1 <>'000001' ";
														if ($_SESSION['CD_PERFIL'] == 4) {
															$SQLD .= " AND A3.A3_COD = '" . $_SESSION['CD_CODIGO'] . "' ";
														} else if ($_SESSION['CD_PERFIL'] == 3) {
															$SQLV .= " AND u3.A3_SUPER = '" . $_SESSION['CD_CODIGO'] . "' ";
														} else if ($_SESSION['CD_PERFIL'] == 2) {
															$SQLV .= " AND u3.A3_GEREN = '" . $_SESSION['CD_CODIGO'] . "' ";
														}
														if ($cd_codigo == '0236') {
															$SQLV .= " AND f2.F2_VEND1 IN ('0236', '0338') and d2.D2_FILIAL IN ('09','10')";
														} else {
															$SQLV .= " AND f2.F2_VEND1 = '" . $cd_codigo . "' and d2.D2_FILIAL = '" . $RSG["cd_filial"] . "'";
														}
														$SQLV .= " and d2.D2_EMISSAO >= '" . $data_min . "' and d2.D2_EMISSAO <= '" . $data_max . "' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = d2.D2_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' '  ";
														$RSS2 = oci_parse($oraconnect, $SQLV);
														oci_execute($RSS2, OCI_DEFAULT);
														$RS2 = oci_fetch_assoc($RSS2);

														$venda 		= $RS2['VENDA'] - $RSVD['DEVOLUCAO'];

														if ($mes == 'Total') $RS['vl_meta'] *= 4;

														$perce 		= ($venda / $RS['vl_meta']) * 100;
														$estilo = $perce >= 100 ? 'background-color: #01ce24' : 'background-color: #f3735e; color: white;';

														if ($perce >= 100) {
															$contadorDeMetasFechadas += 1;
														}

														// Regra para as cartelas
														if ($mes == 'Total') {
															if (in_array($RSG['cd_gestor'], ['9004', '9005'])) {
																$numero_de_fornecedores = 7;
															} else {
																$numero_de_fornecedores = 9;
															}
															if ($contadorDeMetasFechadas >= $numero_de_fornecedores) {
																$cartelas = 1;
															} else {
																$cartelas = 0;
															}
														} else {
															$cartelas = floor($contadorDeMetasFechadas / 2);
														}

														$sumMeta 	+= $RS['vl_meta'];
														$sumVenda 	+= $venda;
														$sumPerce = ($sumVenda / $sumMeta) * 100;

											?>

														<td>
															<table>
																<tr>
																	<?php
																	if (
																		($fornecedor == 'F00100' || $fornecedor == 'F00101') &&
																		(trim($RSG['cd_gestor']) == '9004' || trim($RSG['cd_gestor']) == '9005')
																	) { // Não mostra nada para unilever nesses dois gerentes 
																	?>
																	<?php } else { ?>
																		<td width="100%"><strong>Meta: </strong><br><?= number_format($RS['vl_meta'], 2, ",", "."); ?></td>
																		<td width="100%"><strong>Real: </strong><br><?= number_format($venda, 2, ",", "."); ?></td>
																		<td width="100%" style="<?= $estilo; ?>">%<br><?= number_format($perce, 0, ",", ""); ?></td>
																	<?php } ?>
																</tr>
															</table>
														</td>
													<?php }
												} else { ?>
													<td>
														<table style="width: 100%; height: 100%;">
															<tr>
																<td style="text-align: center; vertical-align: middle; height: 50px;">-</td>
															</tr>
														</table>
													</td>
											<?php }
											} ?>
											<td style="font-weight: bold;"> <?= $cartelas ?></td>
									</tr>
								<?php
										} ?>
								</table>
								<br>
							</div>
						</div>
				<?php
					}
				} // Fim do loop de seleção de datas 
				?>
			</div>
		</div>
	</div>
	</div>
	<!-- FIM DAS TABELAS GRUPOS -->
	<!--end section-->
	<?php include "footer.php"; ?>

	<script>
		window.onload = function() {
			var style = document.createElement('style');
			style.innerHTML = '.sticky th { position: sticky; top: 0px; }';
			document.head.appendChild(style);
		};
	</script>

</body>

</html>