<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo?>" onLoad="javascript: document.getElementById('TxPesquisa').focus();">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:verdana; font-size:11px;">
  <tr> 
    <td width="50%" valign="top">
	<b>Pesquisar Conteúdo:</b>
	<input type="text" id="TxPesquisa" name="TxPesquisa" onKeyUp="javascript: window.frames['Lista'].recarrega(document.getElementById('TxPesquisa').value);" class="selectboxnormal" size="30" value="">
	</td>
    <td width="50%" valign="top" rowspan="2">
	<iframe id="Formulario" name="Formulario" src="formulario.php" width="100%" height="550" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>
	</td>
  </tr>
  <tr> 
    <td>
	<iframe id="Lista" name="Lista" src="lista.php" width="100%" height="535" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>
	</td>
  </tr>
</table>
<iframe id="acao" name="acao" width="0" height="0" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>

</body>
</html>