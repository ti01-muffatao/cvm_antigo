<?php 
// CONGELAMENTO DA CAMPANHA (TRAVA)
die('Rotina congelada - Fim da campanha. Travado inativacao.');

//evita uma chamada via navegador
if (isset($_SERVER['REMOTE_ADDR'])){
	die( 'Esta ação não é permitida!' );
	exit();
}
include "administrar/conexao.php";

//INATIVA VENDEDORES SEM ACEITE DA CAMPANHA
$RSSA = mysql_query("select * from usuarios where cd_perfil = 4 and cd_aceite = 0 ",$conexao);
while($RSA = mysql_fetch_array($RSSA)){
	
	$data_cadastro 	= $RSA['dt_cadastro'];
	$data_atual	 	= date("Y-m-d H:i:s");
	
	// converte as datas para o formato timestamp
	$d1 = strtotime($data_cadastro); 
	$d2 = strtotime($data_atual);
	
	// verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
	$dias = round(($d2 - $d1) /86400);
	// caso a data 2 seja menor que a data 1
	if($dias > 10){
		//echo "esta fora <br>";
		mysql_query("update usuarios set cd_ativo = 0, ds_obs = 'Inativo por não aceite na campanha' where cd_codigo = '".$RSA['cd_codigo']."' ");
	}
}
?>