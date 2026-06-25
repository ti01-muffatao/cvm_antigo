<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_meta" id="cd_meta" value="">
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
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
 	<td>Usuário:</td>
	<td colspan="3">
	<select id="cd_codigo" name="cd_codigo" class="selectboxnormal" style="width: 5l0; height: 18; font-size: 8 pt;<?php echo $objetos;?>">
	<OPTION VALUE="">- Usuários -</OPTION>
	<?php $RSS = mysql_query("select * from usuarios where cd_cargo in(2,3) order by ds_usuario asc", $conexao);
	while($RS = mysql_fetch_array($RSS)){	
		echo "<OPTION VALUE='" . $RS["cd_codigo"] . "'";
		if ($cd_usuario == $RS["cd_codigo"]){ echo " selected"; }
		echo ">" . $RS["ds_usuario"] . "</OPTION>";
	}?>
	</select>
	</td>
</tr>
<tr>
 	<td>Fornecedor:</td>
	<td colspan="3">
	<select id="cd_fornecedor" name="cd_fornecedor" class="selectboxnormal" style="width: 5l0; height: 18; font-size: 8 pt;">
	<OPTION VALUE="0">- Fornecedores -</OPTION>
	<?php $RSS = mysql_query("select * from clifor order by ds_razao asc", $conexao);
	while($RS = mysql_fetch_array($RSS)){	
		echo "<OPTION VALUE='" . $RS["cd_fornecedor"] . "'";
		if ($cd_fornecedor == $RS["cd_fornecedor"]){ echo " selected"; }
		echo ">" . $RS["ds_razao"] . "</OPTION>";
	}?>
	</select>
	</td>
</tr>
<tr>
	<td>Meta:</td>
	<td><input type="text" class="selectboxnormal" id="vl_metam" name="vl_metam" size="14" value="" maxlength="10" style="<?php echo $objetos;?>"></td>
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
  	var cdmeta		= document.getElementById('cd_meta').value;
  	var cdcodigo	= document.getElementById('cd_codigo').value;
	var cdfornecedor= document.getElementById('cd_fornecedor').value;
	var cdcampanha	= document.getElementById('cd_campanha').value;
	var vlmetam	= document.getElementById('vl_metam').value;

	if(cdcodigo== ''){alert("Campo USUÁRIO Obrigatório!!!");document.getElementById('cd_codigo').focus();}
	else if(cdcampanha == ''){alert("Campo CAMPANHA Obrigatório!!!");document.getElementById('cd_campanha').focus();}
	else if(vlmetam == ''){alert("Campo META Obrigatório!!!");document.getElementById('vl_metam').focus();}
	else{
		if(cdmeta == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_meta='+cdmeta+'&cd_codigo='+cdcodigo+'&cd_fornecedor='+cdfornecedor+'&cd_campanha='+cdcampanha+'&vl_metam='+vlmetam, "acao");
	}
}
</script>