<?php include "conexao.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="obj/estilo.css">
<title><?php echo $Titulo;?></title>
</head>
<body style="<?php echo $Fundo;?>" onload="javascript:document.getElementById('TxCPF').focus();">

<!------------------------------------------>
<table align="center" width="100%" border="0" bordercolor="#666666" cellspacing="0" cellpadding="0" style="border-collapse:collapse;font-family:verdana;font-size:12px;">
  <tr>
	<td>&nbsp;<br>&nbsp;<b>.: CPF</b>&nbsp;&nbsp;</td>
	<td>&nbsp;<br><input name="TxCPF" type="text" class="selectboxnormal" id="TxCPF" onKeypress="javascript: return validanumeros();" onBlur="javascript:if(document.getElementById('TxCPF').value != '' && validacpf(document.getElementById('TxCPF').value) == false){document.getElementById('TxCPF').value='';}" value="" size="15" maxlength="11"></td>
  </tr>
  <tr>
	<td><br>&nbsp;<b>.: Senha</b>&nbsp;&nbsp;</td>
	<td>&nbsp;<br><input name="TxSenha" type="password" class="selectboxnormal" id="TxSenha" value="" size="15" maxlength="20"></td>
  </tr>
  <tr>
	<td><br>&nbsp;<b>.: Captcha</b>&nbsp;&nbsp;</td>
	<td>&nbsp;<br><input name="TxCaptha" type="text" class="selectboxnormal" id="TxCaptha" size="15" maxlength="5" onKeyPress="javascript:if(window.event.keyCode==13){Logar();}"></td>
  </tr>
  <tr>
	<td colspan="2">&nbsp;<br><iframe id="Captcha" name="Captcha" src="captcha.php" width="100%" height="40" frameborder="0" marginheight="0" marginwidth="0" scrooling="no"></iframe></td>
  </tr>
  <tr>
	<td colspan="3" align="center">
	<br><input type="button" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" id="BtEntrar" name="BtEntrar" value="Entrar" onClick="javascript: Logar();" style="width:75px;">
	&nbsp;&nbsp;&nbsp;<input type="button" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" id="BtLimpar" name="BtLimpar" value="Limpar" onClick="javascript:Limpar();" style="width:75px;">
	<br>
	</td>
  </tr>
</table>
<!------------------------------------------>

</body>
</html>
<script language="javascript">
function Limpar()
{
	document.getElementById('TxCPF').value		= '';
	document.getElementById('TxSenha').value	= '';
	document.getElementById('TxCaptha').value	= '';
	window.open('captcha.php', "Captcha");
}

function Logar()
{
	if(document.getElementById('TxCaptha').value != window.frames["Captcha"].document.getElementById('chave').value)
		{
		alert("Código de validação não confere!");
		window.open('captcha.php', "Captcha");
		document.getElementById('TxCaptha').value	= '';
		}
	else
		{window.parent.Conectar(document.getElementById('TxCPF').value, document.getElementById('TxSenha').value);}
}
</script>
