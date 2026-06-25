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
	<link rel="stylesheet" href="js/lightbox2/css/lightbox.min.css">
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
	<script type="text/javascript" src="js/universal/jquery.js"></script>
	<script src="js/lightbox2/js/lightbox.min.js"></script>
	<style>
		.card {
			position: relative;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			-ms-flex-direction: column;
			flex-direction: column;
			min-width: 0;
			word-wrap: break-word;
			background-color: #fff;
			background-clip: border-box;
			border-radius: 0.25rem;
		}

		.wrap-card-img-top {
			height: 200px;
			overflow: hidden;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #f5f5f5;
			border-radius: 8px;
		}

		.card-img-top {
			width: 100%;
			height: 100%;
			object-fit: cover;
			display: block;
		}

		#wrapper {
			height: 100%;
			width: 100%;
			margin: 0;
			padding: 0;
			border: 0;
		}

		#wrapper td {
			vertical-align: middle;
			text-align: center;
		}

		.video-wrapper {
			position: relative;
			padding-bottom: 56.25%;
			height: 0;
			overflow: hidden;
			border-radius: 8px;
		}

		.video-wrapper iframe {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		@media only screen and (min-width: 722px) and (max-width: 996px) {
			.col-md-3 {
				width: 45%;
				float: left;
				margin-left: 5%;
			}
		}

		@media only screen and (max-width: 722px) {
			.col-md-3 {
				width: 90%;
				float: left;
				margin-left: 5%;
			}
		}

		.back-arrow {
			display: inline-block;
			width: 0;
			height: 0;
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-right: 12px solid #000;
			cursor: pointer;
		}
	</style>
</head>

<body style="margin-top:-25px;">
	<div class="loading" id="loading" style="display: block"></div>
	<section id="conteudo" style="display: inline" class="body">
		<?php include "menu.php"; ?> <div class="clearfix"></div>
		<div class="container">
		</div>
		</div>
		<div class="clearfix"></div>
		<div class="section_holdergrupos">
			<div class="container">
				<?php
				$galery_id = $_GET['galeria_id'];
				$SQL = mysql_query("select * from fotos where galeria_id = '$galery_id' order by titulo desc");
				$RS = mysql_fetch_array($SQL);
				?>
				<h3 align="center"><?= $RS['titulo'] ?></span></h3>
				<div class="lt_title_line"></div>
			</div>
		</div>
		</div>
		<div class="clearfix"></div>
		<div class="portfolio_four">
			<div class="container">
				<div>
					<a href="javascript:history.back()" class="back-arrow" title="Voltar"></a><br><br>
					<h1>Fotos</h1>
				</div>
			</div>
			<div class="portfolio_four" style="margin-bottom: 50px;">
				<div class="container">
					<div class="section_title_line_full"></div>
					<div class="clearfix"></div>
					<?php
					$SQL = mysql_query("select * from fotos where galeria_id = '$galery_id' order by titulo desc");
					if (mysql_num_rows($SQL) <= 0) {
						echo "nenhuma foto encontrada";
					}
					while ($galeria = mysql_fetch_array($SQL)) { ?>
						<div class="col-md-3">
							<div class="card" style="width: 282px;">
								<div class="wrap-card-img-top">
									<table id="wrapper">
										<tr>
											<td><a data-lightbox="roadtrip" href="images/fotos/<?php echo $galeria['imagem']; ?>"><img style="max-width: 280px; width: 100%;" class="card-img-top" src="images/fotos/<?php echo $galeria['imagem']; ?>" /></a></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="clearfix"></div>
				<div class="portfolio_four" style="margin-top: 100px;">
					<div class="container">
						<div>
							<h1>Vídeos</h1>
						</div>
					</div>
				</div>
				<div class="portfolio_four" style="margin-bottom: 50px;">
					<div class="container">
						<div class="section_title_line_full"></div>
						<div class="clearfix"></div>
						<?php
						$SQL_VIDEO = mysql_query("select * from videos where galeria_id = '$galery_id' order by titulo desc");
						if (mysql_num_rows($SQL_VIDEO) <= 0) {
							echo "nenhum vídeo encontrado";
						}
						while ($video = mysql_fetch_array($SQL_VIDEO)) { ?>
							<div class="col-md-4">
								<div class="card">
									<div class="video-wrapper">
										<table id="wrapper">
											<td style="text-align: center">
												<iframe width="360" height="200"
													src="<?= htmlspecialchars($video['url']) ?>"
													frameborder="0"
													style="border-radius: 8px;"
													allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
											</td>
										</table>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FINAL QUADRO DE FORNECEDORES -->
	<div class="clearfix"></div>
	<?php include "footer.php"; ?>
	<!-- ######### ARQUIVOS JS ######### -->
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
	<script type="text/javascript">
		$(window).load(function() {
			document.getElementById("loading").style.display = "none";
			document.getElementById("conteudo").style.display = "inline";
		})
	</script>
</body>

</html>