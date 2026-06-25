<?php include "../../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../../index.php', '_self');</script>";}?>
<html>
<head>
<link rel="stylesheet" href="../../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>

<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr> 
  <td width="25%">Upload:</td>
  <td width="75%" colspan="3"><iframe id="up" name="up" src="up.php" width="100%" height="35" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe></td>
</tr>
<tr><td width="100%" colspan="4" style="color:#FF0000" align="center"><b>ATENÇÃO: O ARQUIVO DE IMPORTAÇÃO DEVE SER NO FORMATO MS EXCEL 97/2003 .XLS (Não é possível importar .XLSX)</b><br>NOME DO ARQUIVO DEVER SER metaindividual.xls</td></tr>
<tr><td width="100%" colspan="4"><br><hr></td></tr>
</table>

<br>
<div align="center">
  <input type="button" value="Processar" id="Btproc" name="Btproc" onClick="JavaScript: Proc();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80">
<br>
</div>
<div align="center">
</div>

</body>
</html>
<script language="javascript">
function Proc(){

	if(confirm("Confirma processamento do Arquivo?")){window.open('acao.php', "_self");}

}
</script>