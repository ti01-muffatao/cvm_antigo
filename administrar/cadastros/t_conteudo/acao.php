<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from t_conteudo where cd_conteudo = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_conteudo').value='".$RS["cd_conteudo"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_treinamento').value='".$RS["cd_treinamento"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_fornecedor').value='".$RS["cd_fornecedor"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_informacoes').value='".$RS["ds_informacoes"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('video').value='".$RS["url_video"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('arquivo').value='".$RS["url_arquivo"]."';</script>";
		
	}
}
//=======================		INCLUSÃO DOS DADOS
	if($Tipo == "I"){
	$SQL = "insert into t_conteudo (cd_treinamento, cd_fornecedor, ds_informacoes, url_video, url_arquivo) values ";
	$SQL .= "('".$cd_treinamento."', '".$cd_fornecedor."', '".$ds_informacoes."', '".$video."', '".$arquivo."')";
	mysql_query($SQL, $conexao);
	echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}

//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$SQL = "update t_conteudo set ";
	$SQL .= " cd_treinamento = '".$cd_treinamento."', ";
	$SQL .= " cd_fornecedor = '".$cd_fornecedor."', ";
	$SQL .= " ds_informacoes = '".$ds_informacoes."', ";
	$SQL .= " url_video = '".$video."', ";
	$SQL .= " url_arquivo = '".$arquivo."' ";
	$SQL .= " where cd_conteudo = ". $cd_conteudo;
	mysql_query($SQL, $conexao);
	
	echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}

//=======================		EXCLUSÃO DOS DADOS
if($Tipo == "E"){
	mysql_query("delete from t_conteudo where cd_conteudo = '".$cd_conteudo."' ", $conexao);
	
	echo "<script language='javascript'>alert('Excluído com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}
?>