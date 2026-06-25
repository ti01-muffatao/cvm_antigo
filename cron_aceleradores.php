<?php
// CONGELAMENTO DA CAMPANHA (TRAVA)
die('Rotina congelada - Fim da campanha. Pontos travados.');

//evita uma chamada via navegador
// if (isset($_SERVER['REMOTE_ADDR'])){
//   die( 'Esta ação não é permitida!' );
//   exit();
// }

include "administrar/ora_connect_cron.php";

mysql_query('TRUNCATE TABLE pontuacao_aceleradores');

$dt_ini 	= "20251101";
$dt_fim = "20260228";
$cd_parcial	= "1";

$query = mysql_query("select * from aceleradores where dt_inicial >= '".date('Y-m-d', strtotime($dt_ini))."' and dt_final <= '".date('Y-m-d', strtotime($dt_fim))."'");
	while($objeto = mysql_fetch_array($query)){

		$gerente = null;
		if($objeto['filial'] == 'AMBOS'){
			$filial = "'09','10'";
		}
		if($objeto['filial'] == 'IBIPORÃ'){
			$filial = "'10'";
			$gerente = " AND A3.A3_GEREN = '9002'";
		}
		if($objeto['filial'] == 'ITAJAÍ'){
			$filial = "'09'";
			$gerente = " AND A3.A3_GEREN = '9001'";
		}
		if($objeto['filial'] == 'RS'){
			$filial = "'09'";
			$gerente = " AND A3.A3_GEREN = '9004'";
		}

		$SQL = "SELECT
		C5.C5_VEND1,
		A3.A3_SUPER,
		A3.A3_GEREN,
		C5.C5_EMISSAO,
		A5.A5_FORNECE,
		SUM(C6.C6_VALOR) AS VALOR,
		SUM(C6.C6_QTDVEN-NVL(D2_QTDEDEV,0)) QTDE,
		SUM(((C6.C6_QTDVEN-NVL(D2_QTDEDEV,0))/ '".$objeto['fracionado']."') * '".$objeto['pontos']."') AS PONTUACAO
	FROM
		SIGA.SC6010 C6,
		SIGA.SC5010 C5,
		SIGA.SA3010 A3,
		SIGA.SA5010 A5,
		SIGA.SD2010 D2,
		SIGA.SF4010 F4
	WHERE
		C5.C5_FILIAL IN ($filial)
		AND C5.C5_FILIAL = C6.C6_FILIAL
		AND C5.C5_FILIAL = A3.A3_FILIAL
		AND C5.C5_FILIAL = A5.A5_FILIAL	
		AND A3.A3_COD <> '0150'
		AND C5.C5_VEND1 = A3.A3_COD
		AND C5.C5_NUM = C6.C6_NUM";
		if(isset($gerente)){
			$SQL .= " $gerente";
		}
		$SQL .= " AND C5.C5_CLIENTE =  C6.C6_CLI
		AND C5.C5_LOJACLI = C6.C6_LOJA
		AND C5.C5_TIPO = 'N'
		-- AND C5.C5_LIBEROK = 'S'
		AND C5.C5_EMISSAO >= '".date('Ymd', strtotime($objeto['dt_inicial']))."'
		AND C5.C5_EMISSAO <= '".date('Ymd', strtotime($objeto['dt_final']))."'
		AND A5.A5_PRODUTO = '".$objeto['cd_produto']."'
		AND A5.A5_FORNECE = '".$objeto['fornecedor']."'
		AND A5.A5_PROMVEN > 0	
		AND C6.C6_PRODUTO = A5.A5_PRODUTO
		AND D2_FILIAL(+)=C6_FILIAL
		AND D2_PEDIDO(+)=C6_NUM
		AND D2.D2_ITEMPV(+)=C6_ITEM
		AND D2.D2_COD(+)=C6_PRODUTO
		AND F4_FILIAL = '  ' 
		AND F4_CODIGO=C6_TES
		AND F4_DUPLIC='S'
		AND F4_ESTOQUE='S'
		AND F4.D_E_L_E_T_=' '
		AND D2.D_E_L_E_T_(+) = ' '
		AND C5.D_E_L_E_T_ = ' '
		AND C6.D_E_L_E_T_ = ' '
		AND A5.D_E_L_E_T_ = ' '
		AND A3.D_E_L_E_T_ = ' '
		AND C6.C6_QTDVEN-NVL(D2_QTDEDEV,0) > 0
	GROUP BY
		C5.C5_VEND1,
		A3.A3_SUPER,
		A3.A3_GEREN,
		A5.A5_FORNECE,
		C5.C5_EMISSAO";
		$RSSP_ACELERADORES = oci_parse($oraconnect, $SQL);
		oci_execute($RSSP_ACELERADORES,OCI_DEFAULT);
		while($RSP_ACELERADORES = oci_fetch_array($RSSP_ACELERADORES)){
		
			$query_exists = mysql_query("select * from pontuacao_aceleradores where cd_codigo = '".$RSP_ACELERADORES['C5_VEND1']."' and cd_supervisor = '".$RSP_ACELERADORES['A3_SUPER']."' and cd_fornecedor = '".$RSP_ACELERADORES['A5_FORNECE']."' and cd_parcial = '".$cd_parcial."' and dt_inicial = '".$objeto['dt_inicial']."' and dt_final = '".$objeto['dt_final']."' and cd_produto = '".$objeto['cd_produto']."' and emissao_pedido = '".$RSP_ACELERADORES['C5_EMISSAO']."' and gerente = '".$RSP_ACELERADORES['A3_GEREN']."'");
			if(mysql_num_rows($query_exists) < 1){
				mysql_query("insert into pontuacao_aceleradores(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_inicial, dt_final, cd_produto, qtde_vendida,emissao_pedido, gerente)values('".$RSP_ACELERADORES['C5_VEND1']."', '".$RSP_ACELERADORES['A3_SUPER']."', '".$RSP_ACELERADORES['A5_FORNECE']."', '".$RSP_ACELERADORES['PONTUACAO']."', '".$cd_parcial."', '".$objeto['dt_inicial']."', '".$objeto['dt_final']."', '".$objeto['cd_produto']."', '".$RSP_ACELERADORES['QTDE']."', '".$RSP_ACELERADORES['C5_EMISSAO']."', '".$RSP_ACELERADORES['A3_GEREN']."' )");
			}
		}
	}


