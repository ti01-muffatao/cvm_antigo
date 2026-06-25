<?php 

$data_inicio = '2025-11-01';
$data_fim = date('Y-m-d');

$dias_uteis = 85;
$dias_uteis_passados = contarDiasUteis($data_inicio, $data_fim);
$dias_faltam = $dias_uteis - $dias_uteis_passados;

$percentual = $dias_uteis_passados / $dias_uteis * 100;

?>

<div class="container mt-2 m-0" style="max-width: 100%;">
    <div class="summary-footer">
        <b><?= $dias_uteis; ?></b> Dias de CVM / <b><?= $dias_uteis_passados; ?></b> Dias passados / <b><?= $dias_faltam; ?></b> Dias para o fim
        <br>
        <div class="progress mt-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $percentual; ?>%; background-color: #ff8b07ff "><?= number_format($percentual,0,',','.') ?>% </div>
        </div>
    </div>
</div>
<?php // include 'ampulheta.php' ?>