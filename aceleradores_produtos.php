<!-- Conexão com banco de dados-->
<?php
include "administrar/ora_connect.php";
if ($_SESSION["CD_USUARIO"] == "") {
	echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
?>

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
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
</head>
<style>
	.site_wrapper {
		margin: 0 auto 0 auto;
	}

	.container {
		width: 70%;
		margin: 0px auto;
	}

	.tabs-content7 {
		width: 90%;
		float: left;
	}

	@media screen and (max-width: 1440px) {
		#header .container {
			margin-left: 70px;
		}

		.tabs-content7 {
			width: 86%;
		}

		.container {
			width: 88%;
			margin: 0px 10%;
		}
	}

	@media screen and (max-width: 800px) {
		#header .container {
			margin-left: 70px;
		}

		.tabs-content7 {
			width: 202px;
		}

		.container {
			width: 88%;
			margin: 0px 10%;
		}
	}

	.table-list2 th {
		height: 50px;
		font-size: 14px;
	}

	tr td {
		font-size: 10px;
	}

	.tabs7 li {
		text-align: center;
	}

	.tabs7 li a {
		width: 100px;
	}

	.tabs7 li.active a {
		color: #FFFFFF;
		border: 3px solid #287e51;
		background-color: #272727;
	}

	.loading {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(images/loading_gallery.gif) 50% 50% no-repeat rgba(193, 193, 193, 0.71);
	}
</style>

<body style="margin-top:-25px;">
	<div class="loading" id="loading" style="display: block"></div>
	<section id="conteudo" style="display: inline" class="body">
		<?php include "menu.php"; ?>
		<div class="clearfix"></div>
		<div class="container"></div>
		<div class="clearfix"></div>
		<div class="section_holdergrupos">
			<div class="container">
				<h3 align="left">Aceleradores</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="portfolio_four">
			<div class="container">
				<div class="table-style" style="margin-bottom: 30px;">
					<table width="100%" class="table-list2">
						<thead>
							<tr>
								<th width="18%">CÓDIGO</th>
								<th width="46%">DESCRIÇÃO</th>
								<th width="18%">PONTOS</th>
								<th width="18%">FRACIONAMENTO</th>
							</tr>
						</thead>
						<?php

						switch($_SESSION['CD_GESTOR']){
							case '9001':
								$filial = 'ITAJAÍ';
							break;
							case '9002':
								$filial = 'IBIPORÃ';
							break;
							case '9004':
								$filial = 'RS';
							break;
						}

						$cd_fornecedor = $_GET['cd_fornecedor'];
						$dt_inicial = $_GET['dt_inicial'];
						$dt_final = $_GET['dt_final'];
						$SQL ="select c.ds_razao, a.* from aceleradores a, clifor c where a.fornecedor = '" . $cd_fornecedor . "' and a.dt_inicial >= '" . $dt_inicial . "' and a.dt_final <= '" . $dt_final . "' and c.cd_fornecedor = a.fornecedor"; 
						if($_SESSION['CD_PERFIL'] != '6' && $_SESSION['CD_PERFIL'] != '5'){ 
							$SQL .= " and a.filial = '$filial'";
						}

						$query = mysql_query($SQL, $conexao);
						if (mysql_num_rows($query) <= 0) {
							echo "<tr>
								<td></td>
								<td><span style='font-size: 14px;'>Sem aceleradores para este mês</span></td>
								<td></td>
								<td></td>
							</tr>";
						} else {
							while ($objeto = mysql_fetch_array($query)) {
                                        // Conexão com o banco mu_atacado
                                        $conexao_atacado = mysql_connect("localhost", "admin", "mu125030");
                                        mysql_select_db("mu_atacado", $conexao_atacado) or print(mysql_error());
                                        
                                        // Query dos produtos
                                        $sql_produtos = "select * from cat_produtos where cd_codigo = '" . $objeto['cd_produto'] . "'";
                                        
                                        // // --- ECHO PARA DEBUG ---
                                        // echo "<div style='background:yellow; border:1px solid red; padding:5px; margin:5px;'>";
                                        // echo "<strong>SQL Produto:</strong> " . $sql_produtos . "<br>";
                                        // echo "</div>";
                                        // // -----------------------

                                        $query_atacado = mysql_query($sql_produtos, $conexao_atacado);
                                        $objeto_atacado = mysql_fetch_array($query_atacado);
								
								?>
								<tr style="height: 40px;">
									<td>
										<span style="font-size: 13px;">
											<?php echo $objeto['cd_produto']; ?>
										</span>
									</td>
									<td>
										<span style="font-size: 13px;">
											<?php echo $objeto_atacado['ds_descricao']; ?>
										</span>
									</td>
									<td>
										<span style="font-size: 13px;">
											<?php echo $objeto['pontos']; ?>
										</span>
                                    </td>
									<td>
										<span style="font-size: 13px;">
											<?php echo $objeto['fracionado']; ?>
										</span>
									</td>
								</tr>
						<?php
							mysql_select_db("mu_campanhaverao", $conexao_atacado) or print(mysql_error());
							}
						}
						?>
					</table>
				</div>
			</div>
		</div>
		<!-- FINAL QUADRO DE FORNECEDORES -->
		<div class="clearfix"></div>
		<?php include "footer.php"; ?>
		<!-- ######### ARQUIVOS JS ######### -->
		<!-- get jQuery from the google apis -->
		<script type="text/javascript" src="js/universal/jquery.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
		<!--- Tabs --->
		<script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(window).load(function() {
				document.getElementById("loading").style.display = "none";
				document.getElementById("conteudo").style.display = "inline";
			});
			$(document).ready(function() {
				$('.table-list2').DataTable({
					"pageLength": 50,
					language: {
						url: "js/datatable/pt_br.json"
					}
				});
			});
		</script>
	</section>
</body>

</html>