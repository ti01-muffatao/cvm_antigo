<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from meta_individual where cd_meta = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_meta').value='".$RS["cd_meta"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_codigo').value='".$RS["cd_codigo"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_fornecedor').value='".$RS["cd_fornecedor"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_campanha').value='".$RS["cd_campanha"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('vl_metam').value='".$RS["vl_metam"]."';</script>";
	}
}
$vl_metam = str_replace("'","",$vl_metam);
$vl_metam = str_replace(",",".",$vl_metam);

//=======================		INCLUSÃO DOS DADOS
if($Tipo == "I"){
	$RSS = mysql_query("select cd_codigo from meta_individual where cd_codigo = '".$cd_codigo."' and cd_fornecedor = '".$cd_fornecedor."' and cd_campanha = '".$cd_campanha."' ", $conexao);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas esta META já esta cadastrado!!!');</script>";
	}else{
		$SQL = "insert into meta_individual (cd_campanha, cd_codigo, cd_fornecedor, vl_metam) values ('".$cd_campanha."', '".$cd_codigo."', '".$cd_fornecedor."', '".$vl_metam."')";
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}

//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){

	$RSS = mysql_query("select cd_codigo from meta_individual where cd_codigo = '".$cd_codigo."' and cd_fornecedor = '".$cd_fornecedor."' and cd_campanha = '".$cd_campanha."' and cd_meta <> '".$cd_meta."'", $conexao);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas esta META já esta sendo utilizada!!!');</script>";
	}else{
		$SQL = " update meta_individual set ";
		$SQL .= " cd_codigo = '".$cd_codigo."', ";
		$SQL .= " cd_fornecedor = '".$cd_fornecedor."', ";
		$SQL .= " cd_campanha = '".$cd_campanha."', ";
		$SQL .= " vl_metam = '".$vl_metam."' ";
		$SQL .= " where cd_meta = ". $cd_meta;
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}?>