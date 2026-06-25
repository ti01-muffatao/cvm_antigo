<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_grupo" id="cd_grupo" value="">
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr>
	<td>Nome Grupo:</td>
	<td colspan="3"><input type="text" id="ds_grupo" name="ds_grupo" class="selectboxnormal" size="30" value="" maxlength="100" style="<?php echo $objetos;?>"></td>
</tr>
<tr>
 	<td>Estado:</td>
	<td colspan="3">
	<select id="cd_estado" name="cd_estado" class="selectboxnormal" style="width: 5l0; height: 18; font-size: 8 pt;">
	<OPTION VALUE="0">- Estados -</OPTION>
	<?php $RSS = mysql_query("select * from estados order by ds_estado asc", $conexao);
	while($RS = mysql_fetch_array($RSS)){	
		echo "<OPTION VALUE='" . $RS["cd_estado"] . "'";
		if ($cd_estado == $RS["cd_estado"]){ echo " selected"; }
		echo ">" . $RS["ds_estado"] . "</OPTION>";
	}?>
	</select>
	</td>
</tr>
<tr>
 	<td>Campanha:</td>
	<td colspan="3">
	<select id="cd_campanha" name="cd_campanha" class="selectboxnormal" style="width: 5l0; height: 18; font-size: 8 pt;<?php echo $objetos;?>">
	<OPTION VALUE="">- Campanhas -</OPTION>
	<?php $RSS = mysql_query("select * from campanhas order by ds_campanha asc", $conexao);
	while($RS = mysql_fetch_array($RSS)){	
		echo "<OPTION VALUE='" . $RS["cd_campanha"] . "'";
		if ($cd_campanha == $RS["cd_campanha"]){ echo " selected"; }
		echo ">" . $RS["ds_campanha"] . "</OPTION>";
	}?>
	</select>
	</td>
</tr>
<tr>
	<td>Meta Geral:</td>
	<td><input type="text" class="selectboxnormal" id="vl_metag" name="vl_metag" size="14" value="" maxlength="12" style="<?php echo $objetos;?>"></td>
	<td>Meta Mín.:</td>
	<td><input type="text" class="selectboxnormal" id="vl_metam" name="vl_metam" size="14" value="" maxlength="10"></td>
</tr>
</table>
<br>
<div align="center">
	<input type="button" value="Salvar" id="BtSalvar" name="BtSalvar" onClick="JavaScript: Salvar();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80">
	<input type="button" value="Novo" id="BtNovo" name="BtNovo" onClick="javascript: Novo();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80">
	<br>
</div>
</body>
</html>
<script language="javascript">
function Novo(){
	window.open('formulario.php', "_self");
}
function Salvar(){
  	var cdgrupo	= document.getElementById('cd_grupo').value;
  	var dsgrupo	= document.getElementById('ds_grupo').value;
	var cdestado= document.getElementById('cd_estado').value;
	var cdcampanha= document.getElementById('cd_campanha').value;
	var vlmetag	= document.getElementById('vl_metag').value;
	var vlmetam	= document.getElementById('vl_metam').value;
	if(dsgrupo== ''){alert("Campo NOME DO GRUPO Obrigatório!!!");document.getElementById('ds_grupo').focus();}
	else if(cdcampanha == ''){alert("Campo CAMPANHA Obrigatório!!!");document.getElementById('cd_campanha').focus();}
	else if(vlmetag == ''){alert("Campo META GERAL Obrigatório!!!");document.getElementById('vl_metag').focus();}
	else{
		if(cdgrupo == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_grupo='+cdgrupo+'&ds_grupo='+dsgrupo+'&cd_estado='+cdestado+'&cd_campanha='+cdcampanha+'&vl_metag='+vlmetag+'&vl_metam='+vlmetam, "acao");
	}
}
</script>