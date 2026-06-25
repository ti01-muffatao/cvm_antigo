<!-- Conexão com banco de dados-->
<?php
include "administrar/ora_connect.php";
include "administrar/restricao_de_login.php";
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

<body style="margin-top:-25px;">
	<?php include "loading.php" ?>
	<?php include "menu.php"; ?>
	<div class="clearfix"></div>
	<div class="container">
		<div class="section_holdergrupos">
			<div class="container" style="display: flex; justify-content: space-between;">
				<h3>Relatório detalhado de pontuações</h3>
			</div>
		</div>
		<div class="portfolio_four">
			<div class="tabs-content7">
				<div class="tabs-panel7">

					<form method="POST" action="" class="form-horizontal form-bordered">
						<!-- CAMPO QUE ADICIONA USUARIO  -->
						<div class="form-group">
							<label class="col-md-3 control-label">Usuário</label>
							<div class="col-md-6">
								<select data-plugin-selectTwo class="form-control populate" id="cd_codigo" name="cd_codigo" required>
									<option value=""></option>
									<optgroup label="Selecione">
										<?php $RSS = mysql_query("select * from usuarios where cd_perfil = '4'", $conexao);
										while ($RS = mysql_fetch_array($RSS)) {
											echo "<OPTION VALUE='" . $RS["cd_codigo"] . "'";
											if ($cd_codigo == $RS["cd_codigo"]) {
												echo " selected";
											}
											echo ">" . $RS["cd_codigo"] . ' - ' . $RS["ds_usuario"] . "</OPTION>";
										}
										?>
									</optgroup>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Fornecedor</label>
							<div class="col-md-6">
								<select data-plugin-selectTwo class="form-control populate" id="cd_fornec" name="cd_fornec" required>
									<option value="0">TODOS</option>
									<optgroup label="Selecione">
										<?php $RSS = mysql_query("select * from clifor", $conexao);
										while ($RS = mysql_fetch_array($RSS)) {
											echo "<OPTION VALUE='" . $RS["cd_fornecedor"] . "'";
											if ($cd_fornecedor == $RS["cd_fornecedor"]) {
												echo " selected";
											}
											echo ">" . $RS["ds_razao"] . "</OPTION>";
										}
										?>
									</optgroup>
								</select>
								<br>
								<br>
								<button type="submit" class="btn btn-primary">Gerar Relatório </button>
							</div>
						</div>
						<!-- FIM DO CAMPO DE ADICIONA USUARIO -->
					</form>

					<?php if ($_POST) {

						$cd_codigo = $_POST['cd_codigo'];
						$cd_fornecedor = $_POST['cd_fornec'];

					?>
						<div class="table-style tab-content">
							<table class="table-list2">
								<thead>
									<tr>
										<th>USUÁRIO</th>
										<th>SUPERVISOR</th>
										<th>FORNECEDOR</th>
										<th>DATA</th>
										<th>PONTOS</th>
										<th>TIPO</th>
									</tr>
								</thead>
								<tbody>
								<tbody>
									<?php
									// Normaliza o código do vendedor (0236 e 0338 são o mesmo)
									$cd_codigo_normalizado = (trim($cd_codigo) == '0338' || trim($cd_codigo) == '0236') ? '0236' : trim($cd_codigo);

									// Consulta os pontos da tabela pontuacao_new
									$SQL1 = " SELECT  pn.cd_codigo,  pn.cd_supervisor,  pn.dt_data AS data,  pn.cd_pontos,  c.ds_razao   FROM pontuacao_new pn INNER JOIN clifor c ON pn.cd_fornecedor = c.cd_fornecedor WHERE  CASE  WHEN pn.cd_codigo IN ('0338','0236') THEN '0236' ELSE pn.cd_codigo END = '$cd_codigo_normalizado' ";
									if ($cd_fornecedor != '0') {
										$SQL1 .= " AND pn.cd_fornecedor = '$cd_fornecedor'";
									}
									$RSS1 = mysql_query($SQL1);

									// Consulta os pontos da tabela pontuacao_aceleradores
									$SQL2 = " SELECT  pa.cd_codigo,  '' AS cd_supervisor,  c.ds_razao,  pa.emissao_pedido AS data,  pa.cd_pontos  FROM pontuacao_aceleradores pa INNER JOIN clifor c ON pa.cd_fornecedor = c.cd_fornecedor WHERE  CASE  WHEN pa.cd_codigo IN ('0338','0236') THEN '0236' ELSE pa.cd_codigo END = '$cd_codigo_normalizado'";
									if ($cd_fornecedor != '0') {
										$SQL2 .= " AND pa.cd_fornecedor = '$cd_fornecedor'";
									}
									$RSS2 = mysql_query($SQL2);

									$SQL3 = "SELECT * FROM usuarios where cd_codigo = '$cd_codigo'";
									$RSS3 = mysql_query($SQL3);

									$dados = [];

									while ($RS1 = mysql_fetch_array($RSS1)) {
										$dados[] = [
											'cd_codigo'     => $RS1['cd_codigo'],
											'cd_fornecedor' => $RS1['ds_razao'],
											'data'          => $RS1['data'],
											'pontos'        => $RS1['cd_pontos'],
											'tipo'        => 'Pontuação Normal'
										];
									}

									// Processa os dados da tabela pontuacao_aceleradores
									while ($RS2 = mysql_fetch_array($RSS2)) {
										$dados[] = [
											'cd_codigo'     => $RS2['cd_codigo'],
											'cd_fornecedor' => $RS2['ds_razao'],
											'data'          => $RS2['data'],
											'pontos'        => $RS2['cd_pontos'],
											'tipo'        => 'Pontuação Acelerador'
										];
									}

									while ($RS3 = mysql_fetch_array($RSS3)) {
										$nome_usuario = $RS3['ds_usuario'];
										$supervisor = $RS3['cd_supervisor'];
										$dados[] = [
											'cd_codigo'     => $RS3['cd_codigo'],
											'cd_fornecedor' => 'MEX',
											'data' => '',
											'pontos_panetone' => $RS3['pontuacao_panetone'],
											'tipo' => 'Pontuação Panetone'
										];
									}

									// Ordena os registros pela data ASC (crescente)
									usort($dados, function ($a, $b) {
										return strtotime($a['data']) - strtotime($b['data']);
									});

									// Soma acumulativa dos pontos
									$pontosAcumulados = 0;

									// Exibe os dados ordenados
									foreach ($dados as $linha) {
										$pontosAcumulados += $linha['pontos']; // Soma acumulativa dos pontos
										$pontosAcumulados += $linha['pontos_panetone']; // Soma acumulativa dos pontos
									?>
										<tr>
											<td><?= $linha['cd_codigo'] . ' - ' . $nome_usuario ?></td>
											<td><?= $supervisor ?></td>
											<td><?= $linha['cd_fornecedor'] ?></td>
											<td><?= date("d/m/Y", strtotime($linha['data'])) ?></td>
											<td><?= number_format($pontosAcumulados, 0, ',', '.') ?></td>
											<td><?= $linha['tipo'] ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!-- FINAL QUADRO DE FORNECEDORES -->
	<div class="clearfix"></div>
	<?php include "footer.php"; ?>

	<script type="text/javascript" src="js/universal/jquery.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
	<!--- Tabs --->
	<script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$('#cd_codigo').select2();
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.table-list2').DataTable({
				language: {
					url: "js/datatable/pt_br.json"
				}
			});
		});
	</script>

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Select2 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

	<!-- Select2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</body>

</html>