<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from usuarios where cd_usuario = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_usuario').value='".$RS["cd_usuario"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_usuario').value='".$RS["ds_usuario"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_cpf').value='".$RS["ds_cpf"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_senha').value='".$RS["ds_senha"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_perfil').value='".$RS["cd_perfil"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_grupo').value='".$RS["cd_grupo"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_cargo').value='".$RS["cd_cargo"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_estado').value='".$RS["cd_estado"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('consultor').value='".$RS["consultor"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_supervisor').value='".$RS["cd_supervisor"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_codigo').value='".$RS["cd_codigo"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ativo').checked=false;</script>";
		if($RS["cd_ativo"] == "1"){echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ativo').checked=true;</script>";}
		}
}
//=======================		INCLUSÃO DOS DADOS
if($Tipo == "I"){
	$RSS = mysql_query("select ds_cpf from usuarios where ds_cpf = '".$ds_cpf."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	/*if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este CPF já esta cadastrado!!!');</script>";
	}else{*/
		$SQL = "insert into usuarios (ds_usuario, ds_cpf, ds_senha, cd_ativo, cd_perfil, cd_cargo, cd_grupo, cd_estado, consultor, cd_supervisor, cd_codigo) values ";
		$SQL .= "('".str_replace("'","",strtoupper($ds_usuario))."','".str_replace("'","",strtoupper($ds_cpf))."','".str_replace("'","",strtoupper($ds_senha))."','".$cd_ativo."','".$cd_perfil."','".$cd_cargo."', '".$cd_grupo."', '".$cd_estado."', '".$consultor."', '".$cd_supervisor."', '".str_replace("'","",$cd_codigo)."')";
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
//}
//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$RSS = mysql_query("select ds_cpf from usuarios where ds_cpf = '".$ds_cpf."' and cd_usuario <> ".$cd_usuario." limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	/*if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este CPF já esta sendo utilizado!!!');</script>";
	}else{*/
		$SQL = "update usuarios set ";
		$SQL .= " ds_usuario='".str_replace("'","",strtoupper($ds_usuario))."', ";
		$SQL .= " ds_cpf='".str_replace("'","",strtoupper($ds_cpf))."', ";
		$SQL .= " ds_senha='".str_replace("'","",strtoupper($ds_senha))."', ";
		$SQL .= " cd_estado='".$cd_estado."', ";
		$SQL .= " cd_cargo='".$cd_cargo."', ";
		$SQL .= " cd_grupo='".$cd_grupo."', ";
		$SQL .= " consultor='".$consultor."', ";
		$SQL .= " cd_supervisor='".$cd_supervisor."', ";
		$SQL .= " cd_codigo='".str_replace("'","",$cd_codigo)."', ";
		$SQL .= " cd_ativo='".$cd_ativo."', ";
		$SQL .= " cd_perfil='".$cd_perfil."' ";
		$SQL .= " where cd_usuario = ". $cd_usuario;
		mysql_query($SQL, $conexao);
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
?>