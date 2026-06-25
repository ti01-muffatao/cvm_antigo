<?php
$conexao = mysql_connect("localhost", "admin", "mu125030") or print (mysql_error());
mysql_select_db("mu_campanhaverao", $conexao) or print(mysql_error());
mysql_set_charset('UTF8', $conexao);
?>