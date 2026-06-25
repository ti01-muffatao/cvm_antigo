<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from grupos where cd_grupo = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_grupo').value='".$RS["cd_grupo"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_grupo').value='".$RS["ds_grupo"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_estado').value='".$RS["cd_estado"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_campanha').value='".$RS["cd_campanha"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('vl_metag').value='".$RS["vl_metag"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('vl_metam').value='".$RS["vl_metam"]."';</script>";
	}
}
$vl_metag = str_replace("'","",$vl_metag);
$vl_metag = str_replace(",",".",$vl_metag);
if($vl_metam == ""){$vl_metam = 0;}
$vl_metam = str_replace("'","",$vl_metam);
$vl_metam = str_replace(",",".",$vl_metam);
//=======================		INCLUSÃO DOS DADOS
if($Tipo == "I"){
	$RSS = mysql_query("select ds_grupo from grupos where ds_grupo = '".$ds_grupo."' and cd_estado = '".$cd_estado."' and cd_campanha = '".$cd_campanha."' ", $conexao);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este GRUPO já esta cadastrado!!!');</script>";
	}else{
		$SQL = "insert into grupos (ds_grupo, cd_estado, cd_campanha, vl_metag, vl_metam) values ('".str_replace("'","",strtoupper($ds_grupo))."', '".$cd_estado."', '".$cd_campanha."', '".$vl_metag."', '".$vl_metam."')";
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}
//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$RSS = mysql_query("select ds_grupo from grupos where ds_grupo = '".$ds_grupo."' and cd_estado = '".$cd_estado."' and cd_campanha = '".$cd_campanha."' and cd_grupo <> '".$cd_grupo."'", $conexao);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este GRUPO já esta sendo utilizado!!!');</script>";
	}else{
		$SQL = " update grupos set ";
		$SQL .= " ds_grupo = '".str_replace("'","",strtoupper($ds_grupo))."', ";
		$SQL .= " cd_estado = '".$cd_estado."', ";
		$SQL .= " cd_campanha = '".$cd_campanha."', ";
		$SQL .= " vl_metag = '".$vl_metag."', ";
		$SQL .= " vl_metam = '".$vl_metam."' ";
		$SQL .= " where cd_grupo = ". $cd_grupo;
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}?>