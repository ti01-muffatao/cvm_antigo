<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo?>">
<br><br>

<table align="center" width="80%" border="1" cellspacing="1" cellpadding="1" style="border-collapse:collapse; box-shadow:10px 10px 15px #888888;" bordercolor="#CCCCCC">
  <tr> 
    <td>
	<iframe id="Formulario" name="Formulario" src="formulario.php" width="100%" height="550" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>
	</td>
  </tr>
</table>

</body>
</html>