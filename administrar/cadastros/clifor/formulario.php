<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_clifor" id="cd_clifor" value="">
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr>
	<td>Nome Fornecedor:</td>
	<td colspan="3"><input type="text" id="ds_razao" name="ds_razao" class="selectboxnormal" size="60" value="" maxlength="100" style="<?php echo $objetos;?>"></td>
</tr>
<tr>
	<td>Código Fornecedor:</td>
	<td colspan="3"><input type="text" id="cd_fornecedor" name="cd_fornecedor" class="selectboxnormal" size="10" value="" maxlength="6" style="<?php echo $objetos;?>"></td>
</tr>
<tr> 
	<td valign="top">Observações:</td>
	<td colspan="3"><textarea id="ds_obs" name="ds_obs" class="selectboxnormal" cols="50" rows="3"></textarea></td>
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
  	var cdclifor= document.getElementById('cd_clifor').value;
	var dsrazao	= document.getElementById('ds_razao').value;
	var cdfornecedor	= document.getElementById('cd_fornecedor').value;
	var obs		= document.getElementById('ds_obs').value;
	if(dsrazao == ''){alert("Campo RAZÃO SOCIAL Obrigatório!!!");document.getElementById('ds_razao').focus();}
	else if(cdfornecedor == ''){alert("Campo CÓDIGO FORNECEDOR Obrigatório!!!");document.getElementById('cd_fornecedor').focus();}
	else{
		if(cdclifor == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_clifor='+cdclifor+'&ds_razao='+dsrazao+'&cd_fornecedor='+cdfornecedor+'&ds_obs='+obs, "acao");
	}
}
</script>