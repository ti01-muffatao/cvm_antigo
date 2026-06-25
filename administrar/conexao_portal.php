<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
date_default_timezone_set('America/Fortaleza');

$conexaoportal = mysql_connect("localhost", "admin", "mu125030");
mysql_select_db("mu_campanhaverao", $conexaoportal) or print(mysql_error());
mysql_set_charset("utf8");


//TÍTULO 	- VARIÁVEL QUE LEVA O TÍTULO DA PÁGINA
$Titulo = "18ª Campanha De Verão Muffatão";

//FUNDO		- VARIÁVEL QUE TIRA TODOS OS ESPAÇOS DAS MARGENS E COLOCA O FUNDO DAS TELAS NA COR DE FACE DE BOTÃO
$Fundo		= "margin:0px;  background:#F5F5F5;";
$Fundo2		= "margin:0px;  background:#ffffff;";
$cabecalho	= "bgcolor='#B7C8DF' style='color: #000000;'";
$objetos	= "background: #B5DEFF;";

?>