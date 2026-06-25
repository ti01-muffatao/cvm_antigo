<?php
include "../administrar/conexao.php";
if($_SESSION["CD_USUARIO"] != "1" || $_SESSION["CD_USUARIO"] == ""){
	echo "<script language='javascript'>window.open('../sair.php', '_self');</script>";
}

//busca usuarios 
$RSSC = mysql_query("select cd_codigo, ds_usuario, cd_cartela_geral as GERAL, cd_cartela_ouro as OURO, SUM(cd_cartela_prata_nov + cd_cartela_prata_dez + cd_cartela_prata_jan + cd_cartela_prata_fev) as PRATA FROM usuarios where cd_perfil = '4' and cd_ativo = 1 group by cd_codigo, ds_usuario order by cd_codigo asc ", $conexao);
while ($RSC = mysql_fetch_array($RSSC)) {

	$RSS = mysql_query("select * from bin_cartelas where cd_codigo = '".$RSC['cd_codigo']."' ");
	$RS = mysql_fetch_assoc($RSS);
	if (mysql_num_rows($RSS) >0) {
		exit();
	}

	echo $RSC['ds_usuario']."| Geral: ".$RSC['GERAL']." Ouro: ".$RSC['OURO']." | Prata: ".$RSC['PRATA']."<BR>";

	//criar cartelas ouro **bingo 1
	for ($o=0; $o < $RSC['OURO']; $o++) { 
		mysql_query("insert into bin_cartelas (cd_codigo, cd_bingo)values('".$RSC['cd_codigo']."', 1 )");
	}

	//criar cartelas prata **bingo 2
	for ($p=0; $p < $RSC['PRATA']; $p++) { 
		mysql_query("insert into bin_cartelas (cd_codigo, cd_bingo)values('".$RSC['cd_codigo']."', 2 )");
	}

	//criar cartelas geral **bingo 3
	for ($g=0; $g < $RSC['GERAL']; $g++) { 
		mysql_query("insert into bin_cartelas (cd_codigo, cd_bingo)values('".$RSC['cd_codigo']."', 3 )");
	}

}

?>