<?php include "administrar/conexao.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
	echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
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

	<style>
		.tabs-panel7 {
			display: none;
			/* todas escondidas */
		}

		.tabs-panel7.active {
			display: block;
			/* a aba ativa aparece */
		}

		.tabs7 li a.active {
			font-weight: bold;
			color: #C30009;
		}
	</style>

</head>

<body style="margin-top:-25px;">
	<?php include "loading.php" ?>
	<?php include "menu.php"; ?>
	<div class="clearfix"></div>
	<div class="section_holdergrupos">
		<div class="container">
			<div class="one_full" style="text-align: center;">
				<h3>Grupos</h3>
				<ul class="tabs7">
					<li><a href="#grupo-1" target="_self">Grupo 01 SC/PR</a></li>
					<li><a href="#grupo-2" target="_self">Grupo 02 SC/PR</a></li>
					<li><a href="#grupo-3" target="_self">Grupo 03 SC/PR</a></li>
					<li><a href="#grupo-4" target="_self">Grupo 04 SC/PR</a></li>
					<li><a href="#grupo-5" target="_self">Grupo 05 SC/PR</a></li>
					<li><a href="#grupo-6" target="_self">GDM SC/PR</a></li>
					<li><a href="#grupo-7" target="_self">Grupo 01 RS</a></li>
					<li><a href="#grupo-8" target="_self">Grupo 02 RS</a></li>
				</ul>
				<div class="tabs-content7">
					<div id="grupo-1" class="tabs-panel7">
						<p>
						<div class="table-style">
							<h3>Grupo 1 SC/PR&nbsp;&nbsp;
								<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
								<img src="./images/bandeiras/10.png" style="width: 50px;">
							</h3>
							<div class="table-style">
								<table class="table-list2">
									<tr class="sticky">
										<th>Código</th>
										<th>Nome</th>
										<th>Meta Mín. /Grupo</th>
										<th>Meta Geral /Grupo</th>
										<th>Supervisor</th>
										<th>Grupo</th>
									</tr>
									<?php $SQL = "select * from grupos as g, usuarios as u where g.cd_grupo = u.cd_grupo and u.cd_grupo = 1";
									$SQL .= " order by cd_codigo asc";
									$RSS = mysql_query($SQL, $conexao);
									while ($RS = mysql_fetch_array($RSS)) {
									?>
										<tr <?php if ($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]) {
												echo 'style="color:#C30009; font-weight: bold;"';
											} ?>>
										<?php
										echo "<td>" . $RS["cd_codigo"] . "</td>";
										echo "<td>" . $RS["ds_usuario"] . "</td>";
										echo "<td>" . number_format($RS["vl_metam"], 0, "", ".") . "</td>";
										echo "<td>" . number_format($RS["vl_metag"], 0, "", ".") . "</td>";
										echo "<td>" . BuscaDSSupervisor($RS["cd_supervisor"]) . "</td>";
										echo "<td>" . BuscaGrupo($RS["cd_grupo"]) . "</td>";
										echo "</tr>";
									} ?>
										</tr>
								</table>
								</p>
							</div>
						</div>
					</div>
					<!-- FIM GRUPO 1 -->
					<div id="grupo-2" class="tabs-panel7">
						<p>
						<h3>Grupo 2 SC/PR&nbsp;&nbsp;
							<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
							<img src="./images/bandeiras/10.png" style="width: 50px;">
						</h3>
						<div class="table-style">
							<table class="table-list2">
								<tr class="sticky">
									<th>Código</th>
									<th>Nome</th>
									<th>Meta Mín. /Grupo</th>
									<th>Meta Geral /Grupo</th>
									<th>Supervisor</th>
									<th>Grupo</th>
								</tr>
								<?php $SQL = "select * from grupos as g, usuarios as u where g.cd_grupo = u.cd_grupo and u.cd_grupo = 2";
								$SQL .= " order by cd_codigo asc";
								$RSS = mysql_query($SQL, $conexao);
								while ($RS = mysql_fetch_array($RSS)) {
								?>
									<tr <?php if ($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]) {
											echo 'style="color:#C30009; font-weight: bold;"';
										} ?>>
									<?php
									echo "<td>" . $RS["cd_codigo"] . "</td>";
									echo "<td>" . $RS["ds_usuario"] . "</td>";
									echo "<td>" . number_format($RS["vl_metam"], 0, "", ".") . "</td>";
									echo "<td>" . number_format($RS["vl_metag"], 0, "", ".") . "</td>";
									echo "<td>" . BuscaDSSupervisor($RS["cd_supervisor"]) . "</td>";
									echo "<td>" . BuscaGrupo($RS["cd_grupo"]) . "</td>";
									echo "</tr>";
								} ?>
									</tr>
							</table>
						</div>
						</p>
					</div>
					<!-- FIM GRUPO 2 -->

					<div id="grupo-3" class="tabs-panel7">
						<p>
						<h3>Grupo 3 SC/PR&nbsp;&nbsp;
							<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
							<img src="./images/bandeiras/10.png" style="width: 50px;">
						</h3>
						<div class="table-style">
							<table class="table-list2">
								<tr class="sticky">
									<th>Código</th>
									<th>Nome</th>
									<th>Meta Mín. /Grupo</th>
									<th>Meta Geral /Grupo</th>
									<th>Supervisor</th>
									<th>Grupo</th>
								</tr>
								<?php $SQL = "select * from grupos as g, usuarios as u where g.cd_grupo = u.cd_grupo and u.cd_grupo = 3";
								$SQL .= " order by cd_codigo asc";
								$RSS = mysql_query($SQL, $conexao);
								while ($RS = mysql_fetch_array($RSS)) {
								?>
									<tr <?php if ($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]) {
											echo 'style="color:#C30009; font-weight: bold;"';
										} ?>>
									<?php
									echo "<td>" . $RS["cd_codigo"] . "</td>";
									echo "<td>" . $RS["ds_usuario"] . "</td>";
									echo "<td>" . number_format($RS["vl_metam"], 0, "", ".") . "</td>";
									echo "<td>" . number_format($RS["vl_metag"], 0, "", ".") . "</td>";
									echo "<td>" . BuscaDSSupervisor($RS["cd_supervisor"]) . "</td>";
									echo "<td>" . BuscaGrupo($RS["cd_grupo"]) . "</td>";
									echo "</tr>";
								} ?>
									</tr>
							</table>
						</div>
						</p>
					</div>
					<!-- FIM GRUPO 3 -->

					<div id="grupo-4" class="tabs-panel7">
						<p>
						<h3>Grupo 4 SC/PR&nbsp;&nbsp;
							<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
							<img src="./images/bandeiras/10.png" style="width: 50px;">
						</h3>
						<div class="table-style">
							<table class="table-list2">
								<tr class="sticky">
									<th>Código</th>
									<th>Nome</th>
									<th>Meta Mín. /Grupo</th>
									<th>Meta Geral /Grupo</th>
									<th>Supervisor</th>
									<th>Grupo</th>
								</tr>
								<?php $SQL = "select * from grupos as g, usuarios as u where g.cd_grupo = u.cd_grupo and u.cd_grupo = 4";
								$SQL .= " order by cd_codigo asc";
								$RSS = mysql_query($SQL, $conexao);
								while ($RS = mysql_fetch_array($RSS)) {
								?>
									<tr <?php if ($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]) {
											echo 'style="color:#C30009; font-weight: bold;"';
										} ?>>
									<?php
									echo "<td>" . $RS["cd_codigo"] . "</td>";
									echo "<td>" . $RS["ds_usuario"] . "</td>";
									echo "<td>" . number_format($RS["vl_metam"], 0, "", ".") . "</td>";
									echo "<td>" . number_format($RS["vl_metag"], 0, "", ".") . "</td>";
									echo "<td>" . BuscaDSSupervisor($RS["cd_supervisor"]) . "</td>";
									echo "<td>" . BuscaGrupo($RS["cd_grupo"]) . "</td>";
									echo "</tr>";
								} ?>
									</tr>
							</table>
						</div>
						</p>
					</div>
					<!-- FIM GRUPO 4 -->

					<div id="grupo-5" class="tabs-panel7">
						<p>
						<h3>Grupo 5 SC/PR&nbsp;&nbsp;
							<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
							<img src="./images/bandeiras/10.png" style="width: 50px;">
						</h3>
						<div class="table-style">
							<table class="table-list2">
								<tr class="sticky">
									<th>Código</th>
									<th>Nome</th>
									<th>Meta Mín. /Grupo</th>
									<th>Meta Geral /Grupo</th>
									<th>Supervisor</th>
									<th>Grupo</th>
								</tr>
								<?php $SQL = "select * from grupos as g, usuarios as u where g.cd_grupo = u.cd_grupo and u.cd_grupo = 5";
								$SQL .= " order by cd_codigo asc";
								$RSS = mysql_query($SQL, $conexao);
								while ($RS = mysql_fetch_array($RSS)) {
								?>
									<tr <?php if ($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]) {
											echo 'style="color:#C30009; font-weight: bold;"';
										} ?>>
									<?php
									echo "<td>" . $RS["cd_codigo"] . "</td>";
									echo "<td>" . $RS["ds_usuario"] . "</td>";
									echo "<td>" . number_format($RS["vl_metam"], 0, "", ".") . "</td>";
									echo "<td>" . number_format($RS["vl_metag"], 0, "", ".") . "</td>";
									echo "<td>" . BuscaDSSupervisor($RS["cd_supervisor"]) . "</td>";
									echo "<td>" . BuscaGrupo($RS["cd_grupo"]) . "</td>";
									echo "</tr>";
								} ?>
									</tr>
							</table>
						</div>
						</p>
					</div>
					<!-- FIM GRUPO 5 -->

					<div id="grupo-6" class="tabs-panel7">
						<!-- NA TABELA ABAIXO, RANKEAR OS PRIMEIROS 60 COLOCADOS COM MAIOR % DE PONTOS ACIMA DA META GERAL DOS GRUPOS 3,4,5,6 -->
						<p>
						<h3>GDM SC/PR&nbsp;&nbsp;
							<img src="./images/bandeiras/09.png" style="width: 50px;">&nbsp;&nbsp;
							<img src="./images/bandeiras/10.png" style="width: 50px;">
						</h3>
						<div class="table-style">
							<table class="table-list2">
								<tr class="sticky">
									<th>Código</th>
									<th>Nome</th>
									<th>Meta Mín. /Grupo</th>
									<th>Meta Geral /Grupo</th>
									<th>Supervisor</th>
									<th>Grupo</th>
								</tr>
								<?php $SQL = "select * from grupos as g, usuarios as u where g.cd_grupo = u.cd_grupo and u.cd_grupo = 6";
								$SQL .= " order by cd_codigo asc";
								$RSS = mysql_query($SQL, $conexao);
								while ($RS = mysql_fetch_array($RSS)) {
								?>
									<tr <?php if ($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]) {
											echo 'style="color:#C30009; font-weight: bold;"';
										} ?>>
									<?php
									echo "<td>" . $RS["cd_codigo"] . "</td>";
									echo "<td>" . $RS["ds_usuario"] . "</td>";
									echo "<td>" . number_format($RS["vl_metam"], 0, "", ".") . "</td>";
									echo "<td>" . number_format($RS["vl_metag"], 0, "", ".") . "</td>";
									echo "<td>" . BuscaDSSupervisor($RS["cd_supervisor"]) . "</td>";
									echo "<td>" . BuscaGrupo($RS["cd_grupo"]) . "</td>";
									echo "</tr>";
								} ?>
									</tr>
							</table>
						</div>
						</p>
					</div>
					<!-- FIM GRUPO 6 -->

					<div id="grupo-7" class="tabs-panel7">
						<p>
						<div class="table-style">
							<h3>Grupo 1 RS&nbsp;&nbsp;
								<img src="./images/bandeiras/27.png" style="width: 50px;">
							</h3>
							<div class="table-style">
								<table class="table-list2">
									<tr class="sticky">
										<th>Código</th>
										<th>Nome</th>
										<th>Meta Mín. /Grupo</th>
										<th>Meta Geral /Grupo</th>
										<th>Supervisor</th>
										<th>Grupo</th>
									</tr>
									<?php $SQL = "select * from grupos as g, usuarios as u where g.cd_grupo = u.cd_grupo and u.cd_grupo = 21";
									$SQL .= " order by cd_codigo asc";
									$RSS = mysql_query($SQL, $conexao);
									while ($RS = mysql_fetch_array($RSS)) {
									?>
										<tr <?php if ($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]) {
												echo 'style="color:#C30009; font-weight: bold;"';
											} ?>>
										<?php
										echo "<td>" . $RS["cd_codigo"] . "</td>";
										echo "<td>" . $RS["ds_usuario"] . "</td>";
										echo "<td>" . number_format($RS["vl_metam"], 0, "", ".") . "</td>";
										echo "<td>" . number_format($RS["vl_metag"], 0, "", ".") . "</td>";
										echo "<td>" . BuscaDSSupervisor($RS["cd_supervisor"]) . "</td>";
										echo "<td>" . BuscaGrupo($RS["cd_grupo"]) . "</td>";
										echo "</tr>";
									} ?>
										</tr>
								</table>
								</p>
							</div>
						</div>
					</div>
					<!-- FIM GRUPO 1 -->
					<div id="grupo-8" class="tabs-panel7">
						<p>
						<h3>Grupo 2 RS&nbsp;&nbsp;
							<img src="./images/bandeiras/27.png" style="width: 50px;">
						</h3>
						<div class="table-style">
							<table class="table-list2">
								<tr class="sticky">
									<th>Código</th>
									<th>Nome</th>
									<th>Meta Mín. /Grupo</th>
									<th>Meta Geral /Grupo</th>
									<th>Supervisor</th>
									<th>Grupo</th>
								</tr>
								<?php $SQL = "select * from grupos as g, usuarios as u where g.cd_grupo = u.cd_grupo and u.cd_grupo = 22";
								$SQL .= " order by cd_codigo asc";
								$RSS = mysql_query($SQL, $conexao);
								while ($RS = mysql_fetch_array($RSS)) {
								?>
									<tr <?php if ($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]) {
											echo 'style="color:#C30009; font-weight: bold;"';
										} ?>>
									<?php
									echo "<td>" . $RS["cd_codigo"] . "</td>";
									echo "<td>" . $RS["ds_usuario"] . "</td>";
									echo "<td>" . number_format($RS["vl_metam"], 0, "", ".") . "</td>";
									echo "<td>" . number_format($RS["vl_metag"], 0, "", ".") . "</td>";
									echo "<td>" . BuscaDSSupervisor($RS["cd_supervisor"]) . "</td>";
									echo "<td>" . BuscaGrupo($RS["cd_grupo"]) . "</td>";
									echo "</tr>";
								} ?>
									</tr>
							</table>
						</div>
						</p>
					</div>
					<!-- FIM GRUPO 2 -->

				</div>
			</div>
		</div>
	</div>
	<!-- FIM COMENTÁRIOS TRANSIÇÃO -->
	<!--end section-->
	<?php include "footer.php"; ?>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const tabLinks = document.querySelectorAll('.tabs7 a');
			const tabPanels = document.querySelectorAll('.tabs-panel7');

			function hideAllPanels() {
				tabPanels.forEach(panel => panel.classList.remove('active'));
				tabLinks.forEach(link => link.classList.remove('active'));
			}

			tabLinks.forEach(link => {
				link.addEventListener('click', function(e) {
					e.preventDefault(); // evita o scroll automático
					hideAllPanels();
					const target = document.querySelector(this.getAttribute('href'));
					if (target) {
						target.classList.add('active');
						this.classList.add('active');
					}
				});
			});

			// opcional: ativa o primeiro grupo ao carregar a página
			if (tabPanels.length > 0) {
				tabPanels[0].classList.add('active');
				tabLinks[0].classList.add('active');
			}
		});
	</script>

	<script>
		window.onload = function() {
			var style = document.createElement('style');
			style.innerHTML = '.sticky th { position: sticky; top: 0px; }';
			document.head.appendChild(style);
		};
	</script>


</body>

</html>