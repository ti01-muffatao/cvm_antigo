<?php 
   include "../../conexao.php";
   if($_SESSION["CD_USUARIO"] == ""){
      echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";
   }
//=======================		CARREGA DADOS NO FORMULARIO
   if($Tipo == "D"){
	   $RSS = mysql_query("select * from campanhas where cd_campanha = '".$Codigo."' limit 1", $conexao);
	   $RS = mysql_fetch_assoc($RSS);
      if(mysql_num_rows($RSS) > 0){
         echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_campanha').value='".$RS["cd_campanha"]."';</script>";
         echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_campanha').value='".$RS["ds_campanha"]."';</script>";
         echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_ano').value='".$RS["cd_ano"]."';</script>";
      }
   }
//=======================		INCLUS�O DOS DADOS
if($Tipo == "I"){
	$SQL = "insert into campanhas (ds_campanha, cd_ano) values ";
	$SQL .= "('".str_replace("'","",strtoupper($ds_campanha))."', '".$cd_ano."')";
	mysql_query($SQL, $conexao);
	echo "<script language='javascript'>alert('Opera��o realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}
//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$SQL = "update campanhas set ";
	$SQL .= " ds_campanha = '".str_replace("'","",strtoupper($ds_campanha))."', ";
	$SQL .= " cd_ano = '".$cd_ano."' ";
	$SQL .= " where cd_campanha = ". $cd_campanha;
	mysql_query($SQL, $conexao);
	echo "<script language='javascript'>alert('Opera��o realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
}?>