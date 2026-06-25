<?php //include "conexao.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="obj/estilo.css">
</head>
<body style="margin:0px;background-image:url(imagens/alpha.png); background-repeat:repeat;">

<table width="100%" border="0" cellspacing="1" cellpadding="1" style="font-family:verdana; font-size:18px; color:#FFFFFF;">
  <tr>
    <td colspan="3" align="right"><b>Contato</b></td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><hr></td>
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td colspan="3" style="font-size:12px;"><br>
	Rua Carlos Gomes, 63 - Centro<br><br>
	<b>Concórdia/SC</b> - CEP 89700-000<br><br>
	E-Mail: falecom@newsolucoes.net<br><br>
    Telefones: (49) 3442-2151 - (49) 9987-3657<br><br><br><br>
	</td>
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="10%" style="font-size:12px;">Nome:</td>
    <td colspan="2"><input type="text" id="ds_nome" name="ds_nome" class="selectboxnormal" size="40" value="" maxlength="100" style="<?php echo $objetos;?>"></td>
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td style="font-size:12px;">Telefone:</td>
    <td colspan="2"><input type="text" id="ds_fone" name="ds_fone" class="selectboxnormal" size="20" value="" maxlength="15" style="<?php echo $objetos;?>"></td>
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td style="font-size:12px;">E-Mail:</td>
    <td colspan="2"><input type="text" id="ds_mail" name="ds_mail" class="selectboxnormal" size="40" value="" maxlength="100" style="<?php echo $objetos;?>"></td>
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td style="font-size:12px;">Assunto:</td>
    <td colspan="2"><input type="text" id="ds_assunto" name="ds_assunto" class="selectboxnormal" size="40" value="" maxlength="100" style="<?php echo $objetos;?>"></td>
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td style="font-size:12px;" valign="top">Mensagem:</td>
    <td colspan="2"><textarea name="ds_msg" cols="60" rows="10" class="selectboxnormal" id="ds_msg" style="<?php echo $objetos;?>"></textarea></td>
  </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td colspan="2"><br>
	<input type="button" value="Enviar" id="Btenviar" name="Btenviar" onClick="JavaScript: window.open('contato.php?ds_assunto='+document.getElementById('ds_assunto').value+'&ds_fone='+document.getElementById('ds_fone').value+'&ds_mail='+document.getElementById('ds_mail').value+'&ds_nome='+document.getElementById('ds_nome').value+'&ds_assunto='+document.getElementById('ds_assunto').value, '_self');" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 100">
	</td>
  </tr>
</table>

</body>
</html>
<?php
if($ds_assunto != ""){
	$destinatario = "turcato.marcos@gmail.com";
	$corpo = "
	<table width='100%' border='0' cellspacing='1' cellpadding='1' style='font-family:verdana; font-size:12px;'>
		<tr>
			<td align='center' colspan='2'><b>".$ds_assunto."</b></td>
		</tr>
		<tr>
			<td><b>Nome:</b></td>
			<td>".$ds_nome."</td>
		</tr>
		<tr>
			<td><b>Telefone:</b></td>
			<td>".$ds_fone."</td>
		</tr>
		<tr>
			<td><b>E-Mail:</b></td>
			<td>".$ds_mail."</td>
		</tr>
		<tr>
			<td><b>Mensagem:</b></td>
			<td>".$ds_msg."</td>
		</tr>
		<tr>
			<td><b>Postado em:</b></td>
			<td>".date("d/m/Y H:i")."</td>
		</tr>
	</table>";
	
	
	$headers = "MIME-Version: 1.0";
	$headers .= "Content-type: text/html; charset=iso-8859-1";
	$headers .= "From: turcato.marcos@gmail.com";
	$headers .= "Bcc: turcato.marcos@gmail.com";
	mail($destinatario,$ds_assunto,$corpo,$headers);
	
	echo "Sua Mensagem foi recebida!<br><br>Em breve entraremos em contato.";
}
?>