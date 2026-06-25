<?php 
include "administrar/ora_connect.php";

//mysql_query('TRUNCATE TABLE pontuacao');

$dt_primeira_parcial = "20241101";

$dt_ini 	= $dt_primeira_parcial;
//$dt_fim 	= date('Ymd', strtotime('-1 days'));
$dt_fim = "20240229";
$cd_parcial	= "1";
			
    $dt_parcial = date("Y-m-d");
	
	//insere pontuacao dos aceleradores
	$aceleradores = array();
	$query = mysql_query("select * from aceleradores where dt_inicial >= '2023-01-01' and dt_final <= '2024-02-29'", $GLOBALS['conexao']);
	while($acelerador = mysql_fetch_array($query)){
		$aceleradores[] = array('produto' => $acelerador['cd_produto'], 'pontos' => $acelerador['pontos'], 'fracionado' => $acelerador['fracionado'], 'dt_inicial' => $acelerador['dt_inicial'], 'dt_final' => $acelerador['dt_final']);
	}                                                                                                                                         

		$SQL = "SELECT
		TRIM(A5.A5_PRODUTO) PRODUTO,
		F2.F2_VEND1,
		A3.A3_SUPER,
		A5.A5_FORNECE,
		SUM(((D2.D2_QUANT-D2.D2_QTDEDEV)/ A5.A5_QTFRAC)* A5.A5_PROMVEN) AS TOTALFOR,
		SUM(D2.D2_QUANT-D2.D2_QTDEDEV) QTDE
	FROM
		SIGA.SA5010 A5,
		SIGA.SA3010 A3,
		SIGA.SD2010 D2,
		SIGA.SF2010 F2,
		SIGA.SC5010 C5
	WHERE
		F2.F2_FILIAL IN ('09', '10')
		AND C5.C5_NUM = D2.D2_PEDIDO
		AND C5.C5_NOTA <> ' '
		AND C5.C5_SERIE <> ' '
		AND C5.C5_TIPO = 'N'
		AND C5.C5_LIBEROK = 'S'	
		AND C5.C5_EMISSAO >= '".$dt_ini."'
		AND C5.C5_EMISSAO <= '".$dt_fim."'
		AND C5.C5_FILIAL = D2.D2_FILIAL	
		AND C5.C5_CLIENTE = D2.D2_CLIENTE
		AND C5.C5_LOJACLI = D2.D2_LOJA
		AND C5.D_E_L_E_T_ = ' '
		AND A5.A5_FORNECE IN ('F00001', 'F00002','F00003','F00004','F00010','F00018','F00077','F00079')
		AND A5.A5_LOJA BETWEEN ' ' AND 'ZZ'                                
		AND A5.A5_PROMVEN > 0
		AND A5.D_E_L_E_T_ <> '*'
		AND D2.D2_FILIAL = A5.A5_FILIAL
		AND D2.D2_COD = A5.A5_PRODUTO
		AND (D2.D2_QUANT - D2.D2_QTDEDEV) > 0
		AND D2.D_E_L_E_T_ <> '*'
		AND F2.F2_FILIAL = A5.A5_FILIAL
		AND F2.F2_DOC = D2.D2_DOC
		AND F2.F2_SERIE = D2.D2_SERIE
		AND F2.F2_CLIENTE = D2.D2_CLIENTE
		AND F2.F2_LOJA = D2.D2_LOJA		
		AND F2.F2_VEND1 NOT IN ('000001', '0150')
		AND F2.D_E_L_E_T_ <> '*'
		AND A3.A3_FILIAL = A5.A5_FILIAL
		AND A3.A3_COD = F2.F2_VEND1
		AND A3.D_E_L_E_T_ <> '*'
	GROUP BY
		TRIM(A5.A5_PRODUTO),
		F2.F2_VEND1,
		A3.A3_SUPER,
		A5.A5_FORNECE
	ORDER BY
		F2_VEND1"; 
		
		//busca pontuacao
		$RSSP = oci_parse($GLOBALS['oraconnect'], $SQL);
		oci_execute($RSSP,OCI_DEFAULT);
		$produtos_vendedor = array();
		while($RSP = oci_fetch_array($RSSP)){
				$produtos_vendedor[] = array('vendedor' => $RSP['F2_VEND1'], 'supervisor' => $RSP['A3_SUPER'], 'fornecedor' => $RSP['A5_FORNECE'], 'produto' => $RSP['PRODUTO'], 'qtde' => $RSP['QTDE']);
		}  

		$total_pontos_aceleradores = 0;
		// foreach($aceleradores as $acelera){ 
		// 	foreach($produtos_vendedor as $prod_vend){
		// 		if($prod_vend['produto'] == $acelera['produto']){  
										
		// 			$pontos = ($prod_vend['qtde']/$acelera['fracionado'])*$acelera['pontos'];          
					
		// 			echo "insert into pontuacao_aceleradores(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_inicial, dt_final, cd_produto)values('".$prod_vend['vendedor']."', '".$prod_vend['supervisor']."', '".$prod_vend['fornecedor']."', '".$pontos."', '".$cd_parcial."', '".$acelera['dt_inicial']."', '".$acelera['dt_final']."', '".$prod_vend['produto']."')<br>";
		// 			mysql_query("insert into pontuacao_aceleradores(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_inicial, dt_final, cd_produto)values('".$prod_vend['vendedor']."', '".$prod_vend['supervisor']."', '".$prod_vend['fornecedor']."', '".$pontos."', '".$cd_parcial."', '".$acelera['dt_inicial']."', '".$acelera['dt_final']."', '".$prod_vend['produto']."')");
		// 		}
		// 	}
		// }
?>