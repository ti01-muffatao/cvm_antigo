<meta charset="utf-8">
<?php include "administrar/conexao.php";
include "administrar/restricao_de_login.php";
mysql_set_charset('utf8mb4');

if ($_SESSION["CD_USUARIO"] == "" || $_SESSION["CD_ATIVO"] != 1) {
	echo "<script language='javascript'>window.open('sair.php', '_self');</script>";
}

$user_id = $_SESSION['CD_USUARIO'];

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
	<meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
	<meta http-equiv="content-language" content="pt">
	<meta itemprop="description" name="description" content="">
	<meta name="robots" content="no follow">
	<!-- mobile  -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" href="css/reset.css" type="text/css" /> -->
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
	<!-- <link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" /> -->
	<link rel="stylesheet" href="splide/node_modules/@splidejs/splide/dist/css/splide.min.css">
	<!-- Accordions -->
	<link rel="stylesheet" href="js/accordion/accordion.css" type="text/css" media="all">
	<!-- tabs -->
	<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
	<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs2.css">
	<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs10.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

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

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		html,
		body {
			margin: 0;
			padding: 0;
			height: 100%;
			background-image: url("images/plano_de_fundo.jpg");
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			background-attachment: fixed;
		}


		#bg-blur {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			backdrop-filter: blur(3px);
			-webkit-backdrop-filter: blur(3px);
			background: rgba(255, 255, 255, 0.3);
			z-index: -1;
		}

		.container {
			position: relative;
			z-index: 1;
			max-width: 90%;
		}

		@media (max-width: 768px) {
			.container {
				margin-left: 0;
				max-width: 100%;
			}
		}

		.card {
			transition: transform 0.3s ease;
			border: none !important;
		}

		.content {
			margin-left: 220px;
			padding: 2rem 1rem;
		}

		@media (max-width: 991px) {

			.content {
				margin-left: 0;
			}

		}
	</style>
</head>

