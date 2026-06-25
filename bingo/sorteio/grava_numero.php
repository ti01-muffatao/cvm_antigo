<?php
header('Content-type: application/json');
include "../../administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){
	echo "<script language='javascript'>window.open('../../sair.php', '_self');</script>";
}

if(isset($_POST['cd_codigo'])) {
	$cd_codigo 	= $_POST['cd_codigo'];
   $cd_numero 	= $_POST['cd_numero'];
   $cd_cartela = $_POST['cd_cartela'];
   $cd_bingo 	= $_POST['cd_bingo'];

	//selecionar bingo e numero para verificar se pedra foi sorteada
	$RSS = mysql_query("select * from bin_numeros_sorteados where cd_bingo = '".$cd_bingo."' and cd_numero = '".$cd_numero."'  ", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if (mysql_num_rows($RSS) >0) {

		$RSST = mysql_query("select * from bin_salva_numero where cd_codigo = '".$cd_codigo."' and cd_bingo = '".$cd_bingo."' and cd_numero = '".$cd_numero."' and cd_cartela = '".$cd_cartela."' ");

		if (mysql_num_rows($RSST) >0) {
			$response_array['status'] = 'error';
			echo json_encode($response_array);
			exit();
		}

		mysql_query("insert into bin_salva_numero (cd_codigo, cd_cartela, cd_bingo, cd_numero)
			values('".$cd_codigo."','".$cd_cartela."','".$cd_bingo."','".$cd_numero."' )", $conexao);
		   if (mysql_affected_rows()>0) {
			   $response_array['status'] = 'ok';
			   echo json_encode($response_array);
		   }


	}else{
		$response_array['status'] = 'error';
		echo json_encode($response_array);
	}

}
?>