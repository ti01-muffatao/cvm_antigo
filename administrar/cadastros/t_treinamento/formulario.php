<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_treinamento" id="cd_treinamento" value="" >
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr> 
  <td>Nome do Treinamento:</td>
  <td><input type="text" class="selectboxnormal" id="ds_treinamento" name="ds_treinamento" size="65" value="" style="<?php echo $objetos;?>"></td>
</tr>
<tr> 
  <td>Período:</td>
  <td>
  De:&nbsp <input type="text" id="dt_ini" name="dt_ini" OnKeyPress="Formata(this, '##/##/####')" value="" placeholder="<?php echo date("d/m/Y");?>" class="selectboxnormal" size="12" maxlength="10" style="<?php echo $objetos;?>">
  &nbsp;Até&nbsp;
  <input type="text" id="dt_fim" name="dt_fim" OnKeyPress="Formata(this, '##/##/####')" value="" placeholder="<?php echo date("d/m/Y");?>" class="selectboxnormal" size="12" maxlength="10" style="<?php echo $objetos;?>">
  </td>
</tr>
<tr>
	<td>Ativo:</td>
<td>
  <select id="ds_ativo" name="ds_ativo" class="selectboxnormal" style="height: 18; font-size: 8 pt;<?php echo $objetos;?>">
  <OPTION VALUE="SIM"> SIM</OPTION>
  <OPTION VALUE="NAO"> NÃO</OPTION>
  </select>
  </td>
</tr>
</table>

<br>
<div align="center">
	<input type="button" value="Salvar" id="BtSalvar" name="BtSalvar" onClick="JavaScript: Salvar();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80">
    <input type="button" value="Excluir" id="BtExcluir" name="BtExcluir" onClick="javascript: Excluir();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80">  
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
	var cdtreinamento	= document.getElementById('cd_treinamento').value;
	var dstreinamento	= document.getElementById('ds_treinamento').value;
  	var dtini	= document.getElementById('dt_ini').value;
	var dtfim	= document.getElementById('dt_fim').value;
	var dsativo	= document.getElementById('ds_ativo').value;

	if(dstreinamento == ''){alert("Campo NOME DO TREINAMENTO Obrigatório!!!");document.getElementById('ds_treinamento').focus();}
	else if(dtini == ''){alert("Campo DATA INICIAL Obrigatório!!!");document.getElementById('dt_ini').focus();}
	else if(dtfim == ''){alert("Campo DATA FINAL Obrigatório!!!");document.getElementById('dt_fim').focus();}
	else if(dsativo == ''){alert("Campo ATIVO Obrigatório!!!");document.getElementById('ds_ativo').focus();}
	
 	else{
		if(cdtreinamento == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_treinamento='+cdtreinamento+'&ds_treinamento='+dstreinamento+'&dt_ini='+dtini+'&dt_fim='+dtfim+'&ds_ativo='+dsativo, "acao");
	}
}

function Excluir(){
	var cdtreinamento	= document.getElementById('cd_treinamento').value;
	var dstreinamento	= document.getElementById('ds_treinamento').value;
  	var dtini	= document.getElementById('dt_ini').value;
	var dtfim	= document.getElementById('dt_fim').value;
	var dsativo	= document.getElementById('ds_ativo').value;
	
	if(dstreinamento == ''){alert("Selecione um treinamento para excluir!!!");document.getElementById('ds_treinamento').focus();}
	
	else{
		if(confirm("Deseja realmente remover este treinamento?")){window.open('acao.php?Tipo=E&cd_treinamento='+cdtreinamento+'&ds_treinamento='+dstreinamento+'&dt_ini='+dtini+'&dt_fim='+dtfim+'&ds_ativo='+dsativo, "acao");
		}
	}
}
</script>