// Caso novo na CVM, futuramente o ideal é passar para outro arquivo
$aceleradores_venda = [
	// 'Colgate' => [
	// 	'codigo' => 'F00097',
	// 	'fornecedor_campanha' => 'F00097',
	// 	'de' => '20250127',
	// 	'ate' => '20250202',
	// 	'valor_necessario_de_venda' => 2000,
	// 	'pontos_por_valor' => 500,
	// ],
];

foreach ($aceleradores_venda as $nome_fornecedor => $dados) { 

	$SQL = "SELECT
		C5.C5_VEND1,
		A3.A3_SUPER,
		A3.A3_GEREN,
		A5.A5_FORNECE,
		SUM(C6.C6_VALOR) AS VALOR
	FROM
		SIGA.SC6010 C6,
		SIGA.SC5010 C5,
		SIGA.SA3010 A3,
		SIGA.SA5010 A5,
		SIGA.SD2010 D2,
		SIGA.SF4010 F4
	WHERE
		C5.C5_FILIAL IN ('09','10')
		AND C5.C5_FILIAL = C6.C6_FILIAL
		AND C5.C5_FILIAL = A3.A3_FILIAL
		AND C5.C5_FILIAL = A5.A5_FILIAL	
		AND A3.A3_COD <> '0150'
		AND A3.A3_COD <> '0305'
		AND C5.C5_VEND1 = A3.A3_COD
		AND C5.C5_NUM = C6.C6_NUM
		AND C5.C5_CLIENTE =  C6.C6_CLI
		AND C5.C5_LOJACLI = C6.C6_LOJA
		AND C5.C5_TIPO = 'N'
		AND C5.C5_EMISSAO >= '".$dados['de']."'
		AND C5.C5_EMISSAO <= '".$dados['ate']."'
		AND A5.A5_FORNECE = '".$dados['codigo']."'
		AND C6.C6_PRODUTO = A5.A5_PRODUTO
		AND D2_FILIAL(+)=C6_FILIAL
		AND D2_PEDIDO(+)=C6_NUM
		AND D2.D2_ITEMPV(+)=C6_ITEM
		AND D2.D2_COD(+)=C6_PRODUTO
		AND F4_FILIAL = '  ' 
		AND F4_CODIGO=C6_TES
		AND F4_DUPLIC='S'
		AND F4_ESTOQUE='S'
		AND F4.D_E_L_E_T_=' '
		AND D2.D_E_L_E_T_(+) = ' '
		AND C5.D_E_L_E_T_ = ' '
		AND C6.D_E_L_E_T_ = ' '
		AND A5.D_E_L_E_T_ = ' '
		AND A3.D_E_L_E_T_ = ' '
		AND C6.C6_QTDVEN-NVL(D2_QTDEDEV,0) > 0
	GROUP BY
		C5.C5_VEND1,
		A3.A3_SUPER,
		A3.A3_GEREN,
		A5.A5_FORNECE";
		$RSSP_ACELERADORES = oci_parse($oraconnect, $SQL);
		oci_execute($RSSP_ACELERADORES,OCI_DEFAULT);
		while($RSP_ACELERADORES = oci_fetch_array($RSSP_ACELERADORES)){
		
			$pontos = floor($RSP_ACELERADORES['VALOR'] / $dados['valor_necessario_de_venda']) * $dados['pontos_por_valor'];
			if($pontos > 0){
				$SQL = "insert into pontuacao_aceleradores(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_inicial, dt_final, cd_produto, qtde_vendida,emissao_pedido, gerente, venda)values('".$RSP_ACELERADORES['C5_VEND1']."', '".$RSP_ACELERADORES['A3_SUPER']."', '".$dados['fornecedor_campanha']."', $pontos, '".$cd_parcial."', '".$dados['de']."', '".$dados['ate']."', '', '', '".$dados['de']."', '".$RSP_ACELERADORES['A3_GEREN']."', ".$RSP_ACELERADORES['VALOR']." )";
				mysql_query($SQL);
			}
			
		}

} 

mysql_query("update pontuacao_aceleradores set cd_codigo = '0236' where cd_codigo = '0338' ");
mysql_query("update pontuacao_aceleradores set cd_codigo = '0618' where cd_codigo = '0141' ");

?>