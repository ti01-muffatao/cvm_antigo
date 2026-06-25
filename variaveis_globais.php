<?php

// Busca fornecedores Ouro
$fornecedores = [];
$SQL = "select * from clifor order by cd_fornecedor asc";
$query = mysql_query($SQL);
while ($objeto = mysql_fetch_array($query)) {
    $fornecedores[$objeto['cd_fornecedor']] = $objeto['ds_razao'];
}

// Busca fornecedores Mix Estrela
$fornecedores_mix_estrela = [];
$SQL = "select * from clifor_prata order by cd_fornecedor asc";
$query = mysql_query($SQL);
while ($objeto = mysql_fetch_array($query)) {
    $fornecedores_mix_estrela[$objeto['cd_fornecedor']] = $objeto['ds_razao'];
}

$datas = [
    'Novembro' => [
        'data_inicial' => '20251101',
        'data_final' => '20251131',
    ],
    'Dezembro' => [
        'data_inicial' => '20251201',
        'data_final' => '20251231',
    ],
    'Janeiro' => [
        'data_inicial' => '20260101',
        'data_final' => '20260131',
    ],
    'Fevereiro' => [
        'data_inicial' => '20260201',
        'data_final' => '20260229',
    ],
    'Total' => [
        'data_inicial' => '20251101',
        'data_final' => '20260229',
    ],
];

$nomesMes = [
	'11' => 'NOVEMBRO',
	'12' => 'DEZEMBRO',
	'01' => 'JANEIRO',
	'02' => 'FEVEREIRO'
];