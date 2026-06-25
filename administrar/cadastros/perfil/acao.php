<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO

if($Tipo == "D"){
	$RSS = mysql_query("select * from perfil where cd_perfil = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_perfil').value='".$RS["cd_perfil"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ds_perfil').value='".strtoupper($RS["ds_perfil"])."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad1').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad2').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad3').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad4').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad5').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad6').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad7').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad8').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad9').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad10').checked=false;</script>";
		if(substr($RS["ds_cadastros"],0,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad1').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],1,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad2').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],2,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad3').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],3,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad4').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],4,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad5').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],5,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad6').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],6,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad7').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],7,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad8').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],8,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad9').checked=true;</script>";}
		if(substr($RS["ds_cadastros"],9,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckcad10').checked=true;</script>";}

		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac1').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac2').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac3').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac4').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac5').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac6').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac7').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac8').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac9').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac10').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac11').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac12').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac13').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac14').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac15').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac16').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac17').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac18').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac19').checked=false;</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac20').checked=false;</script>";

		if(substr($RS["ds_acessos"],0,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac1').checked=true;</script>";}
		if(substr($RS["ds_acessos"],1,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac2').checked=true;</script>";}
		if(substr($RS["ds_acessos"],2,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac3').checked=true;</script>";}
		if(substr($RS["ds_acessos"],3,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac4').checked=true;</script>";}
		if(substr($RS["ds_acessos"],4,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac5').checked=true;</script>";}
		if(substr($RS["ds_acessos"],5,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac6').checked=true;</script>";}
		if(substr($RS["ds_acessos"],6,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac7').checked=true;</script>";}
		if(substr($RS["ds_acessos"],7,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac8').checked=true;</script>";}
		if(substr($RS["ds_acessos"],8,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac9').checked=true;</script>";}
		if(substr($RS["ds_acessos"],9,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac10').checked=true;</script>";}
		if(substr($RS["ds_acessos"],10,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac11').checked=true;</script>";}
		if(substr($RS["ds_acessos"],11,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac12').checked=true;</script>";}
		if(substr($RS["ds_acessos"],12,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac13').checked=true;</script>";}
		if(substr($RS["ds_acessos"],13,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac14').checked=true;</script>";}
		if(substr($RS["ds_acessos"],14,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac15').checked=true;</script>";}
		if(substr($RS["ds_acessos"],15,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac16').checked=true;</script>";}
		if(substr($RS["ds_acessos"],16,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac17').checked=true;</script>";}
		if(substr($RS["ds_acessos"],17,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac18').checked=true;</script>";}
		if(substr($RS["ds_acessos"],18,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac19').checked=true;</script>";}
		if(substr($RS["ds_acessos"],19,1) == 1)
			{echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('ckac20').checked=true;</script>";}
	}
}

//=======================		INCLUSÃO DOS DADOS
if($Tipo == "I"){

	$RSS = mysql_query("select ds_perfil from perfil where ds_perfil = '".$ds_perfil."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este PERFIL já esta cadastrado!!!');</script>";
	}else{
		$SQL = "insert into perfil (ds_perfil, ds_cadastros, ds_acessos) values ";
		$SQL .= "('".str_replace("'","",strtoupper($ds_perfil))."', '".$ds_cadastros."', '".$ds_acessos."')";
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}

//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){
	$RSS = mysql_query("select ds_perfil from perfil where ds_perfil = '".$ds_perfil."' and cd_perfil <> ".$cd_perfil." limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este PERFIL já esta sendo utilizado!!!');</script>";
	}else{
		$SQL = "update perfil set ";
		$SQL .= " ds_perfil='".str_replace("'","",strtoupper($ds_perfil))."', ";
		$SQL .= " ds_cadastros='".$ds_cadastros."', ";
		$SQL .= " ds_acessos='".$ds_acessos."' ";
		$SQL .= " where cd_perfil = ". $cd_perfil;
		mysql_query($SQL, $conexao);
		
		echo "<script language='javascript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}?>