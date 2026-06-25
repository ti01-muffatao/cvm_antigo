<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
  <table width="100%" align="center" border="0" bordercolor="#666666" cellspacing="1" cellpadding="1" style="font-family:verdana; font-size:11px;">
<tr <?php echo $cabecalho;?>>
<td><b>Notícia</b></td>
</tr>
  <?php $SQL = "select * from noticias where cd_noticia <> 0 ";
  if($TxPesquisa != ""){$SQL .= " and ds_titulo like '%". $TxPesquisa."%'";}
  $SQL .= " order by ds_noticia asc ";
	$RSS = mysql_query($SQL, $conexao);
	while($RS = mysql_fetch_array($RSS)){
	  $Cont = $Cont + 1;
	  if($cor == "#FFFFFF"){$cor = "#DDDDDD";}else{$cor = "#FFFFFF";}?>
	  <tr height="20" bgcolor="<?php echo $cor;?>" id="a<?php echo $Cont?>" onClick="javascript: Clica(this,'<?php echo $RS["cd_noticia"];?>');" style="cursor:pointer;">
	  <?php
	  echo "<td>".strtoupper($RS["ds_titulo"])."</td>";
	  echo "</tr>";
	}
	echo "<font face='verdana' size='2'><b>(".$Cont.")</b> Registros Encontrados";?>
</table>
</body>
</html>
<script language="javascript">
function recarrega(vl){
	window.open('lista.php?TxPesquisa='+vl, "_self");
}
function Clica(atual, Cod){
	<?php if($Cont != ""){?>
		for (i=1; i <= <?php echo $Cont?>; i++){eval('a'+i).style.color = '#000000';}
		atual.style.color='#FF0000';
	<?php }?>
	window.open('acao.php?Tipo=D&Codigo='+Cod, "acao");
}
</script>