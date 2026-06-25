<?php include "conexao.php";
$TxCPF 		= str_replace("'","",$_GET["TxCPF"]);
$TxSenha	= str_replace("'","",$_GET["TxSenha"]);

$SQL = "select * from usuarios as u, perfil as p where u.cd_perfil = p.cd_perfil and u.ds_cpf = '". $TxCPF ."' and upper(u.ds_senha) = '". strtoupper($TxSenha) ."' and u.cd_ativo = 1";
$RSS = mysql_query($SQL, $conexao);
$RS = mysql_fetch_assoc($RSS);

if(mysql_num_rows($RSS) > 0){
	$_SESSION["CD_CPF"]			= $RS["ds_cpf"];
	$_SESSION["CD_USUARIO"]		= $RS["cd_usuario"];
	$_SESSION["DS_USUARIO"]		= strtoupper($RS["ds_usuario"]);
	$_SESSION["CD_PERFIL"]		= $RS["cd_perfil"];
	$_SESSION["DS_PERFIL"]		= strtoupper($RS["ds_perfil"]);
	$_SESSION["CD_GESTOR"]		= strtoupper($RS["cd_gestor"]);
	$_SESSION["PRF_CADASTROS"]	= $RS["ds_cadastros"];
	$_SESSION["PRF_RELATORIOS"]	= $RS["ds_relatorios"];

	echo "<script language='javascript'>window.open('menu.php', '_self');</script>";
}else{
	echo "<script language='javascript'>alert('Possíveis problemas para você não acessar: Usuário Inativo, Usuário não Cadastrado, Senha Incorreta. Contate o Administrador!');</script>";
	echo "<script language='javascript'>window.open('index.php', '_self');</script>";
}