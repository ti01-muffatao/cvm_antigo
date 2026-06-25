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
<td align="center"><b>Treinamento</b></td>
<td align="center"><b>Fornecedor</b></td>
<td><b>Informações</b></td>
<td><b>URL Vídeo</b></td>
<td><b>URL Arquivo</b></td>
</tr>
  <?php $SQL = "select * from t_conteudo where cd_conteudo <> 0 and cd_treinamento = (select cd_treinamento from t_treinamento where ds_ativo = 'SIM' order by cd_treinamento desc limit 1) ";
  if($TxPesquisa != ""){$SQL .= " and cd_fornecedor like '%". $TxPesquisa."%'";}
  $SQL .= " order by cd_fornecedor asc ";
	$RSS = mysql_query($SQL, $conexao);
	while($RS = mysql_fetch_array($RSS)){
	  $Cont = $Cont + 1;
	  if($cor == "#FFFFFF"){$cor = "#DDDDDD";}else{$cor = "#FFFFFF";}?>
	  <tr height="20" bgcolor="<?php echo $cor;?>" id="a<?php echo $Cont?>" onClick="javascript: Clica(this,'<?php echo $RS["cd_conteudo"];?>');" style="cursor:pointer;">
	  <?php
	  echo "<td>".BuscaTreinamento($RS["cd_treinamento"])."</td>";
	  echo "<td>".BuscaClifor($RS["cd_fornecedor"])."</td>";
	  echo "<td>".$RS["ds_informacoes"]."</td>";
	  echo "<td align='center'>".$RS["url_video"]."</td>";
	  echo "<td align='center'>".$RS["url_arquivo"]."</td>";
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