<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_conteudo" id="cd_conteudo" value="" >
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr>
 	<td>Treinamento:</td>
	<td colspan="3">
	<select id="cd_treinamento" name="cd_treinamento" class="selectboxnormal" style="width: 5l0; height: 18; font-size: 8 pt;<?php echo $objetos;?>">
	<OPTION VALUE="">- Treinamento -</OPTION>
	<?php $RSS = mysql_query("select * from t_treinamento where ds_ativo = 'SIM' order by dt_fim desc", $conexao);
	while($RS = mysql_fetch_array($RSS)){	
		echo "<OPTION VALUE='" . $RS["cd_treinamento"] . "'";
		if ($cd_treinamento == $RS["cd_treinamento"]){ echo " selected"; }
		echo ">" . $RS["ds_treinamento"] . "</OPTION>";
	}?>
	</select>
	</td>
</tr>
<tr>
 	<td>Fornecedor:</td>
	<td colspan="3">
	<select id="cd_fornecedor" name="cd_fornecedor" class="selectboxnormal" style="width: 5l0; height: 18; font-size: 8 pt;<?php echo $objetos;?>">
	<OPTION VALUE="">- Fornecedores -</OPTION>
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
  <td>Informações:</td>
  <td><textarea name="ds_informacoes" cols="70" rows="3"  id="ds_informacoes"></textarea></td>
</tr>
<tr>
	<td>Vídeo Treinamento:</td>
	<td colspan="3"><input type="text" name="video" id="video" class="selectboxnormal" size="60" placeholder=" Insira a URL do vídeo"></td>
</tr>
<tr>
	<td>Arquivo Treinamento(.ppt):</td>
	<td colspan="3"><input type="text" name="arquivo" id="arquivo" class="selectboxnormal" size="60" placeholder=" Insira a URL do arquivo"></td>
</tr>
</table>
<br><br><br><br>

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
  	var cdconteudo	= document.getElementById('cd_conteudo').value;
	var cdtreinamento	= document.getElementById('cd_treinamento').value;
	var cdfornecedor	= document.getElementById('cd_fornecedor').value;
	var dsinformacoes	= document.getElementById('ds_informacoes').value;
	var video	= document.getElementById('video').value;
	var arquivo	= document.getElementById('arquivo').value;

	if(cdtreinamento == ''){alert("Campo TREINAMENTO Obrigatório!!!");document.getElementById('cd_treinamento').focus();}
	else if(cdfornecedor == ''){alert("Campo FORNECEDOR Obrigatório!!!");document.getElementById('cd_fornecedor').focus();}
	
 	else{
		if(cdconteudo == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_conteudo='+cdconteudo+'&cd_treinamento='+cdtreinamento+'&cd_fornecedor='+cdfornecedor+'&ds_informacoes='+dsinformacoes+'&video='+video+'&arquivo='+arquivo, "acao");
	}
}

function Excluir(){
  	var cdconteudo	= document.getElementById('cd_conteudo').value;
	var cdtreinamento	= document.getElementById('cd_treinamento').value;
	var cdfornecedor	= document.getElementById('cd_fornecedor').value;
	
	if(cdtreinamento == ''){alert("Selecione um item para excluir!!!");document.getElementById('cd_treinamento').focus();}
	
	else{
		if(confirm("Deseja realmente remover este item?")){window.open('acao.php?Tipo=E&cd_conteudo='+cdconteudo+'&cd_treinamento='+cdtreinamento+'&cd_fornecedor='+cdfornecedor, "acao");
		}
	}
}
</script>