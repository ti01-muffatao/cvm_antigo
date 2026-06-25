<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_parcial" id="cd_parcial" value="">
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr>
	<td>Data:</td>
	<td colspan="3"><input type="text" id="dt_data" name="dt_data" OnKeyPress="Formata(this, '##/##/####')" class="selectboxnormal" size="12" value="" maxlength="10" style="<?php echo $objetos;?>"></td>
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
  	var cdparcial	= document.getElementById('cd_parcial').value;
  	var dtdata		= document.getElementById('dt_data').value;
	var cdcampanha	= document.getElementById('cd_campanha').value;

	if(dtdata == ''){alert("Campo DATA DA PARCIAL Obrigatório!!!");document.getElementById('dt_data').focus();}
	else if(cdcampanha == ''){alert("Campo CAMPANHA Obrigatório!!!");document.getElementById('cd_campanha').focus();}
	else{
		if(cdparcial == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_parcial='+cdparcial+'&cd_campanha='+cdcampanha+'&dt_data='+dtdata, "acao");
	}
}
</script>