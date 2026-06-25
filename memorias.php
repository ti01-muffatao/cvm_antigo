<?php
include "administrar/conexao.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
	echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
?>
<?php include "includes.php"; ?>

<head>
	<style>
		.galeria-section {
			max-width: 1400px;
			margin: 40px auto;
			padding: 0 20px;
		}

		.galeria-header {
			text-align: center;
			margin-bottom: 40px;
		}

		.galeria-header h3 {
			font-size: 2rem;
			color: #333;
			font-weight: 600;
		}

		.galeria-header .lt_title_line {
			width: 70px;
			height: 4px;
			background: #0d6efd;
			margin: 12px auto;
			border-radius: 4px;
		}

		.galeria-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
			gap: 18px;
		}

		.galeria-card {
			background: #fff;
			border-radius: 10px;
			overflow: hidden;
			display: flex;
			flex-direction: column;
			transition: transform .25s ease, box-shadow .25s ease;
			box-shadow: 0 3px 8px rgba(0, 0, 0, .08);
		}

		.galeria-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 8px 18px rgba(0, 0, 0, .12);
		}

		.galeria-img {
			width: 100%;
			height: 140px;
			object-fit: contain;
			background: white;
		}

		.galeria-body {
			padding: 14px;
			text-align: center;
			flex-grow: 1;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}

		.galeria-body p {
			font-size: 0.85rem;
			color: #555;
			min-height: 32px;
		}

		.galeria-btn {
			padding: 6px 12px;
			background: #0d6efd;
			color: #fff;
			border-radius: 6px;
			font-size: 0.8rem;
			text-decoration: none;
			transition: background .2s ease;
		}

		.galeria-btn:hover {
			background: #084ec1;
		}
	</style>
</head>

<body>
	<?php include "loading.php"; ?>
	<?php include "menu.php"; ?>

	<section class="galeria-section">
		<div class="galeria-header">
			<h3>Campanhas de Verão Muffatão</h3>
			<div class="lt_title_line"></div>
		</div>

		<h1 style="text-align:center; margin-bottom:30px;">Memórias</h1>

		<div class="galeria-grid">
			<?php
			$SQL = mysql_query("SELECT * FROM galeria ORDER BY ano ASC");
			while ($galeria = mysql_fetch_array($SQL)) { ?>
				<div class="galeria-card">
					<img class="galeria-img" src="images/galeria/<?= $galeria['imagem']; ?>" alt="Imagem da galeria">
					<div class="galeria-body">
						<p><?= $galeria['hotel']; ?> <br> <?= $galeria['cidade']; ?></p>
						<p><?= $galeria['ano']; ?></p>
						<a href="galeria.php?galeria_id=<?= $galeria['id']; ?>" class="galeria-btn">Ver Galeria</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>

	<?php include "footer.php"; ?>
</body>