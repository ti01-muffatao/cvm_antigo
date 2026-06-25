<?php
$conexao = mysql_connect("localhost", "admin", "mu125030", true) 
    or die("Erro conexão 2: " . mysql_error()); 
mysql_select_db("mu_atacado", $conexao) or die(mysql_error());
mysql_set_charset('UTF8', $conexao);
?>