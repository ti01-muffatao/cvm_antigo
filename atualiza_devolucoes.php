<?php 
//evita uma chamada via navegador
/*if (isset($_SERVER['REMOTE_ADDR'])){
  die( 'Esta ação não é permitida!' );
  exit();
}*/

include "administrar/ora_connect_cron.php";

//mysql_query('TRUNCATE TABLE pontuacao');
//mysql_query('TRUNCATE TABLE pontuacao_aceleradores');

$dt_ini 	= "20241101";
$dt_fim = "20250229";
$cd_parcial	= "1";

	//busca pontuacao
	$RSSP = oci_parse($oraconnect, "SELECT F2.F2_VEND1, A3.A3_SUPER, A3.A3_GEREN, F2.F2_EMISSAO, A5.A5_FORNECE,	SUM(((D2.D2_QUANT-D2.D2_QTDEDEV)/A5.A5_QTFRAC)*A5.A5_PROMVEN) AS TOTALFOR FROM SIGA.SA5010 A5, SIGA.SA3010 A3, SIGA.SD2010 D2, SIGA.SF2010 F2 WHERE A5.A5_FILIAL IN ('09','10') AND A5.A5_FORNECE IN ('F00001','F00004','F00096','F00079','F00097','F00010','F00042','F00003','F00077','F00098') AND A5.A5_LOJA BETWEEN ' ' AND 'ZZ' AND A5.A5_PRODUTO NOT IN ('003422-7','057123-4','003985-7','004176-8') AND A5.A5_PROMVEN > 0 AND A5.D_E_L_E_T_ <> '*' AND D2.D2_FILIAL = A5.A5_FILIAL AND D2.D2_COD = A5.A5_PRODUTO AND D2.D2_EMISSAO BETWEEN '".$dt_ini."' AND '".$dt_fim."' AND (D2.D2_QUANT - D2.D2_QTDEDEV) > 0 AND D2.D_E_L_E_T_ <> '*' AND F2.F2_FILIAL = A5.A5_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA AND F2.F2_VEND1 BETWEEN ' ' AND 'ZZZZ' AND F2.F2_VEND1 NOT IN ('000001','0150') AND F2.F2_EMISSAO BETWEEN '".$dt_ini."' AND '".$dt_fim."' AND F2.D_E_L_E_T_ <> '*' AND A3.A3_FILIAL = A5.A5_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND F2.F2_DUPL <> '         ' AND A3.D_E_L_E_T_ <> '*' GROUP BY F2.F2_VEND1, A3.A3_SUPER, A3.A3_GEREN, A5.A5_FORNECE, F2.F2_EMISSAO ");
	oci_execute($RSSP,OCI_DEFAULT);
	while($RSP = oci_fetch_array($RSSP)){
			
		$dt_parcial = date("Y-m-d", strtotime($RSP['F2_EMISSAO']));
		// BETTANIN / UNILEVER (Somente SC e PR)			
		if($RSP['A3_GEREN'] == '9004' && ($RSP['A5_FORNECE'] == 'F00001' || $RSP['A5_FORNECE'] == 'F00004')){
			break;
		// GOTA LIMPA (Somente RS)
		}elseif(($RSP['A3_GEREN'] == '9001' || $RSP['A3_GEREN'] == '9002') && $RSP['A5_FORNECE'] == 'F00096'){
			break;
		}else{
			//insere pontos
			mysql_query("insert into pontuacao(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_data)values('".$RSP['F2_VEND1']."', '".$RSP['A3_SUPER']."', '".$RSP['A5_FORNECE']."', '".$RSP['TOTALFOR']."', '".$cd_parcial."', '".$dt_parcial."' )");
		}
		
	}		

	//busca pontuacao de bonificação havaianas
	$RSSP_BONIFICACAO = oci_parse($oraconnect, "SELECT F2.F2_VEND1, A3.A3_SUPER, F2.F2_EMISSAO, 'F00079' A5_FORNECE, SUM(D2.D2_VALBRUT) AS BONIFICACAO,
	SUM(((D2.D2_QUANT-D2.D2_QTDEDEV)/A5.A5_QTFRAC)*A5.A5_PROMVEN) AS TOTALFOR
	FROM SIGA.SD2010 D2,
		SIGA.SF4010 F4,
		SIGA.SA3010 A3,
		SIGA.SF2010 F2,
		SIGA.SA5010 A5
	WHERE D2.D2_FILIAL IN ('09', '10')
		AND F2.F2_FILIAL = D2.D2_FILIAL
		AND A3.A3_FILIAL = D2.D2_FILIAL
		AND A5.A5_FILIAL = D2.D2_FILIAL
		AND D2.D2_EMISSAO >= '".$dt_ini."'  
		AND D2.D2_EMISSAO <= '".$dt_fim."' 
		AND A3.A3_COD = F2.F2_VEND1
		AND D2.D2_TIPO = 'N'
		AND D2.D2_CF IN ('5910','6910')
		AND D2.D2_COD = A5.A5_PRODUTO
		AND A5.A5_LOJA BETWEEN ' ' AND 'ZZ' 
		AND A5_FORNECE = 'F00079'     
		AND A5.A5_PROMVEN > 0     
		AND F2.F2_DOC = D2.D2_DOC
		AND F2.F2_SERIE = D2.D2_SERIE
		AND F2.F2_CLIENTE = D2.D2_CLIENTE
		AND F2.F2_LOJA = D2.D2_LOJA    
		AND F4.F4_FILIAL = '  '
		AND F4.F4_CODIGO = D2.D2_TES
		AND F4.F4_DUPLIC <> 'S' 
		AND A5.D_E_L_E_T_ <> '*'
		AND A3.D_E_L_E_T_ <> '*'
		AND F4.D_E_L_E_T_ <> '*'
		AND D2.D_E_L_E_T_ <> '*'
		AND F2.D_E_L_E_T_ <> '*'
	GROUP BY F2.F2_VEND1, A3.A3_SUPER, A5.A5_FORNECE, F2.F2_EMISSAO");
	oci_execute($RSSP_BONIFICACAO,OCI_DEFAULT);
	while($RSP_BONIFICACAO = oci_fetch_array($RSSP_BONIFICACAO)){
		if(oci_num_rows($RSSP_BONIFICACAO) >0){		
			
            $dt_parcial = date("Y-m-d", strtotime($RSP_BONIFICACAO['F2_EMISSAO']));
			
			//insere pontos
			// mysql_query("insert into pontuacao(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_data)values('".$RSP_BONIFICACAO['F2_VEND1']."', '".$RSP_BONIFICACAO['A3_SUPER']."', '".$RSP_BONIFICACAO['A5_FORNECE']."', '".$RSP_BONIFICACAO['TOTALFOR']."', '".$cd_parcial."', '".$dt_parcial."' )");

		}
	}	
	
	// pontuação de setembro data 2023-11-01
	// pontuação de outubro data 2023-11-10
	$handle = fopen(__DIR__.'/pontuacao_panetone_20231024.csv', 'r');
	$row = 0;
	while ($array = fgetcsv($handle, 1000, ",")) {
		if ($row++ == 0) {
			continue;
		}
		$metas[] = [
			'cod' => str_pad($array[0], 4, "0", STR_PAD_LEFT),
			'sup' => str_pad($array[1], 4, "0", STR_PAD_LEFT),
			'fornecedor' => str_pad($array[2], 6, "0", STR_PAD_LEFT),
			'pontos' => $array[3],
			'data' => $array[5],
		];   
	}
	$i = 0;
	foreach($metas as $meta){     
		// $sql = mysql_query("INSERT INTO pontuacao (cd_codigo, cd_supervisor, cd_pontos, cd_fornecedor, cd_parcial, dt_data) VALUES ('".$meta['cod']."', '".$meta['sup']."', '".$meta['pontos']."', '".$meta['fornecedor']."', '1', '".$meta['data']."')");       
		// if(mysql_affected_rows($sql) >= 0){
		// 	$i++;
		// }
	}
	fclose($handle);

	// $query = mysql_query("select * from aceleradores where dt_inicial >= '".date('Y-m-d', strtotime($dt_ini))."' and dt_final <= '".date('Y-m-d', strtotime($dt_fim))."'");
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
		SUM(((C6.C6_QTDVEN-NVL(D2_QTDEDEV,0))/ '".$objeto['fracionado']."')* '".$objeto['pontos']."') AS PONTUACAO
	FROM
		SIGA.SC6010 C6,
		SIGA.SC5010 C5,
		SIGA.SA3010 A3,
		SIGA.SA5010 A5,
		SIGA.SD2010 D2
	WHERE
		C5.C5_FILIAL IN ($filial)
		AND C5.C5_FILIAL = C6.C6_FILIAL
		AND C5.C5_FILIAL = A3.A3_FILIAL
		AND C5.C5_FILIAL = A5.A5_FILIAL	
		AND A3.A3_COD <> '0150'
		AND C5.C5_VEND1 = A3.A3_COD
		AND C5.C5_NUM = C6.C6_NUM	
		--AND C5.C5_NOTA = ' '";
		if(isset($gerente)){
			$SQL .= "$gerente";
		}
		$SQL .= " AND C5.C5_CLIENTE =  C6.C6_CLI
		AND C5.C5_LOJACLI = C6.C6_LOJA
		AND C5.C5_TIPO = 'N'
		AND C5.C5_LIBEROK = 'S'
		AND C5.C5_EMISSAO >= '".date('Ymd', strtotime($objeto['dt_inicial']))."'
		AND C5.C5_EMISSAO <= '".date('Ymd', strtotime($objeto['dt_final']))."'
		AND A5.A5_PRODUTO = '".$objeto['cd_produto']."'
		AND A5.A5_FORNECE IN ('F00001', 'F00004', 'F00096', 'F00079', 'F00097', 'F00010', 'F00042', 'F00003', 'F00077', 'F00098')
		AND A5.A5_PROMVEN > 0	
		AND C6.C6_PRODUTO = A5.A5_PRODUTO
		AND D2_FILIAL(+)=C6_FILIAL
		AND D2_PEDIDO(+)=C6_NUM
		AND D2.D2_ITEMPV(+)=C6_ITEM
		AND D2.D2_COD(+)=C6_PRODUTO
		AND D2.D_E_L_E_T_(+) = ' '
		AND C5.D_E_L_E_T_ = ' '
		AND C6.D_E_L_E_T_ = ' '
		AND A5.D_E_L_E_T_ = ' '
		AND A3.D_E_L_E_T_ = ' '
	GROUP BY
		C5.C5_VEND1,
		A3.A3_SUPER,
		A3.A3_GEREN,
		A5.A5_FORNECE,
		C5.C5_EMISSAO";

		$RSSP_ACELERADORES = oci_parse($oraconnect, $SQL);
		oci_execute($RSSP_ACELERADORES,OCI_DEFAULT);
		while($RSP_ACELERADORES = oci_fetch_array($RSSP_ACELERADORES)){
		
			// $query_exists = mysql_query("select * from pontuacao_aceleradores where cd_codigo = '".$RSP_ACELERADORES['C5_VEND1']."' and cd_supervisor = '".$RSP_ACELERADORES['A3_SUPER']."' and cd_fornecedor = '".$RSP_ACELERADORES['A5_FORNECE']."' and cd_parcial = '".$cd_parcial."' and dt_inicial = '".$objeto['dt_inicial']."' and dt_final = '".$objeto['dt_final']."' and cd_produto = '".$objeto['cd_produto']."' and emissao_pedido = '".$RSP_ACELERADORES['C5_EMISSAO']."' and gerente = '".$RSP_ACELERADORES['A3_GEREN']."'");
			// if(mysql_num_rows($query_exists) < 1){
			// 	mysql_query("insert into pontuacao_aceleradores(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_inicial, dt_final, cd_produto, qtde_vendida,emissao_pedido, gerente)values('".$RSP_ACELERADORES['C5_VEND1']."', '".$RSP_ACELERADORES['A3_SUPER']."', '".$RSP_ACELERADORES['A5_FORNECE']."', '".$RSP_ACELERADORES['PONTUACAO']."', '".$cd_parcial."', '".$objeto['dt_inicial']."', '".$objeto['dt_final']."', '".$objeto['cd_produto']."', '".$RSP_ACELERADORES['QTDE']."', '".$RSP_ACELERADORES['C5_EMISSAO']."', '".$RSP_ACELERADORES['A3_GEREN']."' )");
			// }
		}

		//busca pontuacao de bonificação havaianas - pedidos de venda
		$SQL_BONIFICACAO = "SELECT
		C5.C5_VEND1,
		A3.A3_SUPER,
		A3.A3_GEREN,
		C5.C5_EMISSAO,
		'F00079' A5_FORNECE,
		SUM(C6.C6_VALOR) AS VALOR,
		SUM(C6.C6_QTDVEN-NVL(D2_QTDEDEV,0)) QTDE,
		SUM(((C6.C6_QTDVEN-NVL(D2_QTDEDEV,0))/ '".$objeto['fracionado']."')* '".$objeto['pontos']."') AS PONTUACAO
	FROM
		SIGA.SC6010 C6,
		SIGA.SC5010 C5,
		SIGA.SA3010 A3,
		SIGA.SA5010 A5,
		SIGA.SD2010 D2
	WHERE
		C5.C5_FILIAL IN ($filial)
		AND C5.C5_FILIAL = C6.C6_FILIAL
		AND C5.C5_FILIAL = A3.A3_FILIAL
		AND C5.C5_FILIAL = A5.A5_FILIAL	
		AND A3.A3_COD <> '0150'
		AND C5.C5_VEND1 = A3.A3_COD
		AND C5.C5_NUM = C6.C6_NUM	
		AND C5.C5_NOTA = ' '";
		if(isset($gerente)){
			$SQL_BONIFICACAO .= "$gerente";
		}
		$SQL_BONIFICACAO .= " AND C5.C5_CLIENTE =  C6.C6_CLI
		AND C5.C5_LOJACLI = C6.C6_LOJA
		AND C6.C6_CF IN ('5910','6910')
		AND C5.C5_TIPO = 'N'
		AND C5.C5_LIBEROK = 'S'
		AND C5.C5_EMISSAO >= '".date('Ymd', strtotime($objeto['dt_inicial']))."'
		AND C5.C5_EMISSAO <= '".date('Ymd', strtotime($objeto['dt_final']))."'
		AND A5.A5_PRODUTO = '".$objeto['cd_produto']."'
		AND A5.A5_FORNECE = 'F00079'
		AND A5.A5_PROMVEN > 0	
		AND C6.C6_PRODUTO = A5.A5_PRODUTO
		AND D2_FILIAL(+)=C6_FILIAL
		AND D2_PEDIDO(+)=C6_NUM
		AND D2.D2_ITEMPV(+)=C6_ITEM
		AND D2.D2_COD(+)=C6_PRODUTO
		AND D2.D_E_L_E_T_(+) = ' '
		AND C5.D_E_L_E_T_ = ' '
		AND C6.D_E_L_E_T_ = ' '
		AND A5.D_E_L_E_T_ = ' '
		AND A3.D_E_L_E_T_ = ' '
	GROUP BY
		C5.C5_VEND1,
		A3.A3_SUPER,
		A3.A3_GEREN,
		A5.A5_FORNECE,
		C5.C5_EMISSAO";
		$RSSP_BONIFICACAO_PEDIDO = oci_parse($oraconnect, $SQL_BONIFICACAO);

		oci_execute($RSSP_BONIFICACAO_PEDIDO,OCI_DEFAULT);
		while($RSP_BONIFICACAO_PEDIDO = oci_fetch_array($RSSP_BONIFICACAO_PEDIDO)){
			if(oci_num_rows($RSSP_BONIFICACAO_PEDIDO) >0){		
				
				// $query_exists = mysql_query("select * from pontuacao_aceleradores where cd_codigo = '".$RSP_BONIFICACAO_PEDIDO['C5_VEND1']."' and cd_supervisor = '".$RSP_BONIFICACAO_PEDIDO['A3_SUPER']."' and cd_fornecedor = '".$RSP_BONIFICACAO_PEDIDO['A5_FORNECE']."' and cd_parcial = '".$cd_parcial."' and dt_inicial = '".$objeto['dt_inicial']."' and dt_final = '".$objeto['dt_final']."' and cd_produto = '".$objeto['cd_produto']."' and emissao_pedido = '".$RSP_BONIFICACAO_PEDIDO['C5_EMISSAO']."' and gerente = '".$RSP_BONIFICACAO_PEDIDO['A3_GEREN']."'");
				// if(mysql_num_rows($query_exists) < 1){
				// 	mysql_query("insert into pontuacao_aceleradores(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_inicial, dt_final, cd_produto, qtde_vendida, emissao_pedido, gerente)values('".$RSP_BONIFICACAO_PEDIDO['C5_VEND1']."', '".$RSP_BONIFICACAO_PEDIDO['A3_SUPER']."', '".$RSP_BONIFICACAO_PEDIDO['A5_FORNECE']."', '".$RSP_BONIFICACAO_PEDIDO['PONTUACAO']."', '".$cd_parcial."', '".$objeto['dt_inicial']."', '".$objeto['dt_final']."', '".$objeto['cd_produto']."', '".$RSP_BONIFICACAO_PEDIDO['QTDE']."', '".$RSP_BONIFICACAO_PEDIDO['C5_EMISSAO']."', '".$RSP_BONIFICACAO_PEDIDO['A3_GEREN']."' )");
				// }
			}
		}
	}

	// mysql_query("update pontuacao set cd_codigo = '0236' where cd_codigo = '0338' ");
	// mysql_query("update pontuacao_aceleradores set cd_codigo = '0236' where cd_codigo = '0338' ");
	// mysql_query("update pontuacao set cd_codigo = '0323' where cd_codigo = '0322' ");
	// mysql_query("update pontuacao set cd_supervisor = '0313' where cd_codigo = '0236' and cd_supervisor = '0321' ");
	// mysql_query("delete from pontuacao where cd_fornecedor = 'F00096' and cd_supervisor not in ('0113', '0114', '0115')");
?>