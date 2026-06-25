<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_noticia" id="cd_noticia" value="">
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr> 
  <td>Título:</td>
  <td><input type="text" id="ds_titulo" name="ds_titulo" class="selectboxnormal" size="65" value="" maxlength="500" style="<?php echo $objetos;?>"></td>
</tr>
<tr> 
  <td valign="top">Notícia:</td>
  <td valign="top"><textarea name="ds_noticia" cols="70" rows="12" class="selectboxnormal" id="ds_noticia" style="<?php echo $objetos;?>"></textarea></td>
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
  	var cdnoticia	= document.getElementById('cd_noticia').value;
  	var dsnoticia	= document.getElementById('ds_noticia').value;
  	var dstitulo	= document.getElementById('ds_titulo').value;
	if(dsnoticia == ''){alert("Campo DESCRIÇÃO DA NOTÍCIA Obrigatório!!!");document.getElementById('ds_noticia').focus();}
	if(dstitulo == ''){alert("Campo TÍTULO DA NOTÍCIA Obrigatório!!!");document.getElementById('ds_titulo').focus();}
 	else{
		if(cdnoticia == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_noticia='+cdnoticia+'&ds_noticia='+dsnoticia+'&ds_titulo='+dstitulo, "acao");
	}
}
</script>