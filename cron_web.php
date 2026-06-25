<?php 
if(!isset($_GET['chave']) && $_GET['chave'] != "muffa3535block"){ 
    die("Acesso não Autorizado"); 
	exit();
}

include "administrar/ora_connect.php";

$dt_primeira_parcial = "20211101";

//busca data da ultima parcial
$RSS = mysql_query("select cd_parcial, dt_data from pontuacao order by dt_data desc limit 1", $conexao);
$RS = mysql_fetch_assoc($RSS);
if(mysql_num_rows($RSS) > 0){
	//$dt_ultima_parcial 	= date("Ymd", strtotime($RS['dt_data']));
	$dt_ini 			= date('Ymd', strtotime('+1 days', strtotime($RS['dt_data'])));
	//$dt_fim 			= date('Ymd', strtotime('-1 days'));
	$dt_fim 			= "20220228";//fechamento
	$cd_parcial 		= $RS['cd_parcial'] +1;
}else{
	$dt_ini 	= $dt_primeira_parcial;
	$dt_fim 	= date('Ymd', strtotime('-1 days'));
	//$dt_fim = "20191114";
	$cd_parcial	= "1";
}
$dt_parcial = date("Y-m-d", strtotime($dt_fim));
//echo $dt_ini." - ".$dt_fim;

//busca pontuacao
$RSSP = oci_parse($oraconnect, "SELECT F2.F2_VEND1, A3.A3_SUPER, A5.A5_FORNECE,	SUM(((D2.D2_QUANT-D2.D2_QTDEDEV)/A5.A5_QTFRAC)*A5.A5_PROMVEN) AS TOTALFOR FROM SIGA.SA5010 A5, SIGA.SA3010 A3, SIGA.SD2010 D2, SIGA.SF2010 F2 WHERE A5.A5_FILIAL IN ('09','10') AND A5.A5_FORNECE IN ('F00001', 'F00002','F00003','F00004','F00010') AND A5.A5_LOJA BETWEEN ' ' AND 'ZZ' AND A5.A5_PRODUTO NOT IN ('003422-7','057123-4','003985-7','004176-8') AND A5.A5_PROMVEN > 0 AND A5.D_E_L_E_T_ <> '*' AND D2.D2_FILIAL = A5.A5_FILIAL AND D2.D2_COD = A5.A5_PRODUTO AND D2.D2_EMISSAO BETWEEN '".$dt_ini."' AND '".$dt_fim."' AND (D2.D2_QUANT - D2.D2_QTDEDEV) > 0 AND D2.D_E_L_E_T_ <> '*' AND F2.F2_FILIAL = A5.A5_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA AND F2.F2_VEND1 BETWEEN ' ' AND 'ZZZZ' AND F2.F2_VEND1 NOT IN ('000001','0150') AND F2.F2_EMISSAO BETWEEN '".$dt_ini."' AND '".$dt_fim."' AND F2.D_E_L_E_T_ <> '*' AND A3.A3_FILIAL = A5.A5_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND	A3.D_E_L_E_T_ <> '*' GROUP BY F2.F2_VEND1, A3.A3_SUPER, A5.A5_FORNECE ");
	oci_execute($RSSP,OCI_DEFAULT);
	while($RSP = oci_fetch_array($RSSP)){
		if(oci_num_rows($RSSP) >0){
			//ajusta codigo de fornecedor
			if($RSP['A5_FORNECE'] == "F00001"){
				$fornec = "000184";
			}else if($RSP['A5_FORNECE'] == "F00002"){
				$fornec = "000054";
			}else if($RSP['A5_FORNECE'] == "F00003"){
				$fornec = "000305";
			}else if($RSP['A5_FORNECE'] == "F00004"){
				$fornec = "000037";
			}else if($RSP['A5_FORNECE'] == "F00010"){
				$fornec = "000057";
			}
			
			//insere pontos
			mysql_query("insert into pontuacao(cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, cd_parcial, dt_data)values('".$RSP['F2_VEND1']."', '".$RSP['A3_SUPER']."', '".$fornec."', '".$RSP['TOTALFOR']."', '".$cd_parcial."', '".$dt_parcial."' )");
			
		}
	}
	
	mysql_query("update pontuacao set cd_codigo = '0236', cd_supervisor = '0112' where cd_codigo = '0338' and cd_supervisor = '0321' ");
	
	//alerta usuario
	echo "<script language='javascript'>alert('Processamento concluído com sucesso!');<script>";
	