<?php
include "../../conexao.php";

//$SQL = "UPDATE meta_individual SET vl_metam = '350000' WHERE cd_codigo = '0305' AND cd_fornecedor = '000184'";
//$SQL = "UPDATE meta_individual SET vl_metam = '420000' WHERE cd_codigo = '0305' AND cd_fornecedor = '000037'";
$SQL = "UPDATE meta_individual SET vl_metam = '130000' WHERE cd_codigo = '0313' AND cd_fornecedor = '000184'";
mysql_query($SQL, $conexao);

$SQL = "UPDATE meta_individual SET vl_metam = '320000' WHERE cd_codigo = '0313' AND cd_fornecedor = '000037'";
mysql_query($SQL, $conexao);

$SQL = "UPDATE meta_individual SET vl_metam = '320000' WHERE cd_codigo = '0313' AND cd_fornecedor = '000305'";
mysql_query($SQL, $conexao);

//$RSS = mysql_query("SELECT * FROM meta_individual", $conexao);

//while($RS = mysql_fetch_array($RSS)) {
//  echo "Valor Meta: " . $RS['vl_metam'] . "<br>";
//}


?>