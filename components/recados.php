<h4 class="card-title text-center" style="background-image: linear-gradient(to right,#1cbf10, #4e41fe); color: white; padding: 10px">Recados</h4>
<br>
<?php 

if ($_SESSION['CD_PERFIL'] == '2') { // Gerentes
    $perfil = "('2')";
} elseif ($_SESSION['CD_PERFIL'] == '3') { // Supervisores
    $perfil = "('3')";
} elseif ($_SESSION['CD_PERFIL'] == '4') { // Representantes
    $perfil = "('4')";
} elseif ($_SESSION['CD_PERFIL'] == '6') {
    $perfil = "('4')";
}

$SQL = "SELECT * from recados order by criado_em desc";
$RSS = mysql_query($SQL);
while ($linha = mysql_fetch_array($RSS)) {
    $data_inicio = DateTime::createFromFormat('Y-m-d', $linha['data_inicio']);
    $data_fim = DateTime::createFromFormat('Y-m-d', $linha['data_fim']);
    
    // Calcula a diferença em horas entre a data de início e o momento atual
    $horas_desde_inicio = (new DateTime())->diff($data_inicio)->h + (new DateTime())->diff($data_inicio)->days * 24;
    
    // Verifica se o recado foi criado nas últimas 24 horas
    $classe_destaque = $horas_desde_inicio <= 24 ? 'background-color: #ffff0085;' : '';
    ?>

    <span class="fw-bold"><?= $data_inicio->format('d/m/y') . ' até ' . $data_fim->format('d/m/y') ?> :</span>
    <p class="card-text" style="<?= $classe_destaque ?>"><?= $linha['mensagem'] ?></p>
    <hr>

<?php } ?>
