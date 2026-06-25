<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}

//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from t_treinamento where cd_treinamento = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_treinamento').value='".$RS["cd_treinamento"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_treinamento').value='".$RS["ds_treinamento"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('dt_ini').value='".date("d/m/Y", strtotime($RS["dt_ini"]))."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('dt_fim').value='".date("d/m/Y", strtotime($RS["dt_fim"]))."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_ativo').value='".$RS["ds_ativo"]."';</script>";
	}
}

//=======================		INCLUSÃO DOS DADOS
	if($Tipo == "I"){
	$SQL = "insert into t_treinamento (ds_treinamento, dt_ini, dt_fim, ds_ativo) values ";
	$SQL .= "('".str_replace("'","",strtoupper($ds_treinamento))."', '".DtBrToDtEua($dt_ini,3)."', '".DtBrToDtEua($dt_fim,3)."', '".str_replace("'","",strtoupper($ds_ativo))."')";
	mysql_query($SQL, $conexao);
	echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}

//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$SQL = "update t_treinamento set ";
	$SQL .= " ds_treinamento = '".str_replace("'","",strtoupper($ds_treinamento))."', ";
	$SQL .= " dt_ini = '".DtBrToDtEua($dt_ini,3)."', ";
	$SQL .= " dt_fim = '".DtBrToDtEua($dt_fim,3)."', ";
	$SQL .= " ds_ativo = '".str_replace("'","",strtoupper($ds_ativo))."' ";
	$SQL .= " where cd_treinamento = ". $cd_treinamento;
	mysql_query($SQL, $conexao);
	echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}

//=======================		EXCLUSÃO DOS DADOS
if($Tipo == "E"){
	mysql_query("delete from t_treinamento where cd_treinamento = '".$cd_treinamento."' ", $conexao);
	
	echo "<script language='javascript'>alert('Excluído com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}
?>