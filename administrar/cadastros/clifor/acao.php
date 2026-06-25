<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from clifor where cd_clifor = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_clifor').value='".$RS["cd_clifor"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_razao').value='".$RS["ds_razao"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_fornecedor').value='".$RS["cd_fornecedor"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_obs').value='".$RS["ds_observacao"]."';</script>";
	}
}
//=======================		INCLUSÃO DOS DADOS
if($Tipo == "I"){
	$RSS = mysql_query("select ds_razao from clifor where ds_razao = '".$ds_razao."' and cd_fornecedor = '".$cd_fornecedor."' ", $conexao);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este FORNECEDOR já esta cadastrado!!!');</script>";
	}else{
		$SQL = "insert into clifor (ds_razao, cd_fornecedor, ds_observacao, cd_usercad)values('".str_replace("'","",strtoupper($ds_razao))."', '".$cd_fornecedor."', '".str_replace("'","",strtoupper($ds_obs))."', '".$_SESSION["CD_USUARIO"]."')";
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}
//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$RSS = mysql_query("select ds_razao from clifor where ds_razao = '".$ds_razao."' and cd_clifor <> '".$cd_clifor."'", $conexao);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este FORNECEDOR já esta sendo utilizado!!!');</script>";
	}else{
		$SQL = " update clifor set ";
		$SQL .= " ds_razao = '".str_replace("'","",strtoupper($ds_razao))."', ";
		$SQL .= " cd_fornecedor = '".$cd_fornecedor."', ";
		$SQL .= " ds_observacao = '".str_replace("'","",strtoupper($ds_obs))."', ";
		$SQL .= " cd_useralt = '".$_SESSION["CD_USUARIO"]."', ";
		$SQL .= " dt_useralt = CURRENT_TIMESTAMP() ";
		$SQL .= " where cd_clifor = ". $cd_clifor;
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}?>