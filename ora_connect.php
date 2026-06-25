<?php 
include "conexao.php";
if($_SESSION["CD_TOKEN"] == ''){
		echo "<script language='javascript'>window.open('sair.php', '_self');</script>";
	}else{
		$ora_user	 = "oraweb";
		$ora_senha	 = "oraw38#!";
		$ora_host    = "oradb-scan.oradb";   
		$port        = "1521";    
		$server_name = "oradb";
		
		$banco = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=$ora_host)(PORT=$port)))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=$server_name )))";
		
		$oraconnect = oci_new_connect($ora_user, $ora_senha, $banco);
			if(!$oraconnect){
				echo "Sem conexão com banco de dados..."; 
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
}
?>