<body>

	<?php include "loading.php" ?>
	<?php include "menu.php" ?>
	
	<br>
	<div class="container">

		<?php if($_SESSION['CD_USUARIO'] != '1804'){ ?>
		<!-- Banners -->
		<div class="container text-center mb-4">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="card shadow">
						<div class="card-body" style="padding: 0">
							<?php include "components/banners.php" ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Fornecedores -->
		<div class="container text-center mb-4">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="card shadow" style="max-height:150px; background-image: linear-gradient(to right, #0009BD , #4CDAFF);">
						<div class="card-body" style="padding: 10px;">
							<?php include "components/fornecedores.php"; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php // if($_SESSION['CD_PERFIL'] == '6'){ ?>
		<!-- Foto usuarios -->
		<!-- <div class="container text-center mb-4">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="card shadow" style="max-height:150px;">
						<div class="card-body" style="padding: 10px;">
							<?php // include "components/foto_participantes.php"; ?>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<?php // } ?>

		<?php } ?>
		<!-- Barra de progresso -->
		<div class="container text-center mb-4">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="card shadow">
						<div class="card-body">
							<?php include "components/progresso.php"; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Posts -->
		<div class="container text-center">
			<?php
			$SQL = "SELECT p.*,
                     (SELECT COUNT(*) FROM curtidas c WHERE c.post_id = p.id) AS total_curtidas,
                     (SELECT COUNT(*) FROM comentarios cm WHERE cm.post_id = p.id) AS total_comentarios
              FROM posts p
              ORDER BY p.data_criacao DESC";
			$RSS = mysql_query($SQL);

			while ($linha = mysql_fetch_array($RSS)) {
				$midias = !empty($linha['midia_url']) ? json_decode($linha['midia_url'], true) : [];
			?>
				<div class="row mb-4">
					<div class="col-lg-8 mx-auto">
						<div class="card shadow">
							<div class="card-body">
								<?php include "components/social_media.php"; ?><br>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<div id="imagePopup">
		<span id="imagePopupClose">&times;</span>
		<img id="popupImg" src="" alt="Imagem ampliada">
	</div>

</body>

<script>
	document.addEventListener('DOMContentLoaded', function() {

		// Curtir / Descurtir
		const likeButtons = document.querySelectorAll('.like-btn');
		likeButtons.forEach(btn => {
			btn.addEventListener('click', e => {
				e.preventDefault();
				const post_id = btn.dataset.post;

				const formData = new FormData();
				formData.append('post_id', post_id);
				formData.append('action', 'like');

				fetch('ajax_handler.php', {
						method: 'POST',
						body: formData
					})
					.then(r => {
						return r.json();
					})
					.then(res => {
						if (res.success) {
							const icon = btn.querySelector('i');
							icon.classList.toggle('fa-heart');
							icon.classList.toggle('fa-heart-o');
							btn.querySelector('.like-count').textContent = res.total_curtidas;
						}
					})
					.catch(error => {
						console.error('Erro na requisição like:', error);
					});
			});
		});

		// Enviar comentário pelo botão
		const commentButtons = document.querySelectorAll('.btn-comment');
		commentButtons.forEach(btn => {
			btn.addEventListener('click', () => {
				const post_id = btn.dataset.post;
				const input = document.querySelector(`.comment-input[data-post="${post_id}"]`);
				const texto = input.value.trim();

				if (texto === '') {
					input.focus();
					return;
				}

				const formData = new FormData();
				formData.append('post_id', post_id);
				formData.append('action', 'comment');
				formData.append('texto', texto);

				fetch('ajax_handler.php', {
						method: 'POST',
						body: formData
					})

					.then(r => {
						return r.json();
					})
					.then(res => {
						if (res.success) {
							const comment_html = `
								<div class="d-flex comment-item mb-2 p-2 bg-light rounded shadow-sm text-start">
									${res.img_usuario 
										? `<img src="${res.img_usuario}" alt="Avatar" style="width:40px; height:40px; border-radius:50%; object-fit:cover; margin-right:10px;">` 
										: `<i class="fa fa-user me-3 text-secondary" style="font-size:40px;"></i>`}
									<div class="w-100">
										<div class="d-flex justify-content-between align-items-center mb-1">
											<h6 class="mb-0 fw-bold small">${res.nome}</h6>
											<small class="text-muted">${new Date().toLocaleString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric', hour:'2-digit', minute:'2-digit' })}</small>
										</div>
										<p class="mb-0" style="font-size:0.9rem; color:#555; text-align:left;">${res.texto}</p>
									</div>
								</div>
								`;
							const postElement = document.getElementById(`post-${post_id}`);
							if (postElement) {
								postElement.querySelector('.comments-list').insertAdjacentHTML('beforeend', comment_html);
								input.value = '';

								const comentariosEl = postElement.querySelector('.comentarios-span');
								if (comentariosEl && typeof res.total_comentarios !== 'undefined') {
									comentariosEl.textContent = `${res.total_comentarios} comentários`;
								}
							}
						}
					})
					.catch(error => {
						console.error('Erro na requisição comment:', error);
					});
			});
		});

		const deleteButtons = document.querySelectorAll('.btn-delete-comment');
		deleteButtons.forEach(btn => {
			btn.addEventListener('click', () => {
				const comment_id = btn.dataset.comment;

				if (!confirm('Deseja realmente apagar este comentário?')) return;

				const formData = new FormData();
				formData.append('action', 'delete_comment');
				formData.append('comment_id', comment_id);

				fetch('ajax_handler.php', {
						method: 'POST',
						body: formData
					})
					.then(r => r.json())
					.then(res => {
						if (res.success) {
							const commentEl = document.getElementById(`comment-${comment_id}`);
							if (commentEl) commentEl.remove();
						} else {
							alert(res.error || 'Erro ao deletar comentário.');
						}
					})
					.catch(err => console.error('Erro ao deletar comentário:', err));
			});
		});


		// Parte de mostrar a imagem maior
		const popup = document.getElementById('imagePopup');
		const popupImg = document.getElementById('popupImg');
		const closeBtn = document.getElementById('imagePopupClose');

		document.querySelectorAll('.post-image').forEach(img => {
			img.addEventListener('click', function() {
				popupImg.src = this.src;
				popup.style.display = 'flex';
			});
		});

		closeBtn.addEventListener('click', () => {
			popup.style.display = 'none';
		});

		popup.addEventListener('click', (e) => {
			if (e.target === popup) {
				popup.style.display = 'none';
			}
		});

	});
</script>

<?php include "footer.php"; ?>

<script>
	$(document).ready(function() {
		$(".menu-toggle").click();
	})
</script>

</html>