<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from t_pergunta where cd_pergunta = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_pergunta').value='".$RS["cd_pergunta"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_treinamento').value='".$RS["cd_treinamento"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_fornecedor').value='".$RS["cd_fornecedor"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_pergunta').value='".$RS["ds_pergunta"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('resposta1').value='".$RS["resposta1"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('resposta2').value='".$RS["resposta2"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('resposta3').value='".$RS["resposta3"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('resposta4').value='".$RS["resposta4"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_resposta').value='".$RS["cd_resposta"]."';</script>";
		
	}
}
//=======================		INCLUSÃO DOS DADOS
	if($Tipo == "I"){
	$SQL = "insert into t_pergunta (cd_treinamento, cd_fornecedor, ds_pergunta, resposta1, resposta2, resposta3, resposta4, cd_resposta) values ";
	$SQL .= "('".$cd_treinamento."', '".$cd_fornecedor."', '".$ds_pergunta."', '".$resposta1."', '".$resposta2."', '".$resposta3."', '".$resposta4."', '".$cd_resposta."')";
	mysql_query($SQL, $conexao);
	echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}

//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$SQL = "update t_pergunta set ";
	$SQL .= " cd_treinamento = '".$cd_treinamento."', ";
	$SQL .= " cd_fornecedor = '".$cd_fornecedor."', ";
	$SQL .= " ds_pergunta = '".$ds_pergunta."', ";
	$SQL .= " resposta1 = '".$resposta1."', ";
	$SQL .= " resposta2 = '".$resposta2."', ";
	$SQL .= " resposta3 = '".$resposta3."', ";
	$SQL .= " resposta4 = '".$resposta4."', ";
	$SQL .= " cd_resposta = '".$cd_resposta."' ";
	$SQL .= " where cd_pergunta = ". $cd_pergunta;
	mysql_query($SQL, $conexao);
	
	echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}

//=======================		EXCLUSÃO DOS DADOS
if($Tipo == "E"){
	mysql_query("delete from t_pergunta where cd_pergunta = '".$cd_pergunta."' ", $conexao);
	
	echo "<script language='javascript'>alert('Excluído com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}
?>