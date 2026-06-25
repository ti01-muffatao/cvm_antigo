<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_pergunta" id="cd_pergunta" value="" >
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
  <td>Pergunta:</td>
  <td><textarea name="ds_pergunta" cols="70" rows="3"  id="ds_pergunta" style="background: #B5DEFF;"></textarea></td>
</tr>
<tr>
	<td>Resposta 1:</td>
	<td colspan="3"><textarea name="resposta1" cols="70" rows="2"  id="resposta1" style="background: #B5DEFF;"></textarea></td>
</tr>
<tr>
	<td>Resposta 2:</td>
	<td colspan="3"><textarea name="resposta2" cols="70" rows="2"  id="resposta2" style="background: #B5DEFF;"></textarea></td>
</tr>
<tr>
	<td>Resposta 3:</td>
	<td colspan="3"><textarea name="resposta3" cols="70" rows="2"  id="resposta3" style="background: #B5DEFF;"></textarea></td>
</tr>
<tr>
	<td>Resposta 4:</td>
	<td colspan="3"><textarea name="resposta4" cols="70" rows="2"  id="resposta4" style="background: #B5DEFF;"></textarea></td>
</tr>
<tr>
	<td>Resposta Correta:</td>
	<td><select id="cd_resposta" name="cd_resposta" class="selectboxnormal" style="width: 5l0; height: 18; font-size: 8 pt;<?php echo $objetos;?>">
            <option value="">- Escolha Uma Resposta - </option>
            <option value="1">Resposta 1</option>
            <option value="2">Resposta 2</option>
            <option value="3">Resposta 3</option>
            <option value="4">Resposta 4</option>
        </select>
    </td>
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
  	var cdpergunta	= document.getElementById('cd_pergunta').value;
	var cdtreinamento	= document.getElementById('cd_treinamento').value;
	var cdfornecedor	= document.getElementById('cd_fornecedor').value;
	var dspergunta	= document.getElementById('ds_pergunta').value;
  	var resposta1	= document.getElementById('resposta1').value;
	var resposta2	= document.getElementById('resposta2').value;
	var resposta3	= document.getElementById('resposta3').value;
	var resposta4	= document.getElementById('resposta4').value;
	var cdresposta	= document.getElementById('cd_resposta').value;

	if(cdtreinamento == ''){alert("Campo TREINAMENTO Obrigatório!!!");document.getElementById('cd_treinamento').focus();}
	else if(cdfornecedor == ''){alert("Campo FORNECEDOR Obrigatório!!!");document.getElementById('cd_fornecedor').focus();}
	else if(dspergunta == ''){alert("Campo PERGUNTA Obrigatório!!!");document.getElementById('ds_pergunta').focus();}
	else if(resposta1 == ''){alert("Campo RESPOSTA 01 Obrigatório!!!");document.getElementById('resposta1').focus();}
	else if(resposta2 == ''){alert("Campo RESPOSTA 02 Obrigatório!!!");document.getElementById('resposta2').focus();}
	else if(resposta3 == ''){alert("Campo RESPOSTA 03 Obrigatório!!!");document.getElementById('resposta3').focus();}
	else if(resposta4 == ''){alert("Campo RESPOSTA 04 Obrigatório!!!");document.getElementById('resposta4').focus();}
	else if(cdresposta == ''){alert("Campo RESPOSTA CORRETA obrigatório!!!");document.getElementById('cd_resposta').focus();}
	
 	else{
		if(cdpergunta == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_pergunta='+cdpergunta+'&cd_treinamento='+cdtreinamento+'&cd_fornecedor='+cdfornecedor+'&ds_pergunta='+dspergunta+'&resposta1='+resposta1+'&resposta2='+resposta2+'&resposta3='+resposta3+'&resposta4='+resposta4+'&cd_resposta='+cdresposta, "acao");
	}
}

function Excluir(){
  	var cdpergunta	= document.getElementById('cd_pergunta').value;
	var cdtreinamento	= document.getElementById('cd_treinamento').value;
	var cdfornecedor	= document.getElementById('cd_fornecedor').value;
	var dspergunta	= document.getElementById('ds_pergunta').value;
	
	if(dspergunta == ''){alert("Selecione uma pergunta para excluir!!!");document.getElementById('ds_pergunta').focus();}
	
	else{
		if(confirm("Deseja realmente remover esta pergunta?")){window.open('acao.php?Tipo=E&cd_pergunta='+cdpergunta+'&cd_treinamento='+cdtreinamento+'&cd_fornecedor='+cdfornecedor+'&ds_pergunta='+dspergunta, "acao");
		}
	}
}
</script>