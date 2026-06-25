<!-- <style>
.progress-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    font-size: 20px;
}

.progress-container {
    display: flex;
    gap: 20px;
    align-items: center;
}

@keyframes progress {
    0% { --percentage: 0; }
    100% { --percentage: var(--value); }
}

@property --percentage {
    syntax: '<number>';
    inherits: true;
    initial-value: 0;
}

[role="progressbar"] {
    --percentage: var(--value);
    --primary: green;
    --secondary: #47a4478f;
    --size: 100px;
    animation: progress 2s 0.5s forwards;
    width: var(--size);
    aspect-ratio: 1;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
    display: grid;
    place-items: center;
}

[role="progressbar"]::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: conic-gradient(var(--primary) calc(var(--percentage) * 1%), var(--secondary) 0);
    mask: radial-gradient(white 55%, transparent 0);
    mask-mode: alpha;
    -webkit-mask: radial-gradient(#0000 55%, #000 0);
    -webkit-mask-mode: alpha;
}

[role="progressbar"]::after {
    counter-reset: percentage var(--value);
    content: counter(percentage) '%';
    font-family: Helvetica, Arial, sans-serif;
    font-size: calc(var(--size) / 5);
    color: var(--primary);
}
</style>

<?php 
$RSS = mysql_query("select * from grupos where cd_grupo = '".$_SESSION['CD_GRUPO']."' order by cd_grupo asc", $conexao);
$RS = mysql_fetch_array($RSS);
$meta = $RS['vl_metag'];

$SQL = "select * from usuarios where cd_codigo = '".$_SESSION['CD_CODIGO']."'";
$RSS = mysql_query($SQL, $conexao);
$RS = mysql_fetch_array($RSS);
$pontuacao_panetone = $RS['pontuacao_panetone'];

$cd_codigo = trim($_SESSION['CD_CODIGO']);

// Normaliza o código (se for 0338 ou 0236, usa 0236)
$cd_codigo_normalizado = ($cd_codigo == '0338' || $cd_codigo == '0236') ? '0236' : $cd_codigo;

$SQL = " SELECT  SUM(ptos) AS ptos,  SUM(pontos_aceleradores) AS pontos_aceleradores FROM ( SELECT  p.cd_fornecedor,  SUM(p.cd_pontos) AS ptos,  0 AS pontos_aceleradores FROM pontuacao_new p WHERE  CASE  WHEN p.cd_codigo IN ('0338','0236') THEN '0236' ELSE p.cd_codigo END = '$cd_codigo_normalizado' GROUP BY p.cd_fornecedor UNION ALL SELECT  pa.cd_fornecedor,  0 AS ptos,  SUM(pa.cd_pontos) AS pontos_aceleradores FROM pontuacao_aceleradores pa WHERE  CASE  WHEN pa.cd_codigo IN ('0338','0236') THEN '0236' ELSE pa.cd_codigo END = '$cd_codigo_normalizado' GROUP BY pa.cd_fornecedor ) subquery ";
// echo $SQL;

$RSS = mysql_query($SQL, $conexao);
$row = mysql_fetch_assoc($RSS);

$pontos = $row['ptos'] + $row['pontos_aceleradores'];
$pontos += $pontuacao_panetone;


$porcentagem = $pontos/$meta * 100;

?>

<h4 class="text-center">Meta geral / Realizado (Fase 02)</h4>
<div class="progress-wrapper">
    <div class="progress-text">
        <h3><?= number_format($meta,0,',','.') . ' / ' . number_format($pontos,0,',','.') ?></h3>
        <h6>PONTOS</h6>
    </div>
    <div class="progress-container">
        <div role="progressbar" style="--value: <?= number_format($porcentagem,0,',','.') ?>"></div>
    </div>
</div> -->