<?php include "administrar/conexao.php";

$TxCPF 		= str_replace("'","",$_GET["TxCPF"]);
$TxSenha	= str_replace("'","",$_GET["TxSenha"]);

	$SQL = "select * from usuarios as u, perfil as p where u.cd_perfil = p.cd_perfil and u.ds_cpf = '".$TxCPF."' and u.ds_senha = '".strtoupper($TxSenha)."' and u.cd_ativo = 1";
	$RSS = mysql_query($SQL, $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		$_SESSION["CD_CPF"]			= $RS["ds_cpf"];
		$_SESSION["CD_USUARIO"]		= $RS["cd_usuario"];
		$_SESSION["DS_USUARIO"]		= strtoupper($RS["ds_usuario"]);
		$_SESSION["CD_PERFIL"]		= $RS["cd_perfil"];
		$_SESSION["DS_PERFIL"]		= strtoupper($RS["ds_perfil"]);
		$_SESSION["CD_GRUPO"]		= $RS["cd_grupo"];
		$_SESSION["CD_GESTOR"]		= $RS["cd_gestor"];
		$_SESSION["DS_GRUPO"]		= strtoupper($RS["ds_grupo"]);
		$_SESSION["PRF_CADASTROS"]	= $RS["ds_cadastros"];
		$_SESSION["PRF_RELATORIOS"]	= $RS["ds_relatorios"];
		$_SESSION["CD_CODIGO"]		= $RS["cd_codigo"];
		$_SESSION["CD_FILIAL"]		= $RS["cd_filial"];
		$_SESSION["CD_ATIVO"]		= $RS["cd_ativo"];

		mysql_query("insert into log(cd_codigo)values('".$RS["cd_codigo"]."')");
			
		echo "<script language='javascript'>window.open('index.php', '_self');</script>";
		
	}else{
		echo "<script language='javascript'>alert('Possíveis problemas para você não acessar: Usuário Inativo, Usuário não Cadastrado, Senha Incorreta. Contate o Administrador!');</script>";
		echo "<script language='javascript'>window.open('login.php', '_self');</script>";
	}
	//SESS�O GRUPOS
	$SQL = "select * from usuarios as u, grupos as g where u.cd_grupo = g.cd_grupo and u.ds_cpf = '". $TxCPF ."' and upper(u.ds_senha) = '". strtoupper($TxSenha) ."' and u.cd_ativo = 1";
	$RSS = mysql_query($SQL, $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		$_SESSION["CD_CPF"]			= $RS["ds_cpf"];
		$_SESSION["CD_USUARIO"]		= $RS["cd_usuario"];
		$_SESSION["DS_USUARIO"]		= strtoupper($RS["ds_usuario"]);
		$_SESSION["CD_GRUPO"]		= $RS["cd_grupo"];
		$_SESSION["DS_GRUPO"]		= strtoupper($RS["ds_grupo"]);
	}
	//SESS�O ESTADO
	$SQL = "select * from usuarios as u, estados as e where u.cd_estado = e.cd_estado and u.ds_cpf = '". $TxCPF ."' and upper(u.ds_senha) = '". strtoupper($TxSenha) ."' and u.cd_ativo = 1";
	$RSS = mysql_query($SQL, $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		$_SESSION["CD_CPF"]			= $RS["ds_cpf"];
		$_SESSION["CD_USUARIO"]		= $RS["cd_usuario"];
		$_SESSION["DS_USUARIO"]		= strtoupper($RS["ds_usuario"]);
		$_SESSION["CD_ESTADO"]		= $RS["cd_estado"];
		$_SESSION["DS_ESTADO"]		= strtoupper($RS["ds_estado"]);
	}

	//SESSAO CODIGO
	$SQL = "select * from usuarios as u, perfil as p where u.cd_perfil = p.cd_perfil and u.ds_cpf = '". $TxCPF ."' and upper(u.ds_senha) = '". strtoupper($TxSenha) ."' and u.cd_ativo = 1";
	$RSS = mysql_query($SQL, $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		$_SESSION["CD_CPF"]			= $RS["ds_cpf"];
		$_SESSION["CD_USUARIO"]		= $RS["cd_usuario"];
	}

	//SESSAO TREINAMENTO OK
	$SQL = "select * from usuarios as u, treinamento as t where t.cd_codigo = u.cd_codigo and u.ds_cpf = '". $TxCPF ."' and upper(u.ds_senha) = '". strtoupper($TxSenha) ."' and u.cd_ativo = 1 and u.cd_treinamento = 1";
	$RSS = mysql_query($SQL, $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		$_SESSION["CD_CPF"]			= $RS["ds_cpf"];
		$_SESSION["CD_USUARIO"]		= $RS["cd_usuario"];
		$_SESSION["TREINAMENTO_OK"]		= $RS["cd_codigo"];
	}