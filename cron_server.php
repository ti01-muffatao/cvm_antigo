<?php 
    // CONGELAMENTO DA CAMPANHA (TRAVA)
    die('Rotina congelada - Fim da campanha. Pontos travados.');

    // evita uma chamada via navegador
    // if (isset($_SERVER['REMOTE_ADDR'])){
    // die( 'Esta ação não é permitida!' );
	// exit();
	// }
	
	include "administrar/ora_connect_cron.php";

	mysql_query('TRUNCATE TABLE pontuacao_new');

	$dt_ini 	= "20251101";
	$dt_fim = "20260228";
	$cd_parcial	= "1";

	//busca pontuacao
	$SQL =  "SELECT F2.F2_VEND1, A3.A3_SUPER, A3.A3_GEREN, F2.F2_EMISSAO, A5.A5_FORNECE, SUM(((D2.D2_QUANT-D2.D2_QTDEDEV)/A5.A5_QTFRAC)*A5.A5_PROMVEN) AS TOTALFOR FROM SIGA.SA5010 A5, SIGA.SA3010 A3, SIGA.SD2010 D2, SIGA.SF2010 F2 WHERE A5.A5_FILIAL IN ('09','10') AND A5.A5_FORNECE IN ('F00001','F00002','F00003','F00004','F00005','F00077','F00009','F00018','F00097','F00010') AND A5.A5_LOJA BETWEEN ' ' AND 'ZZ' AND A5.A5_PROMVEN > 0 AND A5.D_E_L_E_T_ <> '*' AND D2.D2_FILIAL = A5.A5_FILIAL AND D2.D2_COD = A5.A5_PRODUTO AND D2.D2_EMISSAO BETWEEN '$dt_ini' AND '$dt_fim' AND (D2.D2_QUANT - D2.D2_QTDEDEV) > 0 AND D2.D_E_L_E_T_ <> '*' AND F2.F2_FILIAL = A5.A5_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA AND F2.F2_VEND1 BETWEEN ' ' AND 'ZZZZ' AND F2.F2_VEND1 NOT IN ('000001','0150') AND F2.F2_EMISSAO BETWEEN '$dt_ini' AND '$dt_fim' AND F2.D_E_L_E_T_ <> '*' AND A3.A3_FILIAL = A5.A5_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND F2.F2_DUPL <> '         ' AND A3.D_E_L_E_T_ <> '*' GROUP BY F2.F2_VEND1, A3.A3_SUPER, A3.A3_GEREN, A5.A5_FORNECE, F2.F2_EMISSAO";
	// echo $SQL;
	$RSSP = oci_parse($oraconnect, $SQL);
	oci_execute($RSSP,OCI_DEFAULT);
	
	while($RSP = oci_fetch_array($RSSP)){
			
		$dt_parcial = date("Y-m-d", strtotime($RSP['F2_EMISSAO']));
		
		//insere pontos
		mysql_query("insert into pontuacao_new(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_data)values('".$RSP['F2_VEND1']."', '".$RSP['A3_SUPER']."', '".$RSP['A5_FORNECE']."', '".$RSP['TOTALFOR']."', '".$cd_parcial."', '".$dt_parcial."' )");
		
	}		

	mysql_query("update pontuacao_new set cd_codigo = '0323' where cd_codigo = '0322' ");
	mysql_query("update pontuacao_new set cd_codigo = '0618' where cd_codigo = '0141' ");