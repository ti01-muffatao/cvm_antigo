<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}

$aceite = $_POST['cd_aceite'];
if(isset($_POST['cd_aceite'])){
	mysql_query("update usuarios set cd_aceite = '".$aceite."' where cd_usuario = '".$_SESSION['CD_USUARIO']."' and cd_ativo = 1  ",$conexao);
}