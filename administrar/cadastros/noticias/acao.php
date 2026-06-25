<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from noticias where cd_noticia = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_noticia').value='".$RS["cd_noticia"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_noticia').value='".$RS["ds_noticia"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_titulo').value='".$RS["ds_titulo"]."';</script>";
	}
}
//=======================		INCLUSÃO DOS DADOS
if($Tipo == "I"){
	$SQL = "insert into noticias (ds_noticia, ds_titulo) values ";
	$SQL .= "('".str_replace("'","",strtoupper($ds_noticia))."', '".str_replace("'","",strtoupper($ds_titulo))."')";
	mysql_query($SQL, $conexao);
	
	echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}
//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$SQL = "update noticias set ";
	$SQL .= " ds_noticia = '".str_replace("'","",strtoupper($ds_noticia))."', ";
	$SQL .= " ds_titulo = '".str_replace("'","",strtoupper($ds_titulo))."' ";
	$SQL .= " where cd_noticia = ". $cd_noticia;
	mysql_query($SQL, $conexao);
	
	echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}?>