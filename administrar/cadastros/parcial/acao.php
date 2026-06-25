<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
//=======================		CARREGA DADOS NO FORMULARIO
if($Tipo == "D"){
	$RSS = mysql_query("select * from parcial where cd_parcial = '".$Codigo."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) > 0){
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_parcial').value='".$RS["cd_parcial"]."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('dt_data').value='".date("d/m/Y", strtotime($RS["dt_data"]))."';</script>";
		echo "<script language='javascript'>window.parent.frames['Formulario'].document.getElementById('cd_campanha').value='".$RS["cd_campanha"]."';</script>";
	}
}
//=======================		INCLUSÃO DOS DADOS
if($Tipo == "I"){
	$RSS = mysql_query("select cd_parcial from parcial where date_format(dt_data, '%d/%m/%Y') = '".$dt_data."' and cd_campanha = '".$cd_campanha."' ", $conexao);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas esta PARCIAL já esta cadastrada!!!');</script>";
	}else{
		$SQL = "insert into parcial (dt_data, cd_campanha)values('".DtBrToDtEua($dt_data,3)."', '".$cd_campanha."')";
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}

//=======================		ALTERACAO DOS DADOS
if($Tipo == "A"){

	$RSS = mysql_query("select cd_parcial from parcial where date_format(dt_data, '%d/%m/%Y') = '".$dt_data."' and cd_campanha = '".$cd_campanha."' and cd_parcial <> '".$cd_parcial."'", $conexao);
	if(mysql_num_rows($RSS) > 0){
		echo"<script language='JavaScript'>alert('Desculpe mas este GRUPO já esta sendo utilizado!!!');</script>";
	}else{
		$SQL = " update parcial set ";
		$SQL .= " dt_data = '".DtBrToDtEua($dt_data,3)."', ";
		$SQL .= " cd_campanha = '".$cd_campanha."' ";
		$SQL .= " where cd_parcial = ". $cd_parcial;
		mysql_query($SQL, $conexao);
		
		echo "<script language='JavaScript'>alert('Operação realizada com sucesso.');window.open('lista.php', 'Lista');window.parent.frames['Formulario'].Novo();</script>";
	}
}?>