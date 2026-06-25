<?php 

$data_inicio = '20241101';

$SQL = "select * from grupos where cd_grupo = '".$_SESSION['CD_GRUPO']."' order by cd_grupo asc";
$RSS = mysql_query($SQL, $conexao);
$RS = mysql_fetch_array($RSS);
$meta = $RS['vl_metam'];

$SQL = "select * from usuarios where cd_codigo = '".$_SESSION['CD_CODIGO']."'";
$RSS = mysql_query($SQL, $conexao);
$RS = mysql_fetch_array($RSS);
$pontuacao_panetone = $RS['pontuacao_panetone'];


$fornecedores = [
    'F00001' => 'BETTANIN',
    'F00096' => 'GOTA LIMPA',
    'F00003' => 'MEX',
    'F00002' => 'MOVI',
    'F00010' => 'SANTHER',
    'F00079' => 'HAVAIANAS',
    'F00077' => 'JDE',
    'F00097' => 'COLGATE',
    'F00004' => 'UNILEVER',
];

$cd_codigo = trim($_SESSION['CD_CODIGO']);
$cd_codigo_normalizado = ($cd_codigo == '0338' || $cd_codigo == '0236') ? '0236' : $cd_codigo;

?>

<h4 class="text-center">Meta mínima: <?= number_format($meta,0,',','.') ?> Pontos (Fase 01)</h4>
<table class="table-list2" style="width:100%">
    <?php
    foreach (array_chunk($fornecedores, 5, true) as $linha) {

        echo '<thead>
                <tr>';
        foreach ($linha as $codigo => $nome) {
            echo '<th>' . $nome . '</th>';
        }
        echo   '</tr>
             </thead>
        <tbody>
        <tr>';

        foreach ($linha as $codigo => $nome) {
            $SQL = " SELECT  SUM(ptos) AS ptos,  SUM(pontos_aceleradores) AS pontos_aceleradores FROM ( SELECT  p.cd_fornecedor,  SUM(p.cd_pontos) AS ptos,  0 AS pontos_aceleradores FROM pontuacao_new p WHERE  CASE  WHEN p.cd_codigo IN ('0338','0236') THEN '0236' ELSE p.cd_codigo END = '$cd_codigo_normalizado' AND p.cd_fornecedor = '$codigo' GROUP BY p.cd_fornecedor UNION ALL SELECT  pa.cd_fornecedor,  0 AS ptos,  SUM(pa.cd_pontos) AS pontos_aceleradores FROM pontuacao_aceleradores pa WHERE  CASE  WHEN pa.cd_codigo IN ('0338','0236') THEN '0236' ELSE pa.cd_codigo END = '$cd_codigo_normalizado' AND pa.cd_fornecedor = '$codigo' GROUP BY pa.cd_fornecedor ) subquery ";
            $RSS = mysql_query($SQL, $conexao);
            $row = mysql_fetch_assoc($RSS);

            $pontos = $row['ptos'] + $row['pontos_aceleradores'];
            if($codigo == "F00003"){    
                $pontos += $pontuacao_panetone;
            } 

            $estilo = $pontos > $meta ? 'background-color: #00800060;' : 'background-color: #ff000060';

            echo "<td><span style='padding: 10px; border-radius: 10px; $estilo'>" . number_format($pontos,0,',','.') . '</span></td>';
        }

        echo '</tr>
        </tbody>';
    }
    ?>
</table>