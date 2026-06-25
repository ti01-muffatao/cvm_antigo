<?php
include "../administrar/conexao.php";
if($_SESSION["CD_USUARIO"] != "1" || $_SESSION["CD_USUARIO"] == ""){
	echo "<script language='javascript'>window.open('../sair.php', '_self');</script>";
}

function geraNumerosB($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function geraNumerosI($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function geraNumerosN($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function geraNumerosG($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function geraNumerosO($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
//echo UniqueRandomNumbersWithinRange(1,15,5);

//busca cartelas totais e gera numeros
$RSSC = mysql_query("select * from bin_cartelas order by cd_codigo asc ", $conexao);
while ($RSC = mysql_fetch_array($RSSC)) {

	$numsB = implode(",", geraNumerosB(1,15,5));//min, max, tam
	$numsI = implode(",", geraNumerosB(16,30,5));
	$numsN = implode(",", geraNumerosB(31,45,5));
	$numsG = implode(",", geraNumerosB(46,60,5));
	$numsO = implode(",", geraNumerosB(61,75,5));

	//echo $RSC['cd_codigo']."| Cartela: ".$RSC['cd_cartela']." | Bingo: ".$RSC['cd_bingo']."<BR>";

	mysql_query("insert into bin_numeros_cartela (cd_codigo, cd_cartela, cd_bingo, numeros_b, numeros_i, numeros_n, numeros_g, numeros_o)values('".$RSC['cd_codigo']."', '".$RSC['cd_cartela']."', '".$RSC['cd_bingo']."', '".$numsB."', '".$numsI."', '".$numsN."', '".$numsG."', '".$numsO."' ) ");
}
?>