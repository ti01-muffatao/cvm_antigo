<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
//evita uma chamada via navegador
if (isset($_SERVER['REMOTE_ADDR'])){
  die( 'Esta ação não é permitida!' );
  exit();
} 
$conexao = mysql_connect("localhost", "admin", "mu125030");
mysql_select_db("mu_campanhaverao", $conexao) or print(mysql_error());
mysql_set_charset("utf8");


//TÍTULO 	- VARIÁVEL QUE LEVA O TÍTULO DA PÁGINA
$Titulo = "18ª Campanha De Verão Muffatão";

//FUNDO		- VARIÁVEL QUE TIRA TODOS OS ESPAÇOS DAS MARGENS E COLOCA O FUNDO DAS TELAS NA COR DE FACE DE BOTÃO
$Fundo		= "margin:0px;  background:#F5F5F5;";
$Fundo2		= "margin:0px;  background:#ffffff;";
$cabecalho	= "bgcolor='#B7C8DF' style='color: #000000;'";
$objetos	= "background: #B5DEFF;";

//DATA DA ULTIMA PARCIAL
$SQL = "select dt_data as data from pontuacao order by dt_data desc limit 1";
$RSS = mysql_query($SQL, $conexao);
while($RS = mysql_fetch_array($RSS)){
$UltimaParcial = date("d-m-Y", strtotime($RS["data"])-1);	
}

//STARTANDO AS SESSÕES CARREGADAS
session_start();
include "funcoesjs.php";
include "funcoesphp.php";
include "funcoes.php";
?>